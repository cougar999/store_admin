<?php /* Smarty version 2.6.26, created on 2013-01-16 15:29:05
         compiled from node/list.tpl */ ?>
			<div class="datatable">
				<?php if ($this->_tpl_vars['assign']['page']['items']): ?>
				<form action="/node?action=multiNodesAction" method="post" onsubmit="" id="nodeform">
				<div id="TablePanel" class="datatablecontent">
					<table id="tableviewer" width="100%" border="0">
						<colgroup>
							<col width="150" />
							<col width="60" />
							<col width="50" />
							<col width="100" />
							<col width="110" />
							<col width="200" />
							<col width="200" />
						</colgroup>
						<thead>
							<tr class="title">
								<th class="tc">名称</th>
								<th class="tc">ID</th>
								<th class="tc">图标</th>
								<th class="tc">类型</th>
								<th class="tc">状态</th>
								<th class="tc">描述</th>
								<th class="tc">位置</th>
							</tr>
						</thead>
						<tbody>
							<?php if ($this->_tpl_vars['assign']['page']['items']): ?>
								<?php $_from = $this->_tpl_vars['assign']['page']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
								<tr id="node-<?php echo $this->_tpl_vars['item']['id']; ?>
">
									<td title="<?php echo $this->_tpl_vars['item']['name']; ?>
" style="padding-left:30px;">
										<?php if ($this->_tpl_vars['item']['node_type'] != 1 && $this->_tpl_vars['item']['node_type'] != 2): ?>
											<?php echo $this->_tpl_vars['item']['name']; ?>

										<?php else: ?>
											<a href="/node?parentid=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a>
										<?php endif; ?>
										<span class="ctrlpanel">
											<a href="/node?action=modifyAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><img src="/resources/images/icon_edit3.png" alt="编辑" title="编辑"/></a>
											<!-- <a href="#"><img src="/resources/images/admin/delete.gif" title="删除"/></a> -->
											<a href="/node?action=setMemoryDataAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" title="<?php echo $this->_tpl_vars['item']['name']; ?>
" class="update_cache no"><img src="/resources/images/icon_edit3.png" title="更新缓存"/></a>
										</span>
									</td>
									<td class="tc"><?php echo $this->_tpl_vars['item']['id']; ?>
</td>
									<td class="tc">
										<div class="imgbg">
											<img src="<?php if (! empty ( $this->_tpl_vars['item']['icon'] )): ?><?php echo $this->_tpl_vars['item']['icon']; ?>
<?php endif; ?>" style="width:auto;height:48px;background:url(/resources/images/transparent.gif) no-repeat center center">
										</div>
									</td>
									<td class="tc"><?php echo $this->_tpl_vars['assign']['arr_node_type'][$this->_tpl_vars['item']['node_type']]; ?>
</td>
									<td class="tc">
										<?php if ($this->_tpl_vars['item']['status'] && $this->_tpl_vars['item']['status'] == 1): ?><a href="javascript:void(0);" onclick="changeStatus(<?php echo $this->_tpl_vars['item']['id']; ?>
, 1,'node', this)">上线</a><?php else: ?><a href="javascript:void(0);" onclick="changeStatus(<?php echo $this->_tpl_vars['item']['id']; ?>
, 0,'node', this)">下线</a><?php endif; ?>
									</td>
									<!-- <td>{$item.content_id}</td> -->
									<td><?php echo $this->_tpl_vars['item']['desc']; ?>
</td>
									<td class="tc"><?php echo $this->_tpl_vars['item']['order_id']; ?>
</td>
								</tr>
								<?php if ($this->_tpl_vars['assign']['child'][$this->_tpl_vars['item']['id']]): ?>
									<?php $_from = $this->_tpl_vars['assign']['child'][$this->_tpl_vars['item']['id']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key1'] => $this->_tpl_vars['child_item']):
?>
									<tr id="node-<?php echo $this->_tpl_vars['child_item']['id']; ?>
" class="child-of-node-<?php echo $this->_tpl_vars['item']['id']; ?>
">
										<td title="<?php echo $this->_tpl_vars['child_item']['name']; ?>
">
											<?php if ($this->_tpl_vars['child_item']['node_type'] != 1 && $this->_tpl_vars['child_item']['node_type'] != 2): ?>
												<?php echo $this->_tpl_vars['child_item']['name']; ?>

											<?php else: ?>
												<a href="/node?parentid=<?php echo $this->_tpl_vars['child_item']['id']; ?>
"><?php echo $this->_tpl_vars['child_item']['name']; ?>
</a>
											<?php endif; ?>
											<span class="ctrlpanel">
												<a href="/node?action=modifyAction&id=<?php echo $this->_tpl_vars['child_item']['id']; ?>
"><img src="/resources/images/icon_edit3.png" alt="编辑" title="编辑"/></a>
												<!-- <a href="#"><img src="/resources/images/admin/delete.gif" title="删除"/></a> -->
												<a href="/node?action=setMemoryDataAction&id=<?php echo $this->_tpl_vars['child_item']['id']; ?>
" title="<?php echo $this->_tpl_vars['child_item']['name']; ?>
" class="update_cache no"><img src="/resources/images/icon_edit3.png" title="更新缓存"/></a>
											</span>
										</td>
										<td class="tc"><?php echo $this->_tpl_vars['child_item']['id']; ?>
</td>
										<td class="tc">
											<div class="imgbg">
												<img src="<?php if (! empty ( $this->_tpl_vars['child_item']['icon'] )): ?><?php echo $this->_tpl_vars['child_item']['icon']; ?>
<?php endif; ?>" style="width:auto;height:48px;background:url(/resources/images/transparent.gif) no-repeat center center">
											</div>
										</td>
										<td class="tc"><?php echo $this->_tpl_vars['assign']['arr_node_type'][$this->_tpl_vars['child_item']['node_type']]; ?>
</td>
										<td class="tc">
											<?php if ($this->_tpl_vars['child_item']['status'] && $this->_tpl_vars['child_item']['status'] == 1): ?><a href="javascript:void(0);" onclick="changeStatus(<?php echo $this->_tpl_vars['child_item']['id']; ?>
, 1,'node', this)">上线</a><?php else: ?><a href="javascript:void(0);" onclick="changeStatus(<?php echo $this->_tpl_vars['child_item']['id']; ?>
, 0,'node', this)">下线</a><?php endif; ?>
										</td>
										<td><?php echo $this->_tpl_vars['child_item']['desc']; ?>
</td>
										<td class="tc"><?php echo $this->_tpl_vars['child_item']['order_id']; ?>
</td>
									</tr>
									<?php endforeach; endif; unset($_from); ?>
								<?php endif; ?>
								<?php endforeach; endif; unset($_from); ?>
							<?php else: ?>
								<tr>
									<td colspan="11" class="tc">未找到内容</td>
								</tr>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
				<div class="btns">
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
<script language="javascript">
$(function(){
	$("#tableviewer").treeTable({
		initialState: "expanded"
	});
	$("#page a").click(function(){
		var url = $(this).attr("href");
		if(url){
			$("#right_content").load(url);
		}
		return false;
	});
})
</script>