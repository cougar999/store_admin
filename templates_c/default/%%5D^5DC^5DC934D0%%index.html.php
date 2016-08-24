<?php /* Smarty version 2.6.26, created on 2013-01-07 16:20:30
         compiled from node/index.html */ ?>
<!-- content start -->
	<div id="wrapper">
		<div id="content">
			<div class="datatable">
				<?php if ($this->_tpl_vars['assign']['page']['items']): ?>
				<div class="datatableHeader">
					<h1 class="fl intitle">发布管理<?php if ($this->_tpl_vars['assign']['title_name']): ?> > <?php echo $this->_tpl_vars['assign']['title_name']; ?>
<?php endif; ?></h1>
					<?php if ($this->_tpl_vars['assign']['all_node']): ?>
					<div class="ctrlbar fl">
						<select id="parent_id" style="margin:2px 0 0 10px;">
							<?php $_from = $this->_tpl_vars['assign']['all_node']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['node_info']):
?>
							<option value="<?php echo $this->_tpl_vars['node_info']['id']; ?>
"><?php echo $this->_tpl_vars['node_info']['name']; ?>
</option>
							<?php endforeach; endif; unset($_from); ?>
						</select>
					</div>
					<?php endif; ?>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'search_product.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					<div class="ctrlbar fr">
						<a class="v13-button-secondary fl" href="/node?action=addAction<?php if ($_GET['parentid']): ?>&parentid=<?php echo $_GET['parentid']; ?>
<?php endif; ?>">
							<span class="v13-icon-add"></span>添加节点
						</a>
						<a class="v13-button-secondary fl updateCacheAll" rel="node" href="/node?action=updateCacheAll">
							<span class="v13-icon-cache"></span>更新缓存
						</a>
					</div>
				</div>
				<form action="/node?action=multiNodesAction" method="post" onsubmit="" id="nodeform">
				<div id="TablePanel" class="datatablecontent">
					<table id="tableviewer" width="100%" border="0">
						<colgroup>
							<col width="60" />
							<col width="60" />
							<col width="60" />
							<col width="150" />
							<col width="100" />
							<!-- <col width="100" /> -->
							<col width="110" />
							<col width="170" />
							<col width="170" />
							<col width="200" />
							<col width="200" />
						</colgroup>
						<tbody>
							<tr class="title">
								<th class="tc">
									<input type="checkbox" name="selector" id="selector" />
								</th>
								<th class="tc">ID</th>
								<th class="tc">图标</th>
								<th class="tc">名称</th>
								<th class="tc">类型</th>
								<th class="tc">状态</th>
								<!-- <th class="tc">关联内容ID</th> -->
								<th class="tc">更新时间</th>
								<th class="tc">创建时间</th>
								<th class="tc">描述</th>
								<th class="tc">位置</th>
							</tr>
							<?php if ($this->_tpl_vars['assign']['page']['items']): ?>
								<?php $_from = $this->_tpl_vars['assign']['page']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
								<tr>
									<td class="tc"><input type="checkbox" name="nodeids[]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" class="batchids" /></td>
									<td class="tc"><?php echo $this->_tpl_vars['item']['id']; ?>
</td>
									<td class="tc">
										<div class="imgbg">
											<img src="<?php if (! empty ( $this->_tpl_vars['item']['icon'] )): ?><?php echo $this->_tpl_vars['item']['icon']; ?>
<?php endif; ?>" style="width:auto;height:48px;background:url(/resources/images/transparent.gif) no-repeat center center">
										</div>
									</td>
									<td>
										<?php if ($this->_tpl_vars['item']['node_type'] == 4): ?>
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
									<td><?php echo $this->_tpl_vars['assign']['arr_node_type'][$this->_tpl_vars['item']['node_type']]; ?>
</td>
									<td class="tc">
										<?php if ($this->_tpl_vars['item']['status'] && $this->_tpl_vars['item']['status'] == 1): ?><a href="javascript:void(0);" onclick="changeStatus(<?php echo $this->_tpl_vars['item']['id']; ?>
, 1,'node', this)">上线</a><?php else: ?><a href="javascript:void(0);" onclick="changeStatus(<?php echo $this->_tpl_vars['item']['id']; ?>
, 0,'node', this)">下线</a><?php endif; ?>
									</td>
									<!-- <td>{$item.content_id}</td> -->
									<td><?php echo $this->_tpl_vars['item']['update_time']; ?>
</td>
									<td><?php echo $this->_tpl_vars['item']['create_time']; ?>
</td>
									<td><?php echo $this->_tpl_vars['item']['desc']; ?>
</td>
									<td class="tc"><?php echo $this->_tpl_vars['item']['order_id']; ?>
</td>
								</tr>
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
					<input type="button" value="批量下线" name="updownNodes" updownnodes="1" onclick="changeMulti(this);return false;" class="updownNodes" />
					<input type="button" value="批量上线" name="updownNodes" updownnodes="0" onclick="changeMulti(this);return false;" class="updownNodes"  />
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
<script language="javascript">
$(function(){
	var parentid = GetQueryString('parentid');
	$("#parent_id").val(parentid);
	$("#parent_id").change(function(){
		window.location.href = '/node?parentid=' + $(this).val();
	});
})
</script>