<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
	<link rel="stylesheet" href="/assets/css/base.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/cms.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/template.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/admin.css" type="text/css"/>

    <script src="/assets/js/jquery.js" type="text/javascript"></script>
	<script src="/assets/js/admin-common.js" type="text/javascript"></script>
	<script src="/assets/js/admin.js" type="text/javascript"></script>
	<script src="/assets/js/jquery.form.js" type="text/javascript"></script>
</head>
<body>
<div class="" style="padding-left:30px;">
	<input id="noticeId" type="hidden" value="<?php echo $notice->notice_id;?>">
<div class="padding10 formList msglist clearfix">
	
	<div class="partContent baseInfo" style="width: 800px;margin: 10px auto; float:none;">
		<div class="title">
			<?php echo lang("cms_content_baseinfo");?>Basic Info.<span style="color: red;">*</span>
		</div>
		<div id="Div1">
			<div class="item" style="margin-top: 10px;">
				Type<span style="color: red;">*</span>
				<select id="type">
					<option value="1" <?php echo $notice->notice_type==1?'selected':'';?>>General</option>
					<option value="2" <?php echo $notice->notice_type==2?'selected':'';?>>Emergency</option>
				</select>
			</div>
			<div class="item" style="margin-top: 10px;">
				Title<span style="color: red;">*</span> <input type="text" value="<?php echo $notice->notice_title;?>" id="title" class="inp-txt width400" maxlength="30" placeholder="<?php echo lang("cms_sendmsg_msgtitlelengthtip");?>">
			</div>
		</div>
	</div>
	<div class="partContent clearboth content" style="width: 800px !important;margin: 10px auto !important;">
		<div class="title" onclick="shows(2)">Content<span style="color: red;">*</span></div>
		<textarea id="notice_content" name="description" style="width: 90%;height: 70px;margin: 10px 0 10px 23px;"><?php echo $notice->notice_content;?></textarea>
	</div>
	<div class="btn-center">
		<a href="javascript:saveNotice('Successfully Saved!')" class="btnfa120">Save</a>
	</div>
	<link rel="stylesheet" href="/assets/kindEditor/themes/custom/custom.css" />
<script charset="utf-8" src="/assets/kindEditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/assets/kindEditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="/assets/js/jquery.form.js"></script>
<script>
	var infoEditor;
	$(document).ready(function(){
		KindEditor.ready(function(K) {
			infoEditor = K.create('#notice_content', {
				uploadJson : '/assets/kindEditor/php/upload_json.php',
				fileManagerJson : '/assets/kindEditor/php/file_manager_json.php',
				allowFileManager : true,
				width : '100%',
				height:'300px',
				resizeType:0,
				imageTabIndex:1,
				langType : '<?php echo $_SESSION['language']=="english"?'en':'zh_CN';?>'
			});
		});
	});
</script>
</div>
</div>
<div id="waitDiv"><img src="/assets/images/cms/loading.gif"></div>
<div id="bkDiv"></div>
<div id="messageAlert" class="km-alert km-alert-dismissible fade in width40p hide">
  <button type="button" class="km-close" onclick="$('#messageAlert').hide();"><span>×</span></button>
  <strong></strong>
  <span class="km-alert-msg"></span>
</div>
</body>
</html>