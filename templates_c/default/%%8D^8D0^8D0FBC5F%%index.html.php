<?php /* Smarty version 2.6.26, created on 2013-01-05 16:04:43
         compiled from attribute/index.html */ ?>
<!-- content start -->
	<div id="wrapper">
		<div id="content">
			<div class="datatable">
				<?php if ($this->_tpl_vars['assign']['page']['items']): ?>
				<div class="datatableHeader">
					<h1 class="fl intitle">属性列表</h1>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'search_product.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					<div class="ctrlbar fr">
						<a class="v13-button-secondary fl" href="/attribute?action=addAction">
							<span class="v13-icon-add"></span>添加属性
						</a>
					</div>
				</div>
				
				<div id="TablePanel" class="datatablecontent">
					<table id="tableviewer" width="100%" border="0">
						<colgroup>
							<col width="60" />
							<col width="80" />
							<col width="auto" />
						</colgroup>
						<tbody>
							<tr class="title">
								<th class="tc">
									<input type="checkbox" name="selector" id="selector" />
								</th>
								<th class="tc">ID</th>
								<th>名称</th>
							</tr>
							<?php $_from = $this->_tpl_vars['assign']['page']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
							<tr>
								<td class="tc"><input type="checkbox" name="pcroduct" value="<?php echo $this->_tpl_vars['item']['id']; ?>
"/></td>
								<td class="tc"><?php if ($this->_tpl_vars['item']['id']): ?><?php echo $this->_tpl_vars['item']['id']; ?>
<?php else: ?>未知<?php endif; ?></td>
								<td>
									<div class="attrlink">
										<a href="javascript:void(0);" onclick="getAttrValueList(this, <?php echo $this->_tpl_vars['item']['id']; ?>
, 'childAttrListUl');return false;">
											<?php echo $this->_tpl_vars['item']['name']; ?>
(<span class="attrValueCount"><?php if ($this->_tpl_vars['item']['values_count'] && $this->_tpl_vars['item']['values_count'] != ''): ?><?php echo $this->_tpl_vars['item']['values_count']; ?>
<?php else: ?>0<?php endif; ?></span>)
										</a>
										<span class="ctrlpanel">
											<a href="#null" onclick="showAddAttr(this);return false;"><img src="/resources/images/icon_add3.png" alt="添加值" title="添加值"/></a> 
											<a href="/attribute?action=modifyAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><img src="/resources/images/icon_edit3.png" alt="编辑" title="编辑"/></a> 
											<a href="/attribute?action=delAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" onclick="if(!confirm('确认删除属性“<?php echo $this->_tpl_vars['item']['name']; ?>
?”'))return false;"><img src="/resources/images/icon_trash3.png" title="删除"/></a>
										</span>
									</div>
									<div class="childAttrList no">
										<ul class="childAttrListUl">
										</ul>
									</div>
									<div class="addAttrDiv no">
											<input type="text" name="attribute_value" value="" id="attribute_value" />
											<input type="submit" value="添加" onclick="submitAttrValue(this);return false;" />
											<input type="submit" value="取消" onclick="hidethis(this);return false;" />
											<input type="hidden" name="attribute_id" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" id="attribute_id" />
											<span class="attrAddState no"></span>
									</div>
									<div class="showAttrDiv no">
										b
									</div>
									
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
	</div>
<!-- content end -->