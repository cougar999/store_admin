<?php /* Smarty version 2.6.26, created on 2012-12-28 10:01:58
         compiled from role/index.html */ ?>
<!-- content start -->
	<div id="wrapper">
		<div id="content">
			<div class="clearfix">
				<h1 class="fl">
				管理 
				&nbsp;&nbsp;>&nbsp;&nbsp;角色
				</h1>
				<div class="ctrlbar fr">
					<a class="v13-button-secondary fr" href="/role?action=addAction">
						<span class="v13-icon-add"></span>添加角色
					</a>
				</div>
			</div>
			<br />
			<div class="datatable">
				<div class="datatableHeader">
				</div>
				<div id="TablePanel" class="datatablecontent">
					<table id="tableviewer" width="100%" border="0">
						<colgroup>
							<col width="5%" />
							<col width="65%" />
							<col width="30%" />
						</colgroup>
						<tbody>
							<tr class="title">
								<th class="tc">ID</th>
								<th>角色名</th>
								<th class="tc">操作</th>
							</tr>
							<?php if ($this->_tpl_vars['assign']['page']['items']): ?>
								<?php $_from = $this->_tpl_vars['assign']['page']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
								<tr>
									<td class="tc"><?php echo $this->_tpl_vars['item']['id']; ?>
</td>
									<td><a href="role?action=modifyAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a></td>
									<td class="tc">
										<a href="/role?action=modifyAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">
											<img src="/resources/images/admin/edit.gif" title="编辑"/>
										</a>
										<?php if ($this->_tpl_vars['item']['id'] != 1): ?>
										<a href="/role?action=delAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" onclick="if(!confirm('确认删除角色“<?php echo $this->_tpl_vars['item']['name']; ?>
?”'))return false;">
											<img src="/resources/images/admin/delete.gif" title="删除"/>
										</a>
										<?php endif; ?>
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
				<div id="page">
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'page.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				</div>
			</div>
			
			
			
		</div>
	</div>
<!-- content end -->