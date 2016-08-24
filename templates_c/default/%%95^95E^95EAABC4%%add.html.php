<?php /* Smarty version 2.6.26, created on 2012-12-27 19:20:43
         compiled from category/add.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'category/add.html', 60, false),)), $this); ?>
<!-- content start -->
<div id="wrapper">
	<div id="content">
		<div class="clearfix">
			<h1>
			添加分类
			<?php $_from = $this->_tpl_vars['assign']['pageTitle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
			&nbsp;&nbsp;>&nbsp;&nbsp;<a href="/category?parentid=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a>
			<?php endforeach; endif; unset($_from); ?>
			</h1>
		</div>
		<form enctype="multipart/form-data" method="post"  action="">
			<fieldset>
				<legend>分类 -- 添加分类</legend>
				<table id="tableviewer" border="0" class="formtable">
					<colgroup>
						<col width="120" />
						<col width="auto" />
					</colgroup>
					<tr>
						<th class="tr">父分类：</th><td><span id="category_pid"></span></td>
					</tr>
					<tr>
						<th class="tr">名称：</th><td><input type="text" name="name"><td>
					</tr>
					<tr>
						<th class="tr">描述：</th><td><textarea name="description"></textarea><td>
					</tr>
					<tr>
						<th class="tr">图标：</th><td><input type="file" name="icon" multiple="multiple"><td>
					</tr>
					<tr>
						<th valign="top" class="padded tr">状态：</th>
						<td>
							<input type="radio" name="status" value="1" id="onlineSel" checked="checked"></radio>
							<label for="onlineSel">上线</label>
							&nbsp;&nbsp;
							<input type="radio" name="status" value="0" id="offlineSel"></radio>
							<label for="offlineSel">下线</label>
						</td>
					</tr>
					<tr>
						<th valign="top" class="padded tr">是否有子分类：</th>
						<td>
							<input type="radio" name="class_type" value="1" id="onlineSel" checked="checked"></radio>
							<label for="onlineSel">是</label>
							&nbsp;&nbsp;
							<input type="radio" name="class_type" value="2" id="offlineSel"></radio>
							<label for="offlineSel">否</label>
						</td>
					</tr>
					<tr>
						<th class="tr">推荐商品：</th><td><textarea name="recommend_product_ids"></textarea><td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>
						<input type="submit" value="添加分类">
						<input type="hidden" name="isCategorySubmit" value="1">
						<input type="hidden" name="pid" id="pidd" value="<?php echo ((is_array($_tmp=@$_GET['parentid'])) ? $this->_run_mod_handler('default', true, $_tmp, -1) : smarty_modifier_default($_tmp, -1)); ?>
">
						</td>
					</tr>
				</table>
			</fieldset>
		</form>
	</div>
</div>
<script language="javascript">
	getCurrentCatelist();
</script>