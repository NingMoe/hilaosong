package com.hi.model;

import com.hi.common.HIConstants;
import com.hi.tools.StringTools;

public class Dish extends Pagenation{
	private String dishId;
	
	private String dishName;
	
	private String guidePrice;
	
	private String unitPrice;
	
	private String description;
	
	private String isRequired;
	
	private String dishUnit;
	
	private String dishWeight;
	
	private String dishShareType;
	
	private String isRecommend;
	
	private String linkStoreDishId;
	
	private String type;
	
	private String bigImageAddr;
	
	private String mediumImageAddr;
	
	private String storeDishId;
	
	private String storeDishName;
	
	private String halfDishId;
	 
	private String halfStoreDishId;
	
	// if this dish has half, then set the price of half dish
	private String halfPrice;
	
	private String dishClass;
	

	public String getDishClass() {
		return dishClass;
	}

	public void setDishClass(String dishClass) {
		this.dishClass = dishClass;
	}

	public String getDishId() {
		return dishId;
	}

	public void setDishId(String dishId) {
		this.dishId = dishId;
	}

	public String getDishName() {
		return dishName;
	}

	public void setDishName(String dishName) {
		this.dishName = dishName;
	}

	public String getGuidePrice() {
		return guidePrice;
	}

	public void setGuidePrice(String guidePrice) {
		this.guidePrice = guidePrice;
	}

	public String getUnitPrice() {
		return unitPrice;
	}

	public void setUnitPrice(String unitPrice) {
		this.unitPrice = unitPrice;
	}

	public String getDescription() {
		return description;
	}

	public void setDescription(String description) {
		this.description = description;
	}

	public String getIsRequired() {
		return isRequired;
	}

	public void setIsRequired(String isRequired) {
		this.isRequired = isRequired;
	}

	public String getDishUnit() {
		return dishUnit;
	}

	public void setDishUnit(String dishUnit) {
		this.dishUnit = dishUnit;
	}

	public String getDishWeight() {
		return dishWeight;
	}

	public void setDishWeight(String dishWeight) {
		this.dishWeight = dishWeight;
	}

	public String getDishShareType() {
		return dishShareType;
	}

	public void setDishShareType(String dishShareType) {
		this.dishShareType = dishShareType;
	}

	public String getIsRecommend() {
		return isRecommend;
	}

	public void setIsRecommend(String isRecommend) {
		this.isRecommend = isRecommend;
	}

	public String getLinkStoreDishId() {
		return linkStoreDishId;
	}

	public void setLinkStoreDishId(String linkStoreDishId) {
		this.linkStoreDishId = linkStoreDishId;
	}

	public String getType() {
		return type;
	}

	public void setType(String type) {
		this.type = type;
	}

	public String getBigImageAddr() {
		return bigImageAddr;
	}

	public void setBigImageAddr(String bigImageAddr) {
		if (StringTools.isEmpty(bigImageAddr)) {
			this.bigImageAddr = HIConstants.PRE_IMAGE + HIConstants.DEFALUT_IMAGE;
		} else {
			this.bigImageAddr = HIConstants.PRE_IMAGE + bigImageAddr;
		}
	}

	public String getMediumImageAddr() {
		return mediumImageAddr;
	}

	public void setMediumImageAddr(String mediumImageAddr) {
		this.mediumImageAddr = mediumImageAddr;
	}

	public String getStoreDishId() {
		return storeDishId;
	}

	public void setStoreDishId(String storeDishId) {
		this.storeDishId = storeDishId;
	}

	public String getStoreDishName() {
		return storeDishName;
	}

	public void setStoreDishName(String storeDishName) {
		this.storeDishName = storeDishName;
	}

	public String getHalfDishId() {
		return halfDishId;
	}

	public void setHalfDishId(String halfDishId) {
		this.halfDishId = halfDishId;
	}

	public String getHalfStoreDishId() {
		return halfStoreDishId;
	}

	public void setHalfStoreDishId(String halfStoreDishId) {
		this.halfStoreDishId = halfStoreDishId;
	}

	public String getHalfPrice() {
		return halfPrice;
	}

	public void setHalfPrice(String halfPrice) {
		this.halfPrice = halfPrice;
	}
}
