/*
 * 用于节点管理中的js
 */

var node = {
	checknodeType:function(ele){
		var node_type = $(ele).find("option:selected").val();
		switch(node_type) {
			case '3':
			$.colorbox({
				href:'/category/catelist.html?action=getAllCateList',
				iframe:true, width:'60%', height:'80%', close:'关闭', overlayClose:true, opacity:0.5
			});
			break;
			
			case '4':
			$.colorbox({
				href:'/product/product_list.html?action=getProductListAjax',
				iframe:true, width:'60%', height:'80%', close:'关闭', overlayClose:true, opacity:0.5
			});
			break;
			case '8':
			$.colorbox({
				href:'/node?action=getAllNodeList',
				iframe:true, width:'60%', height:'80%', close:'关闭', overlayClose:true, opacity:0.5
			});
			break;
			
		}
	},
	selectCateValue:function(e){
		var cateid = $(e).parent().siblings(".catelist").find("input:checked").val();
		var catename = $(e).parent().siblings(".catelist").find("input:checked").siblings(".catename").text();
		if(!cateid) {
			$(e).siblings(".wariningState").show().text("请先选择分类").delay(2000).fadeOut(500);
		} else {
			parent.$("#node_content").find("#content_name").val('').val(catename);
			parent.$("#node_content").find("#content_id").val('').val(cateid);
			parent.$("#content_name_text").val('').val(catename);
			parent.$("#content_desc").val('');
			parent.$.colorbox.close();
			return false;
		}
	},
	selectNodeValue:function(e){
		var nodeid = $(e).parent().siblings(".nodelist").find("input:checked").val();
		var nodename = $(e).parent().siblings(".nodelist").find("input:checked").siblings(".nodename").text();
		if(!nodeid) {
			$(e).siblings(".wariningState").show().text("请先选择栏目").delay(2000).fadeOut(500);
		} else {
			parent.$("#node_content").find("#content_name").val('').val(nodename);
			parent.$("#node_content").find("#content_id").val('').val(nodeid);
			parent.$("#content_name_text").val('').val(nodename);
			parent.$("#content_desc").val('');
			parent.$.colorbox.close();
			return false;
		}
	},
	selectProduct:function(e){
		var product_id = $(".datatablecontent").find("input:checked").val();
		var product_name = $(".datatablecontent").find("input:checked").parent().siblings(".product_name").text();
		var product_desc = $(".datatablecontent").find("input:checked").parent().siblings(".product_desc").text();
		if(!product_id) {
			$(e).siblings(".wariningState").show().text("请先选择分类").delay(2000).fadeOut(500);
		} else {
			parent.$("#node_content").find("#content_name").val('').val(product_name);
			parent.$("#node_content").find("#content_id").val('').val(product_id);
			parent.$("#content_name_text").val('').val(product_name);
			parent.$("#content_desc").val('').val(product_desc);
			parent.$.colorbox.close();
			return false;
		}
	}
}
