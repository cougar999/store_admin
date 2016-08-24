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
<!--{foreach key=key item=items from=$assign.all_node}-->
	<!--{if $items.pid == -1}-->
	<tr id="node-<!--{$items.id}-->">
		<td>
			<span class="folder ui-draggable"><!--{$items.name}--></span>
			<!--{if $assign.session.admin_userid == DEFAULT_ADMIN_USER}-->
			<span><a href="/node?action=addAction&parentid=<!--{$items.id}-->"><img src="/resources/images/icon_add3.png" alt="添加子栏目" title="添加子栏目"></a></span>
			<span><a href="/node?action=modifyAction&id=<!--{$items.id}-->"><img src="/resources/images/icon_edit3.png" alt="编辑" title="编辑"></a></span>
			<!--{/if}-->
		</td>
	</tr>
	<!--{else}-->	
	<tr id="node-<!--{$items.id}-->" class="child-of-node-<!--{$items.pid}-->">
		<td>
		<!--{if $items.icon}-->
			<img class="node-folder" src="<!--{$items.icon}-->">
		<!--{/if}-->
			<a href="/node?action=listAction&parentid=<!--{$items.id}-->" class="tree-click <!--{if $smarty.get.parentid == $items.id}-->hover<!--{/if}-->" real_id="<!--{$items.id}-->"><!--{$items.name}--></a>
			<!--{if $assign.session.admin_userid == DEFAULT_ADMIN_USER}-->
			<span><a href="/node?action=modifyAction&id=<!--{$items.id}-->"><img src="/resources/images/icon_edit3.png" alt="编辑" title="编辑"></a></span>
			<!--{/if}-->
		</td>
	</tr>
	<!--{/if}-->
<!--{/foreach}-->
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