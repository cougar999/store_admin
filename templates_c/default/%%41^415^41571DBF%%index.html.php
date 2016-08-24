<?php /* Smarty version 2.6.26, created on 2013-01-11 10:21:12
         compiled from admin/index.html */ ?>
<!-- content start -->
	<div id="wrapper">
		<div id="content">
			<div class="clearfix">
				<h1 class="fl">
				管理 
				&nbsp;&nbsp;>&nbsp;&nbsp;后台用户
				</h1>
				<div class="ctrlbar fr">
					<a class="v13-button-secondary fr addpromBtn" href="/user?action=addAction">
						<span class="v13-icon-add"></span>添加后台用户
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
							<col width="15%" />
							<col width="20%" />
							<col width="10%" />
							<col width="10%" />
							<col width="10%" />
							<col width="auto" />
						</colgroup>
						<tbody>
							<tr class="title">
								<th class="tc">ID</th>
								<th>用户名</th>
								<th>email</th>
								<th>角色</th>
								<th>所属渠道</th>
								<th>状态</th>
								<th class="tc">操作</th>
							</tr>
							<?php if ($this->_tpl_vars['assign']['page']['items']): ?>
								<?php $_from = $this->_tpl_vars['assign']['page']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
								<tr>
									<td class="tc"><?php echo $this->_tpl_vars['item']['id']; ?>
</td>
									<?php if ($this->_tpl_vars['item']['id'] == 1): ?>
									<td><?php echo $this->_tpl_vars['item']['name']; ?>
</td>
									<td><?php echo $this->_tpl_vars['item']['email']; ?>
</td>
									<td><?php echo $this->_tpl_vars['assign']['role'][$this->_tpl_vars['item']['role_id']]; ?>
</td>
									<td><?php echo $this->_tpl_vars['assign']['arr_chncode'][$this->_tpl_vars['item']['chncode']]; ?>
</td>
									<td><?php if ($this->_tpl_vars['item']['status'] == 1): ?>有效<?php elseif ($this->_tpl_vars['item']['status'] == 0): ?>无效<?php endif; ?></td>
									<td class="tc">
										默认超级管理员无法对其编辑，如有问题请联系技术人员！
									</td>
									<?php else: ?>
									<td><a href="user?action=modifyAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a></td>
									<td><a href="user?action=modifyAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['email']; ?>
</a></td>
									<td><a href="user?action=modifyAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['assign']['role'][$this->_tpl_vars['item']['role_id']]; ?>
</a></td>
									<td><a href="user?action=modifyAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['assign']['arr_chncode'][$this->_tpl_vars['item']['chncode']]; ?>
</a></td>
									<td><?php if ($this->_tpl_vars['item']['status'] == 1): ?>有效<?php elseif ($this->_tpl_vars['item']['status'] == 0): ?>无效<?php endif; ?></td>
									<td class="tc">
										<a href="/user?action=modifyAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">
											<img src="/resources/images/admin/edit.gif" title="编辑"/>
										</a>
										<a href="/user?action=delAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" onclick="if(!confirm('确认删除账号“<?php echo $this->_tpl_vars['item']['name']; ?>
?”'))return false;">
											<img src="/resources/images/admin/delete.gif" title="删除"/>
										</a>
									</td>
									<?php endif; ?>
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