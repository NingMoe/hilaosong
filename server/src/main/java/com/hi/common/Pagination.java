package com.hi.common;

public final class Pagination {
	/**
	 * 默认第几页
	 */
	public static final int DEF_INDEX = 1;
	/**
	 * 默认每页分页条数
	 */
	public static final int DEF_SIZE = 9;

	private int pageIndex = 1;

	private int pageSize = 1;

	private int totalPagesCount;

	private int totalRowsCount;

	public Pagination() {
		this(DEF_INDEX, DEF_SIZE);
	}

	public Pagination(int pageSize) {
		this(DEF_INDEX, pageSize);
	}

	public Pagination(int pageIndex, int pageSize) {
		if (pageIndex < 1) {
			pageIndex = 1;
		}
		if (pageSize < 1) {
			pageSize = 1;
		}
		this.pageIndex = pageIndex;
		this.pageSize = pageSize;
	}

	public int getPageIndex() {
		return pageIndex;
	}

	public void setPageIndex(int pageIndex) {
		if (pageIndex < 1) {
			pageIndex = 1;
		}
		this.pageIndex = pageIndex;
	}

	public int getPageSize() {
		return pageSize;
	}

	public void setPageSize(int pageSize) {
		if (pageSize < 1) {
			pageSize = 1;
		}
		this.pageSize = pageSize;
	}

	public int getTotalPagesCount() {
		return totalPagesCount;
	}

	public void setTotalPagesCount(int totalPagesCount) {
		this.totalPagesCount = totalPagesCount;
	}

	public int getTotalRowsCount() {
		return totalRowsCount;
	}

	public void setTotalRowsCount(int totalRowsCount) {
		this.totalRowsCount = totalRowsCount;
	}

	public int getStartRow() {
		return (pageIndex - 1) * pageSize;
	}
}