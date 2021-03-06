package com.hi.control;

import java.io.UnsupportedEncodingException;
import java.math.BigDecimal;
import java.net.URLEncoder;
import java.text.DecimalFormat;
import java.util.Collections;
import java.util.Comparator;
import java.util.List;

import javax.ws.rs.FormParam;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;

import org.springframework.beans.factory.annotation.Autowired;

import com.hi.common.HIConstants;
import com.hi.common.MessageCode;
import com.hi.common.OrderType;
import com.hi.model.City;
import com.hi.model.Store;
import com.hi.service.CityService;
import com.hi.service.StoreService;
import com.hi.service.impl.CityServiceImpl;
import com.hi.tools.BaiduTools;
import com.hi.tools.CityTools;
import com.hi.tools.StringTools;

@Path("/")
public class StoreAction extends BaseAction {

	@Autowired
	private CityService cityService;

	@Autowired
	private StoreService storeService;

	@GET
	@Path("/getcities")
	@Produces(MediaType.APPLICATION_JSON)
	public Response getCities() {
		List<City> cities = cityService.getDeliveryCities();
		getSession().setAttribute(HIConstants.CITYID, cities.get(0).getCityId());
		return getSuccessJsonResponse(cities);
	}

	@GET
	@Path("/getareastore")
	@Produces(MediaType.APPLICATION_JSON)
	public Response getAreaStore(@FormParam("cityId") String cityId) {
		System.out.println("==> cityId:" + cityId);
		if (StringTools.isEmpty(cityId)) {
			cityId = CityServiceImpl.CITY_BEIJING;
		}
		String storeId = storeService.getDefaultStore(cityId).getStoreId();
		System.out.println("<== storeId:" + storeId);

		Store areaStore = storeService.getAreaStore(storeId);
		System.out.println("<== areaStoreId:" + areaStore.getStoreId());

		getSession().setAttribute(HIConstants.CITYID, cityId);
		getSession().setAttribute(HIConstants.AREASTORE, areaStore);

		return getSuccessJsonResponse(getSession().getAttribute(HIConstants.AREASTORE));
	}

	/**
	 * "/wap/toSendDishesPage" (Mobile version)
	 * 
	 * @param cityId
	 * @return
	 */
	@GET
	@Path("/getstores0")
	@Produces(MediaType.APPLICATION_JSON)
	public Response getStores(@FormParam("provinceId") String provinceId, @FormParam("cityId") String cityId, @FormParam("address") String address) {
		try {
			List<Store> stores = null;
			if (StringTools.isNotEmpty(address)) {
				String cusPoint = BaiduTools.getCusPointByAddress(URLEncoder.encode(address, "ISO-8859-1"));
				if(StringTools.isNotEmpty(cusPoint)){
					stores = storeService.getStores(provinceId, cityId, OrderType.SEND_OUT.getKey(),
							BaiduTools.getCusPointByAddress(URLEncoder.encode(address, "ISO-8859-1")));
					Collections.sort(stores, new Comparator<Store>() {
						public int compare(Store arg0, Store arg1) {
							return arg0.getDistance().compareTo(arg1.getDistance());
						}
					});
				}else{
					return getFailedJsonResponse(MessageCode.ERROR_NO_DATA); // 未取到地址
				}
			} else {
				stores = storeService.getStores(provinceId, cityId, OrderType.SEND_OUT.getKey());
			}
			Store s = null;
			if (stores != null && stores.size() > 0) {
				s = stores.get(0);
				//距离加1
				s.setDistance(s.getDistance().add(new BigDecimal(1)));//("" + calculateDeliveryFee0(s));
				s.setDeliveryFee("" + calculateDeliveryFee0(s));
			}
			return getSuccessJsonResponse(s);
		} catch (UnsupportedEncodingException e) {
			return getFailedJsonResponse(MessageCode.ERROR_ENCODING); // 编码异常
		}
	}

