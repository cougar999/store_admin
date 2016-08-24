<?php /* Smarty version 2.6.26, created on 2012-12-31 15:30:26
         compiled from category/catelist.html */ ?>
<div id="wrapper">
	<div id="content">
		<div class="clearfix">
			<h1>选择分类</h1>
		</div>
		<div class="datatable">
			<ul class="catelist">
				<?php $_from = $this->_tpl_vars['assign']['catelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
					<?php if ($this->_tpl_vars['item']['pid'] == -1): ?>
					<h2><span><input type="radio" name="cateid" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" id="chk<?php echo $this->_tpl_vars['item']['id']; ?>
" /><label for="chk<?php echo $this->_tpl_vars['item']['id']; ?>
" class="catename"><?php echo $this->_tpl_vars['item']['name']; ?>
</label></span></h2>
					<?php else: ?>
					<li title="<?php echo $this->_tpl_vars['item']['name']; ?>
">
						<input type="radio" name="cateid" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" id="chk<?php echo $this->_tpl_vars['item']['id']; ?>
" />
						<label for="chk<?php echo $this->_tpl_vars['item']['id']; ?>
" class="catename"><?php echo $this->_tpl_vars['item']['name']; ?>
</label>
					</li>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			</ul>
			<div class="cl"></div>
			<div class="btns clearfix">
				<input type="button" name="select_catevalue" id="select_catevalue" value="提交" onclick="node.selectCateValue(this);" class="fl" style="margin-right:5px;" />
				<input type="button" value="取消" onclick="parent.$.colorbox.close();" class="fl" />
				<div class="wariningState no fl"></div>
			</div>
		</div>
	</div>
</div>