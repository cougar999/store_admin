<?php /* Smarty version 2.6.26, created on 2012-12-28 10:03:06
         compiled from admin/add.html */ ?>
<!-- content start -->
	<div id="wrapper">
		<div id="content">
			<div class="clearfix">
				<h1><h1>编辑后台管理账户</h1></h1>
			</div>
			<br />
			<div class="cl"></div>
			
			<form enctype="multipart/form-data" method="post"  action="">
			<fieldset>
				<legend>管理  -- 后台管理账户</legend>
				<table id="tableviewer" border="0" class="formtable">
					<colgroup>
						<col width="120" />
						<col width="auto" />
					</colgroup>
					<tr>
						<td class="tr">角色：</td>
						<td>
							<select name="role_id">
								<?php $_from = $this->_tpl_vars['assign']['role']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['role_id'] => $this->_tpl_vars['name']):
?>
									<option value="<?php echo $this->_tpl_vars['role_id']; ?>
"><?php echo $this->_tpl_vars['name']; ?>
</option>
								<?php endforeach; endif; unset($_from); ?>
							</select>
						<td>
					</tr>
					<tr>
						<td class="tr">账户名称：</td><td><input type="text" name="name" value=""><td>
					</tr>
					<tr>
						<td class="tr">email：</td><td><input type="text" name="email" value=""><td>
					</tr>
					<tr>
						<td class="tr">密码：</td><td><input type="password" name="passwd" value=""><td>
					</tr>
					<tr>
						<td class="tr">状态：</td>
						<td>
							
								<input type="radio" name="status" value="1" id="onlineSel"></radio>
								<label for="onlineSel">上线</label>
								&nbsp;&nbsp;
								<input type="radio" name="status" value="0" id="offlineSel" checked="checked"></radio>
								<label for="offlineSel">下线</label>
						<td>
					</tr>
					<tr>
						<td></td><td><input type="submit" value="提交"><input type="hidden" name="isAdminUserSubmit" value="1"></td>
					</tr>
				</table>
			</fieldset>
			</form>
		</div>
	</div>
<!-- content end -->
<script language="javascript">
</script>