<?php /* Smarty version 2.6.26, created on 2013-01-22 15:07:55
         compiled from node/add.html */ ?>
<!-- content start -->
<div id="wrapper">
	<div id="content">
		<form enctype="multipart/form-data" method="post"  action="">
			<fieldset>
				<legend>发布 -- 添加发布内容</legend>
				<table id="tableviewer" border="0" class="formtable">
					<colgroup>
						<col width="150" />
						<col width="auto" />
					</colgroup>
					<tr>
						<th class="tr">类型：</th>
						<td>
							<select id="node_type" name="node_type" onchange="node.checknodeType(this);">
								<option value="">--选择类型--</option>
							<?php $_from = $this->_tpl_vars['assign']['child_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
								<option value="<?php echo $this->_tpl_vars['value']; ?>
"><?php echo $this->_tpl_vars['assign']['arr_node_type'][$this->_tpl_vars['value']]; ?>
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
						<th class="tr">名称：</th><td><input type="text" name="name" id="content_name_text"><td>
					</tr>
					<tr>
						<th class="tr">描述：</th><td><textarea name="desc"></textarea><td>
					</tr>
					<tr>
						<th class="tr">图标：</th><td><input type="file" name="icon" multiple="multiple"><td>
					</tr>
					<tr>
						<th class="tr">状态：</th>
						<td>
							<input type="radio" name="status" value="1" id="onlineSel" checked="checked"><label for="onlineSel">上线</label>
							&nbsp;&nbsp;
							<input type="radio" name="status" value="0" id="offlineSel"><label for="offlineSel">下线</label></select>
						<td>
					</tr>
					<?php if ($this->_tpl_vars['assign']['session']['admin_userid'] == DEFAULT_ADMIN_USER): ?>
					<tr>
						<th class="tr">子节点类型集合：<br><font style="color:red;font-size:12px;">(*指定超级管理员)</font></th>
						<td>
							<select name="child_type[]" multiple="multiple" style="width:150px;height:150px;">
								<?php $_from = $this->_tpl_vars['assign']['arr_node_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
								<?php if ($this->_tpl_vars['key'] != 1): ?>
								<option value="<?php echo $this->_tpl_vars['key']; ?>
"><?php echo $this->_tpl_vars['value']; ?>
</option>
								<?php endif; ?>
								<?php endforeach; endif; unset($_from); ?>
							</select>
						</td>
					</tr>
					<?php endif; ?>
					<tr>
						<td>&nbsp;</td>
						<td><input type="submit" value="提交"><input type="hidden" name="isNodeSubmit" value="1"></td>
					</tr>
				</table>
			</fieldset>
		</form>
	</div>
</div>