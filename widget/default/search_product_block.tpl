<div class="fl search">
	<form method="get" action="/search">
		<input type="text" value="" name="name" id="search_name"/>
		<select name="" id="searchValue" onchange="searchValueChange();">
			<option value="name" selected="selected">名称</option>
			<option value="title">副标题</option>
			<option value="description">描述</option>
			<option value="id">商品ID</option>
			<option value="pack_list">包装清单</option>
			<option value="service">服务介绍</option>
			<option value="status">上下线</option>
		</select>
		<input type="submit" value="搜索" />
		<input type="hidden" name="table" value="product" />
		<input type="hidden" name="view_tpl" value="product" />
		<input type="hidden" name="view_page" value="product_list.html" />
		<input type="hidden" name="view_layout" value="layout_block.html" />
		<input type="hidden" name="status" value="1" />
	</form>
</div>
<script type="text/javascript">
function searchValueChange() {
	var v = $("#searchValue").find('option:selected').val();
	$('#search_name').attr('name',v);
};
searchValueChange();
</script>