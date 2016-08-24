/**
 * 用于后台交互等操作的js文件
 */

function getCatelist(name){
	$.post('/category',{action:"getChildList"}, function(data){
		var html_content = '<select name="' + name + '">';
		html_content += '<option value="-1">--顶级分类--</option>';
		for(var i = 0 ; i < data.length ; i++){
			html_content += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
		}
		html_content += '</select>';
		$("#category_pid").html(html_content);
	},'json');
	return false;
}

function getCurrentCatelist() {
	var pidd = $("#pidd").val();
	//$.post('/category',{action:"getChildList" , is_type:true},function(data){
	$.post('/category',{action:"getChildList"}, function(data){
		var html_content = '<select name="category_id">';
		html_content += '<option value="-1">--顶级分类--</option>';
		for(var i = 0 ; i < data.length ; i++){
			if (pidd == data[i].id) {
				html_content += '<option value="' + data[i].id + '" selected="selected">' + data[i].name + '</option>';
			} else {
				html_content += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
			}
			
		}
		html_content += '</select>';
		$("#category_pid").html(html_content);
	},'json');
	return false;
}

function submitAttrValue(e) {
	var attribute_value = $(e).siblings('#attribute_value').val();
	var attribute_id = $(e).siblings('#attribute_id').val();

	$.post('/attribute',{action:"addAttriValueAjax", attribute_value:attribute_value, attribute_id:attribute_id}, function(data){
		if (data) {
			//getAttrValueList(this, attribute_id, 'childAttrListUl');
			var num = $(e).parent().siblings('.attrlink').find(".attrValueCount").html();
			if (num) {
				var count = parseFloat(num) + 1;
				$(e).parent().siblings('.attrlink').find(".attrValueCount").html(count);
				$(e).siblings(".attrAddState").text('添加成功').fadeIn().delay(2000).hide(200);
				if ($(e).parent().siblings('.childAttrList').is(':hidden') == false) {
					getAttrValueList(e, attribute_id, 'childAttrListUl');
					$(e).parent().siblings('.childAttrList').slideToggle();
				}
			}
		}
	});
	return false;
}

function getAttrValueList(d, i, e) {
	if (i) {
		var attribute_id = i;
		$.post('/attribute',{action:"getAttriValueListAjax", attribute_id:attribute_id}, function(data){
			if (!data) return;
			if(d && e) {
				$(d).parent().siblings('.childAttrList').slideToggle(200);
				$(d).parent().siblings('.childAttrList').find("."+e).empty();
			}
			var data = JSON.parse(data);
			$.each(data[attribute_id], function(n) {
				var value = data[attribute_id][n].value;
				var attribute_ids = data[attribute_id][n].attribute_id;
				var id = data[attribute_id][n].id;
				var html = '<li>';
					html += '<input type="text" name="attrivalue_value" value="' + value + '" class="attrivalue_value" />';
					html += '<input type="hidden" name="id_attribute_value" value="' + id + '" class="id_attribute_value" />';
					html += '<input type="hidden" name="attribute_id" value="' + attribute_ids + '" class="attribute_id" />';
					html += '<input type="submit" name="modifyAttrValue" value="修改" onclick="modifyAttrValue(this);return false;" class="modifyAttrValue" />';
					html += '<input type="submit" name="delAttrValue" value="删除" onclick="delAttrValue(this);return false;" class="delAttrValue" />';
					html += '<span class="wariningState no"></span>';
					html += '</li>';
				
				if(d && e) {
					$(d).parent().siblings('.childAttrList').find("."+e).append(html);
				}
				
			});	
		});
	}
	return false;
}

function delAttrValue(e){
	var id_attribute_value = $(e).siblings(".id_attribute_value").val();
	$.post('/attribute',{action:"delAttriValueAjax", id_attribute_value:id_attribute_value}, function(data){
		if (!data) return;
		console.log(data);
		if(data && data == true) {
			//$(e).siblings(".wariningState").text('添加成功').fadeIn().delay(2000).hide(200);
			$(e).parent("li").fadeOut(2000).delay(2000).remove();
		}
	});
	
}

function modifyAttrValue(e){
	var attrivalue_value = $(e).siblings('.attrivalue_value').val();
	var attribute_id = $(e).siblings('.attribute_id').val();
	var id_attribute_value = $(e).siblings('.id_attribute_value').val();
	
	$.post('/attribute',{action:"modifyAttriValueAjax", attribute_id:attribute_id, attrivalue_value:attrivalue_value, id_attribute_value:id_attribute_value }, function(data){
		//console.log(data);
		if(data) {
			$(e).siblings('.wariningState').text('修改成功').fadeIn().delay(2000).hide(200);
		} else {
			$(e).siblings('.wariningState').text('修改失败，请稍候再试').fadeIn().delay(2000).hide(200);
		}
	});
	return false;
}

