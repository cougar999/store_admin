<?php /* Smarty version 2.6.26, created on 2013-01-16 16:54:53
         compiled from product/comblist.html */ ?>
<form method="post" action="">
<div id="attrlist_box" class="">
	<table width="100%" border="0">
		<colgroup>
			<col width="100" />
			<col width="20" />
			<col width="auto" />
		</colgroup>
		<tbody>
		<tr>
			<th class="padded">变属性名</th>
			<th>&nbsp;</th>
			<th>属性值</th>
		</tr>
		<?php if ($this->_tpl_vars['assign']['attr']): ?>
			<?php $_from = $this->_tpl_vars['assign']['attr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['attr']):
?>
			<tr>
				<td class="padded"><?php echo $this->_tpl_vars['attr']['name']; ?>
</td>
				<td>&nbsp;</td>
				<td>
					<input type="hidden" name="attribute_id[]" value="<?php echo $this->_tpl_vars['key']; ?>
" class="combid" />
					<span class="attrlistbox">
						<?php $_from = $this->_tpl_vars['attr']['attr_values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key2'] => $this->_tpl_vars['_attr']):
?>
						<p class="checkw"><input type="checkbox" name="attrvalue[<?php echo $this->_tpl_vars['key']; ?>
][]" value="<?php echo $this->_tpl_vars['key2']; ?>
" id="chk<?php echo $this->_tpl_vars['key2']; ?>
" <?php if ($this->_tpl_vars['_attr']['is_exist'] && $this->_tpl_vars['_attr']['is_exist'] == 1): ?>checked="checked"<?php endif; ?>> <label for="chk<?php echo $this->_tpl_vars['key2']; ?>
"><?php echo $this->_tpl_vars['_attr']['value']; ?>
</label></p>
						<?php endforeach; endif; unset($_from); ?>
					</span>
				</td>
			</tr>
			<?php endforeach; endif; unset($_from); ?>
		<?php else: ?>
			未找到属性信息
		<?php endif; ?>
		</tbody>
	</table>
	<div class="btns">
		<input type="submit" name="attrlistbtn" id="attrlistbtn" value="提交" onclick="addAttrValues(this);return false;" />
		<input type="button" name="cancel" id="cancel" value="取消" onclick="parent.$.colorbox.close();return false;" />
		<input type="hidden" name="isAttrValueSubmit" value="1" />
	</div>
</div>
</form>
<script type="text/javascript">
	window.onload = function(){
		//getAttrValue();
	}
</script>