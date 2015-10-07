<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
	<link rel="stylesheet" href="/assets/css/base.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/cms.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/template.css" type="text/css"/>
    <script src="/assets/js/jquery.js" type="text/javascript"></script>
	<script src="/assets/js/admin-common.js" type="text/javascript"></script>
	<script src="/assets/js/admin.js" type="text/javascript"></script>
	<script src="/assets/js/jquery.form.js" type="text/javascript"></script>
</head>
<body>
<div class="" style="padding-left:30px;">
	<input id="userId" type="hidden" value="<?php echo $user->user_id;?>">
	<div class="km-panel km-panel-primary" style="width: 98%;margin-top:20px;">
		<div class="km-panel-heading">Step 01</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width20p">Email</td>
					<td class="value bl1"><input id="email" type="text" value="<?php echo $user->user_email;?>" class="inp-txt" style="width:90%"></td>
					<td class="field width20p bl1">Username</td>
					<td class="value bl1"><input id="username" type="text" value="<?php echo $user->user_username;?>" class="inp-txt" style="width:90%"></td>
				  </tr>
				  <tr>
					<td class="field width20p">Gender</td>
					<td class="value bl1">
						<input id="genderMale" type="radio" name="gender" value="0" <?php echo $user->user_gender==0?'checked':'';?> style="vertical-align: middle;">
						<label for="genderMale">Male</label>
						<input id="genderFemale" type="radio" name="gender" value="1" <?php echo $user->user_gender==1?'checked':'';?> style="vertical-align: middle;">
						<label for="genderFemale">Female</label>
					</td>
					<td class="field width20p bl1">Country</td>
					<td class="value bl1">
						<select class="select" id="country">
							<option value="">Choose Country</option>
							<option value="SG" <?php echo $user->user_country=='SG'?'selected':'';?>>Singapore</option>
							<option value="AU" <?php echo $user->user_country=='AU'?'selected':'';?>>Australia</option>
							<option value="BR" <?php echo $user->user_country=='BR'?'selected':'';?>>Brazil</option>
							<option value="BN" <?php echo $user->user_country=='BN'?'selected':'';?>>Brunei Darussalam</option>
							<option value="CA" <?php echo $user->user_country=='CA'?'selected':'';?>>Canada</option>
							<option value="CN" <?php echo $user->user_country=='CN'?'selected':'';?>>China</option>
							<option value="DK" <?php echo $user->user_country=='DK'?'selected':'';?>>Denmark</option>
							<option value="EG" <?php echo $user->user_country=='EG'?'selected':'';?>>Egypt</option>
							<option value="FI" <?php echo $user->user_country=='FI'?'selected':'';?>>Finland</option>
							<option value="FR" <?php echo $user->user_country=='FR'?'selected':'';?>>France</option>
							<option value="DE" <?php echo $user->user_country=='DE'?'selected':'';?>>Germany</option>
							<option value="GR" <?php echo $user->user_country=='GR'?'selected':'';?>>Greece</option>
							<option value="HK" <?php echo $user->user_country=='HK'?'selected':'';?>>Hong Kong</option>
							<option value="HU" <?php echo $user->user_country=='HU'?'selected':'';?>>Hungary</option>
							<option value="IN" <?php echo $user->user_country=='IN'?'selected':'';?>>India</option>
							<option value="ID" <?php echo $user->user_country=='ID'?'selected':'';?>>Indonesia</option>
							<option value="IL" <?php echo $user->user_country=='IL'?'selected':'';?>>Israel</option>
							<option value="IT" <?php echo $user->user_country=='IT'?'selected':'';?>>Italy</option>
							<option value="JP" <?php echo $user->user_country=='JP'?'selected':'';?>>Japan</option>
							<option value="KW" <?php echo $user->user_country=='KW'?'selected':'';?>>Kuwait</option>
							<option value="MO" <?php echo $user->user_country=='MO'?'selected':'';?>>Macau</option>
							<option value="MY" <?php echo $user->user_country=='MY'?'selected':'';?>>Malaysia</option>
							<option value="MX" <?php echo $user->user_country=='MX'?'selected':'';?>>Mexico</option>
							<option value="MM" <?php echo $user->user_country=='MM'?'selected':'';?>>Myanma</option>
							<option value="NL" <?php echo $user->user_country=='NL'?'selected':'';?>>Netherlands</option>
							<option value="NZ" <?php echo $user->user_country=='NZ'?'selected':'';?>>New Zealand</option>
							<option value="NO" <?php echo $user->user_country=='NO'?'selected':'';?>>Norway</option>
							<option value="PH" <?php echo $user->user_country=='PH'?'selected':'';?>>Philippines</option>
							<option value="PL" <?php echo $user->user_country=='PL'?'selected':'';?>>Poland</option>
							<option value="PT" <?php echo $user->user_country=='PT'?'selected':'';?>>Portugal</option>
							<option value="RU" <?php echo $user->user_country=='RU'?'selected':'';?>>Russia</option>
							<option value="SG" <?php echo $user->user_country=='SG'?'selected':'';?>>Singapore</option>
							<option value="KR" <?php echo $user->user_country=='KR'?'selected':'';?>>South Korea</option>
							<option value="ES" <?php echo $user->user_country=='ES'?'selected':'';?>>Spain</option>
							<option value="SE" <?php echo $user->user_country=='SE'?'selected':'';?>>Sweden</option>
							<option value="CH" <?php echo $user->user_country=='CH'?'selected':'';?>>Switzerland</option>
							<option value="TW" <?php echo $user->user_country=='TW'?'selected':'';?>>Taiwan</option>
							<option value="TH" <?php echo $user->user_country=='TH'?'selected':'';?>>Thailand</option>
							<option value="TR" <?php echo $user->user_country=='TR'?'selected':'';?>>Turkey</option>
							<option value="GB" <?php echo $user->user_country=='GB'?'selected':'';?>>United Kingdom</option>
							<option value="US" <?php echo $user->user_country=='US'?'selected':'';?>>United States</option>
							<option value="VN" <?php echo $user->user_country=='VN'?'selected':'';?>>Vietnam</option>
						</select>
					</td>
				  </tr>
				  <tr style="border-top: 1px dashed #337ab7 !important;">
					<td class="field width20p">Date of Birth</td>
					<td class="value bl1">
						<input id="birthday" type="date" value="<?php echo $user->user_birthday;?>" class="inp-txt">
					</td>
					<td class="field width20p bl1">Address</td>
					<td class="value bl1">
						<button onclick="setDivCenter('#addressDiv',true);selectAddress(1);" type="button" class="km-btn km-btn-primary" style=" height: 23px;font-size: 10px;padding: 0px 10px;">Address Book</button>
						<div class="km-modal-dialog" style="width:70%;" id="addressDiv">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title">Personal Info - Address</h4>
								</div>
								<div class="km-modal-body">
								<!--//1.shipAddress 2.Family 3.Work 4.Friends 5.Etc.-->
									<ul id="addressTypeList" class="km-nav km-nav-tabs clearfix">
									  <li class="active"><a href="javascript:selectAddress(1);">Family</a></li>
									  <li><a href="javascript:selectAddress(2);">Friends</a></li>
									  <li><a href="javascript:selectAddress(3);">Work</a></li>
									  <li><a href="javascript:selectAddress(4);">Others</a></li>
									  <li><a href="javascript:setDivCenter('#addAddressDiv',true);"><img src="/assets/images/cms/icon-plus.png" width="15"></a></li>
									</ul>
									<div id="familyAddress">
										<ul class="clearfix" id="addressList">
											
										</ul>
									</div>
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close">Close</button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
						<div class="km-modal-dialog" id="editAddressDiv" style="width:520px;z-index: 10051;">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-edit-address-close" onclick="$('#editAddressDiv').hide();"><span>&times;</span></button>
									<h4 class="km-modal-title">Personal Info - Edit Address</h4>
									<input type="hidden" id="addressId">
								</div>
								<div class="km-modal-body">
								<!--//1.shipAddress 2.Family 3.Work 4.Friends 5.Etc.-->
									<label for="addressTypeModification" class="km-control-label" style="width: 100px;margin-top:10px;">Type:</label>
									<select id="addressTypeModification" style="height:30px;vertical-align:middle;">
										<option value="1">Family</option>
										<option value="2">Friends</option>
										<option value="3">Work</option>
										<option value="4">Others</option>
									</select><br><br>
									<label for="addressTitleModification" class="km-control-label" style="width: 100px;">Address Name:</label>
									<input type="text" class="km-form-control" id="addressTitleModification" value="" style="width: 50%;height: 30px;padding: 0 5px;display: inline-block;"><br><br>
									<label for="addressStaffNameModification" class="km-control-label" style="width: 100px;">Recipient:</label>
									<input type="text" class="km-form-control" id="addressStaffNameModification" value="" style="width: 50%;height: 30px;padding: 0 5px;display: inline-block;"><br><br>
									<label for="addressCountryModification" class="km-control-label" style="width: 100px;">Country:</label>
									<select id="addressCountryModification" style="height: 30px;width:30%;"><?php require('countryPhoneNO.php');?></select><br><br>
									<label for="addressDetailModification" class="km-control-label" style="width: 100px;">Address:</label>
									<input type="text" class="km-form-control" id="addressDetailModification" value="" style="width: 365px;height: 30px;padding: 0 5px;display: inline-block;"><br><br>
									
									<label for="addressMobilephone1Modification" class="km-control-label" style="width: 120px;">Mobile Phone:</label>
									<select id="addressMobilephone1Modification" style="height: 30px;width:125px;"><?php require('countryPhoneNO.php');?></select>
									<input type="text" class="km-form-control" id="addressMobilephone2Modification" value="" style="width: 20%;height: 30px;padding: 0 5px;display: inline-block;">-
									<input type="text" class="km-form-control" id="addressMobilephone3Modification" value="" style="width: 20%;height: 30px;padding: 0 5px;display: inline-block;"><br><br>
									<label for="addressPhone1Modification" class="km-control-label" style="width: 120px;">Phone Number:</label>
									<select id="addressPhone1Modification" style="height: 30px;width:125px;"><?php require('countryPhoneNO.php');?></select>
									<input type="text" class="km-form-control" id="addressPhone2Modification" value="" style="width: 20%;height: 30px;padding: 0 5px;display: inline-block;">-
									<input type="text" class="km-form-control" id="addressPhone3Modification" value="" style="width: 20%;height: 30px;padding: 0 5px;display: inline-block;">
									
								</div>
								<div class="km-modal-footer">
									<button onclick="saveAddress();" type="button" class="km-btn km-btn-primary">Save</button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
						<div class="km-modal-dialog" id="addAddressDiv" style="width:520px;z-index: 10051;">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-add-address-close" onclick="$('#addAddressDiv').hide();"><span>&times;</span></button>
									<h4 class="km-modal-title">Personal Info - Add Address</h4>
								</div>
								<div class="km-modal-body">
								<!--//1.shipAddress 2.Family 3.Work 4.Friends 5.Etc.-->
									<label for="addressType" class="km-control-label" style="width: 100px;margin-top:10px;">Type:</label>
									<select id="addressType" style="height:30px;vertical-align:middle;">
										<option value="1">Family</option>
										<option value="2">Friends</option>
										<option value="3">Work</option>
										<option value="4">Others</option>
									</select><br><br>
									<label for="addressTitle" class="km-control-label" style="width: 100px;">Address Name:</label>
									<input type="text" class="km-form-control" id="addressTitle" value="" style="width: 50%;height: 30px;padding: 0 5px;display: inline-block;"><br><br>
									<label for="addressStaffName" class="km-control-label" style="width: 100px;">Recipient:</label>
									<input type="text" class="km-form-control" id="addressStaffName" value="" style="width: 50%;height: 30px;padding: 0 5px;display: inline-block;"><br><br>
									<label for="addressCountry" class="km-control-label" style="width: 100px;">Country:</label>
									<select id="addressCountry" style="height: 30px;width:30%;"><?php require('countryPhoneNO.php');?></select><br><br>
									<label for="addressDetail" class="km-control-label" style="width: 100px;">Address:</label>
									<input type="text" class="km-form-control" id="addressDetail" value="" style="width: 365px;height: 30px;padding: 0 5px;display: inline-block;"><br><br>
									
									<label for="addressMobilephone1" class="km-control-label" style="width: 120px;">Mobile Phone:</label>
									<select id="addressMobilephone1" style="height: 30px;width:125px;"><?php require('countryPhoneNO.php');?></select>
									<input type="text" class="km-form-control" id="addressMobilephone2" value="" style="width: 20%;height: 30px;padding: 0 5px;display: inline-block;">-
									<input type="text" class="km-form-control" id="addressMobilephone3" value="" style="width: 20%;height: 30px;padding: 0 5px;display: inline-block;"><br><br>
									<label for="addressPhone1" class="km-control-label" style="width: 120px;">Phone Number:</label>
									<select id="addressPhone1" style="height: 30px;width:125px;"><?php require('countryPhoneNO.php');?></select>
									<input type="text" class="km-form-control" id="addressPhone2" value="" style="width: 20%;height: 30px;padding: 0 5px;display: inline-block;">-
									<input type="text" class="km-form-control" id="addressPhone3" value="" style="width: 20%;height: 30px;padding: 0 5px;display: inline-block;">
									
								</div>
								<div class="km-modal-footer">
									<button onclick="addAddress();" type="button" class="km-btn km-btn-primary">Add</button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
				  </tr>
				  <tr style="border-top: 1px dashed #337ab7 !important;">
					<td class="field width20p">Contacts</td>
					<td class="value bl1" colspan="3">
						<div class="gsm_phone" style="width: 290px;margin: 5px auto;">
							<input type="text" id="phone1" class="inp-txt" style="width: 60px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $user->merchant_phone1;?>" title="Country Code" placeholder="Country Code"> - 
							<input type="text" id="phone2" class="inp-txt" style="width: 60px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $user->merchant_phone2;?>" title="Area Code" placeholder="Area Code"> - 
							<input type="text" id="phone3" class="inp-txt" style="width: 120px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $user->merchant_phone3;?>" title="Number" placeholder="Number">
						</div>
						<div class="gsm_home" style="width: 290px;margin: 5px auto;">
							<input type="text" id="homephone1" class="inp-txt" style="width: 60px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $user->merchant_phone1;?>" title="Country Code" placeholder="Country Code"> - 
							<input type="text" id="homephone2" class="inp-txt" style="width: 60px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $user->merchant_homephone2;?>" title="Area Code" placeholder="Area Code"> - 
							<input type="text" id="homephone3" class="inp-txt" style="width: 120px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $user->merchant_homephone3;?>" title="Number" placeholder="Number">
						</div>
					</td>
				  </tr>
				  <tr>
					<td class="field width20p">Status</td>
					<td class="value bl1">
						<select id="status" style="height: 30px;">
							<option value="0" <?php echo $user->user_state==0?'selected':'';?>>Normal</option>
							<option value="1" <?php echo $user->user_state==1?'selected':'';?>>Frozen</option>
						</select>
					</td>
					<td class="field width20p bl1">Register Time</td>
					<td class="value bl1">
						<?php echo $user->user_reg_time;?>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<!--
	<div class="km-panel km-panel-primary" style="width: 98%;">
		<div class="km-panel-heading">User Infomation</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width15p br">Avatar</td>
					<td class="value width17p tac br">
						<div class="km-upload-img" style="width: 100px;  margin: 0 auto;" onclick="$('#file').click();">
							<img src="<?php echo $user->user_avatar;?>" width="100" height="100" id="avatar">
							<p style="line-height: 100px;font-size:13px;">Upload Image</p>
						</div>
						<form id="upload_image_form" method="post" enctype="multipart/form-data">
							<input onchange="return uploadAvatarImage('#uploadImgThumb')" name="image" type="file" id="file" style="display:none;" accept="image/*">
						</form>
					</td>
					<td class="field width15p br">Username</td>
					<td class="value width17p"><input id="username" type="text" class="inp-txt width100p" value="<?php echo $user->user_username;?>"></td>
					</tr>
				  <tr>
					<td class="field width15p br">Email</td>
					<td class="value width17p br"><input id="email" type="text" class="inp-txt" value="<?php echo $user->user_email;?>"></td>
					<td class="field width15p br">Phone</td>
					<td class="value width17p"><input id="phone" type="text" class="inp-txt" value="<?php echo $user->user_phone;?>"></td>
				  </tr>
				  <tr>
					<td class="field width15p br">Gender</td>
					<td class="value width17p br">
						<input type="radio" name="gender" value="0" id="male" <?php echo $user->user_gender==0?'checked':'';?>><label for="male">Male</label>
						<input type="radio" name="gender" value="1" id="female" <?php echo $user->user_gender==1?'checked':'';;?>><label for="female">Female</label>
					</td>
					<td class="field width15p br">Status</td>
					<td class="value width17p">
						<select id="status" style="height: 30px;">
							<option value="0" <?php echo $user->user_state==0?'selected':'';?>>Normal</option>
							<option value="1" <?php echo $user->user_state==1?'selected':'';?>>Frozen</option>
						</select>
					</td>
				  </tr>
				  <tr>
					<td class="field width15p br">Register Time</td>
					<td class="value width17p br">
						<?php echo $user->user_reg_time;?>
					</td>
					<td class="field width15p br">Birthday</td>
					<td class="value width17p"><input id="birthday" type="date" class="inp-txt" value="<?php echo $user->user_birthday;?>"></td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	-->
	<button onclick="userHandler('This user was saved successfully');" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Save</button>
