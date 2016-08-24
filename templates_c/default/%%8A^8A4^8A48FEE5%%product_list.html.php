<?php /* Smarty version 2.6.26, created on 2013-01-22 15:08:02
         compiled from product/product_list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'product/product_list.html', 52, false),)), $this); ?>
<!-- content start -->
	<div id="wrapper">
		<div id="content">
			<div class="clearfix">
				<h1 class="fl">商品列表</h1>
			</div>
			<br />
			
			<div class="datatable">
				<?php if ($this->_tpl_vars['assign']['page']['items']): ?>
				<div class="datatableHeader">
					<div class="fl headertext filter">
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'search_product_block.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					</div>
					<div class="headertext paging">
						<div class="fl">
							<label>过滤：</label>
							<select onchange="">
								<option value="">请选择</option>
								<option value="1">上线</option>
								<option value="0">下线</option>
							</select>
						</div>
					</div>
				</div>
				
				<div id="TablePanel" class="datatablecontent">
					<table id="tableviewer" width="100%" border="0">
						<colgroup>
							<col width="70" />
							<col width="60" />
							<col width="100" />
							<col width="auto" />
							<col width="80" />
							<col width="120" />
						</colgroup>
						<tbody>
							<tr class="title">
								<th class="tc">
									选择
								</th>
								<th class="tc">ID</th>
								<th>默认图片</th>
								<th class="tc">名称</th>
								<th class="tc">库存</th>
								<th>价格</th>
							</tr>
							<?php $_from = $this->_tpl_vars['assign']['page']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
							<tr>
								<td class="tc"><input type="radio" name="product" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" /></td>
								<td class="tc"><?php if ($this->_tpl_vars['item']['id']): ?><?php echo $this->_tpl_vars['item']['id']; ?>
<?php else: ?>未知<?php endif; ?></td>
								<td><img src="<?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['default_image'])) ? $this->_run_mod_handler('default', true, $_tmp, "/resources/images/no-image.gif") : smarty_modifier_default($_tmp, "/resources/images/no-image.gif")); ?>
" style="width:auto;height:50px;"></td>
								<td class="product_name"><?php echo $this->_tpl_vars['item']['name']; ?>
</td>
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
				<div id="page">
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'page.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				</div>
				<div class="btns clearfix">
					<input type="button" name="select_product" id="select_product" value="提交" onclick="node.selectProduct(this);" class="fl" style="margin-right:5px;" />
					<input type="button" value="取消" onclick="parent.$.colorbox.close();" class="fl" />
					<div class="wariningState no fl"></div>
				</div>
				<?php else: ?>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'search_product_block.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					<div class="cl"></div>
				<?php endif; ?>
			</div>
			
			
		</div>
	</div>
<!-- content end -->