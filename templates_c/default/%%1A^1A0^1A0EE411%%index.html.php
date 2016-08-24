<?php /* Smarty version 2.6.26, created on 2013-01-17 15:29:09
         compiled from product/index.html */ ?>
<!-- content start -->
	<div id="wrapper">
		<div id="content">
			<div class="datatable">
				<?php if ($this->_tpl_vars['assign']['page']['items']): ?>
				<div class="datatableHeader">
					<h1 class="fl intitle">商品列表</h1>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'search_product.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					<div class="ctrlbar fr">
						<a class="v13-button-secondary fl" href="/product?action=addAction">
							<span class="v13-icon-add"></span>添加商品
						</a>
						<a class="v13-button-secondary fl updateCacheAll" rel="product" href="/product?action=updateCacheAll">
							<span class="v13-icon-cache"></span>更新缓存
						</a>
					</div>
				</div>
				
				<form action="/product?action=multiProductAction" method="post" onsubmit="" id="ChangeMultiForm">
				<div id="TablePanel" class="datatablecontent">
					<table id="tableviewer" width="100%" border="0">
						<colgroup>
							<col width="40" />
							<col width="60" />
							<col width="86" />
							<col width="auto" />
							<col width="auto" />
							<col width="80" />
							<col width="80" />
							<col width="150" />
						</colgroup>
						<tbody>
							<tr class="title">
								<th class="tc">
									<input type="checkbox" name="selector" id="selector" />
								</th>
								<th class="tc">ID</th>
								<th>图片</th>
								<th class="tc">名称</th>
								<th>所属分类</th>
								<th class="tc">状态</th>
								<th class="tc">库存</th>
								<th>价格</th>
							</tr>
							<?php $_from = $this->_tpl_vars['assign']['page']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
							<tr>
								<td class="tc"><input type="checkbox" name="productids[]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
"/></td>
								<td class="tc"><?php if ($this->_tpl_vars['item']['id']): ?><?php echo $this->_tpl_vars['item']['id']; ?>
<?php else: ?>未知<?php endif; ?></td>
								<td class="tc">
									<div class="imgbg">
										<img src="<?php echo $this->_tpl_vars['item']['default_image']; ?>
" style="width:auto;height:48px;background:url(/resources/images/transparent.gif) no-repeat center center">
									</div>
								</td>
								<td>
									<a href="/product?action=modifyAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a>
									<span class="ctrlpanel">
										<a href="/product?action=modifyAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><img src="/resources/images/icon_edit3.png" alt="编辑" title="编辑"/></a>
										<a href="/product?action=delAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" onclick="if(!confirm('确认删除商品“<?php echo $this->_tpl_vars['item']['name']; ?>
?”'))return false;"><img src="/resources/images/icon_trash3.png" title="删除"/></a>
										<a href="/product?action=setMemoryData&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" title="<?php echo $this->_tpl_vars['item']['name']; ?>
" class="update_cache no"><img src="/resources/images/admin/quick.gif" title="更新缓存"/></a>
									</span>
								</td>
								<td>
								<?php $_from = $this->_tpl_vars['item']['product_class']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cls_key'] => $this->_tpl_vars['cls_item']):
?>
								&nbsp;&nbsp;<?php if (0 < $this->_tpl_vars['cls_key']): ?>>&nbsp;&nbsp;<?php endif; ?><a href="/category?parentid=<?php echo $this->_tpl_vars['cls_item']['id']; ?>
"><?php echo $this->_tpl_vars['cls_item']['name']; ?>
</a>
								<?php endforeach; endif; unset($_from); ?>
								</td>
								<td class="tc"><?php if ($this->_tpl_vars['item']['status'] && $this->_tpl_vars['item']['status'] == 1): ?><a href="javascript:void(0);" onclick="changeStatus(<?php echo $this->_tpl_vars['item']['id']; ?>
, 1,'product', this)">上线</a><?php else: ?><a href="javascript:void(0);" onclick="changeStatus(<?php echo $this->_tpl_vars['item']['id']; ?>
, 0, 'product', this)">下线</a><?php endif; ?></td>
								<td class="tc"><?php echo $this->_tpl_vars['item']['stock']; ?>
</td>
								<td>
									<?php if ($this->_tpl_vars['item']['original_price_name']): ?>
										<?php echo $this->_tpl_vars['item']['original_price_name']; ?>
：<?php echo $this->_tpl_vars['item']['original_price']; ?>
<br>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['item']['use_price_name']): ?>
										<?php echo $this->_tpl_vars['item']['use_price_name']; ?>
：<?php echo $this->_tpl_vars['item']['use_price']; ?>
<br>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['item']['dicount_price_name']): ?>
										<?php echo $this->_tpl_vars['item']['dicount_price_name']; ?>
：<?php echo $this->_tpl_vars['item']['dicount_price']; ?>

									<?php endif; ?>	
								</td>
							</tr>
							<?php endforeach; endif; unset($_from); ?>
						</tbody>
					</table>
				</div>
				<div class="btns">
					<input type="button" value="批量下线" name="updownProduct" updownparas="1" onclick="changeMulti(this, 'updownProductFlag');return false;" class="updownOperate" />
					<input type="button" value="批量上线" name="updownProduct" updownparas="0" onclick="changeMulti(this, 'updownProductFlag');return false;" class="updownOperate"  />
					<input type="hidden" value="" name="actionOrder" id="actionCur" />
					<input type="hidden" value="" name="statusOrder" id="statusCur" />
				</div>
				</form>
				<div id="page">
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'page.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				</div>
				<?php else: ?>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'empty_warning.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<?php endif; ?>
			</div>
			
			
		</div>
	</div>
<!-- content end -->