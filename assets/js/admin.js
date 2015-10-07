$(document).ready(function(){
	$("#bkDiv").click(function(){
		$(".km-modal-dialog").hide();
		$(".km-alert").hide();
		$("#bkDiv").hide();
		$("body").removeClass('km-modal-open');
	});
	$(".km-close").click(function(){
		$(".km-modal-dialog").hide();
		$("#bkDiv").hide();
		$("body").removeClass('km-modal-open');
	});
	$(".km-btn-close").click(function(){
		$(".km-modal-dialog").hide();
		$("#bkDiv").hide();
		$("body").removeClass('km-modal-open');
	});
	$("#checkAll").click(function(){
		$("input[name='checkedUserId']").prop("checked",$("#checkAll").prop("checked"));
	});
});
function refreshCode(){
	$("#validCodeImg").attr("src","/common/createVeriCode");
}
function column(handleType,nameNullMsg,successMsg){
	if($("#name").val()==""){
		alert(nameNullMsg);
		return false;
	}
	if($("#name").val()=="") $("#name").val("50");
	var column = new Object(); 
	column.fid = $("#fatherlevel").val();
	column.name = $("#name").val();
	column.display = $('input[name="display"]:checked').val();
	column.type = $("#type").val();
	column.order_num = $('#orderNum').val();
	if(handleType=="modify") column.id = $("#column_id").val();
	dataHandler(handleType,"column",column,null,null,null,successMsg,true);
}
function delColumn(currentId,confirmMsg,successMsg){
	showWait();
	var column = new Object(); 
	column.id = currentId;
	dataHandler("del","column",column,null,confirmMsg,closeWait(),successMsg,true);
}
function selectEssay(baseUrl){
	var extUrl="";
	if($("#state").val()!=-1) extUrl+="&state="+$("#state").val();
	if($("#column").val()!=0) extUrl+="&column="+$("#column").val();
	if($("#keyword").val()!="") extUrl+="&search="+$("#keyword").val();
	location.href=baseUrl+extUrl;
}
function uploadContentThumb(){
	uploadImage(addThumbBeforeUpload,addThumbAfterUpload);
}
function addThumbBeforeUpload(){
	$("#addImgList div img").attr("src","/assets/images/cms/loading.gif");
}
function addThumbAfterUpload(imageSrc){
	$("#addImgList div img").attr("src","/assets/images/cms/appbg_ad.png");
	var new_img_item='<li onmouseover="imgover(this)" onmouseout="imgout(this)" class="img-item imagelist"><img class="thumb-src" width="77" height="77" src="'+imageSrc+'"><img onclick="delclick(this)" class="del-bt" title="删除该缩略图" src="/assets/images/cms/delete.png"></li>';
	$("#addImgList").before(new_img_item);
	if($("#imgListDivs").children(".imagelist").length>=3){
		$("#addImgList").hide();
	}
}
function imgout(obj){
	$(obj).find('.del-bt').hide();
}
function imgover(obj){
	$(obj).find('.del-bt').show();
}
function delclick(obj){
	$(obj).parent('.imagelist').remove();
	$("#file").val("");
	$("#addImgList").show();
}

