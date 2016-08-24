<?php /* Smarty version 2.6.26, created on 2013-01-05 10:59:38
         compiled from product/edit.html */ ?>
<!-- content start -->
	<div id="wrapper">
		<div id="content">
			<div class="clearfix">
				<h1><h1>编辑商品信息</h1></h1>
			</div>
			<br />
			<div class="cl"></div>
			
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
													<input type="text" value="<?php if ($this->_tpl_vars['assign']['page']['name']): ?><?php echo $this->_tpl_vars['assign']['page']['name']; ?>
<?php endif; ?>" class="textbox_text" maxlength="255" style="width:60%;" name="name"><span class="inline-error" id="required-ProductName">这是必填项目<span class="inline-error-arrow-border"></span><span class="inline-error-arrow"></span></span>
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<span class="fieldname_required">副标题</span>
												</td>
												<td>&nbsp;</td>
												<td>
													<input type="text" value="<?php echo $this->_tpl_vars['assign']['page']['title']; ?>
" class="textbox_text" maxlength="128" style="width:60%;" name="title">
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<span class="fieldname_required">补充说明</span>
												</td>
												<td>&nbsp;</td>
												<td class="padded">
													<textarea name="ext_desc" style="width:90%;"><?php echo $this->_tpl_vars['assign']['page']['ext_desc']; ?>
</textarea>
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<span class="fieldname_required">库存</span>
												</td>
												<td>&nbsp;</td>
												<td>
													<input type="text" value="<?php echo $this->_tpl_vars['assign']['page']['stock']; ?>
" class="textbox_text" maxlength="128" style="width:120px;" name="stock">
												</td>
											</tr>
											<!--<tr>
												<td valign="top" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">渠道</span>
												</td>
												<td>&nbsp;</td>
												<td>
													<input type="text" value="<?php if ($this->_tpl_vars['assign']['page']['chncode']): ?><?php echo $this->_tpl_vars['assign']['page']['chncode']; ?>
<?php endif; ?>" class="textbox_text" maxlength="255" name="chncode"><span class="inline-error" id="required-ProductName">这是必填项目<span class="inline-error-arrow-border"></span><span class="inline-error-arrow"></span></span>
												</td>
											</tr>-->
											<tr>
												<td valign="top" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">分类</span>
												</td>
												<td>&nbsp;</td>
												<td>
													<span id="category_pid"></span>
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">商品介绍</span>
												</td>
												<td>&nbsp;</td>
												<td class="padded">
													<textarea id="ProductDescription" name="description" style="width:90%;" rows="7" class="textarea_text"><?php if ($this->_tpl_vars['assign']['page']['description']): ?><?php echo $this->_tpl_vars['assign']['page']['description']; ?>
<?php endif; ?></textarea>
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">包装配件</span>
												</td>
												<td>&nbsp;</td>
												<td class="padded">
													<textarea id="pack_list" name="pack_list" style="width:90%;" rows="7" class="textarea_text"><?php if ($this->_tpl_vars['assign']['page']['pack_list']): ?><?php echo $this->_tpl_vars['assign']['page']['pack_list']; ?>
<?php endif; ?></textarea>
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">规格参数</span>
												</td>
												<td>&nbsp;</td>
												<td class="padded">
													<textarea id="product_spec" name="product_spec" style="width:90%;" rows="7" class="textarea_text"><?php echo $this->_tpl_vars['assign']['page']['product_spec']; ?>
</textarea>
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">售后三包</span>
												</td>
												<td>&nbsp;</td>
												<td class="padded">
													<textarea id="service" name="service" style="width:90%;" rows="7" class="textarea_text"><?php if ($this->_tpl_vars['assign']['page']['service']): ?><?php echo $this->_tpl_vars['assign']['page']['service']; ?>
<?php endif; ?></textarea>
												</td>
											</tr>
											<tr>
												<td valign="top" align="right" class="padded">
													<em class="fieldname_asterisk">*</em><span class="fieldname_required">状态</span>
												</td>
												<td>&nbsp;</td>
												<td>
													
													<?php if ($this->_tpl_vars['assign']['page']['status'] && $this->_tpl_vars['assign']['page']['status'] == 1): ?>
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
											<tr>
												<td valign="top" align="right" class="padded">
													<span class="fieldname_required">最后编辑人</span>
												</td>
												<td>&nbsp;</td>
												<td>
													（原编辑：<?php echo $this->_tpl_vars['assign']['page']['last_updater']; ?>
）（当前编辑：<?php echo $this->_tpl_vars['assign']['session']['admin_username']; ?>
）
													<input type="hidden" value="<?php echo $this->_tpl_vars['assign']['session']['admin_username']; ?>
" class="textbox_text" maxlength="255" name="last_updater">
												</td>
											</tr>
										</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
						
						<table id="tableviewer" width="48%" border="0" class="fl"><tbody><tr><td>
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
														<input type="text" value="<?php if ($this->_tpl_vars['assign']['page']['original_price_name']): ?><?php echo $this->_tpl_vars['assign']['page']['original_price_name']; ?>
<?php else: ?>市场价<?php endif; ?>" class="textbox_text" maxlength="255" name="original_price_name">
													</td>
													<td>&nbsp;</td>
													<td>
														<input type="text" value="<?php if ($this->_tpl_vars['assign']['page']['original_price']): ?><?php echo $this->_tpl_vars['assign']['page']['original_price']; ?>
<?php endif; ?>" class="textbox_text" maxlength="255" name="original_price">
													</td>
												</tr>
												<tr>
													<td valign="top" align="right" class="padded">
														<input type="text" value="<?php if ($this->_tpl_vars['assign']['page']['use_price_name']): ?><?php echo $this->_tpl_vars['assign']['page']['use_price_name']; ?>
