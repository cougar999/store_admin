<?php /* Smarty version 2.6.26, created on 2013-01-17 15:48:56
         compiled from shop/index.html */ ?>
<!-- content start -->
	<div id="wrapper">
		<div id="content">
			<div class="datatable">
				<?php if ($this->_tpl_vars['assign']['page']['items']): ?>
				<div class="datatableHeader">
					<h1 class="fl intitle">店面管理</h1>
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'search_product.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
						<div class="ctrlbar fr">
						<a class="v13-button-secondary fl" href="/shop?action=addAction">
							<span class="v13-icon-add"></span>添加店面
						</a>
						<a class="v13-button-secondary fl updateCacheAll" rel="shop" href="/shop?action=updateCacheAll">
							<span class="v13-icon-cache"></span>更新缓存
						</a>
					</div>
				</div>
				
				<form action="/shop?action=multiShopAction" method="post" onsubmit="" id="ChangeMultiForm">
				<div id="TablePanel" class="datatablecontent">
					<table id="tableviewer" width="100%" border="0">
						<colgroup>
							<col width="40" />
							<col width="60" />
							<col width="200" />
							<col width="200" />
							<col width="80" />
							<col width="110" />
							<col width="auto" />
							<col width="170" />
							<col width="170" />
						</colgroup>
						<tbody>
							<tr class="title">
								<th class="tc">
									<input type="checkbox" name="selector" id="selector" />
								</th>
								<th class="tc">ID</th>
								<th class="tc">店面名称</th>
								<th class="tc">联系人</th>
								<th class="tc">状态</th>
								<th class="tc">区域</th>
								<th class="tc">地址</th>
								<th class="tc">更新时间</th>
								<th class="tc">创建时间</th>
							</tr>
							<?php $_from = $this->_tpl_vars['assign']['page']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
							<tr>
								<td class="tc"><input type="checkbox" name="shopids[]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
"/></td>
								<td class="tc"><?php echo $this->_tpl_vars['item']['id']; ?>
</td>
								<td>
									<a href="/shop?action=modifyAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a>
									<span class="ctrlpanel">
										<a href="/shop?action=modifyAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><img src="/resources/images/icon_edit3.png" alt="编辑" title="编辑"/></a> 
										<a href="/shop?action=delAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" onclick="if(!confirm('确认删除分类 “<?php echo $this->_tpl_vars['item']['name']; ?>
？”'))return false;"><img src="/resources/images/icon_trash3.png" title="删除"/></a>
										<a href="/shop?action=setMemoryData&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" title="<?php echo $this->_tpl_vars['item']['name']; ?>
" class="update_cache no"><img src="/resources/images/admin/quick.gif" title="更新缓存"/></a>
									</span>
								</td>
								<td>
									<?php echo $this->_tpl_vars['item']['contact']; ?>
<br>
									<?php if (! empty ( $this->_tpl_vars['item']['phone_no'] )): ?>电话：<?php echo $this->_tpl_vars['item']['phone_no']; ?>
<?php endif; ?><br>
									<?php if (! empty ( $this->_tpl_vars['item']['cell_phone'] )): ?>手机号：<?php echo $this->_tpl_vars['item']['cell_phone']; ?>
<?php endif; ?>
								</td>
								<td class="tc"><?php if ($this->_tpl_vars['item']['status'] && $this->_tpl_vars['item']['status'] == 1): ?><a href="javascript:void(0);" onclick="changeStatus(<?php echo $this->_tpl_vars['item']['id']; ?>
, 1, 'shop', this)">上线</a><?php else: ?><a href="javascript:void(0);" onclick="changeStatus(<?php echo $this->_tpl_vars['item']['id']; ?>
, 0, 'shop', this)">下线</a><?php endif; ?></td>
								<td><?php echo $this->_tpl_vars['assign']['area'][$this->_tpl_vars['item']['province_id']]['name']; ?>
&nbsp;&nbsp;<?php echo $this->_tpl_vars['assign']['area'][$this->_tpl_vars['item']['city_id']]['name']; ?>
</td>
								<td><?php echo $this->_tpl_vars['item']['address']; ?>
</td>
								<td><?php echo $this->_tpl_vars['item']['update_time']; ?>
</td>
								<td><?php echo $this->_tpl_vars['item']['create_time']; ?>
</td>
							</tr>
							<?php endforeach; endif; unset($_from); ?>
						</tbody>
					</table>
				</div>
				<div class="btns">
					<input type="button" value="批量下线" name="updownShop" updownparas="1" onclick="changeMulti(this, 'updownShopFlag');return false;" class="updownOperate" />
					<input type="button" value="批量上线" name="updownShop" updownparas="0" onclick="changeMulti(this, 'updownShopFlag');return false;" class="updownOperate" />
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