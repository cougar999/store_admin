<?php /* Smarty version 2.6.26, created on 2013-01-17 15:46:26
         compiled from promote/edit.html */ ?>
<!-- content start -->
	<div id="wrapper">
		<div id="content">
			<div class="clearfix">
				<h1><h1>编辑促销活动</h1></h1>
			</div>
			<br />
			<div class="cl"></div>
			
			<!-- 基本信息 -->
			<div id="productList">
				<form method="post" action="">
				<div class="pdheader">
					<span class="pdheadertext slideTrigger">基本信息</span>	
				</div>
				<div class="pdcontent">
					<table width="100%" border="0">
						<tbody>
							<tr>
								<td>
									<table width="100%" border="0">
										<colgroup>
											<col width="100" />
											<col width="18" />
											<col width="auto" />
										</colgroup>
										<tbody>
											<tr>
												<td valign="top" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">标题</span>
												</td>
												<td>&nbsp;</td>
												<td>
													<input type="text" value="<?php echo $this->_tpl_vars['assign']['prom']['title']; ?>
" class="textbox_text" maxlength="255" style="width:420px;" name="title"><span class="inline-error" id="required-promoteName">这是必填项目<span class="inline-error-arrow-border"></span><span class="inline-error-arrow"></span></span>
												</td>
											</tr>
											<tr>
												<td align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">短描述</span>
												</td>
												<td>&nbsp;</td>
												<td class="padded">
													<textarea id="promoteDescription" name="description" style="width:90%;" rows="7" class="textarea_text"><?php echo $this->_tpl_vars['assign']['prom']['description']; ?>
</textarea>
												</td>
											</tr>
											<tr>
												<td align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">内容</span>
												</td>
												<td>&nbsp;</td>
												<td class="padded">
													<textarea id="promoteContent" name="content" style="width:90%;height:200px;" rows="7" class="textarea_text"><?php echo $this->_tpl_vars['assign']['prom']['content']; ?>
</textarea>
												</td>
											</tr>
											<tr>
												<td valign="middle" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">活动范围</span>
												</td>
												<td>&nbsp;</td>
												<td class="padded">
													<select id="prov_id" name="prov_id" onchange="selectCitylist(this);return false;">
														<option value="">--请选择省份--</option>
														<?php $_from = $this->_tpl_vars['assign']['area']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
														<?php if ($this->_tpl_vars['item']['pid'] == -1): ?>
														<option value="<?php echo $this->_tpl_vars['item']['id']; ?>
" <?php if ($this->_tpl_vars['item']['id'] == $this->_tpl_vars['assign']['prom']['prov_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
														<?php endif; ?>
														<?php endforeach; endif; unset($_from); ?>
													</select>
													<select name="city_id" id="city_id">
														<?php $_from = $this->_tpl_vars['assign']['area']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
														<?php if ($this->_tpl_vars['item']['pid'] != -1 && $this->_tpl_vars['item']['pid'] == $this->_tpl_vars['assign']['prom']['prov_id']): ?>
														<option value="<?php echo $this->_tpl_vars['item']['id']; ?>
" <?php if ($this->_tpl_vars['item']['id'] == $this->_tpl_vars['assign']['prom']['city_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
														<?php endif; ?>
														<?php endforeach; endif; unset($_from); ?>
													</select>
												</td>
											</tr>
											<tr>
												<td valign="middle" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">店面类型</span>
												</td>
												<td>&nbsp;</td>
												<td class="padded">
													<select name="shoptype" id="shoptype">
														<option value="0" <?php if ($this->_tpl_vars['assign']['prom']['shoptype'] == 1): ?>selected="selected"<?php endif; ?>>全部店面</option>
														<option value="1" <?php if ($this->_tpl_vars['assign']['prom']['shoptype'] == 1): ?>selected="selected"<?php endif; ?>>指定店面</option>
													</select>
													<div class="shoplistbox clearfix" id="shoplist"></div>
												</td>
											</tr>
											<tr>
												<td align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">状态</span>
												</td>
												<td>&nbsp;</td>
												<td>
													<?php if ($this->_tpl_vars['assign']['prom']['status'] == 1): ?>
													<input type="radio" name="status" value="1" id="onlineSel" checked="checked"></radio>
													<label for="onlineSel">上线</label>
													&nbsp;&nbsp;
													<input type="radio" name="status" value="0" id="offlineSel"></radio>
													<label for="offlineSel">下线</label>
													<?php else: ?>
													<input type="radio" name="status" value="1" id="onlineSel"></radio>
													<label for="onlineSel">上线</label>
													&nbsp;&nbsp;
													<input type="radio" name="status" value="0" id="offlineSel" checked="checked"></radio>
													<label for="offlineSel">下线</label>
													<?php endif; ?>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</div>


				<div class="pdheader">
					<span class="pdheadertext slideTrigger">优惠券信息</span>	
				</div>
				<div class="pdcontent">
					<a href="##" class="v13-button-secondary fl" id="addCoupon">添加优惠券</a>
					<div class="cl"></div>
					<?php if ($this->_tpl_vars['assign']['prom_link']['coupon']): ?>
					<h2><strong>相关促销券</strong></h2>
					<div class="datatablecontent">
					<table width="100%" border="0">
						<colgroup>
							<col width="60" />
							<col width="100" />
							<col width="200" />
							<col width="200" />
							<col width="auto" />
							<col width="200" />
							<col width="100" />
							<col width="200" />
						</colgroup>
						<tbody>
							<tr class="title">
								<th><input type="checkbox" name="selector" id="selector" /></th>
								<th>ID</th>
								<th>标题</th>
								<th>描述</th>
								<th>内容</th>
								<th>图片</th>
								<th>状态</th>
								<th>管理</th>
							</tr>
							<?php $_from = $this->_tpl_vars['assign']['prom_link']['coupon']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key1'] => $this->_tpl_vars['item']):