</div>
<div id="waitDiv"><img src="/assets/images/cms/loading.gif"></div>
<div id="bkDiv"></div>
<div id="messageAlert" class="km-alert km-alert-dismissible fade in width40p hide">
  <button type="button" class="km-close" onclick="$('#messageAlert').hide();"><span>×</span></button>
  <strong></strong>
  <span class="km-alert-msg"></span>
</div>
<script type="text/javascript">
var _currentAddressType;
function selectAddress(type){
	$("#addressTypeList li").removeClass('active');
	$("#addressTypeList li:eq("+(type-1)+")").addClass('active');
	_currentAddressType=type;
	$("#addressList").html('');
	var address = new Object();
	address.userId = $("#userId").val();
	address.type = type;
	dataHandler("get","addressList",address,getAddressListHandler,null,null,null,false);
}
function getAddressListHandler(data){
	var listHtml='';
	for(var i=0;i<data.length;i++){
		var item='<li class="clearfix">	'+
				'	<div class="addressList-Title fl">	'+
				'		<span>'+data[i].address_title+'</span>	'+
				'	</div>	'+
				'	<div class="addressList-address fl">	'+
				'		<p>	'+
				'			'+data[i].address_staffname+'	'+
				'		</p>	'+
				'		<p>	'+
				'			'+data[i].address_detail+','+data[i].address_country+'	'+
				'		</p>	'+
				'	</div>	'+
				'	<div class="addressList-phone fl">	'+
				'		<p class="gsm_phone"><em>'+data[i].address_mobilephone1+'-'+data[i].address_mobilephone2+'-'+data[i].address_mobilephone3+'</em></p>	'+
				'		<p class="gsm_home"><em>'+data[i].address_phone1+'-'+data[i].address_phone2+'-'+data[i].address_phone3+'</em></p>	'+
				'	</div>	'+
				'	<div class="addressList-operation fl">	'+
				'		<button onclick="editAddress('+data[i].address_id+');" type="button" class="km-btn km-btn-primary" style="height:18px;font-size:10px;padding: 0 10px;">Edit</button>	'+
				'		<button onclick="deleteAddress('+data[i].address_id+',\'Sure to delete this address?\',\'Success!\');" type="button" class="km-btn km-btn-danger" style="height:18px;font-size:10px;padding: 0 10px;">Delete</button>	'+
				'	</div>	'+
				'</li>';
		listHtml+=item;
	}
	$("#addressList").html(listHtml);
}
function deleteAddress(id,confirmMsg,successMsg){
	var address = new Object();
	address.id = id;
	dataHandler("del","address",address,refreshAddressList,confirmMsg,null,successMsg,false);
}
function refreshAddressList(){
	selectAddress(_currentAddressType);
}
function editAddress(id){
	setDivCenter('#editAddressDiv',true);
	var address = new Object();
	address.id = id;
	dataHandler("get","address",address,getAddressHandler,null,null,null,false);
}
function getAddressHandler(data){
	 $("#addressId").val(data.address_id);
	 $("#addressTypeModification").val(data.address_type);
	 $("#addressTitleModification").val(data.address_title);
	 $("#addressStaffNameModification").val(data.address_staffname);
	 $("#addressCountryModification").val(data.address_country);
//	 $("#addressAreaModification").val(data.address_area);
	 $("#addressDetailModification").val(data.address_detail);
	 $("#addressMobilephone1Modification").val(data.address_mobilephone1);
	 $("#addressMobilephone2Modification").val(data.address_mobilephone2);
	 $("#addressMobilephone3Modification").val(data.address_mobilephone3);
	 $("#addressPhone1Modification").val(data.address_phone1);
	 $("#addressPhone2Modification").val(data.address_phone2);
	 $("#addressPhone3Modification").val(data.address_phone3);
}
function saveAddress(){
	var address = new Object();
	address.id = $("#addressId").val();
	address.type = $("#addressTypeModification").val();
	address.title = $("#addressTitleModification").val();
	address.staffname = $("#addressStaffNameModification").val();
	address.country = $("#addressCountryModification").val();
//	address.area = $("#addressAreaModification").val();
	address.detail = $("#addressDetailModification").val();
	address.mobilephone1 = $("#addressMobilephone1Modification").val();
	address.mobilephone2 = $("#addressMobilephone2Modification").val();
	address.mobilephone3 = $("#addressMobilephone3Modification").val();
	address.phone1 = $("#addressPhone1Modification").val();
	address.phone2 = $("#addressPhone2Modification").val();
	address.phone3 = $("#addressPhone3Modification").val();
	dataHandler("modify","address",address,successSaveAddress,null,null,null,false);
}
function initEditAddress(){
	$("#addressId").val('');
	$("#addressTypeModification").val('');
	$("#addressTitleModification").val('');
	$("#addressStaffNameModification").val('');
	$("#addressCountryModification").val('');
	$("#addressDetailModification").val('');
	$("#addressMobilephone1Modification").val('');
	$("#addressMobilephone2Modification").val('');
	$("#addressMobilephone3Modification").val('');
	$("#addressPhone1Modification").val('');
	$("#addressPhone2Modification").val('');
	$("#addressPhone3Modification").val('');
}
function successSaveAddress(){
	$("#editAddressDiv").hide();
	initEditAddress();
	selectAddress(_currentAddressType);
}
function initAddAddress(){
	$("#addressType").val('');
	$("#addressTitle").val('');
	$("#addressStaffName").val('');
	$("#addressCountry").val('');
	$("#addressDetail").val('');
	$("#addressMobilephone1").val('');
	$("#addressMobilephone2").val('');
	$("#addressMobilephone3").val('');
	$("#addressPhone1").val('');
	$("#addressPhone2").val('');
	$("#addressPhone3").val('');
}
function addAddress(){
	var address = new Object();
	address.userId = $("#userId").val();
	address.type = $("#addressType").val();
	address.title = $("#addressTitle").val();
	address.staffname = $("#addressStaffName").val();
	address.country = $("#addressCountry").val();
//	address.area = $("#addressArea").val();
	address.detail = $("#addressDetail").val();
	address.mobilephone1 = $("#addressMobilephone1").val();
	address.mobilephone2 = $("#addressMobilephone2").val();
	address.mobilephone3 = $("#addressMobilephone3").val();
	address.phone1 = $("#addressPhone1").val();
	address.phone2 = $("#addressPhone2").val();
	address.phone3 = $("#addressPhone3").val();
	dataHandler("add","address",address,successAddAddress,null,null,null,false);
}
function successAddAddress(){
	$("#addAddressDiv").hide();
	initAddAddress();
	selectAddress(_currentAddressType);
}
</script>
</body>
</html>