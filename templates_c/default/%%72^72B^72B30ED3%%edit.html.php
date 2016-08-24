<?php /* Smarty version 2.6.26, created on 2013-01-11 10:21:17
         compiled from admin/edit.html */ ?>
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
					<tr>
						<td>角色：</td>
						<td>
							<select name="role_id">
								<?php $_from = $this->_tpl_vars['assign']['role']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['role_id'] => $this->_tpl_vars['name']):
?>
									<option value="<?php echo $this->_tpl_vars['role_id']; ?>
" <?php if ($this->_tpl_vars['role_id'] == $this->_tpl_vars['assign']['page']['role_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['name']; ?>
</option>
								<?php endforeach; endif; unset($_from); ?>
							</select>
						<td>
						<td>所属渠道：</td>
						<td>
							<select name="chncode">
								<?php $_from = $this->_tpl_vars['assign']['arr_chncode']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['channel_code'] => $this->_tpl_vars['name']):
?>
									<option value="<?php echo $this->_tpl_vars['channel_code']; ?>
"<?php if ($this->_tpl_vars['channel_code'] == $this->_tpl_vars['assign']['page']['chncode']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['name']; ?>
</option>
								<?php endforeach; endif; unset($_from); ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>账户名称：</td><td><input type="text" name="name" value="<?php echo $this->_tpl_vars['assign']['page']['name']; ?>
"><td>
					</tr>
					<tr>
						<td>email：</td><td><input type="text" name="email" value="<?php echo $this->_tpl_vars['assign']['page']['email']; ?>
"><td>
					</tr>
					<tr>
						<td>密码：</td><td><input type="password" name="passwd" value=""><font style="font-size:12px;padding:5px;color:red;">(默认空提交不修改密码)</font><td>
					</tr>
					<tr>
						<td>状态：</td>
						<td>
							
								<input type="radio" name="status" value="1" id="onlineSel" <?php if ($this->_tpl_vars['assign']['page']['status'] == 1): ?>checked="checked"<?php endif; ?>></radio>
								<label for="onlineSel">上线</label>
								&nbsp;&nbsp;
								<input type="radio" name="status" value="0" id="offlineSel" <?php if ($this->_tpl_vars['assign']['page']['status'] == 0): ?>checked="checked"<?php endif; ?>></radio>
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