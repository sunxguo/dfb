<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>About AiiMai</title>
	<link rel="stylesheet" href="/assets/css/base.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/bk.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/admin.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/template.css" type="text/css"/>
    <script src="/assets/js/jquery.js" type="text/javascript"></script>
	<script src="/assets/js/admin-common.js" type="text/javascript"></script>
	<script src="/assets/js/admin.js" type="text/javascript"></script>
	<script src="/assets/js/jquery.form.js" type="text/javascript"></script>
</head>
<body>
<div class="padding10 formList clearfix modify_main">
	<div class="partContent clearboth content">
		<div class="title">Content</div>
		<textarea id="infoEditor" name="description"><?php echo $about;?></textarea>
	</div>
	<input type="hidden" value="<?php //echo $content->essay_id;?>" id="essayId">
	<div class="btn-center">
		<a href="javascript:websiteInfoSave('website_about_aiimai','Successfully Saved！Refreshing...')" class="btnfa120">Save</a>
	</div>
</div>
<link rel="stylesheet" href="/assets/kindEditor/themes/custom/custom.css" />
<script charset="utf-8" src="/assets/kindEditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/assets/kindEditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="/assets/js/jquery.form.js"></script>
<script>
	var infoEditor;
	$(document).ready(function(){
		KindEditor.ready(function(K) {
			infoEditor = K.create('#infoEditor', {
				uploadJson : '/assets/kindEditor/php/upload_json.php',
				fileManagerJson : '/assets/kindEditor/php/file_manager_json.php',
				allowFileManager : true,
				width : '100%',
				height:'600px',
				resizeType:0,
				imageTabIndex:1,
				langType : '<?php echo $_SESSION['language']=="english"?'en':'zh_CN';?>'
			});
		});
	});
</script>
</body>
</html>