function delNotice(currentId,confirmMsg,successMsg){
	showWait();
	var notice = new Object();
	notice.id = currentId;
	dataHandler("del","notice",notice,null,confirmMsg,closeWait(),successMsg,true);
}
function delUser(currentId,confirmMsg,successMsg){
	showWait();
	var user = new Object();
	user.id = currentId;
	dataHandler("del","user",user,null,confirmMsg,closeWait(),successMsg,true);
}
function delItem(currentId,confirmMsg,successMsg){
	showWait();
	var item = new Object();
	item.id = currentId;
	dataHandler("del","item",item,null,confirmMsg,closeWait(),successMsg,true);
}
function delMerchant(currentId,confirmMsg,successMsg){
	showWait();
	var merchant = new Object();
	merchant.id = currentId;
	dataHandler("del","merchant",merchant,null,confirmMsg,closeWait(),successMsg,true);
}
function freezeUser(currentId,confirmMsg,successMsg){
	showWait();
	var user = new Object();
	user.id = currentId;
	user.status = 1;
	dataHandler("modify","userStatus",user,null,confirmMsg,closeWait(),successMsg,true);
}
function confirmMerchant(currentId,confirmMsg,successMsg){
	showWait();
	var merchant = new Object();
	merchant.id = currentId;
	merchant.status = 2;
	dataHandler("modify","merchantStatus",merchant,null,confirmMsg,closeWait(),successMsg,true);
}
function doNotConfirmMerchant(currentId,confirmMsg,successMsg){
	showWait();
	var merchant = new Object();
	merchant.id = currentId;
	merchant.status = 3;
	dataHandler("modify","merchantStatus",merchant,null,confirmMsg,closeWait(),successMsg,true);
}
function unfreeze(currentId,confirmMsg,successMsg){
	showWait();
	var user = new Object();
	user.id = currentId;
	user.status = 0;
	dataHandler("modify","userStatus",user,null,confirmMsg,closeWait(),successMsg,true);
}
function essayHandler(draft,successMsg,newEssay){
	if($("#column").val()==-1){
		alert("请选择发布到的栏目！");
		return false;
	}
	if($("#title").val()==""){
		alert("请输入文章标题！");
		return false;
	}
/*	if($("#imgListDivs .imagelist").length<1){
		alert("请上传至少一张缩略图！");
		return false;
	}*/
	var essay = new Object();
	essay.column_id = $("#column").val();
	essay.title = $("#title").val();
	essay.summary = $("#summary").val();
	essay.content = textEditor.html();
	essay.thumbnail = getThumb("#imgListDivs .imagelist");
	essay.draft = draft;
	var handlerType='';
	if(newEssay){
		handlerType='add';
	}else{
		essay.id = $("#essayId").val();
		handlerType='modify';
	}
	dataHandler(handlerType,'essay',essay,null,null,null,successMsg,true);
}
function websiteInfoSave(key,successMsg){
	showWait();
	var websiteInfo = new Object();
	websiteInfo.key = key;
	websiteInfo.value = infoEditor.html();
	dataHandler("modify","websiteInfo",websiteInfo,null,null,closeWait(),successMsg,true);
}
function websiteInfoEmailComfirmationSave(successMsg){
	var websiteInfo = new Object();
	websiteInfo.key = 'website_confirm_email_title';
	websiteInfo.value = $("#emailComfirmationTitle").val();
	dataHandler("modify","websiteInfo",websiteInfo,null,null,closeWait(),successMsg,true);
	var websiteInfo = new Object();
	websiteInfo.key = 'website_confirm_email_content';
	websiteInfo.value = infoEditor.html();
	dataHandler("modify","websiteInfo",websiteInfo,null,null,closeWait(),successMsg,true);
}
function websiteInfoEmailMerchantApprovalSave(successMsg){
	var status=$("#merchantStatus").val();
	var websiteInfo = new Object();
	websiteInfo.key = 'website_seller_approval_email_title'+status;
	websiteInfo.value = $("#emailMerchantApprovalTitle").val();
	dataHandler("modify","websiteInfo",websiteInfo,null,null,closeWait(),successMsg,true);
	var websiteInfo = new Object();
	websiteInfo.key = 'website_seller_approval_email_content'+status;
	websiteInfo.value = infoEditor.html();
	dataHandler("modify","websiteInfo",websiteInfo,null,null,closeWait(),successMsg,true);
}
function websiteInfoEmailUserSuccessfulySave(successMsg){
	var websiteInfo = new Object();
	websiteInfo.key = 'website_user_success_email_title';
	websiteInfo.value = $("#emailUserSuccessfullyTitle").val();
	dataHandler("modify","websiteInfo",websiteInfo,null,null,closeWait(),successMsg,true);
	var websiteInfo = new Object();
	websiteInfo.key = 'website_user_success_email_content';
	websiteInfo.value = infoEditor.html();
	dataHandler("modify","websiteInfo",websiteInfo,null,null,closeWait(),successMsg,true);
}
function adminPwd(successMsg){
	var username=$("#username").val();
	var oldpwd=$("#oldpwd").val();
	var newpwd=$("#newpwd").val();
	var renewpwd=$("#renewpwd").val();
	if(username==""||oldpwd==""||newpwd==""||renewpwd==""){
		$("#errorInfo").show();
		$("#errorInfo").text("Please fill out complete！");
	}
	else if(newpwd!=renewpwd){
		$("#errorInfo").show();
		$("#errorInfo").text("The two new password are different!");
	}
	else{
		var adminPwd = new Object();
		adminPwd.oldpwd = oldpwd;
		adminPwd.newpwd = newpwd;
		$("#errorInfo").hide();
		dataHandler("modify","adminPwd",adminPwd,null,null,closeWait(),successMsg,true);
	}
}
function sendMsg(successMsg){
	if($("#type").val()==-1){
		alert("Please select type!");
		return false;
	}
	if($("#title").val()==""){
		alert("Please input title！");
		return false;
	}
	if($("#msg_content").val()==""){
		alert("Please input content！");
		return false;
	}
	showWait();
	var message = new Object();
	message.type = $("#type").val();
	message.title = $("#title").val();
	message.content = $("#msg_content").val();
	dataHandler("add","message",message,null,null,closeWait(),successMsg,true);
}
function pubNotice(successMsg){
	
	if($("#title").val()==""){
		alert("Please input title！");
		return false;
	}
	showWait();
	var notice = new Object();
	notice.type = $("#type").val();
	notice.title = $("#title").val();
	notice.content = infoEditor.html();
	dataHandler("add","notice",notice,null,null,closeWait(),successMsg,true);
}
function saveNotice(successMsg){
	if($("#title").val()==""){
		alert("Please input title！");
		return false;
	}
	showWait();
	var notice = new Object();
	notice.id = $("#noticeId").val();
	notice.type = $("#type").val();
	notice.title = $("#title").val();
	notice.content = infoEditor.html();
	dataHandler("modify","notice",notice,null,null,closeWait(),successMsg,true);
}
function saveBasicParameter(successMsg){
	if($("#websiteName").val()==""){
		alert("Please select Name!");
		return false;
	}
	if($("#websiteUrl").val()==""){
		alert("Please input Url");
		return false;
	}
	if($("#websiteCopyright").val()==""){
		alert("Please input Copyright");
		return false;
	}
	showWait();
	var websiteInfo = new Object();
	websiteInfo.key = 'website_name_english';
	websiteInfo.value =$("#websiteName").val();
	dataHandler("modify","websiteInfo",websiteInfo,null,null,closeWait(),successMsg,true);
	
	var websiteInfo = new Object();
	websiteInfo.key = 'website_url';
	websiteInfo.value =$("#websiteUrl").val();
	dataHandler("modify","websiteInfo",websiteInfo,null,null,closeWait(),successMsg,true);
	
	var websiteInfo = new Object();
	websiteInfo.key = 'website_copyright';
	websiteInfo.value =$("#websiteCopyright").val();
	dataHandler("modify","websiteInfo",websiteInfo,null,null,closeWait(),successMsg,true);
}
function selectItem(baseUrl){
	var extUrl="";
	if($("#category").val()!=-1) extUrl+="&category="+$("#category").val();
	if($("#status").val()!=-1) extUrl+="&status="+$("#status").val();
	if($("#keyword").val()!="") extUrl+="&search="+$("#keyword").val();
	location.href=baseUrl+extUrl;
}
function productQuery(excel){
	var product = new Object();
	product.MainCategory = $("#category").val();
//	product.stSubCategory = false;
//	product.ndSubCategory = false;
	product.status = $("#status").val();
//	product.dateType = $("#dateType").val();
//	product.beginDate = $("#beginDate").val();
//	product.endDate = $("#endDate").val();
//	product.SellFormat = $("#SellFormat").val();
	product.title = $("#keyword").val();
	dataHandler('excel','productSimple',product,goUrl,null,null,null,false);
}
function merchantQuery(excel){
	var merchant = new Object();
	merchant.gender = $("#gender").val();
	merchant.status = $("#status").val();
	merchant.username = $("#keyword").val();
	dataHandler('excel','merchantSimple',merchant,goUrl,null,null,null,false);
}
function goUrl(url){
	location.href=url;
}
function selectUser(baseUrl){
	var extUrl="";
	if($("#gender").val()!=-1) extUrl+="&gender="+$("#gender").val();
	if($("#status").val()!=-1) extUrl+="&status="+$("#status").val();
	if($("#keyword").val()!="") extUrl+="&search="+$("#keyword").val();
	location.href=baseUrl+extUrl;
}
function orderUser(baseUrl,currentOrder){
	var extUrl="";
	if($("#gender").val()!=-1) extUrl+="&gender="+$("#gender").val();
	if($("#status").val()!=-1) extUrl+="&status="+$("#status").val();
	if($("#keyword").val()!="") extUrl+="&search="+$("#keyword").val();
	if(currentOrder=='username'){
		if($("#orderUser").val()=="" || $("#orderUser").val()=="desc") extUrl+="&orderUser=asc";
		else  extUrl+="&orderUser=desc";
	}
	if(currentOrder=='email'){
		if($("#orderEmail").val()=="" || $("#orderEmail").val()=="desc") extUrl+="&orderEmail=asc";
		else  extUrl+="&orderEmail=desc";
	}
	location.href=baseUrl+extUrl;
}
function orderItem(baseUrl,currentOrder){
	var extUrl="";
	if($("#category").val()!=-1) extUrl+="&category="+$("#category").val();
	if($("#status").val()!=-1) extUrl+="&status="+$("#status").val();
	if($("#keyword").val()!="") extUrl+="&search="+$("#keyword").val();
	if(currentOrder=='name'){
		if($("#orderName").val()=="" || $("#orderName").val()=="desc") extUrl+="&orderName=asc";
		else  extUrl+="&orderName=desc";
	}
	if(currentOrder=='price'){
		if($("#orderPrice").val()=="" || $("#orderPrice").val()=="desc") extUrl+="&orderPrice=asc";
		else  extUrl+="&orderPrice=desc";
	}
	location.href=baseUrl+extUrl;
}
function orderMerchant(baseUrl,currentOrder){
	var extUrl="";
	if($("#gender").val()!=-1) extUrl+="&gender="+$("#gender").val();
	if($("#status").val()!=-1) extUrl+="&status="+$("#status").val();
	if($("#keyword").val()!="") extUrl+="&search="+$("#keyword").val();
	if(currentOrder=='shop'){
		if($("#orderShopTitle").val()=="" || $("#orderShopTitle").val()=="desc") extUrl+="&orderShopTitle=asc";
		else  extUrl+="&orderShopTitle=desc";
	}
	if(currentOrder=='username'){
		if($("#orderUser").val()=="" || $("#orderUser").val()=="desc") extUrl+="&orderUser=asc";
		else  extUrl+="&orderUser=desc";
	}
	if(currentOrder=='email'){
		if($("#orderEmail").val()=="" || $("#orderEmail").val()=="desc") extUrl+="&orderEmail=asc";
		else  extUrl+="&orderEmail=desc";
	}
	location.href=baseUrl+extUrl;
}
function selectMerchant(baseUrl){
	var extUrl="";
	if($("#gender").val()!=-1) extUrl+="&gender="+$("#gender").val();
	if($("#status").val()!=-1) extUrl+="&status="+$("#status").val();
	if($("#keyword").val()!="") extUrl+="&search="+$("#keyword").val();
	location.href=baseUrl+extUrl;
}
function selectOrder(baseUrl){
	var extUrl="";
	if($("#status").val()!=-1) extUrl+="&status="+$("#status").val();
	if($("#keyword").val()!="") extUrl+="&search="+$("#keyword").val();
	location.href=baseUrl+extUrl;
}
function selectShipCompany(baseUrl){
	var extUrl="";
	if($("#status").val()!=-1) extUrl+="&status="+$("#status").val();
	if($("#keyword").val()!="") extUrl+="&search="+$("#keyword").val();
	location.href=baseUrl+extUrl;
}
function selectAD(baseUrl){
	var extUrl="";
	if($("#status").val()!=-1) extUrl+="&status="+$("#status").val();
	if($("#keyword").val()!="") extUrl+="&search="+$("#keyword").val();
	location.href=baseUrl+extUrl;
}
function selectComment(baseUrl){
	var extUrl="";
	if($("#status").val()!=-1) extUrl+="&status="+$("#status").val();
	if($("#keyword").val()!="") extUrl+="&search="+$("#keyword").val();
	location.href=baseUrl+extUrl;
}
function selectPayment(baseUrl){
	var extUrl="";
	if($("#status").val()!=-1) extUrl+="&status="+$("#status").val();
	if($("#keyword").val()!="") extUrl+="&search="+$("#keyword").val();
	location.href=baseUrl+extUrl;
}
function uploadAvatarImage(){
	uploadImage(addImageBeforeUpload,addImageAfterUpload);
}
function addImageBeforeUpload(){
	$("#avatar").attr("src","/assets/images/cms/loading.gif");
}
function addImageAfterUpload(imageSrc){
	$("#avatar").attr("src",imageSrc);
}
function userHandler(successMsg){
	/*
	if($("#MainCategory").val()==-1 || $("#stSubCategory").val()==-1 || $("#ndSubCategory").val()==-1){
		showAlert('danger','',"Please select category!");
		return false;
	}
	if($("#title_english").val()=="" && $("#title_zh_cn").val()=="" && $("#title_tw_cn").val()==""){
		showAlert('danger','',"Please enter a product name!");
		return false;
	}
	if($("#productImg").attr('src')==""){
		showAlert('danger','',"Please upload a Picture!");
		return false;
	}
	if($("#ProductionPlaceCode").val()==-1){
		showAlert('danger','',"Please select Production Place!");
		return false;
	}
	if($("#SellPrice").val()=='' || isNaN($("#SellPrice").val())){
		showAlert('danger','',"Please enter the correct price!");
		return false;
	}
	if($("#Quantity").val()=='' || isNaN($("#Quantity").val())){
		showAlert('danger','',"Please enter the correct Quantity!");
		return false;
	}*/
	var user = new Object();
//	user.avatar = $("#avatar").attr('src');
	user.username = $("#username").val();
	user.email = $("#email").val();
	user.country = $("#country").val();
	user.status = $("#status").val();
	user.birthday = $("#birthday").val();
	user.gender = $('input[name="gender"]:checked').val();
	user.id = $("#userId").val();
	user.phone1=$("#phone1").val();
	user.phone2=$("#phone2").val();
	user.phone3=$("#phone3").val();
	user.homephone1=$("#homephone1").val();
	user.homephone2=$("#homephone2").val();
	user.homephone3=$("#homephone3").val();
	dataHandler('modify','userInfoByAdmin',user,null,null,null,successMsg,true);
}
var productId='';
function showStatus(_productName,_productId,_statusNo){
	setDivCenter('#statusDialog',true);
	$("#productName").text(_productName);
	$("#productStatus").val(_statusNo);
	productId=_productId;
}
var merchantId='';
function showMerchantStatus(_userName,_userId,_statusNo){
	setDivCenter('#statusDialog',true);
	$("#userName").text(_userName);
	$("#merchantStatus").val(_statusNo);
	merchantId=_userId;
}
function saveProductStatus(){
	var proStatus = new Object();
	proStatus.id = productId;
	proStatus.status = $("#productStatus").val();
	dataHandler("modify","proStatus",proStatus,successProStatus,null,null,null,true);
}
function saveMerchantStatus(){
	var merchantStatus = new Object();
	merchantStatus.id = merchantId;
	merchantStatus.status = $("#merchantStatus").val();
	merchantStatus.ifSendEmail = $("#notifySellerStatus").prop('checked');
	dataHandler("modify","merchantStatus",merchantStatus,successProStatus,null,null,null,true);
}
function successProStatus(){
	alert('Successfully saved!');
}
function showCat(catId,display){
	var displayCat = new Object();
	displayCat.id = catId;
	displayCat.display = display;
	dataHandler("modify","displayCat",displayCat,successShowCat,null,null,null,true);
}
function successShowCat(){
	alert('Successfully saved!');
}
function successDelete(){
	alert('Successfully deleted!');
}
function showChangeImageDiv(tag,postionNo,catId){
	setDivCenter('#changeHomeFeaturedImageDiv',true);
	$("#titleInput").val($(tag).attr('title'));
	$("#linkInput").val($(tag).attr('catlink'));
	$("#featuredImage").attr('src',$(tag).attr('src'));
	$("#postionNo").val(postionNo);
	$("#catId").val(catId);
}
function saveHomeFeaturedImage(){
	var featuredProduct = new Object();
	featuredProduct.catId = $("#catId").val();
	featuredProduct.position = $("#postionNo").val();
	featuredProduct.title = $("#titleInput").val();
	featuredProduct.link = $("#linkInput").val();
	featuredProduct.image = $("#featuredImage").attr('src');
	dataHandler("modify","featuredProduct",featuredProduct,successShowCat,null,null,null,true);
}
function deleteHomeFeaturedImage(){
	$("#titleInput").val('');
	$("#linkInput").val('');
	$("#featuredImage").attr('src','');
	saveHomeFeaturedImage();
}
function uploadFeaturedImage(){
	uploadImageAdvance("#upload_featuredImage_form",addFeaturedImageBeforeUpload,addFeaturedImageAfterUpload)
}
function addFeaturedImageBeforeUpload(){
	$("#featuredImage").attr('src','/assets/images/cms/loading.gif');
}
function addFeaturedImageAfterUpload(imageSrc){
	//update database
	$("#featuredImage").attr('src',imageSrc);
}
function modifyCategory(tag,id){
	setDivCenter('#changeCategoryDiv',true);
	$("#categoryId").val(id);
	$("#nameInput").val($(tag).attr('categoryName'));
}
function saveCategory(){
	var category = new Object();
	category.id = $("#categoryId").val();
	category.name = $("#nameInput").val();
	dataHandler("modify","category",category,successShowCat,null,null,null,true);
}
function deleteCategory(tag,id){
	var category = new Object();
	category.id = id;
	dataHandler("del","category",category,successDelete,'Sure to delete this category? ['+$(tag).attr('categoryName')+']',null,null,true);
}
function addCategory(){
	var category = new Object();
	category.fid = $("#fid").val();
	category.name = $("#newCatNameInput").val();
	dataHandler("add","category",category,successShowCat,null,null,null,true);
}
function deleteCheckedUsers(){
	var usersArray = new Array();
	$("input[name='checkedUserId']:checked").each(function(){
		usersArray.push($(this).val()); 
	});
	if(usersArray.length<1){
		alert('Please select users.');
		return false;
	}
	var users = new Object();
	users.idArray = usersArray;
	dataHandler("delBulk","users",users,successShowCat,'Sure to delete these users?',null,null,true);
}
function deleteCheckedMerchants(){
	var merchantsArray = new Array();
	$("input[name='checkedUserId']:checked").each(function(){
		merchantsArray.push($(this).val()); 
	});
	if(merchantsArray.length<1){
		alert('Please select merchants.');
		return false;
	}
	var merchants = new Object();
	merchants.idArray = merchantsArray;
	dataHandler("delBulk","merchants",merchants,successShowCat,'Sure to delete these merchants?',null,null,true);
}
function statusCheckedUsers(){
	var usersArray = new Array();
	$("input[name='checkedUserId']:checked").each(function(){
		usersArray.push($(this).val()); 
	});
	if(usersArray.length<1){
		alert('Please select users.');
		return false;
	}
	var users = new Object();
	users.idArray = usersArray;
	users.status = $("#statusChanged").val();
	dataHandler("statusBulk","users",users,successShowCat,'Sure to modify the status of these users?',null,null,true);
}
function statusCheckedMerchants(){
	var merchantsArray = new Array();
	$("input[name='checkedUserId']:checked").each(function(){
		merchantsArray.push($(this).val()); 
	});
	if(merchantsArray.length<1){
		alert('Please select merchants.');
		return false;
	}
	var merchants = new Object();
	merchants.idArray = merchantsArray;
	merchants.status = $("#statusChanged").val();
	dataHandler("statusBulk","merchants",merchants,successShowCat,'Sure to modify the status of these merchants?',null,null,true);
}
function orderCategory(id,direction){
	var category = new Object();
	category.id = id;
	category.direction = direction;
	dataHandler("modify","categoryOrder",category,null,null,null,null,true);
}
function deleteCheckedItems(){
	var itemsArray = new Array();
	$("input[name='checkedUserId']:checked").each(function(){
		itemsArray.push($(this).val()); 
	});
	if(itemsArray.length<1){
		alert('Please select items.');
		return false;
	}
	var items = new Object();
	items.idArray = itemsArray;
	dataHandler("delBulk","items",items,successShowCat,'Sure to delete these items?',null,null,true);
}
function statusCheckedItems(){
	var itemsArray = new Array();
	$("input[name='checkedUserId']:checked").each(function(){
		itemsArray.push($(this).val()); 
	});
	if(itemsArray.length<1){
		alert('Please select items.');
		return false;
	}
	var items = new Object();
	items.idArray = itemsArray;
	items.status = $("#statusChanged").val();
	dataHandler("statusBulk","items",items,successShowCat,'Sure to modify the status of these items?',null,null,true);
}
function selectMerchantStatus(tag){
	location.href='/admin/emailMerchantAccountApproval?status='+$(tag).val();
}
function showMutiChangeImageDiv(){
	setDivCenter('#changeMutiHomeFeaturedImageDiv',true);
}