function addAttrValues(e) {
	var attribute_id_list = [];
	var values_list = [];
	$(".combid").each(function(i, d){
		attribute_id_list[i] = d.value;
	});
	$("input[type=checkbox]:checked").each(function(i, d){
		values_list[i] = d.value;
	});
	
	
}



//上传图片，返回文件后缀
function GetExtName(pathfilename){
	var reg = /(\\+)/g;
	var pfn = pathfilename.replace(reg, "#");
	var arrpfn = pfn.split("#");
	var fn = arrpfn[arrpfn.length - 1];
	var arrfn = fn.split(".");
	return arrfn[arrfn.length - 1];
}
	
function ajaxFileUpload(){
	var ext = GetExtName($('#default_image').val());
	var timeid = new Date();
	var timeid = timeid.getTime();
	var imgbox = parent.$("#imgbox li");
	if (ext && /^(jpg|jpeg|gif|png|bmp)$/.test(ext)) {
		$("#loader").show();
		try{
			$.ajaxFileUpload({
				url:'/product?action=UploadimgAjax&product_id=' + GetQueryString('product_id'),
				secureuri:false,
				fileElementId:'default_image',
				dataType: 'text',
				success: function (data, status) {
					var item = JSON.parse(data);
					$("#url").val(item.img_url);
					$("#loader").hide();
					var html = '<li>'
						if (imgbox.length > 0) {
							html += '<div style="margin-bottom:5px;"><input type="radio" name="default_image" value="' + item.img_url + '" id="img' + timeid + '"></div>';
						} else {
							html += '<div style="margin-bottom:5px;"><input type="radio" name="default_image" value="' + item.img_url + '" id="img' + timeid + '" checked="checked" /></div>'	
						}
						html += '<label for="img' + timeid + '"><img src="' + item.img_url + '" width="120" /><input type="hidden" name="img_url" value="'+item.img_url+'" /><input type="hidden" name="img_id[]" value="'+item.img_id+'" /></label></li>';
					parent.$("#imgbox").append(html);
					parent.$.colorbox.close();
					return false;
				},
				error: function (data, status, e) {
					alert('上传失败');
				}
		 	});
		}catch(e){}
	} else {
		$('#result').html('文件格式有误！');
	}
}

function selectCitylist(e){
	var key = $(e).find("option:selected").val();
	$.post('/promote',{action:"getCitylist", prov_id:key}, function(data){
		if(!data) return;
		$("#city_id").empty();
		var data = JSON.parse(data);
		$.each(data, function(i,v){
			var pid = data[i].pid;
			var child = data[i].id;
			var name = data[i].name;
			if (key == pid) {
				var html = '<option value="'+ child +'">'+ name +'</option>'
				$("#city_id").append(html);
			}
		});
	});
	return false;
}

function selectShoplistByCity(cityid , prom_link_shop){
	$.post('/shop',{action:"getAllListByCityId", cityid:cityid}, function(data){
		var shop_id = new Array();
		for(var i = 0 ; i< prom_link_shop.length ; i++){
			if(prom_link_shop[i].shop_status == 1)
				shop_id[i] = prom_link_shop[i].shop_id;
		}
		if(!data) return;
		var html = '';
		$.each(data, function(i,v){
			var id = data[i].id;
			var name = data[i].name;
			var status = data[i].status;
			html += '<p class="checkw">'
			+ '<input type="checkbox" name="shopids[]" value="' + id + '" id="shop' + id + '"';
			if(jQuery.inArray(id, shop_id) != -1){
				if(status == 0)
					html += ' disabled="disabled"';
				else
					html += ' checked="checked"';
			}else {
				if(status == 0)
					html += ' disabled="disabled"';
			}
			html += '><label for="shop' + id + '">' + name;
			if(status == 0)
				html += '<font color="red">(下线)</font>';
			html += '</label></p>';
		});
		$("#shoplist").html(html);
	} , "json");
	return false;
}

/*
 * changeStatus 
 * 点击列表中的上下线链接快速改变上下线状态；
 * 
 * id 		是表里的id
 * stat 	是想要改变的状态，欲上线传1，下线传0
 * cate 	是栏目，和template目录名称对应，产品product，分类category依次类推
 * 
 */
function changeStatus(id, stat, cate, ele){
	if(!id || !cate) return;
	$.get('/' + cate, {action:"changeStatus", id:id, status:stat}, function(data){
		if (data && (data == true || data == 1)) {
			var cur = $(ele);
			var flag = $(cur).closest("td").siblings().find(".update_cache");
			if(flag){
				$(flag).trigger('click');
			}
			if(stat == 1) {
				var cont = "<a href=javascript:void(0); onclick=changeStatus('"+id+"',0,'"+cate+"',this);>下线</a>";
			} else {
				var cont = "<a href=javascript:void(0); onclick=changeStatus('"+id+"',1,'"+cate+"',this);>上线</a>";
			}
			$(cur).closest("td").html(cont);
			//window.location.reload(location.href);
		} else if(data == 2) {
			cbMessage('该商品为下线状态,不允许发布！');
		} else {
			cbMessage('操作失败，请稍后再试');
		}
	});	
}

