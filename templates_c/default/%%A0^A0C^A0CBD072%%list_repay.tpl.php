<?php /* Smarty version 2.6.26, created on 2013-01-10 15:40:00
         compiled from question/list_repay.tpl */ ?>
<ul>
	<?php if ($this->_tpl_vars['assign']['page']['total_count'] > 0): ?>
	<?php $_from = $this->_tpl_vars['assign']['page']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['items']):
?>
	<li><span><?php echo $this->_tpl_vars['key']+1; ?>
.</span><span title="<?php echo $this->_tpl_vars['items']['user_id']; ?>
"><?php echo $this->_tpl_vars['items']['nickname']; ?>
：</span><?php echo $this->_tpl_vars['items']['content']; ?>
</li>
	<?php endforeach; endif; unset($_from); ?>
	<?php if ($this->_tpl_vars['assign']['page']['total_count'] > 10): ?>
	<li><span class="more"><a href="#">更多</a></li>
	<?php endif; ?>
	<?php else: ?>
	无
	<?php endif; ?>
</ul>