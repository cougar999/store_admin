<?php /* Smarty version 2.6.26, created on 2012-12-06 17:47:28
         compiled from attribute/edit.html */ ?>
<!-- content start -->
<div id="wrapper">
	<div id="content">
		<div class="clearfix">
			<h1>编辑属性</h1>
		</div>
		<form enctype="multipart/form-data" method="post" action="">
			<fieldset>
				<legend>属性 -- 编辑属性</legend>
				<table id="tableviewer" border="0" class="formtable">
					<tr>
						<th>名称：</th><td><input type="text" name="name" value="<?php if ($this->_tpl_vars['assign']['page']['name']): ?><?php echo $this->_tpl_vars['assign']['page']['name']; ?>
<?php else: ?>未知<?php endif; ?>"><td>
					</tr>
					<tr>
						<th></th><td><input type="submit" value="编辑属性"><input type="hidden" name="isAttrSubmit" value="1"><td>
					</tr>
				</table>
			</fieldset>
			<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['assign']['page']['id']; ?>
" />
		</form>
	</div>
</div>
<!-- content end -->