function searchValueChange(e) {
	var v = $("#searchValue").find('option:selected').val();
	if (v == 'areaSelect'){
		$("#search_name").hide();
		$("#areabox").removeClass("no");
	} else {
		$('#search_name').attr('name',v);
	}
};

function changeMulti(ele, flag) {
	if ($(ele).hasClass("updownOperate")){
		var v = $(ele).attr("updownparas"); 		//获取要操作的参数
		$("#actionCur").val(flag); 					//传递操作栏目的参数，节点发布为updonwNodesflag,产品updonwProductFlag, 分类updonwCateFlag,
		$("#statusCur").val(v); 					//置操作参数到隐藏的提交状态中
	}
	$("#ChangeMultiForm").submit();
}

/*产品页面，属性编辑
function getAttrValue(v) {
	var pos = $("#attrlist_box table td").find('.combid');
	$(pos).each(function(i){
		//console.log(i);
		var attrvid = pos[i].value;
		var ele = pos[i];
		$.post('/attribute',{action:"getAttriValueListAjax", attribute_id:attrvid }, function(data){
			if (!data) return;
			var data = JSON.parse(data);
			var items = data[attrvid];
			$.each(items, function(i){
				var id = items[i].id;
				var value = items[i].value;
				var html = '<p class="checkw"><input type="checkbox" value="' + id + '" id="' + id + '"> <label for="' + id + '">' + value + '</label></p>';
				$(ele).siblings('.attrlistbox').append(html);
			});
		});
		
	});
	return false;
}

function getAttriName(e) {
	$.post('/attribute',{action:"getAttrNameAjax"}, function(data){
		if (!data) return;
		var data = JSON.parse(data);
		//console.log(data);
		$.each(data, function(i){
			var html = '<option value="' + data[i].id + '">' + data[i].name + '</option>';
			$("#attriname").append(html);
		})
	});
	return false;
}

function selectAttrValue(v) {
	if (v) {
		$("#attriValueName").empty();
		var attrvid = $(v).val();
		$.post('/attribute',{action:"getAttriValueListAjax", attribute_id:attrvid }, function(data){
			if (!data) return;
			var data = JSON.parse(data);
			var items = data[attrvid];
			$.each(items, function(i){
				var html = '<option value="' + items[i].id + '">' + items[i].value + '</option>';
				$("#attriValueName").append(html);
			})
		});
	}
	return false;
}

function addAttr2pro(e){
	var id = $("#attriValueName").val();
	var name = $("#attriValueName option:selected").text();
	var pname = $("#attriname option:selected").text();
	var opt = '<option value="' + id + '">' + pname + '<strong> &gt; </strong>' + name + '</option>'
	$("#selected_attrvalue").append(opt);
	
	var ids = $("#selected_attrvalue option");
	var idsArray = $.makeArray(ids);
	$(idsArray).each(function(i){
		var idsArray = $("#attribute_value_ids").val();
			idsArray += idsArray[i].value;
	});
	$("#attribute_value_ids").val(idstring);
	
	return false;
}

function delAttrfrompro(e){
	if (e == 'all') {
		var id = $("#selected_attrvalue option");
	} else {
		var id = $("#selected_attrvalue option:selected");
	}
	$(id).remove();
	return false;
}
*/

function submitQuestRepay(e){
	var content = $(e).siblings('.quest_content').val();
	var relateid = $(e).siblings('.relateid').val();

	cbWaiting('正在提交处理，请稍后……',function(){
		$.post('/question',{action:"addRepay", content:content, relateid:relateid}, function(data){
			if (data) {
				$.post('question',{action:"setMemcacheData" , operate:1 , questionId:relateid , ajax:1},function(data2){
					if(data2 == '000000'){
						$(e).siblings('.quest_content').val('');
						$(e).closest('.repay_form').hide();
						$('#progressmsg').html('<font class="msg_font_success">回答提问&nbsp;&nbsp;更新成功！</font>  <a href="#" onclick="$(this).colorbox.close(); return false;" class="cblue">关闭</a>');
					}else{
						console.log('回答提问失败');
						$('#progressmsg').html('<font class="msg_font_error">回答提问&nbsp;&nbsp;更新失败！</font>  <a href="#" onclick="$(this).colorbox.close(); return false;" class="cblue">关闭</a>');
					}
				});
			}else{
				$('#progressmsg').html('<font class="msg_font_error">回答提问&nbsp;&nbsp;提交数据失败！</font>  <a href="#" onclick="$(this).colorbox.close(); return false;" class="cblue">关闭</a>');
			}
		});
	});
	return false;
}