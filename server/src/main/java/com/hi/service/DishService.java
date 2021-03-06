package com.hi.service;

import java.util.List;

import com.hi.common.MessageCode;
import com.hi.model.Dish;
import com.hi.model.DishType;
import com.hi.model.DiyGuodi;
import com.hi.model.Pack;
import com.hi.model.PackDish;

public interface DishService {
	List<DishType> getCategories(String storeId);

	int countDishes(String storeId, String catId);

	List<Dish> getDishes(String storeId, String catId, int pageIndex, int pageSize);
	
	Dish getDishDetail(String dishId);

	int countPacks(String storeId, String catId);
	
	List<Pack> getPacks(String storeId, String catId, int pageIndex);
	
	List<PackDish> getPackDishes(String packId);
	
	int countDiyGuodis(String userId);
	
	List<DiyGuodi> getDiyGuodis(String userId, int pageIndex);

	String createDiyGuodi(DiyGuodi guodi);

	/**
	 * 更新用户的DIY锅底
	 * @param guodi
	 * @return
	 */
	String updateDiyGuodi(DiyGuodi guodi);

	/**
	 * 删除DIY锅底
	 * @param id
	 * @return
	 */
	boolean deleteDiyGuodi(long id);

	//diy锅底查询
	List<Dish> getDiyDishes(String storeId, String categoryId, int pageIndex,
			int pageSize);
}
