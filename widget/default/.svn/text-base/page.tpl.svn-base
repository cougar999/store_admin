<!--{paging page=$assign.page no=$smarty.get.pageno pagesize=$smarty.get.count ret='page'}-->
<!--{if $assign.page}-->
<div class="pagings">
<table width="100%" cellpadding="0" cellspacing="0" border="0"><tr>
	<td nowrap="nowrap" class="tc" id="pagenum" style="padding:20px 20px;">
			<!--{if $page.last > -1}-->
			共 <!--{$page.last}--> 页 
			<!--{else}-->
			共 <!--{$page.no}--> 页 
			<!--{/if}-->
			<!--{if $page.first > -1}-->
				<a href="?<!--{params pageno=$page.first}-->" class="firstpage"><span>第一页</span></a>
			<!--{else}-->
				<a onclick="return false;" class="firstpage2" disabled="disabled"><span>第一页</span></a>
			<!--{/if}-->
			<!--{if $page.prev > -1}-->
				<a href="?<!--{params pageno=$page.prev}-->" class="prevpage"><span>上一页</span></a>
			<!--{else}-->
				<a onclick="return false;" class="prevpage2" disabled="disabled"><span>上一页</span></a>
			<!--{/if}-->
			<!--{foreach key=key item=item from=$page.size}-->
				<!--{if $item == $page.no}-->
					<a href="?<!--{params pageno=$item}-->" class="active" disabled="disabled"><span><!--{$item}--></span></a>
				<!--{else}-->
					<a href="?<!--{params pageno=$item}-->"><span><!--{$item}--></span></a>
				<!--{/if}-->
			<!--{/foreach}-->
			<!--{if $page.next > -1}-->
				<a href="?<!--{params pageno=$page.next}-->" class="nextpage"><span>下一页</span></a>
			<!--{else}-->
				<a onclick="return false;" class="nextpage2" disabled="disabled"><span>下一页</span></a>
			<!--{/if}-->
			<!--{if $page.last > -1}-->
				<a href="?<!--{params pageno=$page.last}-->" class="lastpage"><span>最末页</span></a>
			<!--{else}-->
				<a onclick="return false;" class="lastpage2" disabled="disabled"><span>最末页</span></a>
			<!--{/if}-->
	</td>
</tr></table>
</div>
<!--{/if}-->