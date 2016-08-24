<?php /* Smarty version 2.6.26, created on 2012-12-31 11:42:08
         compiled from category_product_page_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'category_product_page_list.tpl', 50, false),array('modifier', 'truncate_utf8_string', 'category_product_page_list.tpl', 52, false),)), $this); ?>
<!-- content start -->
<div id="wrapper">
	<div id="content">
		<?php if ($this->_tpl_vars['assign']['page']['items']): ?>
		<div class="clearfix">
			<h1 class="fl">分类列表
			<?php $_from = $this->_tpl_vars['assign']['pageTitle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
			&nbsp;&nbsp;>&nbsp;&nbsp;<a href="/category?parentid=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a>
			<?php endforeach; endif; unset($_from); ?>
			<?php if ($this->_tpl_vars['assign']['page']['name']): ?>
			&nbsp;&nbsp;>&nbsp;&nbsp;<?php echo $this->_tpl_vars['assign']['page']['name']; ?>

			<?php endif; ?>
			</h1>
		</div>
		<br />
		<div id="TablePanel" class="datatablecontent">
			<div class="datatableHeader">
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'search_product.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</div>
			<table id="tableviewer" width="100%" border="0">
				<colgroup>
					<col width="60" />
					<col width="80" />
					<col width="100" />
					<col width="auto" />
					<col width="auto" />
					<col width="100" />
					<col width="80" />
					<col width="300" />
					<col width="100" />
				</colgroup>
				<tbody>
					<tr class="title">
						<th class="tc">
							<input type="checkbox" name="selector" id="selector" />
						</th>
						<th class="tc">ID</th>
						<th>默认图片</th>
						<th class="tc">名称</th>
						<th>描述</th>
						<th class="tc">状态</th>
						<th class="tc">库存</th>
						<th>价格</th>
						<th>操作</th>
					</tr>
					<?php $_from = $this->_tpl_vars['assign']['page']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
					<tr>
						<td class="tc"><input type="checkbox" name="product" value="<?php echo $this->_tpl_vars['item']['id']; ?>
"/></td>
						<td class="tc"><?php if ($this->_tpl_vars['item']['id']): ?><?php echo $this->_tpl_vars['item']['id']; ?>
<?php else: ?>未知<?php endif; ?></td>
						<td><img src="<?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['default_image'])) ? $this->_run_mod_handler('default', true, $_tmp, "/resources/images/no-image.gif") : smarty_modifier_default($_tmp, "/resources/images/no-image.gif")); ?>
" style="width:auto;height:50px;"></td>
						<td><a href="/product?action=modifyAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a></td>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['description'])) ? $this->_run_mod_handler('truncate_utf8_string', true, $_tmp, 50) : smarty_modifier_truncate_utf8_string($_tmp, 50)); ?>
</td>
						<td class="tc"><?php if ($this->_tpl_vars['item']['status'] && $this->_tpl_vars['item']['status'] == 1): ?><a href="javascript:void(0);" onclick="changeStatus(<?php echo $this->_tpl_vars['item']['id']; ?>
, 1,'product', this)">上线</a><?php else: ?><a href="javascript:void(0);" onclick="changeStatus(<?php echo $this->_tpl_vars['item']['id']; ?>
, 0,'product', this)">下线</a><?php endif; ?></td>
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
						<td>
							<a href="/product?action=modifyAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><img src="/resources/images/admin/edit.gif" alt="编辑" title="编辑"/></a>
							<a href="/product?action=delAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" onclick="if(!confirm('确认删除商品“<?php echo $this->_tpl_vars['item']['name']; ?>
?”'))return false;"><img src="/resources/images/admin/delete.gif" title="删除"/></a>
							<a href="/product?action=setMemoryData&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" title="<?php echo $this->_tpl_vars['item']['name']; ?>
" class="update_cache"><img src="/resources/images/admin/quick.gif" title="更新缓存"/></a>
						</td>
					</tr>
					<?php endforeach; endif; unset($_from); ?>
				</tbody>
			</table>
		</div>
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
<!-- content end -->