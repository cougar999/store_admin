<?php /* Smarty version 2.6.26, created on 2013-01-04 11:23:26
         compiled from static.tpl */ ?>
	<link rel="stylesheet" type="text/css" href="/resources/css/layout.css" />
	<link rel="stylesheet" type="text/css" href="/resources/css/others.css" />
	<link rel="stylesheet" type="text/css" href="/resources/lib/colorbox/colorbox.css" />
	<script type="text/javascript" src="/resources/js/jquery/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/resources/lib/colorbox/jquery.colorbox-min.js"></script>
	<script type="text/javascript" src="/resources/js/common.js"></script>
	<script type="text/javascript" src="/resources/js/admin.js"></script>
	<script type="text/javascript" src="/resources/js/trigger.js"></script>
	<script type="text/javascript" src="/resources/js/json2.min.js"></script>
	
	<script type="text/javascript" src="/resources/lib/kindeditor/kindeditor-min.js"></script>
	<script type="text/javascript" src="/resources/lib/kindeditor/lang/zh_CN.js"></script>
<?php if ($this->_tpl_vars['assign']['controller'] == 'Login'): ?>
	<link href="/resources/css/login.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="/resources/js/login.js"></script>
	<script type="text/javascript" src="/resources/js/jquery/ui/jquery.ui.widget.min.js"></script>
	<script type="text/javascript" src="/resources/js/jquery/ui/jquery.effects.core.min.js"></script>
	<script type="text/javascript" src="/resources/js/jquery/ui/jquery.effects.shake.min.js"></script>
	<script type="text/javascript" src="/resources/js/jquery/ui/jquery.effects.slide.min.js"></script>
<?php endif; ?>
<?php if ($this->_tpl_vars['assign']['controller'] == 'AdminCoupon' || "　".($this->_tpl_vars['assign']).".controller" == 'AdminPromote'): ?>
	<script type="text/javascript" src="/resources/js/jquery/ui/jquery.ui.core.min.js"></script>
	<script type="text/javascript" src="/resources/js/jquery/ui/jquery.ui.datepicker.min.js"></script>
	<script type="text/javascript" src="/resources/js/jquery/ui/jquery.ui.datepicker-zh-CN.js"></script>
	<link href="/resources/js/jquery/ui/themes/ui-lightness/jquery.ui.datepicker.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/resources/js/jquery/ui/themes/ui-lightness/jquery.ui.theme.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/resources/js/jquery/ui/themes/ui-lightness/jquery.ui.core.css" rel="stylesheet" type="text/css" media="all" />
<?php endif; ?>
<?php if ($this->_tpl_vars['assign']['controller'] == 'AdminNode' || $this->_tpl_vars['assign']['controller'] == 'AdminCategory' || $this->_tpl_vars['assign']['controller'] == 'AdminProduct' || $this->_tpl_vars['assign']['controller'] == 'AdminSearch'): ?>
	<script type="text/javascript" src="/resources/js/node.js"></script>
<?php endif; ?>