<?php /* Smarty version 2.6.26, created on 2013-01-04 17:02:15
         compiled from promote/add.html */ ?>
<!-- content start -->
	<div id="wrapper">
		<div id="content">
			<div class="clearfix">
				<h1><h1>添加促销活动</h1></h1>
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
					<table id="tableviewer" width="100%" border="0">
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
													<input type="text" value="" class="textbox_text" maxlength="255" style="width:420px;" name="title"><span class="inline-error" id="required-ProductName">这是必填项目<span class="inline-error-arrow-border"></span><span class="inline-error-arrow"></span></span>
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">短描述</span>
												</td>
												<td>&nbsp;</td>
												<td class="padded">
													<textarea id="promoteDescription" name="description" style="width:90%;" rows="7" class="textarea_text"></textarea>
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">内容</span>
												</td>
												<td>&nbsp;</td>
												<td class="padded">
													<textarea id="promoteContent" name="content" style="width:90%;height:200px;" rows="7" class="textarea_text"></textarea>
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
												<td valign="top" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">状态</span>
												</td>
												<td>&nbsp;</td>
												<td>
													<input type="radio" name="status" value="1" id="onlineSel" checked="checked"></radio>
													<label for="onlineSel">上线</label>
													&nbsp;&nbsp;
													<input type="radio" name="status" value="0" id="offlineSel"></radio>
													<label for="offlineSel">下线</label>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				
				<div class="cl"></div>
				<div class="btns clearfix">
					<input type="submit" value="下一步" class="v13-button-submit">
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