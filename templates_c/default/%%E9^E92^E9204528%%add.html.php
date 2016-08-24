<?php /* Smarty version 2.6.26, created on 2013-01-16 14:43:45
         compiled from product/add.html */ ?>
<!-- content start -->
	<div id="wrapper">
		<div id="content">
			<div class="clearfix">
				<h1><h1>添加新商品</h1></h1>
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
					<table id="tableviewer" width="48%" border="0" class="fl">
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
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">名称</span>
												</td>
												<td>&nbsp;</td>
												<td>
													<input type="text" value="" class="textbox_text" maxlength="128" style="width:60%;" name="name"><span class="inline-error" id="required-ProductName">这是必填项目<span class="inline-error-arrow-border"></span><span class="inline-error-arrow"></span></span>
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<span class="fieldname_required">副标题</span>
												</td>
												<td>&nbsp;</td>
												<td class="padded">
													<input type="text" value="" class="textbox_text" maxlength="128" style="width:60%;" name="title">
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<span class="fieldname_required">补充说明</span>
												</td>
												<td>&nbsp;</td>
												<td class="padded">
													<textarea name="ext_desc" style="width:80%;"></textarea>
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">库存</span>
												</td>
												<td>&nbsp;</td>
												<td>
													<input type="text" value="" class="textbox_text" maxlength="255" name="stock"><span class="inline-error" id="required-ProductName">这是必填项目<span class="inline-error-arrow-border"></span><span class="inline-error-arrow"></span></span>
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">分类</span>
												</td>
												<td>&nbsp;</td>
												<td>
													<span id="category_pid"></span><span class="inline-error" id="required-ProductName">这是必填项目<span class="inline-error-arrow-border"></span><span class="inline-error-arrow"></span></span>
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">商品介绍</span>
												</td>
												<td>&nbsp;</td>
												<td class="padded">
													<textarea id="ProductDescription" name="description" style="width:90%;" rows="7" class="textarea_text"></textarea>
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">包装配件</span>
												</td>
												<td>&nbsp;</td>
												<td class="padded">
													<textarea id="pack_list" name="pack_list" style="width:90%;" rows="7" class="textarea_text"></textarea>
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">规格参数</span>
												</td>
												<td>&nbsp;</td>
												<td class="padded">
													<textarea id="product_spec" name="product_spec" style="width:90%;" rows="7" class="textarea_text"></textarea>
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">售后三包</span>
												</td>
												<td>&nbsp;</td>
												<td class="padded">
													<textarea id="service" name="service" style="width:90%;" rows="7" class="textarea_text"></textarea>
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
													<span class="fieldname_required">最后编辑人</span>
												</td>
												<td>&nbsp;</td>
												<td>
													<input type="text" value="" class="textbox_text" maxlength="255" name="last_updater">
												</td>
											</tr>-->
										</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
						
						<table id="tableviewer" width="48%" border="0" class="fl">
							<tbody>
								<tr>
									<td>
										<table width="100%" border="0">
											<colgroup>
												<col width="200" />
												<col width="10" />
												<col width="auto" />
											</colgroup>
											<tbody>
												<tr>
													<td valign="top" align="left" class="padded">
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;价格属性
													</td>
													<td>&nbsp;</td>
													<td>
													</td>
												</tr>
												<tr>
													<td valign="top" align="right" class="padded">
														<input type="text" value="市场价" class="textbox_text" maxlength="255" name="original_price_name">
													</td>
													<td>&nbsp;</td>
													<td>
														<input type="text" value="" class="textbox_text" maxlength="255" name="original_price">
													</td>
												</tr>
												<tr>
													<td valign="top" align="right" class="padded">
														<input type="text" value="现价" class="textbox_text" maxlength="255" name="use_price_name">
													</td>
													<td>&nbsp;</td>
													<td>
														<input type="text" value="" class="textbox_text" maxlength="255" name="use_price">
													</td>
												</tr>
												<tr>
													<td valign="top" align="right" class="padded">
														<input type="text" value="优惠金额" class="textbox_text" maxlength="255" name="discount_price_name">
													</td>
													<td>&nbsp;</td>
													<td>
														<input type="text" value="" class="textbox_text" maxlength="255" name="dicount_price">
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
					<div class="pdheader" id="uploadimg">
						<span class="pdheadertext slideTrigger">图片信息</span>	
					</div>
					<div class="pdcontent">
						<div class="imgupload">
							<a href="##" class="v13-button-secondary fl" id="uploadbtn">上传图片</a> <span style="padding-top:20px;">上传图片后请选择一张默认图片</span>
							<div class="cl"></div>
							<ul id="imgbox">
								<?php if ($this->_tpl_vars['assign']['images']): ?>
								<?php $_from = $this->_tpl_vars['assign']['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['images']):
?>
								<li>
									<div style="margin-bottom:5px;">
										<input type="radio" name="default_image" value="<?php echo $this->_tpl_vars['images']['url']; ?>
" id="img<?php echo $this->_tpl_vars['key']; ?>
" <?php if ($this->_tpl_vars['images']['url'] == $this->_tpl_vars['assign']['page']['default_image']): ?>checked="checked"<?php endif; ?>>
									</div>
									<label for="img<?php echo $this->_tpl_vars['key']; ?>
">
										<img src="<?php echo $this->_tpl_vars['images']['url']; ?>
" width="120" alt="<?php echo $this->_tpl_vars['images']['name']; ?>
" title="<?php echo $this->_tpl_vars['images']['name']; ?>
" />
									</label>
									<a class="deleteimg" href="/product?action=delimgAction&imgid=<?php echo $this->_tpl_vars['images']['id']; ?>
&product_id=<?php echo $this->_tpl_vars['assign']['page']['id']; ?>
#uploadbtn" onclick="if(!confirm('确认删除这张图片？'))return false;">X</a>
								</li>
								<?php endforeach; endif; unset($_from); ?>
								<?php endif; ?>
							</ul>
						</div>
						<div class="cl"></div>
					</div>
					
					<div class="pdheader">
						<span class="pdheadertext slideTrigger">属性信息</span>	
					</div>
					<div class="pdcontent">
						<a href="##" class="v13-button-secondary fl" id="getComblistbtn">选择属性</a>
						<div class="cl"></div>
					</div>
				
				<div class="cl"></div>
				<div class="btns clearfix">
					<input type="submit" value="下一步" class="v13-button-submit">
					<input type="hidden" name="isProductSubmit" value="1">
				</div>
				</form>
			</div>
			
			
		</div>
	</div>
<!-- content end -->
<script language="javascript">
	window.onload = function(){
		getCatelist("category_id");
	}
	creatEditor('#ProductDescription, #pack_list, #product_spec, #service');
</script>