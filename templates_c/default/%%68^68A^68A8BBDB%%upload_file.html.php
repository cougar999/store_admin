<?php /* Smarty version 2.6.26, created on 2012-12-20 14:54:07
         compiled from upload_file.html */ ?>
<!DOCTYPE html> 
<html> 
<head> 
<meta charset="utf-8">
	<title>上传图片</title>
	<link rel="stylesheet" type="text/css" href="/resources/css/layout.css" />
	<link rel="stylesheet" type="text/css" href="/resources/css/others.css" />
	<link rel="stylesheet" type="text/css" href="/resources/lib/colorbox/colorbox.css" />
	<script type="text/javascript" src="/resources/js/jquery/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/resources/lib/colorbox/jquery.colorbox-min.js"></script>
	<script type="text/javascript" src="/resources/js/ajaxfileupload.js"></script>
	<script type="text/javascript" src="/resources/js/common.js"></script>
	<script type="text/javascript" src="/resources/js/admin.js"></script>
	<script type="text/javascript" src="/resources/js/trigger.js"></script>
	<link rel="icon" type="image/vnd.microsoft.icon" href="/favicon.ico" />
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
	<!--[if IE]>
	<link type="text/css" rel="stylesheet" href="/resources/css/admin-ie.css" />
	<![endif]-->
</head>
<body id="upload_file">
	<!-- content start -->
	<div id="wrapper">
		<div id="content">
			<form enctype="multipart/form-data" method="post" action="">
				<table width="100%">
					<colgroup>
							<col width="80" />
							<col width="20"/>
							<col width="auto" />
					</colgroup>
					<tbody>
						<!--<tr>
							<td class="tr">图片名</td>
							<td></td>
							<td><input type="text" name="img_name" id="img_name" /></td>
						</tr>
						<tr>
							<td class="tr">图片描述</td>
							<td></td>
							<td><textarea type="text" name="img_desc" id="img_desc" rows="4" style="width:60%" ></textarea></td>
						</tr>-->
						<tr>
							<td class="tr">图片文件</td>
							<td></td>
							<td>
								<input type="file" value="" name="default_image" id="default_image" />
								<input type="hidden" name="url" id="url" value="" />
								<input type="button" value="上传" id="submitupload" onclick="ajaxFileUpload();" />
								<input type="button" value="取消" id="cancelupload" onclick="parent.$.colorbox.close();return false;" />
								<input type="hidden" name="isUploadimg" value="1" id="isUploadimg" />
								<span id="loader" class="no"><img src="/resources/images/loader.gif" align="absmiddle" />上传中...</span>
							</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>
								<div id="result"></div>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</div>
	<!-- content end -->
</body>
</html>