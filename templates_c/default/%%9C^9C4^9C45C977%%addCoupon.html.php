<?php /* Smarty version 2.6.26, created on 2012-12-14 18:03:44
         compiled from promote/addCoupon.html */ ?>
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
													<textarea id="ProductDescription" name="description" style="width:80%;" rows="7" class="textarea_text"></textarea>
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">内容</span>
												</td>
												<td>&nbsp;</td>
												<td class="padded">
													<textarea id="ProductDescription" name="content" style="width:80%;height:200px;" rows="7" class="textarea_text"></textarea>
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													起止时间
												</td>
												<td>&nbsp;</td>
												<td>
													开始 <input type="text" value="" class="textbox_text" maxlength="255" style="width:120px;" name="start_time">
													截止 <input type="text" value="" class="textbox_text" maxlength="255" style="width:120px;" name="end_time">
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">优惠券总数</span>
												</td>
												<td>&nbsp;</td>
												<td class="padded">
													<input type="text" value="" class="textbox_text" maxlength="255" style="width:120px;" name="total">
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">优惠券余量</span>
												</td>
												<td>&nbsp;</td>
												<td class="padded">
													<input type="text" value="" class="textbox_text" maxlength="255" style="width:120px;" name="count">
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
											<tr>
												<td valign="top" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">渠道码</span>
												</td>
												<td>&nbsp;</td>
												<td class="padded">
													<input type="text" value="" class="textbox_text" maxlength="255" style="width:120px;" name="chncode">
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
					<input type="submit" value="提交" class="v13-button-submit">
					<input type="hidden" name="isPromoteSubmit" value="1">
				</div>
				</form>
			</div>
			
			
		</div>
	</div>
<!-- content end -->