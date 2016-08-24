<?php /* Smarty version 2.6.26, created on 2012-12-26 10:56:10
         compiled from category/edit.html */ ?>
<!-- content start -->
<div id="wrapper">
	<div id="content">
		<div class="clearfix">
			<h1>
			编辑分类
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
		<form enctype="multipart/form-data" method="post" action="">
			<fieldset>
				<legend>分类 -- 编辑分类</legend>
				<table id="tableviewer" border="0" class="formtable">
					<tr>
						<th>父分类：</th><td><span id="category_pid"></span></td>
					</tr>
					<tr>
						<th>名称：</th><td><input type="text" name="name" value="<?php if ($this->_tpl_vars['assign']['page']['name']): ?><?php echo $this->_tpl_vars['assign']['page']['name']; ?>
<?php else: ?>未知<?php endif; ?>"><td>
					</tr>
					<tr>
						<th>描述：</th><td><textarea name="description"><?php echo $this->_tpl_vars['assign']['page']['description']; ?>
</textarea><td>
					</tr>
					<tr>
						<th>图标：</th><td><?php if ($this->_tpl_vars['assign']['page']['icon']): ?><img src="<?php echo $this->_tpl_vars['assign']['page']['icon']; ?>
" /><?php endif; ?><input type="file" name="icon"><td>
					</tr>
					<tr>
						<th valign="top" class="padded">状态：</th>
						<td>
							<input type="radio" name="status" value="1" id="onlineSel" <?php if ($this->_tpl_vars['assign']['page']['status'] == 1): ?>checked="checked"<?php endif; ?>></radio>
							<label for="onlineSel">上线</label>
							&nbsp;&nbsp;
							<input type="radio" name="status" value="0" id="offlineSel" <?php if ($this->_tpl_vars['assign']['page']['status'] == 0): ?>checked="checked"<?php endif; ?>></radio>
							<label for="offlineSel">下线</label>
						</td>
					</tr>
					<tr>
						<th valign="top" class="padded">是否有子分类：</th>
						<td>
							<input type="radio" name="class_type" value="1" id="onlineSel" <?php if ($this->_tpl_vars['assign']['page']['class_type'] == 1): ?>checked="checked"<?php endif; ?>></radio>
							<label for="onlineSel">是</label>
							&nbsp;&nbsp;
							<input type="radio" name="class_type" value="2" id="offlineSel" <?php if ($this->_tpl_vars['assign']['page']['class_type'] == 2): ?>checked="checked"<?php endif; ?>></radio>
							<label for="offlineSel">否</label>
						</td>
					</tr>
					<tr>
						<th>推荐商品：</th><td><textarea name="recommend_product_ids"><?php echo $this->_tpl_vars['assign']['page']['recommend_product_ids']; ?>
</textarea><td>
					</tr>
					<tr><td colspan="2"><input type="submit" value="编辑分类"><input type="hidden" name="isCategorySubmit" value="1"></td></tr>
				</table>
				<input type="hidden" name="pidd" id="pidd" value="<?php echo $this->_tpl_vars['assign']['page']['pid']; ?>
" />
			</fieldset>
		</form>
	</div>
</div>
<!-- content end -->
<script language="javascript">
	window.onload = function(){
		getCurrentCatelist();
	}
</script>