function successPublished(){
	alert('Successfully published!');
}

/*
function pubNotice(){
	var notice = new Object();
	notice.idArray = itemsArray;
	notice.status = $("#statusChanged").val();
	dataHandler("add","notice",notice,successShowCat,'Sure to publish this?',null,null,true);
}*/
/*Example:
$(".slider-item").mouseout(function(){
	$(this).find('.oper').hide();
	$(this).find('.img-layer').hide();
});
$(".slider-item").mouseover(function(){
	$(this).find('.oper').show();
	$(this).find('.img-layer').show();
});
function upload_scroll(){
	$('#uploadScrollForm').ajaxSubmit({
		success: function (data) {
			var result=$.parseJSON(data);
			if(result.code){
				add_new_scroll(result.message);
			}else{
				alert(result.message);
			}
		},
		url: "/cms/index/upload_img",
		data: $('#uploadScrollForm').formSerialize(),
		type: 'POST',
		beforeSubmit: function () {
			$("#img_add").attr("src","/assets/images/cms/loading.gif");
		}
	});
	return false;
}
function scroll_delete(scrollid,order,amount){
	if(confirm("确定删除该滚动图片？")){
		$.post(
			"/kmadmin/admin/del_info",
			{
				'info_type':"scroll",
				'scrollid':scrollid,
				'order':order,
				'amount':amount
			},
			function(data){
				var result=$.parseJSON(data);
				if(result.result=="success"){
					location.reload();
				}else{
					alert(result.message);
				}
			});
	}
}
function app_union_click(appid){
	setDivCenter("#appUnionDialog");
	$("#bkDiv").show();
	app_id=appid;
	$.post(
	"/kmadmin/admin/get_allunion",
	{
		'appid':appid
	},
	function(data){
		var result=$.parseJSON(data);
		if(result.result=="success"){
			var uniondata=result.message;
			$("#unionlist").html("");
			for(var unionid in uniondata){
//				$("#per_mall").prop("checked",true);
//				$("#per_mall").removeAttr("checked");
//				alert(uniondata[unionid]["unionname"]);
				if(uniondata[unionid]["has"]==1)
					$("#unionlist").append('<li><input checked type="checkbox" unionid="'+unionid+'">'+uniondata[unionid]["unionname"]+'</li>');
				else
					$("#unionlist").append('<li><input type="checkbox" unionid="'+unionid+'">'+uniondata[unionid]["unionname"]+'</li>');
			}
		}else{
			alert(result.message);
		}
	});
}
function save_app_union(){
	//app_union(appid,unionid,type)($("#id").attr("checked")==true
	$("#unionlist li").each(function(){
		if($(this).find("input").prop("checked")){
			app_union(app_id,$(this).find("input").attr("unionid"),"add");
		}else{
			app_union(app_id,$(this).find("input").attr("unionid"),"drop");
		}
	});
}
//app_union('<?php echo $a->id_app;?>','<?php echo $necessity->id_marketunion;?>','add')
function closeUnionDialog(){
	$("#appUnionDialog").hide();
	$("#bkDiv").hide();
}
*/