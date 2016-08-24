<?php /* Smarty version 2.6.26, created on 2013-01-16 15:29:01
         compiled from node/catelog.html */ ?>
<link rel="stylesheet" type="text/css" href="/resources/js/jquery/treeTable/jquery.treeTable.css" />
<script type="text/javascript" src="/resources/js/jquery/treeTable/jquery.treeTable.js"></script>
<style>
#leftmenu{margin-left:10px;padding:10px;width:200px;float:left;}
#right_content{margin-left:230px;}
</style>
<div class="datatableHeader">
	<h1 class="fl intitle">发布管理<?php if ($this->_tpl_vars['assign']['title_name']): ?> > <?php echo $this->_tpl_vars['assign']['title_name']; ?>
<?php endif; ?></h1>
	<?php if ($this->_tpl_vars['assign']['all_node']): ?>
	<div class="ctrlbar fl">
		<select id="parent_id" style="margin:2px 0 0 10px;">
			<?php $_from = $this->_tpl_vars['assign']['all_node']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['node_info']):
?>
			<option value="<?php echo $this->_tpl_vars['node_info']['id']; ?>
"><?php echo $this->_tpl_vars['node_info']['name']; ?>
</option>
			<?php endforeach; endif; unset($_from); ?>
		</select>
	</div>
	<?php endif; ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'search_product.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div class="ctrlbar fr">
		<a class="v13-button-secondary fl" <?php if (( $this->_tpl_vars['assign']['session']['admin_userid'] != DEFAULT_ADMIN_USER ) && ( ! $_GET['parentid'] )): ?>style="display:none;"<?php endif; ?> id="btn_add_node" href="/node?action=addAction<?php if ($_GET['parentid'] > 0): ?>&parentid=<?php echo $_GET['parentid']; ?>
<?php endif; ?>">
			<span class="v13-icon-add"></span>添加内容
		</a>
		<a class="v13-button-secondary fl updateCacheAll" rel="node" href="/node?action=updateCacheAll">
			<span class="v13-icon-cache"></span>更新缓存
		</a>
	</div>
</div>
<div id="leftmenu"><img src="/resources/images/loader.gif"></div>
<div id="right_content"><img src="/resources/images/loader.gif"></div>
<script language="javascript">
	$("#leftmenu").load("/node?action=leftmenuAction&parentid="+GetQueryString('parentid'));
	if(GetQueryString('parentid') > 0){
		$("#right_content").load("/node?action=listAction&parentid=" + GetQueryString('parentid'));
	}else
		$("#right_content").html("<h1>发布栏目列表页，请选择左边的列表查看</h1>");
</script>