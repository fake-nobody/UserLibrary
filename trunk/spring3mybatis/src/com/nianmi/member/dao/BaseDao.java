package com.nianmi.member.dao;

import java.lang.reflect.InvocationTargetException;
import java.util.HashMap;
import java.util.Map;

import org.apache.commons.beanutils.BeanUtils;
import org.mybatis.spring.support.SqlSessionDaoSupport;
import org.springframework.beans.factory.annotation.Autowired;

import com.nianmi.member.exception.BizException;
import com.nianmi.member.mapper.SqlMapper;

public abstract class BaseDao<T> extends SqlSessionDaoSupport implements
		IBaseDao<T> {

	@Autowired
	protected SqlMapper<Map<String, Object>> sqlMapper;

	private String tableName;
	private Class<T> clasz;

	public BaseDao(final String tableName, final Class<T> clasz) {
		this.tableName = tableName;
		this.clasz = clasz;
	}

	/**
	 * 通用 统计 总数 方法
	 */
	@Override
	public int count() throws BizException {
		return sqlMapper.count(tableName);
	}

	/**
	 * 通用 根据 ID 查询 指定对象
	 */
	@Override
	public T findById(long id) throws BizException {
		T t = null;
		try {
			t = clasz.newInstance();
			BeanUtils.populate(t, sqlMapper.findById(tableName, id));
		} catch (IllegalAccessException | InvocationTargetException
				| InstantiationException e) {
			e.printStackTrace();
		}
		return t;
	}

	/**
	 * 通用 根据 ID 删除 指定对象
	 */
	@Override
	public void deleteById(long id) throws BizException {
		sqlMapper.deleteById(tableName, id);
	}

	@Override
	public void save(T pojo) throws BizException {
		Map<String, Object> map = new HashMap<String, Object>();
		try {
			BeanUtils.populate(pojo, map);
		} catch (IllegalAccessException | InvocationTargetException e) {
			e.printStackTrace();
		}
		sqlMapper.save(map);
	}

	@Override
	public void update(T pojo) throws BizException {

	}
}
