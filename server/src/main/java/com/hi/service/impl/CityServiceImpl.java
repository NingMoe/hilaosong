package com.hi.service.impl;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import com.hi.dao.CityDao;
import com.hi.model.City;
import com.hi.service.CityService;

@Service("cityService")
@Transactional
public class CityServiceImpl implements CityService {
	
	@Autowired
	private CityDao dao;
	
	public List<City> getDeliveryCities() {
		List<City> cities = dao.getDeliveryCities();
		return cities;
	}

}
