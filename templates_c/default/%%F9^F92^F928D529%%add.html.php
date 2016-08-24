<?php /* Smarty version 2.6.26, created on 2013-01-04 16:48:39
         compiled from shop/add.html */ ?>
<!-- content start -->
	<div id="wrapper">
		<div id="content">
			<div class="clearfix">
				<h1><h1>添加店面</h1></h1>
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
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">店面名称</span>
												</td>
												<td>&nbsp;</td>
												<td>
													<input type="text" value="" class="textbox_text" maxlength="20" style="width:420px;" name="name"><span class="inline-error" id="required-ProductName">这是必填项目<span class="inline-error-arrow-border"></span><span class="inline-error-arrow"></span></span>
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">地址</span>
												</td>
												<td>&nbsp;</td>
												<td>
													<select name="prov_id" onchange="selectCitylist(this);return false;">
														<option value="">--请选择省份--</option>
														<?php $_from = $this->_tpl_vars['assign']['area']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
														<?php if ($this->_tpl_vars['item']['pid'] == -1): ?>
														<option value="<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
														<?php endif; ?>
														<?php endforeach; endif; unset($_from); ?>
													</select>
													<select name="city_id" id="city_id"></select>
													<input type="text" value="" class="textbox_text" style="width:420px;" name="address"><span class="inline-error" id="required-ProductName">这是必填项目<span class="inline-error-arrow-border"></span><span class="inline-error-arrow"></span></span>
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<span class="fieldname_required">联系人</span>
												</td>
												<td>&nbsp;</td>
												<td>
													<input type="text" value="" class="textbox_text" maxlength="255" name="contact">
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<span class="fieldname_required">座机</span>
												</td>
												<td>&nbsp;</td>
												<td>
													<input type="text" value="" class="textbox_text" maxlength="255" name="phone_no">
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<span class="fieldname_required">手机</span>
												</td>
												<td>&nbsp;</td>
												<td>
													<input type="text" value="" class="textbox_text" maxlength="255" name="cell_phone">
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<span class="fieldname_required">经纬度</span>
												</td>
												<td>&nbsp;</td>
												<td>
													<input type="text" value="纬度" class="textbox_text" maxlength="255" name="lat" style="width:90px;" onclick="this.select();"> + <input type="text" value="经度" class="textbox_text" maxlength="255" name="lon" style="width:90px;" onclick="this.select();">
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
											<!--<tr>
												<td valign="top" align="right" class="padded">
													<span class="fieldname_required">渠道码</span>
												</td>
												<td>&nbsp;</td>
												<td>
													<input type="text" value="" class="textbox_text" maxlength="255" name="chncode">
												</td>
											</tr>-->
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				
				<div class="cl"></div>
				<div class="btns clearfix">
					<input type="submit" value="提交" class="v13-button-submit">
					<input type="hidden" name="isShopSubmit" value="1">
				</div>
				</form>
			</div>
			
			
		</div>
	</div>
<!-- content end -->