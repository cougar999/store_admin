<ul>
	<!--{if $assign.page.total_count > 0}-->
	<!--{foreach key=key item=items from=$assign.page.items}-->
	<li><span><!--{$key+1}-->.</span><span title="<!--{$items.user_id}-->"><!--{$items.nickname}-->：</span><!--{$items.content}--></li>
	<!--{/foreach}-->
	<!--{if $assign.page.total_count > 10}-->
	<li><span class="more"><a href="#">更多</a></li>
	<!--{/if}-->
	<!--{else}-->
	无
	<!--{/if}-->
</ul>