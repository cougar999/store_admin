<form method="get" action="/search">
<div class="fl headertext filter">
	<div class="fl search">
		<input type="text" value="" name="name" id="search_name" class="fl mr6" />
		<select name="" id="searchValue" onchange="searchValueChange(this);" class="fl mr6">
		
		<!--{if $assign.controller == 'AdminProduct' || $smarty.get.table == 'product'}-->
		
			<option value="name">名称</option>
			<option value="title">副标题</option>
			<option value="description">描述</option>
			<option value="id">商品ID</option>
			<option value="pack_list">包装清单</option>
			<option value="service">服务介绍</option>
		
		<!--{elseif $assign.controller == 'AdminShop' || $smarty.get.table == 'shop'}-->
		
			<option value="name" selected="selected">名称</option>
			<option value="id">店面ID</option>
			<option value="contact">联系人</option>
			<option value="phone_no">联系电话</option>
			<option value="cell_phone">手机号</option>
			<option value="areaSelect">按地区</option>
			
		<!--{elseif $assign.controller == 'AdminCategory' || $smarty.get.table == 'product_category'}-->
		
			<option value="name" selected="selected">名称</option>
			<option value="id">分类ID</option>
			<option value="pid">父层ID</option>
			<option value="description">描述</option>
			
		<!--{elseif $assign.controller == 'AdminAttribute' || $smarty.get.table == 'product_attribute'}-->
		
			<option value="name" selected="selected">名称</option>
			<option value="id">属性ID</option>
			
		<!--{elseif $assign.controller == 'AdminNode' || $smarty.get.table == 'b_node_publish'}-->
		
			<option value="name" selected="selected">名称</option>
			<option value="id">节点ID</option>
			<option value="desc">节点描述</option>
			
		<!--{elseif $assign.controller == 'AdminPromote' || $smarty.get.table == 'pm_promote'}-->
		
			<option value="title" selected="selected">标题</option>
			<option value="description">描述</option>
			<option value="content">活动内容</option>
			<option value="areaSelect">按地区</option>
			<!-- <option value="prov_id">省份</option>
			<option value="city_id">城市</option>
			 -->
			
		<!--{elseif $assign.controller == 'AdminOrder' || $smarty.get.table == 'order'}-->
		
			<option value="order_no" selected="selected">订单号</option>
			<!-- <option value="total_price">商品总价</option>
			<option value="sub_time">提交日期</option>
			<option value="valid_time">订单有效期</option>
			<option value="bargain_time">成交时间</option> -->
			
		<!--{/if}-->
		</select>
		
		<!--{if $assign.area}-->
		<div class="fl no" id="areabox">
			<select name="<!--{if $assign.controller == 'AdminPromote' || $smarty.get.table == 'pm_promote'}-->prov_id<!--{else}-->province_id<!--{/if}-->" onchange="selectCitylist(this);" id="areaSearcg" class="mr6">
				<option value="">--请选择省份--</option>
				<!--{foreach key=key item=item from=$assign.area}-->
				<!--{if $item.pid == -1 }-->
				<option value="<!--{$item.id}-->"><!--{$item.name}--></option>
				<!--{/if}-->
				<!--{/foreach}-->
			</select>
			<select name="city_id" id="city_id" class="mr6"></select>
		</div>
		<!--{/if}-->
		
		<input type="submit" value="搜索" class="fl mr6" />
		
		<!--{if $assign.controller == 'AdminProduct' || $smarty.get.table == 'product'}-->
		
			<input type="hidden" name="table" value="product" />
			<input type="hidden" name="view_tpl" value="product" />
			
		<!--{elseif $assign.controller == 'AdminShop' || $smarty.get.table == 'shop'}-->
		
			<input type="hidden" name="table" value="shop" />
			<input type="hidden" name="view_tpl" value="shop" />
			
		<!--{elseif $assign.controller == 'AdminCategory' || $smarty.get.table == 'product_category'}-->
		
			<input type="hidden" name="table" value="product_category" />
			<input type="hidden" name="view_tpl" value="category" />
			
		<!--{elseif $assign.controller == 'AdminAttribute' || $smarty.get.table == 'product_attribute'}-->
		
			<input type="hidden" name="table" value="product_attribute" />
			<input type="hidden" name="view_tpl" value="attribute" />
			
		<!--{elseif $assign.controller == 'AdminNode' || $smarty.get.table == 'b_node_publish'}-->
		
			<input type="hidden" name="table" value="b_node_publish" />
			<input type="hidden" name="view_tpl" value="node" />
			
		<!--{elseif $assign.controller == 'AdminPromote' || $smarty.get.table == 'pm_promote'}-->
		
			<input type="hidden" name="table" value="pm_promote" />
			<input type="hidden" name="view_tpl" value="promote" />
			
		<!--{elseif $assign.controller == 'AdminOrder' || $smarty.get.table == 'order'}-->
		
			<input type="hidden" name="table" value="order" />
			<input type="hidden" name="view_tpl" value="order" />
			
		<!--{/if}-->
		
		</div>
	</div>
	
	<!--{if ($assign.controller != 'AdminAttribute' && $assign.controller != 'AdminOrder')}-->
	<div class="headertext ">
		<div class="fl" style="margin-top:3px;">
		过滤：
			<select name="status" onchange="submit();">
				<option value="">请选择</option>
				<option value="1"<!--{if isset($smarty.get.status) && ($smarty.get.status == 1)}--> selected="selected"<!--{/if}-->>上线</option>
				<option value="0"<!--{if isset($smarty.get.status) && ($smarty.get.status != '') && ($smarty.get.status == 0)}--> selected="selected"<!--{/if}-->>下线</option>
			</select>
		</div>
	</div>
	<!--{/if}-->
</form>
<script type="text/javascript">
searchValueChange();
</script>