?>
							<tr>
								<td><input type="checkbox" name="couponids" value="<?php echo $this->_tpl_vars['item']['id']; ?>
"/></td>
								<td><?php echo $this->_tpl_vars['item']['id']; ?>
</td>
								<td><?php echo $this->_tpl_vars['item']['title']; ?>
</td>
								<td><?php echo $this->_tpl_vars['item']['description']; ?>
</td>
								<td><?php echo $this->_tpl_vars['item']['content']; ?>
</td>
								<td>
									<div class="imgbg">
										<img src="<?php echo $this->_tpl_vars['item']['img']; ?>
" style="width:auto;height:48px;background:url(/resources/images/transparent.gif) no-repeat center center">
									</div>
								</td>
								<td>
									<?php if ($this->_tpl_vars['item']['status'] && $this->_tpl_vars['item']['status'] == 1): ?><a href="javascript:void(0);" onclick="changeStatus(<?php echo $this->_tpl_vars['item']['id']; ?>
, 1, 'coupon', this)">上线</a><?php else: ?><a href="javascript:void(0);" onclick="changeStatus(<?php echo $this->_tpl_vars['item']['id']; ?>
, 0, 'coupon', this)">下线</a><?php endif; ?>
								</td>
								<td>
									<a href="/coupon?action=modifyAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
&pid=<?php echo $this->_tpl_vars['assign']['prom']['id']; ?>
&linkid=<?php $_from = $this->_tpl_vars['assign']['prom_link_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key2'] => $this->_tpl_vars['linkid']):
?><?php if ($this->_tpl_vars['item']['id'] == $this->_tpl_vars['linkid']['content_id']): ?><?php echo $this->_tpl_vars['linkid']['id']; ?>
<?php endif; ?><?php endforeach; endif; unset($_from); ?>" onclick="modifyCoupon(this);return false;" class="modifyCoupon" couponid="<?php echo $this->_tpl_vars['item']['id']; ?>
" pid="<?php echo $this->_tpl_vars['assign']['prom']['id']; ?>
" linkid="<?php $_from = $this->_tpl_vars['assign']['prom_link_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key2'] => $this->_tpl_vars['linkid']):
?><?php if ($this->_tpl_vars['item']['id'] == $this->_tpl_vars['linkid']['content_id']): ?><?php echo $this->_tpl_vars['linkid']['id']; ?>
<?php endif; ?><?php endforeach; endif; unset($_from); ?>"><img src="/resources/images/admin/edit.gif" alt="编辑" title="编辑"/></a> 
									<a href="/coupon?action=delAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
&pid=<?php echo $this->_tpl_vars['assign']['prom']['id']; ?>
&linkid=<?php $_from = $this->_tpl_vars['assign']['prom_link_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key2'] => $this->_tpl_vars['linkid']):
?><?php if ($this->_tpl_vars['item']['id'] == $this->_tpl_vars['linkid']['content_id']): ?><?php echo $this->_tpl_vars['linkid']['id']; ?>
<?php endif; ?><?php endforeach; endif; unset($_from); ?>" onclick="if(!confirm('确认删除促销券“<?php echo $this->_tpl_vars['item']['title']; ?>
?”'))return false;"><img src="/resources/images/admin/delete.gif" title="删除"/></a>
								</td>
							</tr>
							<?php endforeach; endif; unset($_from); ?>
						</tbody>
					</table>
					</div>
					<?php endif; ?>
				</div>
				
				<div class="cl"></div>
				<div class="btns clearfix">
					<input type="submit" value="提交" class="v13-button-submit">
					<input type="hidden" name="isPromoteSubmit" value="1">
				</div>
				</form>
			</div>
			
			
		</div>
	</div>
<!-- content end -->
<script language="javascript">
$(function(){
	var prom_link_shop = new Array();
	<?php if ($this->_tpl_vars['assign']['prom_link_shop'] != 'null'): ?>
	prom_link_shop = <?php echo $this->_tpl_vars['assign']['prom_link_shop']; ?>
;
	<?php endif; ?>
	var type = $("#shoptype").val();
	if(1 == type){
		$("#shoplist").show();
		var cityid = $("#city_id").val();
		selectShoplistByCity(cityid , prom_link_shop);
	}
	$("#shoptype").change(function(){
		var type = $("#shoptype").val();
		if(1 == type){
			var cityid = $("#city_id").val();
			if(cityid > 0){
				selectShoplistByCity(cityid , prom_link_shop);
				$("#shoplist").show();
			}else{
				alert('请先选中活动范围！');
				$(this).val(0);
			}
		}else{
			$("#shoplist").hide();
		}
	});
	$("#city_id").change(function(){
		var cityid = $("#city_id").val();
		selectShoplistByCity(cityid , prom_link_shop);
	});
	$("#prov_id").change(function(){
		$("#shoplist").hide();
		$("#shoptype").val(0);
	});
})
creatEditor('#promoteDescription, #promoteContent');
</script>