<?php else: ?>现价<?php endif; ?>" class="textbox_text" maxlength="255" name="use_price_name">
													</td>
													<td>&nbsp;</td>
													<td>
														<input type="text" value="<?php if ($this->_tpl_vars['assign']['page']['use_price']): ?><?php echo $this->_tpl_vars['assign']['page']['use_price']; ?>
<?php endif; ?>" class="textbox_text" maxlength="255" name="use_price">
													</td>
												</tr>
												<tr>
													<td valign="top" align="right" class="padded">
														<input type="text" value="<?php if ($this->_tpl_vars['assign']['page']['discount_price_name']): ?><?php echo $this->_tpl_vars['assign']['page']['discount_price_name']; ?>
<?php else: ?>优惠金额<?php endif; ?>" class="textbox_text" maxlength="255" name="discount_price_name">
													</td>
													<td>&nbsp;</td>
													<td>
														<input type="text" value="<?php if ($this->_tpl_vars['assign']['page']['dicount_price']): ?><?php echo $this->_tpl_vars['assign']['page']['dicount_price']; ?>
<?php endif; ?>" class="textbox_text" maxlength="255" name="dicount_price">
													</td>
												</tr>
											</tbody>
									</table>
							</td></tr></tbody>
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
					<br />
					<?php if ($this->_tpl_vars['assign']['cross']): ?>
						<table id="tableviewer" width="100%" border="0" class="attrlist">
							<colgroup>
								<?php $_from = $this->_tpl_vars['assign']['attrvalue']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['attrvalue']):
?>
									<?php $_from = $this->_tpl_vars['attrvalue']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['attrvalue'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['attrvalue']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['attrvalue']['iteration']++;
?>
										<?php if ($this->_foreach['attrvalue']['iteration'] > 1): ?> 
											<?php break; ?> 
										<?php endif; ?>
										<col width="110" />
									<?php endforeach; endif; unset($_from); ?>
								<?php endforeach; endif; unset($_from); ?>
								<col width="200" />
								<col width="200" />
								<col width="400" />
								<col width="auto" />
							</colgroup>
							<tbody>
								<tr>
									<?php $_from = $this->_tpl_vars['assign']['attrvalue']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['attrvalue']):
?>
										<?php $_from = $this->_tpl_vars['attrvalue']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['attrvalue'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['attrvalue']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['attrvalue']['iteration']++;
?>
											<?php if ($this->_foreach['attrvalue']['iteration'] > 1): ?> 
												<?php break; ?> 
											<?php endif; ?>
											<th class="padded pdl5 tl"><?php echo $this->_tpl_vars['item']['attribute_name']; ?>
</th>
										<?php endforeach; endif; unset($_from); ?>
									<?php endforeach; endif; unset($_from); ?>
									<th class="tl">库存</th>
									<th class="tl">价格</th>
									<th class="tl">描述</th>
									<th class="tl">&nbsp;</th>
								</tr>
								<?php $_from = $this->_tpl_vars['assign']['cross']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key1'] => $this->_tpl_vars['_cross']):
?>
								<tr>
									
									<input type="hidden" name="attribute_value_ids[]" value="<?php echo $this->_tpl_vars['key1']; ?>
"/>
									<?php if (! $this->_tpl_vars['_cross']['item']['value_name']): ?>
										<?php $_from = $this->_tpl_vars['_cross']['item']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key2'] => $this->_tpl_vars['_items']):
?>	
											<td class="padded pdl5"><?php echo $this->_tpl_vars['_items']['value_name']; ?>
</td>
										<?php endforeach; endif; unset($_from); ?>
										<td><input type="text" name="attrx_product_stock[]" value="<?php echo $this->_tpl_vars['_cross']['product_stock']; ?>
" /></td>
										<td><input type="text" name="attrx_product_price[]" value="<?php echo $this->_tpl_vars['_cross']['price']; ?>
" /></td>
										<td><input type="text" name="attrx_product_desc[]" value="<?php echo $this->_tpl_vars['_cross']['title']; ?>
" /></td>
									<?php else: ?>
										<td class="padded pdl5"><?php echo $this->_tpl_vars['_cross']['item']['value_name']; ?>
</td>
										<td><input type="text" name="attrx_product_stock[]" value="<?php echo $this->_tpl_vars['_cross']['product_stock']; ?>
" /></td>
										<td><input type="text" name="attrx_product_price[]" value="<?php echo $this->_tpl_vars['_cross']['price']; ?>
" /></td>
										<td><input type="text" name="attrx_product_desc[]" value="<?php echo $this->_tpl_vars['_cross']['title']; ?>
" /></td>
									<?php endif; ?>
									<td>&nbsp;</td>
								</tr>
								<?php endforeach; endif; unset($_from); ?>
								</tbody>
						</table>
					<?php endif; ?>
				</div>
				
				<div class="cl"></div>
				<div class="btns clearfix">
					<input type="submit" value="提交" class="v13-button-submit">
					<input type="hidden" name="isProductSubmit" value="1">
				</div>
				
				<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['assign']['page']['id']; ?>
" id="product_id" />
				<input type="hidden" name="pidd" id="pidd" value="<?php echo $this->_tpl_vars['assign']['cate']['category_id']; ?>
" />
				</form>
			</div>
			
			
		</div>
	</div>
<!-- content end -->
<script language="javascript">
	window.onload = function(){
		getCurrentCatelist();
	}
	creatEditor('#ProductDescription, #pack_list, #product_spec, #service');
</script>