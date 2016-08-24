<!-- content start -->
<div id="wrapper">
	<div id="content">
		<!--{if $assign.page.items}-->
		<div class="clearfix">
			<h1 class="fl">分类列表
			<!--{foreach key=key item=item from=$assign.pageTitle}-->
			&nbsp;&nbsp;>&nbsp;&nbsp;<a href="/category?parentid=<!--{$item.id}-->"><!--{$item.name}--></a>
			<!--{/foreach}-->
			<!--{if $assign.page.name}-->
			&nbsp;&nbsp;>&nbsp;&nbsp;<!--{$assign.page.name}-->
			<!--{/if}-->
			</h1>
		</div>
		<br />
		<div id="TablePanel" class="datatablecontent">
			<div class="datatableHeader">
				<!--{include file='search_product.tpl'}-->
			</div>
			<table id="tableviewer" width="100%" border="0">
				<colgroup>
					<col width="60" />
					<col width="80" />
					<col width="100" />
					<col width="auto" />
					<col width="auto" />
					<col width="100" />
					<col width="80" />
					<col width="300" />
					<col width="100" />
				</colgroup>
				<tbody>
					<tr class="title">
						<th class="tc">
							<input type="checkbox" name="selector" id="selector" />
						</th>
						<th class="tc">ID</th>
						<th>默认图片</th>
						<th class="tc">名称</th>
						<th>描述</th>
						<th class="tc">状态</th>
						<th class="tc">库存</th>
						<th>价格</th>
						<th>操作</th>
					</tr>
					<!--{foreach key=key item=item from=$assign.page.items}-->
					<tr>
						<td class="tc"><input type="checkbox" name="product" value="<!--{$item.id}-->"/></td>
						<td class="tc"><!--{if $item.id }--><!--{$item.id}--><!--{else}-->未知<!--{/if}--></td>
						<td><img src="<!--{$item.default_image|default:"/resources/images/no-image.gif"}-->" style="width:auto;height:50px;"></td>
						<td><a href="/product?action=modifyAction&id=<!--{$item.id}-->"><!--{$item.name}--></a></td>
						<td><!--{$item.description|truncate_utf8_string:50}--></td>
						<td class="tc"><!--{if $item.status && $item.status == 1}--><a href="javascript:void(0);" onclick="changeStatus(<!--{$item.id}-->, 1,'product', this)">上线</a><!--{else}--><a href="javascript:void(0);" onclick="changeStatus(<!--{$item.id}-->, 0,'product', this)">下线</a><!--{/if}--></td>
						<td class="tc"><!--{$item.stock}--></td>
						<td>
							<!--{if $item.original_price_name}-->
								<!--{$item.original_price_name}-->：<!--{$item.original_price}--><br>
							<!--{/if}-->
							<!--{if $item.use_price_name}-->
								<!--{$item.use_price_name}-->：<!--{$item.use_price}--><br>
							<!--{/if}-->
							<!--{if $item.dicount_price_name}-->
								<!--{$item.dicount_price_name}-->：<!--{$item.dicount_price}-->
							<!--{/if}-->	
						</td>
						<td>
							<a href="/product?action=modifyAction&id=<!--{$item.id}-->"><img src="/resources/images/admin/edit.gif" alt="编辑" title="编辑"/></a>
							<a href="/product?action=delAction&id=<!--{$item.id}-->" onclick="if(!confirm('确认删除商品“<!--{$item.name}-->?”'))return false;"><img src="/resources/images/admin/delete.gif" title="删除"/></a>
							<a href="/product?action=setMemoryData&id=<!--{$item.id}-->" title="<!--{$item.name}-->" class="update_cache"><img src="/resources/images/admin/quick.gif" title="更新缓存"/></a>
						</td>
					</tr>
					<!--{/foreach}-->
				</tbody>
			</table>
		</div>
		<div id="page">
			<!--{include file='page.tpl'}-->
		</div>
		<!--{else}-->
			<!--{include file='empty_warning.tpl'}-->
		<!--{/if}-->
	</div>
</div>
<!-- content end -->