<?php /* Smarty version 2.6.26, created on 2013-01-05 15:29:35
         compiled from search_product.tpl */ ?>
<form method="get" action="/search">
<div class="fl headertext filter">
	<div class="fl search">
		<input type="text" value="" name="name" id="search_name" class="fl mr6" />
		<select name="" id="searchValue" onchange="searchValueChange(this);" class="fl mr6">
		
		<?php if ($this->_tpl_vars['assign']['controller'] == 'AdminProduct' || $_GET['table'] == 'product'): ?>
		
			<option value="name">名称</option>
			<option value="title">副标题</option>
			<option value="description">描述</option>
			<option value="id">商品ID</option>
			<option value="pack_list">包装清单</option>
			<option value="service">服务介绍</option>
		
		<?php elseif ($this->_tpl_vars['assign']['controller'] == 'AdminShop' || $_GET['table'] == 'shop'): ?>
		
			<option value="name" selected="selected">名称</option>
			<option value="id">店面ID</option>
			<option value="contact">联系人</option>
			<option value="phone_no">联系电话</option>
			<option value="cell_phone">手机号</option>
			<option value="areaSelect">按地区</option>
			
		<?php elseif ($this->_tpl_vars['assign']['controller'] == 'AdminCategory' || $_GET['table'] == 'product_category'): ?>
		
			<option value="name" selected="selected">名称</option>
			<option value="id">分类ID</option>
			<option value="pid">父层ID</option>
			<option value="description">描述</option>
			
		<?php elseif ($this->_tpl_vars['assign']['controller'] == 'AdminAttribute' || $_GET['table'] == 'product_attribute'): ?>
		
			<option value="name" selected="selected">名称</option>
			<option value="id">属性ID</option>
			
		<?php elseif ($this->_tpl_vars['assign']['controller'] == 'AdminNode' || $_GET['table'] == 'b_node_publish'): ?>
		
			<option value="name" selected="selected">名称</option>
			<option value="id">节点ID</option>
			<option value="desc">节点描述</option>
			
		<?php elseif ($this->_tpl_vars['assign']['controller'] == 'AdminPromote' || $_GET['table'] == 'pm_promote'): ?>
		
			<option value="title" selected="selected">标题</option>
			<option value="description">描述</option>
			<option value="content">活动内容</option>
			<option value="areaSelect">按地区</option>
			<!-- <option value="prov_id">省份</option>
			<option value="city_id">城市</option>
			 -->
			
		<?php elseif ($this->_tpl_vars['assign']['controller'] == 'AdminOrder' || $_GET['table'] == 'order'): ?>
		
			<option value="order_no" selected="selected">订单号</option>
			<!-- <option value="total_price">商品总价</option>
			<option value="sub_time">提交日期</option>
			<option value="valid_time">订单有效期</option>
			<option value="bargain_time">成交时间</option> -->
			
		<?php endif; ?>
		</select>
		
		<?php if ($this->_tpl_vars['assign']['area']): ?>
		<div class="fl no" id="areabox">
			<select name="<?php if ($this->_tpl_vars['assign']['controller'] == 'AdminPromote' || $_GET['table'] == 'pm_promote'): ?>prov_id<?php else: ?>province_id<?php endif; ?>" onchange="selectCitylist(this);" id="areaSearcg" class="mr6">
				<option value="">--请选择省份--</option>
				<?php $_from = $this->_tpl_vars['assign']['area']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
				<?php if ($this->_tpl_vars['item']['pid'] == -1): ?>
				<option value="<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			</select>
			<select name="city_id" id="city_id" class="mr6"></select>
		</div>
		<?php endif; ?>
		
		<input type="submit" value="搜索" class="fl mr6" />
		
		<?php if ($this->_tpl_vars['assign']['controller'] == 'AdminProduct' || $_GET['table'] == 'product'): ?>
		
			<input type="hidden" name="table" value="product" />
			<input type="hidden" name="view_tpl" value="product" />
			
		<?php elseif ($this->_tpl_vars['assign']['controller'] == 'AdminShop' || $_GET['table'] == 'shop'): ?>
		
			<input type="hidden" name="table" value="shop" />
			<input type="hidden" name="view_tpl" value="shop" />
			
		<?php elseif ($this->_tpl_vars['assign']['controller'] == 'AdminCategory' || $_GET['table'] == 'product_category'): ?>
		
			<input type="hidden" name="table" value="product_category" />
			<input type="hidden" name="view_tpl" value="category" />
			
		<?php elseif ($this->_tpl_vars['assign']['controller'] == 'AdminAttribute' || $_GET['table'] == 'product_attribute'): ?>
		
			<input type="hidden" name="table" value="product_attribute" />
			<input type="hidden" name="view_tpl" value="attribute" />
			
		<?php elseif ($this->_tpl_vars['assign']['controller'] == 'AdminNode' || $_GET['table'] == 'b_node_publish'): ?>
		
			<input type="hidden" name="table" value="b_node_publish" />
			<input type="hidden" name="view_tpl" value="node" />
			
		<?php elseif ($this->_tpl_vars['assign']['controller'] == 'AdminPromote' || $_GET['table'] == 'pm_promote'): ?>
		
			<input type="hidden" name="table" value="pm_promote" />
			<input type="hidden" name="view_tpl" value="promote" />
			
		<?php elseif ($this->_tpl_vars['assign']['controller'] == 'AdminOrder' || $_GET['table'] == 'order'): ?>
		
			<input type="hidden" name="table" value="order" />
			<input type="hidden" name="view_tpl" value="order" />
			
		<?php endif; ?>
		
		</div>
	</div>
	
	<?php if (( $this->_tpl_vars['assign']['controller'] != 'AdminAttribute' && $this->_tpl_vars['assign']['controller'] != 'AdminOrder' )): ?>
	<div class="headertext ">
		<div class="fl" style="margin-top:3px;">
		过滤：
			<select name="status" onchange="submit();">
				<option value="">请选择</option>
				<option value="1"<?php if (isset ( $_GET['status'] ) && ( $_GET['status'] == 1 )): ?> selected="selected"<?php endif; ?>>上线</option>
				<option value="0"<?php if (isset ( $_GET['status'] ) && ( $_GET['status'] != '' ) && ( $_GET['status'] == 0 )): ?> selected="selected"<?php endif; ?>>下线</option>
			</select>
		</div>
	</div>
	<?php endif; ?>
</form>
<script type="text/javascript">
searchValueChange();
</script>