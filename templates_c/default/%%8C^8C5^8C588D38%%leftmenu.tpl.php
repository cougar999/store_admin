<?php /* Smarty version 2.6.26, created on 2013-01-17 10:22:16
         compiled from node/leftmenu.tpl */ ?>
<style>
#node_tree{line-height:24px;}
#node_tree a.hover{font-weight:bold;}
.node-folder{
	height:16px;
	width:16px;
	padding-right:5px;
}
</style>
<table id="node_tree">
<?php $_from = $this->_tpl_vars['assign']['all_node']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['items']):
?>
	<?php if ($this->_tpl_vars['items']['pid'] == -1): ?>
	<tr id="node-<?php echo $this->_tpl_vars['items']['id']; ?>
">
		<td>
			<span class="folder ui-draggable"><?php echo $this->_tpl_vars['items']['name']; ?>
</span>
			<?php if ($this->_tpl_vars['assign']['session']['admin_userid'] == DEFAULT_ADMIN_USER): ?>
			<span><a href="/node?action=addAction&parentid=<?php echo $this->_tpl_vars['items']['id']; ?>
"><img src="/resources/images/icon_add3.png" alt="添加子栏目" title="添加子栏目"></a></span>
			<span><a href="/node?action=modifyAction&id=<?php echo $this->_tpl_vars['items']['id']; ?>
"><img src="/resources/images/icon_edit3.png" alt="编辑" title="编辑"></a></span>
			<?php endif; ?>
		</td>
	</tr>
	<?php else: ?>	
	<tr id="node-<?php echo $this->_tpl_vars['items']['id']; ?>
" class="child-of-node-<?php echo $this->_tpl_vars['items']['pid']; ?>
">
		<td>
		<?php if ($this->_tpl_vars['items']['icon']): ?>
			<img class="node-folder" src="<?php echo $this->_tpl_vars['items']['icon']; ?>
">
		<?php endif; ?>
			<a href="/node?action=listAction&parentid=<?php echo $this->_tpl_vars['items']['id']; ?>
" class="tree-click <?php if ($_GET['parentid'] == $this->_tpl_vars['items']['id']): ?>hover<?php endif; ?>" real_id="<?php echo $this->_tpl_vars['items']['id']; ?>
"><?php echo $this->_tpl_vars['items']['name']; ?>
</a>
			<?php if ($this->_tpl_vars['assign']['session']['admin_userid'] == DEFAULT_ADMIN_USER): ?>
			<span><a href="/node?action=modifyAction&id=<?php echo $this->_tpl_vars['items']['id']; ?>
"><img src="/resources/images/icon_edit3.png" alt="编辑" title="编辑"></a></span>
			<?php endif; ?>
		</td>
	</tr>
	<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</table>
<script language="javascript">
$(function(){
	$("#node_tree").treeTable({
		//expandable: false
		initialState: "expanded",
		indent:19
	});
	$("#node_tree a.tree-click").click(function(){
		if($(this).hasClass("hover")){
			return false;
		}
		$("#node_tree a.tree-click").removeClass("hover");
		$(this).addClass("hover");
		var url = $(this).attr("href");
		var real_id = $(this).attr("real_id");
		$("#right_content").load(url);
		$("#btn_add_node").attr("href" , "/node?action=addAction&parentid=" + real_id).show();
		//$("#leftmenu").height($("#right_content").height());
		return false;
	});
});
</script>