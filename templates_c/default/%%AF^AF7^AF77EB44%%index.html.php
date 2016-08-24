<?php /* Smarty version 2.6.26, created on 2013-01-22 11:09:53
         compiled from category/index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'category/index.html', 24, false),)), $this); ?>
<!-- content start -->
	<div id="wrapper">
		<div id="content">
			<div class="datatable">
				<?php if ($this->_tpl_vars['assign']['page']['items']): ?>
				<div class="datatableHeader">
					<h1 class="fl intitle">
						分类列表
						<?php $_from = $this->_tpl_vars['assign']['pageTitle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
						&nbsp;&nbsp;>&nbsp;&nbsp;<a href="/category?parentid=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a>
						<?php endforeach; endif; unset($_from); ?>
					</h1>
					<?php if ($this->_tpl_vars['assign']['all_cate']): ?>
					<div class="ctrlbar fl">
						<select id="parent_id" style="margin:2px 0 0 10px;">
							<?php $_from = $this->_tpl_vars['assign']['all_cate']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['category_info']):
?>
							<option value="<?php echo $this->_tpl_vars['category_info']['id']; ?>
"><?php echo $this->_tpl_vars['category_info']['name']; ?>
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
						<a class="v13-button-secondary fl" href="/category?action=addAction<?php if ($_GET['parentid'] > 0): ?>&parentid=<?php echo ((is_array($_tmp=@$_GET['parentid'])) ? $this->_run_mod_handler('default', true, $_tmp, -1) : smarty_modifier_default($_tmp, -1)); ?>
<?php endif; ?>">
							<span class="v13-icon-add"></span>添加新分类
						</a>
						<a class="v13-button-secondary fl updateCacheAll" rel="category" href="/category?action=updateCacheAll">
							<span class="v13-icon-cache"></span>更新缓存
						</a>
					</div>
				</div>
				<form action="/category?action=multiCateAction" method="post" onsubmit="" id="ChangeMultiForm">
				<div id="TablePanel" class="datatablecontent">
					<table id="tableviewer" width="100%" border="0">
						<colgroup>
							<col width="60" />
							<col width="60" />
							<col width="70" />
							<col width="200" />
							<col width="auto" />
							<col width="100" />
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
								<th>分类名称</th>
								<th>描述</th>
								<th class="tc">状态</th>
								<th>创建时间</th>
								<th>更新时间</th>
							</tr>
							<?php $_from = $this->_tpl_vars['assign']['page']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
							<tr>
								<td class="tc"><input type="checkbox" name="cateids[]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
"/></td>
								<td class="tc"><?php if ($this->_tpl_vars['item']['id']): ?><?php echo $this->_tpl_vars['item']['id']; ?>
<?php else: ?>未知<?php endif; ?></td>
								<td class="tc">
									<div class="imgbg">
										<img src="<?php if (! empty ( $this->_tpl_vars['item']['icon'] )): ?><?php echo $this->_tpl_vars['item']['icon']; ?>
<?php endif; ?>" style="width:auto;height:48px;background:url(/resources/images/transparent.gif) no-repeat center center">
									</div>
								</td>
								<td>
									<?php if ($this->_tpl_vars['item']['class_type'] == 2): ?>
										<a href="category?action=classTypeAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a>
									<?php else: ?>
										<a href="category?parentid=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a>
									<?php endif; ?>
									<span class="ctrlpanel">
										<a href="/category?action=modifyAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
&parentid=<?php echo $this->_tpl_vars['item']['pid']; ?>
"><img src="/resources/images/icon_edit3.png" alt="编辑" title="编辑"/></a> 
										<a href="/category?action=delAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" onclick="if(!confirm('确认删除分类“<?php echo $this->_tpl_vars['item']['name']; ?>
?”'))return false;"><img src="/resources/images/icon_trash3.png" title="删除"/></a>  
										<a href="/category?action=setMemoryData&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" title="<?php echo $this->_tpl_vars['item']['name']; ?>
" class="update_cache no"><img src="/resources/images/admin/quick.gif" title="更新缓存"/></a>
									</span>
								</td>
								<td><?php echo $this->_tpl_vars['item']['description']; ?>
</td>
								<td class="tc">
									<?php if ($this->_tpl_vars['item']['status'] && $this->_tpl_vars['item']['status'] == 1): ?><a href="javascript:void(0);" onclick="changeStatus(<?php echo $this->_tpl_vars['item']['id']; ?>
, 1, 'category', this)">上线</a><?php else: ?><a href="javascript:void(0);" onclick="changeStatus(<?php echo $this->_tpl_vars['item']['id']; ?>
, 0,'category', this)">下线</a><?php endif; ?>
								</td>
								<td><?php echo $this->_tpl_vars['item']['create_time']; ?>
</td>
								<td><?php echo $this->_tpl_vars['item']['update_time']; ?>
</td>
							</tr>
							<?php endforeach; endif; unset($_from); ?>
						</tbody>
					</table>
				</div>
				<div class="btns">
					<input type="button" value="批量下线" name="updownCates" updownparas="1" onclick="changeMulti(this, 'updownCateFlag');return false;" class="updownOperate" />
					<input type="button" value="批量上线" name="updownCates" updownparas="0" onclick="changeMulti(this, 'updownCateFlag');return false;" class="updownOperate" />
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
		window.location.href = '/category?parentid=' + $(this).val();
	});
})
</script>