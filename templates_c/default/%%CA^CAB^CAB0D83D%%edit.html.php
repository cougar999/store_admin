<?php /* Smarty version 2.6.26, created on 2012-12-18 09:32:01
         compiled from role/edit.html */ ?>
<!-- content start -->
	<div id="wrapper">
		<div id="content">
			<div class="clearfix">
				<h1><h1>编辑角色</h1></h1>
			</div>
			<br />
			<div class="cl"></div>
			
			<form enctype="multipart/form-data" method="post"  action="">
			<fieldset>
				<legend>管理  -- 编辑角色</legend>
				<table id="tableviewer" border="0" class="formtable">
					<tr>
						<td>角色名称：</td><td><input type="text" name="name" value="<?php echo $this->_tpl_vars['assign']['page']['name']; ?>
"><td>
					</tr>
					<tr>
						<td></td><td><input type="submit" value="提交"><input type="hidden" name="isRoleSubmit" value="1"></td>
					</tr>
				</table>
			</fieldset>
			</form>
		</div>
	</div>
<!-- content end -->
<script language="javascript">
</script>