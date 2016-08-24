<?php /* Smarty version 2.6.26, created on 2013-01-05 15:57:55
         compiled from order/view_detail.html */ ?>
<!-- content start -->
<div id="wrapper">
	<div id="content">
		<div class="datatable">
			<?php if ($this->_tpl_vars['assign']['detail_list']): ?>
			<div class="datatableHeader">
				<div class="fl headertext filter">
					<h1 class="fl intitle">订单详情</h1>
					<span style="font:18px verdana, sans-serif;font-weight:bold;margin-top:10px;float:left;">订单号：<?php echo $this->_tpl_vars['assign']['info']['order_no']; ?>
</span>
				</div>
			</div>
			
			<div id="TablePanel" class="datatablecontent">
				<table id="tableviewer" width="100%" border="0">
					<colgroup>
						<col width="60" />
						<!-- <col width="80" /> -->
						<col width="auto" />
						<col width="auto" />
						<col width="auto" />
						<col width="auto" />
						<col width="170" />
						<col width="170" />
						<col width="170" />
					</colgroup>
					<tbody>
						<tr class="title">
							<th class="tc">
								<input type="checkbox" name="selector" id="selector" />
							</th>
							<!-- <th class="tc">ID</th> -->
							<th class="tc">商品ID</th>
							<th class="tc">商品名称</th>
							<th class="tc">商品单价</th>
							<th class="tc">商品现价</th>
							<th class="tc">购买数量</th>
							<th class="tc">状态</th>
							<th class="tc">创建时间</th>
						</tr>
						<?php if ($this->_tpl_vars['assign']['detail_list']): ?>
							<?php $_from = $this->_tpl_vars['assign']['detail_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
							<tr>
								<td class="tc"><input type="checkbox" name="pcroduct" value="<?php echo $this->_tpl_vars['item']['product_id']; ?>
"/></td>
								<td class="tc"><?php echo $this->_tpl_vars['item']['product_id']; ?>
</td>
								<td><a href="/product?action=modifyAction&id=<?php echo $this->_tpl_vars['item']['product_id']; ?>
"><?php echo $this->_tpl_vars['item']['product_name']; ?>
</a><?php if ($this->_tpl_vars['item']['product_desc']): ?>&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;">(<?php echo $this->_tpl_vars['item']['product_desc']; ?>
)</span><?php endif; ?></td>
								<td class="tc"><?php echo $this->_tpl_vars['item']['product_price']; ?>
</td>
								<td class="tc"><?php echo $this->_tpl_vars['item']['product_cprice']; ?>
</td>
								<td class="tc"><?php echo $this->_tpl_vars['item']['buy_num']; ?>
</td>
								<td class="tc"><?php echo $this->_tpl_vars['assign']['arr_order_status'][$this->_tpl_vars['item']['status']]; ?>
</td>
								<td><?php echo $this->_tpl_vars['item']['create_time']; ?>
</td>
							</tr>
							<?php endforeach; endif; unset($_from); ?>
							<tr>
								<th colspan="3" style="height:40px;">合计</th>
								<th class="tc"><?php echo $this->_tpl_vars['assign']['info']['total_price']; ?>
</th>
								<th class="tc"><?php echo $this->_tpl_vars['assign']['info']['total_payment']; ?>
</th>
								<th class="tc"><?php echo $this->_tpl_vars['assign']['info']['product_num']; ?>
</th>
								<th class="tc"><?php echo $this->_tpl_vars['assign']['arr_order_status'][$this->_tpl_vars['assign']['info']['status']]; ?>
</th>
								<th class="tc"><?php echo $this->_tpl_vars['assign']['info']['create_time']; ?>
</th>
							</tr>
						<?php else: ?>
							<tr>
								<td colspan="9" class="tc">未找到内容</td>
							</tr>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
			<div id="page">
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'page.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</div>
			<?php else: ?>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'empty_warning.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php endif; ?>
			
		</div>
	</div>
</div>
<!-- content end -->