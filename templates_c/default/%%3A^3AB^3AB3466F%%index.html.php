<?php /* Smarty version 2.6.26, created on 2013-01-05 15:33:54
         compiled from order/index.html */ ?>
<!-- content start -->
	<div id="wrapper">
		<div id="content">
			<div class="datatable">
				<?php if ($this->_tpl_vars['assign']['page']['items']): ?>
				<div class="datatableHeader">
					<h1 class="fl intitle">订单管理</h1>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'search_product.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
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
							<!-- <col width="170" /> -->
							<col width="170" />
							<col width="170" />
							<col width="200" />
						</colgroup>
						<tbody>
							<tr class="title">
								<th class="tc">
									<input type="checkbox" name="selector" id="selector" />
								</th>
								<!-- <th class="tc">ID</th> -->
								<th class="tc">订单号</th>
								<th class="tc">商品数量</th>
								<th class="tc">商品总价</th>
								<th class="tc">折后价</th>
								<!-- <th class="tc">已优惠</th> -->
								<th class="tc">状态</th>
								<th class="tc">提交日期</th>
								<th class="tc">有效期</th>
								<th class="tc">操作</th>
							</tr>
							<?php if ($this->_tpl_vars['assign']['page']['items']): ?>
								<?php $_from = $this->_tpl_vars['assign']['page']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
								<tr>
									<td class="tc"><input type="checkbox" name="pcroduct" value="<?php echo $this->_tpl_vars['item']['id']; ?>
"/></td>
									<!-- <td class="tc">{$item.id}</td> -->
									<td><a href="/order?action=viewDetailAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['order_no']; ?>
</a></td>
									<td><?php echo $this->_tpl_vars['item']['product_num']; ?>
</td>
									<td><?php echo $this->_tpl_vars['item']['total_price']; ?>
</td>
									<td><?php echo $this->_tpl_vars['item']['total_payment']; ?>
</td>
									<!-- <td>{$item.discount}</td> -->
									<td class="tc"><?php echo $this->_tpl_vars['assign']['arr_order_status'][$this->_tpl_vars['item']['status']]; ?>
</td>
									<td><?php echo $this->_tpl_vars['item']['sub_time']; ?>
</td>
									<td><?php echo $this->_tpl_vars['item']['valid_time']; ?>
</td>
									<td class="tc">
										<a href="/order?action=viewDetailAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><img src="/resources/images/admin/visitors.gif" title="查看详情"/></a>
										<!-- <a href="#"><img src="/resources/images/admin/delete.gif" title="删除"/></a> -->
									</td>
								</tr>
								<?php endforeach; endif; unset($_from); ?>
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