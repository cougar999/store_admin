<!-- header start -->
<div id="header">
	<div id="logo">
		<a href="/">返回首页</a>
	</div>
	<div id="mainmenu">
		<ul id="AdminMenuMain" class="adminMenuItems">
			<li id="attribute_orders">
				<span onclick="getLinkAdmin('node');return false;">发布</span>
				<div class="SubMenuWrapper">
					<ul>
						<li class="subnav"><a title="发布列表" href="/node" onclick="getLinkAdmin('node');return false;">发布列表</a></li>
						<!-- <li class="subnav"><a title="添加节点" href="/node?action=addAction">添加发布内容</a></li> -->
					</ul>
				</div>
			</li>
			<li id="product_orders">
				<span onclick="getLinkAdmin('product');return false;">商品</span>
				<div class="SubMenuWrapper">
					<ul>
						<li class="subnav"><a title="商品列表" href="/product" onclick="getLinkAdmin('product');return false;">商品列表</a></li>
						<li class="subnav"><a title="添加商品" href="/product?action=addAction<!--{if $smarty.get.parentid > 0}-->&parentid=<!--{$smarty.get.parentid|default:-1}--><!--{/if}-->">添加商品</a></li>
					</ul>
				</div>
			</li>
			<li id="category_orders">
				<span onclick="getLinkAdmin('category');return false;">分类</span>
				<div class="SubMenuWrapper">
					<ul>
						<li class="subnav"><a title="分类列表" href="/category" onclick="getLinkAdmin('category');return false;">分类列表</a></li>
						<li class="subnav"><a title="添加分类" href="/category?action=addAction<!--{if $smarty.get.parentid > 0}-->&parentid=<!--{$smarty.get.parentid|default:-1}--><!--{/if}-->">添加分类</a></li>
					</ul>
				</div>
			</li>
			<li id="attribute_orders">
				<span onclick="getLinkAdmin('attribute');return false;">属性</span>
				<div class="SubMenuWrapper">
					<ul>
						<li class="subnav"><a title="属性列表" href="/attribute" onclick="getLinkAdmin('attribute');return false;">属性列表</a></li>
						<li class="subnav"><a title="添加属性" href="/attribute?action=addAction">添加属性</a></li>
					</ul>
				</div>
			</li>
			<li id="">
				<span onclick="getLinkAdmin('promote');return false;">促销</span>
				<div class="SubMenuWrapper">
					<ul>
						<li class="subnav"><a title="促销列表" href="/promote" onclick="getLinkAdmin('promote');return false;">促销列表</a></li>
						<li class="subnav"><a title="添加促销活动" href="/promote?action=addAction">添加促销活动</a></li>
					</ul>
				</div>
			</li>
			<li id="">
				<span onclick="getLinkAdmin('shop');return false;">店面</span>
				<div class="SubMenuWrapper">
					<ul>
						<li class="subnav"><a title="店面列表" href="/shop" onclick="getLinkAdmin('shop');return false;">店面列表</a></li>
						<li class="subnav"><a title="添加店面" href="/shop?action=addAction">添加店面</a></li>
					</ul>
				</div>
			</li>
			<li id="">
				<span onclick="getLinkAdmin('order');return false;">订单</span>
				<div class="SubMenuWrapper">
					<ul>
						<li class="subnav"><a title="订单列表" href="/order" onclick="getLinkAdmin('order');return false;">订单列表</a></li>
					</ul>
				</div>
			</li>
			<!--<li id="">
				<span onclick="getLinkAdmin('user');return false;">用户</span>
				<div class="SubMenuWrapper">
					<ul>
						<li class="subnav"><a title="用户" href="/user" onclick="getLinkAdmin('user');return false;">管理</a></li>
					</ul>
				</div>
			</li>-->
			<li id="">
				<span onclick="getLinkAdmin('question');return false;">问答</span>
				<div class="SubMenuWrapper">
					<ul>
						<li class="subnav"><a title="问答" href="/question">问答列表</a></li>
					</ul>
				</div>
			</li>
			<li id="">
				<span onclick="getLinkAdmin('statistic');return false;">统计</span>
				<div class="SubMenuWrapper">
					<ul>
						<li class="subnav"><a title="统计" href="/statistic">统计</a></li>
					</ul>
				</div>
			</li>
		</ul>
	</div>
	<div id="AdminHeaderTools">
		<!--{if $assign.session.admin_userid == DEFAULT_ADMIN_USER}-->
		<ul>
			<li>
				<span>
					<select id="change_chncode">
						<!--{foreach key=key item=value from=$assign.arr_chncode}-->
							<option value="<!--{$key}-->" <!--{if $key == $assign.session.chncode}-->selected="selected"<!--{/if}-->><!--{$value}--></option>
						<!--{/foreach}-->
					</select>
				</span>
			</li>
		</ul>
		<script language="javascript">
		$(function(){
			$("#change_chncode").live("change",function(){
				var chncode = $(this).val();
				$.post("/user",{action:"changeChncode",chncode:chncode} , function(data){
					if(data){
						window.location.href = window.location.href;	
					}else{
						alert('您无权选择！');
						return false;
					}
				});
			});
		})
		</script>
		<!--{/if}-->
		<ul id="AdminStorefrontMenu" class="adminMenuItems">
			<li id="Assist_menu">
				<span>管理</span>
				<div class="SubMenuWrapper">
					<ul>
						<li class="subnav"><a title="角色管理" href="/role" onclick="getLinkAdmin('role');return false;">角色管理</a></li>
						<li class="subnav"><a title="账户管理" href="/user" onclick="getLinkAdmin('user');return false;">账户管理</a></li>
					</ul>
				</div>
			</li>
		</ul>
		<ul id="AdminCurrentUserMenu" class="adminMenuItems">
			<li id="MainNav_CurrentUser">
				<span>[&nbsp;<font style="font-weight:800;"><!--{$assign.session.admin_username}--></font>&nbsp;]&nbsp;信息菜单</span>
				<div class="SubMenuWrapper">
					<ul>
						<!-- <li id="ToolsNav_MyVolusion">
							<span class="subnav ToolText" id="ToolsNav_MyVolusionLink">
							<a href="javascript:void(0);" target="_blank">我的信息</a></span>
						</li> -->
						<li id="ToolsNav_Logout">
							<span class="subnav ToolText" id="ToolsNav_LogoutLink"><a href="?logout">安全退出</a></span>
						</li>
					</ul>
				</div>
			</li>
		</ul>
	</div>
</div>
<!-- header end -->