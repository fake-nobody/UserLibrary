package com.nianmi.member.service.impl;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import com.nianmi.member.dao.IBaseDao;
import com.nianmi.member.dao.impl.InviteCauseDao;
import com.nianmi.member.pojo.InviteCause;
import com.nianmi.member.service.BaseService;

@Service
@Transactional
public class InviteCauseService extends BaseService<InviteCause> {

	@Autowired
	private InviteCauseDao inviteCauseDao;

	@Override
	public IBaseDao<InviteCause> getDao() {
		return this.inviteCauseDao;
	}

}
