/**
 * 用于后台表现形式等的js文件，如弹出菜单，弹出窗口等
 */
$(document).ready(function(){
	//菜单弹出
	$("#AdminMenuMain > li, #AdminCurrentUserMenu > li, #AdminStorefrontMenu > li").hover(
        function () {
            /*Handles mouse over*/
            $(this).addClass("hover");
        },
        function () {
            /*Handles mouse leave*/
            $(this).removeClass("hover");
        }
    ).click(function() {
        var $this = $(this);
        if (!$this.hasClass("hover")) $this.addClass("hover");
    });
	
	$(".SubMenuWrapper li").not(".endspacer").mouseover(function () {
        $(".SubMenuWrapper li.hover").removeClass("hover");
        $(this).addClass("hover");
    });
	
	//复选框
	$('input#selector').live('click', function(){
		if (this.checked) {
			if (this.value && this.value != 'on') {
				$(this.value).find('input:not(:checked)').each(function(){
					if (!this.disabled)
						this.checked = true; 
				});
			} else {
				$(this).closest('tbody').find('tr input:not(:checked)').each(function(){
					//$(this).closest('tbody').find('tr input:not(:checked)').closest('tr').addClass('onthisline');
					if (!this.disabled)
						this.checked = true; 
				}); 
			}
		} else {
			if (this.value && this.value != 'on') {
				$(this.value).find('input:checked').each(function(){
					if (!this.disabled)
						this.checked = false; 
				});
			} else {
				$(this).closest('tbody').find('tr input:checked').each(function(){ 
					//$(this).closest('tbody').find('tr input:not(:checked)').closest('tr').removeClass('onthisline');
					if (!this.disabled)
					this.checked = false; 
				});
			}
		}
	});
	
	//下拉菜单
	var $mainButton = $('.v13-menubutton-main');
	var $menuTrigger = $('.v13-menubutton-menutrigger');
	var $menu = $('.v13-menubutton-menu').children('ul');
	var $menuItems = $menu.children();
	
	var showMenu = function(me){
		//var me = $(this);
		$menu.css('left', -$mainButton.outerWidth());
		$(me).parent().find($menu).fadeIn(200, function () {
			$(document).bind("click", hidemenuTrigger );
	    });
		$menuTrigger.addClass('v13-active');
	};
	
	var hideMenu = function(){
		//var me = $(this);
		$menu.fadeOut(200, function () {
			$(document).unbind("click", hidemenuTrigger );
	    });
		$menuTrigger.removeClass('v13-active');
	};
	
	$menuTrigger.click(function(){
		var me = $(this);
		showMenu(me);
	});
	
	var hidemenuTrigger = function(){
		if ($menuTrigger.hasClass('v13-active')) {
			hideMenu();
		}
	}
	
	//菜单当前状态
	$("#AdminMenuMain li li a").each(function(){
		var url = window.location.href;
		var pos = url.indexOf('.com');
		var shorturl = url.slice(pos+5);
		if (shorturl.indexOf('?') > -1) {
			var ele = shorturl.substring(shorturl.indexOf('?'),-1);
		}
		if((this.href.indexOf(url) > -1 || this.href.indexOf(ele) > -1) && shorturl != '') {
			$(this).closest("ul").closest("li").addClass("selected");
		}
	});
	
	//弹出框触发
	$("#deleteBtn").bind("click", function(){
		if ($('#tableviewer input:checked').length == 0) {
			cbMessage('没有找到要删除的内容');
			return false;
		}
		cbConfirm('您确定要删除所选内容吗？',function(){
			alert("删除成功！");
			$.colorbox.close();
		}, function(){
			alert("取消操作！");
			$.colorbox.close();
		}, null, '删除后，这些内容不可恢复。');
	});
	
	//添加页展开按钮
	$(".slideTrigger").click(function(){
		$(this).parent().next('.pdcontent').slideToggle('500');
	});
	
	//上传图片按钮
	$("#uploadbtn").click(function(){
		var product_id = GetQueryString("id");
		var locate_type = $("#locate_type").val() || 1;
		var type = $("#type").val() || 1;
		var product_attribute_id = $("#product_attribute_id").val() || '';
		var description = $("#description").val() || '';
		var order = $("#order").val() || 1;
		var name = $("#name").val() || '' ;
		var url = $("#default_image").val() || '' ;
		
		$.colorbox({
			href:'/upload_file.html?action=UploadimgAction&product_id=' + product_id +'&locate_type=' + locate_type + '&type=' + type +'&product_attribute_id='+ product_attribute_id +'&description='+description+'&order='+order+'&name='+name+'&url='+url,
			iframe:true, width:'60%', height:'200px', close:'关闭', overlayClose:true, opacity:0.5
		});
		return false;
	});
	
	$("#getComblistbtn").click(function(){
		var product_id = GetQueryString("id");
		$.colorbox({
			href:'/product/comblist.html?action=getCombbyAjax&product_id=' + product_id,
			iframe:true, width:'60%', height:'80%', close:'关闭', overlayClose:true, opacity:0.5
		});
		return false;
	});
	
	
	
	$("#addCoupon").click(function(){
		var prom_id = GetQueryString("id");
		$.colorbox({
			href:'/coupon/add.html?action=addAction&id=' + prom_id,
			iframe:true, width:'60%', height:'80%', close:'关闭', overlayClose:true, opacity:0.5
		});
		return false;
	});
	
	$(".update_cache").live("click",function(){
		var url = $(this).attr("href");
		var title = $(this).attr("title");
		cbWaiting('正在更新缓存……',function(){
			$.post(url,{ajax:1},function(data){
				if(data == '000000'){
					$('#progressmsg').html('<font class="msg_font_success">' + title + '&nbsp;&nbsp;更新成功！</font>  <a href="#" onclick="$(this).colorbox.close(); return false;" class="cblue">关闭</a>');
					console.log("ok");
				} else{
					$('#progressmsg').html('<font class="msg_font_error">' + title + '&nbsp;&nbsp;更新失败！</font>  <a href="#" onclick="$(this).colorbox.close(); return false;" class="cblue">关闭</a>');
				}
			});
		});
		return false;
	});
	
	$(".updateCacheAll").live("click",function(){
		var url = $(this).attr("href");
		var rel = $(this).attr("rel");
		cbWaiting('正在更新缓存……',function(){
			$.post(url,{ajax:1},function(row){
				$.each(row , function(i){
					var id = row[i].id;
					var name = row[i].name || row[i].title;
					var length = row.length;
					$.post('/' + rel + '?action=setMemorydata&id=' + id,{ajax:1},function(data){
						if(data == '000000'){
							$('#progressmsg').html('<font class="msg_font_success">' + name + '&nbsp;&nbsp;更新成功！</font>');
						} else{
							console.log(name + '失败');
							$('#progressmsg').html('<font class="msg_font_error">' + name + '&nbsp;&nbsp;更新失败！</font>');
						}
						if((i+1) == length)
							if(rel == 'node'){
								$.post('/node?action=setMemoryAll',{ajax:1},function(data){
									if(data == '000000'){
										console.log('节点列表');
										$('#progressmsg').html('<font class="msg_font_success">节点列表&nbsp;&nbsp;更新成功！</font>');
									} else{
										console.log('节点列表失败');
										$('#progressmsg').html('<font class="msg_font_error">节点列表&nbsp;&nbsp;更新失败！</font>');
									}
									$(this).colorbox.close();
								});
							}else if(rel == 'product'){
								var str_pids = '';
								for(var _i = 0;_i < length;_i++){
									if(_i == 0)
										str_pids += row[0].id;
									else
										str_pids += ',' + row[_i].id;
								}
								$.post('/product?action=setMemcacheProductIndex',{ajax:1,ids:str_pids},function(data){
									if(data == '000000'){
										console.log('商品索引');
										$('#progressmsg').html('<font class="msg_font_success">商品索引&nbsp;&nbsp;更新成功！</font>');
									} else{
										console.log('商品索引失败！');
										$('#progressmsg').html('<font class="msg_font_error">商品索引&nbsp;&nbsp;更新失败！</font>');
									}
									$(this).colorbox.close();
								});
							}else if(rel == 'promote'){
								$.post('/promote?action=setMemoryAll',{ajax:1},function(data){
									if(data == '000000'){
										console.log('促销列表');
										$('#progressmsg').html('<font class="msg_font_success">促销列表&nbsp;&nbsp;更新成功！</font>');
									} else{
										console.log('促销列表失败');
										$('#progressmsg').html('<font class="msg_font_error">促销列表&nbsp;&nbsp;更新失败！</font>');
									}
									$(this).colorbox.close();
								});
							}else{
								$(this).colorbox.close();
							}
					});
				});
			},"json");
		});
		return false;
	});
});

//属性列表页弹出层
function showAddAttr(e) {
	$(e).closest(".attrlink").siblings('.addAttrDiv').slideToggle(200);
}

function hidethis(e) {
	$(e).parent().slideToggle(200);
}

function modifyCoupon(e) {
	var id = e.getAttribute("couponid");
	var pid = e.getAttribute("pid");
	var linkid = e.getAttribute("linkid");
	$.colorbox({
			href:'/coupon/edit.html?action=modifyAction&id=' + id +'&pid=' + pid + '&linkid=' + linkid,
			iframe:true, width:'60%', height:'80%', close:'关闭', overlayClose:true, opacity:0.5
		});
	return false;
}

