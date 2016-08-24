<?php /* Smarty version 2.6.26, created on 2013-01-04 17:00:21
         compiled from coupon/edit.html */ ?>
<!-- content start -->
	<div id="wrapper">
		<div id="content">
			<div class="clearfix">
				<h1><h1>添加优惠券</h1></h1>
			</div>
			<br />
			<div class="cl"></div>
			
			<!-- 基本信息 -->
			<div id="productList">
				<form enctype="multipart/form-data" method="post" action="">
				<!-- <div class="pdheader">
					<span class="pdheadertext slideTrigger">基本信息</span>	
				</div> -->
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
													<input type="text" value="<?php echo $this->_tpl_vars['assign']['coupon']['title']; ?>
" class="textbox_text" maxlength="255" style="width:420px;" name="title"><span class="inline-error" id="required-ProductName">这是必填项目<span class="inline-error-arrow-border"></span><span class="inline-error-arrow"></span></span>
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">短描述</span>
												</td>
												<td>&nbsp;</td>
												<td class="padded">
													<textarea id="couponDescription" name="description" style="width:90%;" rows="7" class="textarea_text"><?php echo $this->_tpl_vars['assign']['coupon']['description']; ?>
</textarea>
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">内容</span>
												</td>
												<td>&nbsp;</td>
												<td class="padded">
													<textarea id="couponContent" name="content" style="width:90%;height:200px;" rows="7" class="textarea_text"><?php echo $this->_tpl_vars['assign']['coupon']['content']; ?>
</textarea>
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">图片</span>
												</td>
												<td>&nbsp;</td>
												<td><?php if ($this->_tpl_vars['assign']['coupon']['img']): ?><img src="<?php echo $this->_tpl_vars['assign']['coupon']['img']; ?>
" /><?php endif; ?><input type="file" name="img"></td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													起止时间
												</td>
												<td>&nbsp;</td>
												<td>
													<input type="text" value="<?php echo $this->_tpl_vars['assign']['coupon']['start_time']; ?>
" class="textbox_text dateInput" maxlength="255" style="width:120px;" name="start_time" id="start_time"> 开始
													<input type="text" value="<?php echo $this->_tpl_vars['assign']['coupon']['end_time']; ?>
" class="textbox_text dateInput" maxlength="255" style="width:120px;" name="end_time" id="end_time"> 截止
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">优惠券总数</span>
												</td>
												<td>&nbsp;</td>
												<td class="padded">
													<input type="text" value="<?php echo $this->_tpl_vars['assign']['coupon']['total']; ?>
" class="textbox_text" maxlength="255" style="width:120px;" name="total">
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">优惠券余量</span>
												</td>
												<td>&nbsp;</td>
												<td class="padded">
													<input type="text" value="<?php echo $this->_tpl_vars['assign']['coupon']['count']; ?>
" class="textbox_text" maxlength="255" style="width:120px;" name="count">
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">状态</span>
												</td>
												<td>&nbsp;</td>
												<td>
													<?php if ($this->_tpl_vars['assign']['coupon']['status'] == 1): ?>
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
											<!--<tr>
												<td valign="top" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">图片</span>
												</td>
												<td>&nbsp;</td>
												<td class="padded">
													<div class="imgupload">
														<a href="##null" class="v13-button-secondary fl" id="uploadbtn">上传图片</a>
														<div class="cl"></div>
														<ul id="imgbox">
															<?php if ($this->_tpl_vars['assign']['images']): ?>
															<?php $_from = $this->_tpl_vars['assign']['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['images']):
?>
															<li>
																<div style="margin-bottom:5px;">
																	<input type="radio" name="default_image" value="<?php echo $this->_tpl_vars['images']['url']; ?>
" <?php if ($this->_tpl_vars['images']['url'] == $this->_tpl_vars['assign']['page']['default_image']): ?>checked="checked"<?php endif; ?>>
																</div>
																<img src="<?php echo $this->_tpl_vars['images']['url']; ?>
" width="120" alt="<?php echo $this->_tpl_vars['images']['name']; ?>
" title="<?php echo $this->_tpl_vars['images']['name']; ?>
" />
																	
															</li>
															<?php endforeach; endif; unset($_from); ?>
															<?php endif; ?>
														</ul>
													</div>
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
					<input type="hidden" name="isCouponSubmit" value="1">
				</div>
				</form>
			</div>
			
			
		</div>
	</div>
<!-- content end -->
<script type="text/javascript">
$(document).ready(function(){
  	$("#start_time").datepicker();
  	$("#end_time").datepicker();
});
creatEditor('#couponDescription, #couponContent');
</script>