	@GET
	@Path("/getstores2")
	@Produces(MediaType.APPLICATION_JSON)
	public Response getStores(@FormParam("provinceId") String provinceId, @FormParam("cityId") String cityId) {
		List<Store> stores = storeService.getStores(provinceId, cityId, OrderType.TAKE_AWAY.getKey());
		return getSuccessJsonResponse(stores);
	}

	/**
	 * /wap3/countDeliveryFee
	 * 
	 * @param storeId
	 * @param address
	 * @return
	 */
	@GET
	@Path("/calcdeliveryfee")
	@Produces(MediaType.APPLICATION_JSON)
	public String calculateDeliveryFee(@FormParam("storeId") String storeId, @FormParam("address") String address) {
		try {
			Store s = storeService.getStore(storeId, BaiduTools.getCusPointByAddress(URLEncoder.encode(address, "ISO-8859-1")));
			if (s != null) {
				return "{\"deliveryFee\":\"" + calculateDeliveryFee0(s) + "\"}";
			} else {
				return getJsonString(MessageCode.ERROR_NO_DATA); // 未取到数据
			}
		} catch (UnsupportedEncodingException e) {
			return getJsonString(MessageCode.ERROR_ENCODING); // 编码异常
		}
	}

	private int calculateDeliveryFee0(Store s) {
		if (s != null) {
			String cityId = CityTools.isDirectMunicipalities(s.getProvinceId()) ? s.getProvinceId() : s.getCityId();
			double unitPrice = cityService.getDeliveryUnitPrice(cityId);
			if (s.getDistance() != null) {
				// 总价四舍五入到小数点后1位
				Double dis = Double.valueOf(new DecimalFormat("0.0").format(s.getDistance().doubleValue()));
				if (dis.compareTo(1d) < 0) {
					dis = 1d;
				}
				getSession().setAttribute(HIConstants.DISTANCE, dis);
				Double totalPrice = unitPrice * dis;
				// 总价四舍五入到整数位
				return Integer.parseInt(new DecimalFormat("0").format(totalPrice));
			}
		}
		return 0;
	}

	@GET
	@Path("/getdeliverylimitmoney")
	@Produces(MediaType.APPLICATION_JSON)
	public String getMinAmount(@FormParam("storeId") String storeId) {
		Store s = storeService.getStore(storeId);
		if (s != null) {
			String cityId = CityTools.isDirectMunicipalities(s.getProvinceId()) ? s.getProvinceId() : s.getCityId();
			String lm = cityService.getMinAmount(cityId);
			if (StringTools.isNotEmpty(lm)) {
				return "{\"deliveryLimitMoney\":\"" + lm + "\"}";
			}
		}
		return getJsonString(MessageCode.ERROR_NO_DATA); // 未取到数据
	}

	@GET
	@Path("/getdeliverylimit")
	@Produces(MediaType.APPLICATION_JSON)
	public Response getDeliveryLimit(@FormParam("storeId") String storeId, @FormParam("orderType") String orderType) {
		Store s = storeService.getStore(storeId);
		if (s != null) {
			String cityId = CityTools.isDirectMunicipalities(s.getProvinceId()) ? s.getProvinceId() : s.getCityId();
			if (StringTools.isEmpty(orderType)) {
				orderType = OrderType.SEND_OUT.getKey();
			}
			return getSuccessJsonResponse(cityService.getDeliveryLimit(storeId, cityId, orderType));
		}
		return getSuccessJsonResponse(MessageCode.ERROR_NO_DATA); // 未取到数据
	}

	@GET
	@Path("/getcuspoint")
	@Produces(MediaType.APPLICATION_JSON)
	public String getCusPointByAddress(@FormParam("address") String address) {
		try {
			return BaiduTools.getCusPointByAddress(URLEncoder.encode(address, "ISO-8859-1"));
		} catch (UnsupportedEncodingException e) {
			return getJsonString(MessageCode.ERROR_ENCODING); // 编码异常
		}
	}
}
