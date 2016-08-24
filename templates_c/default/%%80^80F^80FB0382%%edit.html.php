<?php /* Smarty version 2.6.26, created on 2013-01-07 16:23:38
         compiled from node/edit.html */ ?>
<!-- content start -->
<div id="wrapper">
	<div id="content">
		<form enctype="multipart/form-data" method="post"  action="">
			<fieldset>
				<legend>发布 -- 编辑发布内容</legend>
				<table id="tableviewer" border="0" class="formtable">
					<tr>
						<th>类型：</th>
						<td>
							<select id="node_type" name="node_type"  onchange="node.checknodeType(this);">
								<option value="">--选择类型--</option>
							<?php $_from = $this->_tpl_vars['assign']['arr_node_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
								<option value="<?php echo $this->_tpl_vars['key']; ?>
" <?php if ($this->_tpl_vars['assign']['info']['node_type'] == $this->_tpl_vars['key']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['value']; ?>
</option>
							<?php endforeach; endif; unset($_from); ?>
							</select>
						<td>
						<th></th>
						<td id="node_content">
							<input type="hidden" id="content_name" name="content_name" value="" readonly="readonly">
							<input id="content_id" name="content_id" type="hidden">
							<input type="hidden" value="关联内容">
						<td>
					</tr>
					<tr>
						<th>名称：</th><td><input type="text" name="name" value="<?php echo $this->_tpl_vars['assign']['info']['name']; ?>
" id="content_name_text"><td>
					</tr>
					<tr>
						<th>描述：</th><td><textarea name="desc" id="content_desc" ><?php echo $this->_tpl_vars['assign']['info']['desc']; ?>
</textarea><td>
					</tr>
					<tr>
						<th>图标：</th><td><?php if ($this->_tpl_vars['assign']['info']['icon']): ?><img src="<?php echo $this->_tpl_vars['assign']['info']['icon']; ?>
" /><?php endif; ?><input type="file" name="icon" multiple="multiple"><td>
					</tr>
					<tr>
						<th>状态：</th>
						<td>
							<input type="radio" name="status" value="1" id="onlineSel" <?php if ($this->_tpl_vars['assign']['info']['status'] == 1): ?>checked="checked"<?php endif; ?>><label for="onlineSel">上线</label>
							&nbsp;&nbsp;
							<input type="radio" name="status" value="0" id="offlineSel" <?php if ($this->_tpl_vars['assign']['info']['status'] == 0): ?>checked="checked"<?php endif; ?>><label for="offlineSel">下线</label></select>
						<td>
					</tr>
					<tr><td colspan="2"><input type="hidden" value="<?php echo $this->_tpl_vars['assign']['info']['pid']; ?>
" name="pid"><input type="submit" value="提交"><input type="hidden" name="isNodeSubmit" value="1"></td></tr>
				</table>
			</fieldset>
		</form>
	</div>
</div>