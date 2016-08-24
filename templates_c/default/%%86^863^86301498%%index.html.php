<?php /* Smarty version 2.6.26, created on 2013-01-17 15:22:12
         compiled from promote/index.html */ ?>
<!-- content start -->
	<div id="wrapper">
		<div id="content">
			<div class="datatable">
				<?php if ($this->_tpl_vars['assign']['page']['items']): ?>
				<div class="datatableHeader">
					<h1 class="fl intitle">
					促销活动列表
					</h1>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'search_product.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					<div class="ctrlbar fr">
						<a class="v13-button-secondary fr addpromBtn" href="/promote?action=addAction">
							<span class="v13-icon-add"></span>添加促销活动
						</a>
					</div>
				</div>
				
				<form action="/promote?action=multiPromAction" method="post" onsubmit="" id="ChangeMultiForm">
				<div id="TablePanel" class="datatablecontent">
					<table id="tableviewer" width="100%" border="0">
						<colgroup>
							<col width="60" />
							<col width="80" />
							<col width="auto" />
							<col width="100" />
							<col width="auto" />
							<col width="100" />
							<col width="100" />
						</colgroup>
						<tbody>
							<tr class="title">
								<th class="tc">
									<input type="checkbox" name="selector" id="selector" />
								</th>
								<th class="tc">ID</th>
								<th>名称</th>
								<th class="tc">状态</th>
								<th>描述</th>
								<th>省份</th>
								<th>城市</th>
							</tr>
							<?php if ($this->_tpl_vars['assign']['page']['items']): ?>
								<?php $_from = $this->_tpl_vars['assign']['page']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
								<tr>
									<td class="tc"><input type="checkbox" name="promids[]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
"/></td>
									<td class="tc"><?php if ($this->_tpl_vars['item']['id']): ?><?php echo $this->_tpl_vars['item']['id']; ?>
<?php else: ?>未知<?php endif; ?></td>
									<td>
										<a href="/promote?action=modifyAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['title']; ?>
</a>
										<span class="ctrlpanel">
											<a href="/promote?action=modifyAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><img src="/resources/images/icon_edit3.png" alt="编辑" title="编辑"/></a>
											<a href="/promote?action=delAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
&status=<?php echo $this->_tpl_vars['item']['status']; ?>
" onclick="if(!confirm('确认删除活动“<?php echo $this->_tpl_vars['item']['title']; ?>
?”'))return false;"><img src="/resources/images/icon_trash3.png" title="删除"/></a>
											<a href="/promote?action=setMemoryData&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" title="<?php echo $this->_tpl_vars['item']['title']; ?>
" class="update_cache no"><img src="/resources/images/icon_cloud3.png" title="更新缓存"/></a>
										</span>
									</td>
									<td class="tc">
										<?php if ($this->_tpl_vars['item']['status'] && $this->_tpl_vars['item']['status'] == 1): ?><a href="javascript:void(0);" onclick="changeStatus(<?php echo $this->_tpl_vars['item']['id']; ?>
, 1,'promote', this)">上线</a><?php else: ?><a href="javascript:void(0);" onclick="changeStatus(<?php echo $this->_tpl_vars['item']['id']; ?>
, 0,'promote', this)">下线</a><?php endif; ?>
									</td>
									<td><?php echo $this->_tpl_vars['item']['description']; ?>
</td>
									<td><?php echo $this->_tpl_vars['assign']['area'][$this->_tpl_vars['item']['prov_id']]['name']; ?>
</td>
									<td><?php echo $this->_tpl_vars['assign']['area'][$this->_tpl_vars['item']['city_id']]['name']; ?>
</td>
								</tr>
								<?php endforeach; endif; unset($_from); ?>
							<?php else: ?>
								<tr>
									<td colspan="9" class="tc">未找到内容</td>
								</tr>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
				<div class="btns">
					<input type="button" value="批量下线" name="updownProm" updownparas="1" onclick="changeMulti(this, 'updownPromFlag');return false;" class="updownOperate" />
					<input type="button" value="批量上线" name="updownProm" updownparas="0" onclick="changeMulti(this, 'updownPromFlag');return false;" class="updownOperate" />
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