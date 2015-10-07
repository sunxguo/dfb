<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Modify Merchant</title>
	<link rel="stylesheet" href="/assets/css/base.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/cms.css" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/template.css" type="text/css"/>
    <script src="/assets/js/jquery.js" type="text/javascript"></script>
	<script src="/assets/js/cms-common.js" type="text/javascript"></script>
	<script src="/assets/js/jquery.form.js" type="text/javascript"></script>
</head>
<body>
<div class="" style="padding-left:30px;">
	<input id="merchantId" type="hidden" value="<?php echo $_GET['merchantId'];?>">
	<div class="km-panel km-panel-primary" style="width: 98%;margin-top:20px;">
		<div class="km-panel-heading">Step 01</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width20p">Email</td>
					<td class="value bl1"><input id="email" type="text" value="<?php echo $merchant->user_email;?>" class="inp-txt" style="width:90%"></td>
					<td class="field width20p bl1">Username</td>
					<td class="value bl1"><input id="username" type="text" value="<?php echo $merchant->user_username;?>" class="inp-txt" style="width:90%"></td>
				  </tr>
				  <tr>
					<td class="field width20p">Gender</td>
					<td class="value bl1">
						<input id="genderMale" type="radio" name="gender" value="0" <?php echo $merchant->user_gender==0?'checked':'';?> style="vertical-align: middle;">
						<label for="genderMale">Male</label>
						<input id="genderFemale" type="radio" name="gender" value="1" <?php echo $merchant->user_gender==1?'checked':'';?> style="vertical-align: middle;">
						<label for="genderFemale">Female</label>
					</td>
					<td class="field width20p bl1">Country</td>
					<td class="value bl1">
						<select class="select" id="country">
							<option value="">Choose Country</option>
							<option value="SG" <?php echo $merchant->user_country=='SG'?'selected':'';?>>Singapore</option>
							<option value="AU" <?php echo $merchant->user_country=='AU'?'selected':'';?>>Australia</option>
							<option value="BR" <?php echo $merchant->user_country=='BR'?'selected':'';?>>Brazil</option>
							<option value="BN" <?php echo $merchant->user_country=='BN'?'selected':'';?>>Brunei Darussalam</option>
							<option value="CA" <?php echo $merchant->user_country=='CA'?'selected':'';?>>Canada</option>
							<option value="CN" <?php echo $merchant->user_country=='CN'?'selected':'';?>>China</option>
							<option value="DK" <?php echo $merchant->user_country=='DK'?'selected':'';?>>Denmark</option>
							<option value="EG" <?php echo $merchant->user_country=='EG'?'selected':'';?>>Egypt</option>
							<option value="FI" <?php echo $merchant->user_country=='FI'?'selected':'';?>>Finland</option>
							<option value="FR" <?php echo $merchant->user_country=='FR'?'selected':'';?>>France</option>
							<option value="DE" <?php echo $merchant->user_country=='DE'?'selected':'';?>>Germany</option>
							<option value="GR" <?php echo $merchant->user_country=='GR'?'selected':'';?>>Greece</option>
							<option value="HK" <?php echo $merchant->user_country=='HK'?'selected':'';?>>Hong Kong</option>
							<option value="HU" <?php echo $merchant->user_country=='HU'?'selected':'';?>>Hungary</option>
							<option value="IN" <?php echo $merchant->user_country=='IN'?'selected':'';?>>India</option>
							<option value="ID" <?php echo $merchant->user_country=='ID'?'selected':'';?>>Indonesia</option>
							<option value="IL" <?php echo $merchant->user_country=='IL'?'selected':'';?>>Israel</option>
							<option value="IT" <?php echo $merchant->user_country=='IT'?'selected':'';?>>Italy</option>
							<option value="JP" <?php echo $merchant->user_country=='JP'?'selected':'';?>>Japan</option>
							<option value="KW" <?php echo $merchant->user_country=='KW'?'selected':'';?>>Kuwait</option>
							<option value="MO" <?php echo $merchant->user_country=='MO'?'selected':'';?>>Macau</option>
							<option value="MY" <?php echo $merchant->user_country=='MY'?'selected':'';?>>Malaysia</option>
							<option value="MX" <?php echo $merchant->user_country=='MX'?'selected':'';?>>Mexico</option>
							<option value="MM" <?php echo $merchant->user_country=='MM'?'selected':'';?>>Myanma</option>
							<option value="NL" <?php echo $merchant->user_country=='NL'?'selected':'';?>>Netherlands</option>
							<option value="NZ" <?php echo $merchant->user_country=='NZ'?'selected':'';?>>New Zealand</option>
							<option value="NO" <?php echo $merchant->user_country=='NO'?'selected':'';?>>Norway</option>
							<option value="PH" <?php echo $merchant->user_country=='PH'?'selected':'';?>>Philippines</option>
							<option value="PL" <?php echo $merchant->user_country=='PL'?'selected':'';?>>Poland</option>
							<option value="PT" <?php echo $merchant->user_country=='PT'?'selected':'';?>>Portugal</option>
							<option value="RU" <?php echo $merchant->user_country=='RU'?'selected':'';?>>Russia</option>
							<option value="SG" <?php echo $merchant->user_country=='SG'?'selected':'';?>>Singapore</option>
							<option value="KR" <?php echo $merchant->user_country=='KR'?'selected':'';?>>South Korea</option>
							<option value="ES" <?php echo $merchant->user_country=='ES'?'selected':'';?>>Spain</option>
							<option value="SE" <?php echo $merchant->user_country=='SE'?'selected':'';?>>Sweden</option>
							<option value="CH" <?php echo $merchant->user_country=='CH'?'selected':'';?>>Switzerland</option>
							<option value="TW" <?php echo $merchant->user_country=='TW'?'selected':'';?>>Taiwan</option>
							<option value="TH" <?php echo $merchant->user_country=='TH'?'selected':'';?>>Thailand</option>
							<option value="TR" <?php echo $merchant->user_country=='TR'?'selected':'';?>>Turkey</option>
							<option value="GB" <?php echo $merchant->user_country=='GB'?'selected':'';?>>United Kingdom</option>
							<option value="US" <?php echo $merchant->user_country=='US'?'selected':'';?>>United States</option>
							<option value="VN" <?php echo $merchant->user_country=='VN'?'selected':'';?>>Vietnam</option>
						</select>
					</td>
				  </tr>
				  <tr style="border-top: 1px dashed #337ab7 !important;">
					<td class="field width20p">Date of Birth</td>
					<td class="value bl1">
						<input id="birthday" type="date" value="<?php echo $merchant->user_birthday;?>" class="inp-txt">
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
					<!--
					<td class="field width20p bl1">Contacts</td>
					<td class="value bl1">
						<div class="gsm_phone">
							<input type="text" id="phone1" class="inp-txt" style="width: 60px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $merchant->merchant_phone1;?>" title="Country Code" placeholder="Country Code"> - 
							<input type="text" id="phone2" class="inp-txt" style="width: 60px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $merchant->merchant_phone2;?>" title="Area Code" placeholder="Area Code"> - 
							<input type="text" id="phone3" class="inp-txt" style="width: 120px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $merchant->merchant_phone3;?>" title="Number" placeholder="Number">
						</div>
						<div class="gsm_home">
							<input type="text" id="homephone1" class="inp-txt" style="width: 60px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $merchant->merchant_phone1;?>" title="Country Code" placeholder="Country Code"> - 
							<input type="text" id="homephone2" class="inp-txt" style="width: 60px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $merchant->merchant_homephone2;?>" title="Area Code" placeholder="Area Code"> - 
							<input type="text" id="homephone3" class="inp-txt" style="width: 120px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $merchant->merchant_homephone3;?>" title="Number" placeholder="Number">
						</div>
					</td>
					-->
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary" style="width: 98%;margin-top:20px;">
		<div class="km-panel-heading">Step 02</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="value" colspan="4">
						Select type of member
						<input name="merchantType" id="person" type="radio" value="1" onclick="$('#personDesc').show();$('#companyDesc').hide();$('#personName').show();$('#companyName').hide();" checked><label for="person">Person</label>
						<input name="merchantType" id="company" type="radio" value="2" onclick="$('#personDesc').hide();$('#companyDesc').show();$('#personName').hide();$('#companyName').show();"><label for="company">Company/Organization</label>
						<?php if($merchant->merchant_type==2):?>
						<script>
						$(document).ready(function(){
							$("#company").click();
						});
						</script>
						<?php endif;?>
						<p id="personDesc">
							- For individuals who buy and sell online.<br>
							- Merchants who use a company or group name should select ‘Business Owner’
						</p>
						<p id="companyDesc" style="display:none;">
							- For merchants who use a company or group name.
						</p>
					</td>
				  </tr>
				  <tr>
					<td class="field width20p">Name</td>
					<td class="value bl1"><input id="name" type="text" value="<?php echo $merchant->merchant_name;?>" class="inp-txt" style="width:90%"></td>
					<td class="field width20p bl1">Contact Information</td>
					<td class="value bl1">
						<div class="gsm_phone">
							<input type="text" id="phone1" class="inp-txt" style="width: 60px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $merchant->merchant_phone1;?>" title="Country Code" placeholder="Country Code"> - 
							<input type="text" id="phone2" class="inp-txt" style="width: 60px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $merchant->merchant_phone2;?>" title="Area Code" placeholder="Area Code"> - 
							<input type="text" id="phone3" class="inp-txt" style="width: 120px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $merchant->merchant_phone3;?>" title="Number" placeholder="Number">
						</div>
						<div class="gsm_home">
							<input type="text" id="homephone1" class="inp-txt" style="width: 60px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $merchant->merchant_phone1;?>" title="Country Code" placeholder="Country Code"> - 
							<input type="text" id="homephone2" class="inp-txt" style="width: 60px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $merchant->merchant_homephone2;?>" title="Area Code" placeholder="Area Code"> - 
							<input type="text" id="homephone3" class="inp-txt" style="width: 120px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $merchant->merchant_homephone3;?>" title="Number" placeholder="Number">
						</div>
					</td>
				  </tr>
				  <tr>
					<td class="field width20p">Address</td>
					<td class="value bl1" colspan="3">
						<select id="address1" name="" style="height: 25px;vertical-align: bottom;margin-bottom: 20px;">
							<option value="SG" <?php echo $merchant->merchant_address1=='SG'?'selected':''?>>Singapore</option>
							<option value="AU" <?php echo $merchant->merchant_address1=='AU'?'selected':''?>>Australia</option>
							<option value="BN" <?php echo $merchant->merchant_address1=='BN'?'selected':''?>>Brunei Darussalam</option>
							<option value="CA" <?php echo $merchant->merchant_address1=='CA'?'selected':''?>>Canada</option>
							<option value="CN" <?php echo $merchant->merchant_address1=='CN'?'selected':''?>>China</option>
							<option value="GB" <?php echo $merchant->merchant_address1=='GB'?'selected':''?>>United Kingdom</option>
							<option value="HK" <?php echo $merchant->merchant_address1=='HK'?'selected':''?>>Hong Kong</option>
							<option value="ID" <?php echo $merchant->merchant_address1=='ID'?'selected':''?>>Indonesia</option>
							<option value="JP" <?php echo $merchant->merchant_address1=='JP'?'selected':''?>>Japan</option>
							<option value="KR" <?php echo $merchant->merchant_address1=='KR'?'selected':''?>>South Korea</option>
							<option value="MY" <?php echo $merchant->merchant_address1=='MY'?'selected':''?>>Malaysia</option>
							<option value="PH" <?php echo $merchant->merchant_address1=='PH'?'selected':''?>>Philippines</option>
							<option value="TH" <?php echo $merchant->merchant_address1=='TH'?'selected':''?>>Thailand</option>
							<option value="TW" <?php echo $merchant->merchant_address1=='TW'?'selected':''?>>Taiwan</option>
							<option value="US" <?php echo $merchant->merchant_address1=='US'?'selected':''?>>United States</option>
							<option value="VN" <?php echo $merchant->merchant_address1=='VN'?'selected':''?>>Vietnam</option>
						</select>
						<textarea id="address2" class="width400" style="height:50px;margin-top:10px;"><?php echo $merchant->merchant_address2;?></textarea>
					</td>
				  </tr>	
				  <tr>
					<td class="field width20p">Sales staff</td>
					<td class="value bl1" colspan="3">
						Name: <input id="salesStaff" type="text" class="inp-txt width150" value="<?php echo $merchant->merchant_salesStaff;?>"> 
						Email: <input id="salesStaffEmail" type="text" class="inp-txt width150" value="<?php echo $merchant->merchant_salesStaff_email;?>"><br>
						<div class="gsm_phone" style="width: 290px;margin: 5px auto;">
							<input type="text" id="salesStaffPhone1" class="inp-txt" style="width: 60px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $merchant->merchant_phone1;?>" title="Country Code" placeholder="Country Code"> - 
							<input type="text" id="salesStaffPhone2" class="inp-txt" style="width: 60px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $merchant->merchant_salesStaff_phone2;?>" title="Area Code" placeholder="Area Code"> - 
							<input type="text" id="salesStaffPhone3" class="inp-txt" style="width: 120px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $merchant->merchant_salesStaff_phone3;?>" title="Number" placeholder="Number">
						</div>
						<div class="gsm_home" style="width: 290px;margin: 5px auto;">
							<input type="text" id="salesStaffMobilePhone1" class="inp-txt" style="width: 60px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $merchant->merchant_phone1;?>" title="Country Code" placeholder="Country Code"> - 
							<input type="text" id="salesStaffMobilePhone2" class="inp-txt" style="width: 60px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $merchant->merchant_salesStaff_mobilephone2;?>" title="Area Code" placeholder="Area Code"> - 
							<input type="text" id="salesStaffMobilePhone3" class="inp-txt" style="width: 120px; font-size: 11px; color: rgb(153, 153, 153);height: 15px;padding: 2px;" value="<?php echo $merchant->merchant_salesStaff_mobilephone3;?>" title="Number" placeholder="Number">
						</div>
					</td>
				  </tr>	
				  <tr>
					<td class="field width20p" style="padding-left: 8px;">Copy of Business License<p style="font-weight:normal;font-size:12px;color:#434343;">(For Company / Organization Accounts)</p> or NRIC / Passport <p style="font-weight:normal;font-size:12px;color:#434343;">(For Person Account)</p></td>
					<td class="value bl1" colspan="3">
						<img style="min-width: 300px;  min-height: 60px;max-height:100px;cursor:pointer;float: left;" id="businessLicenseImage" src="<?php echo $merchant->merchant_business_license;?>" onclick="setDivCenter('#showFullBusinessLicense',true);$('.km-modal-open').css('overflow','auto');">
						<img id="loadingBusinessLicense" src="/assets/images/cms/loading.gif" style="display:none;">
						<form id="upload_BusinessLicense_form" method="post" enctype="multipart/form-data">
							<input onchange="return uploadModifyBusinessLicense()" name="image" type="file" id="fileBusinessLicense" style="display:none;">
						</form>
						<span style="margin-left:10px;">(Image Formats: png,jpg,gif,pdf; File Size Limit: 1.5MB)</span>
						<button onclick="$('#fileBusinessLicense').click();" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;float: left;margin: 40px 0 0 30px;">Upload</button>
						<button onclick="$('#businessLicenseImage').attr('src','');$('#fileBusinessLicense').val('');" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 20px;float: left;margin: 40px 0 0 30px;">Delete</button>
						<div class="km-modal-dialog"  style="max-width:100%;" id="showFullBusinessLicense">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title">Copy of Business License or NRIC / Passport</h4>
								</div>
								<div class="km-modal-body" style="height:400px;overflow-x:hidden;overflow-y:scroll;">
									<img style="width:100%;" src="<?php echo $merchant->merchant_business_license;?>">
								</div>
								<div class="km-modal-footer">
									<button onclick="location.href='/common/downloadImage?filename=<?php echo $merchant->merchant_business_license;?>';" type="button" class="km-btn km-btn-success">Download</button>
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_myInfo_Close');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
				  </tr>
				   <tr>
					<td class="field width20p" style="padding-left: 8px;">Copy of Most Recent Bank Statement<p style="font-weight:normal;font-size:12px;color:#434343;">(For Company / Organization Accounts)</p> or Utilities Bill <p style="font-weight:normal;font-size:12px;color:#434343;">(For Person Account)</p></td>
					<td class="value bl1" colspan="3">
						<img style="min-width: 300px;  min-height: 60px;max-height:100px;cursor:pointer;float: left;" id="bankAccountImage" src="<?php echo $merchant->merchant_bank_account;?>" onclick="setDivCenter('#showFullRecentBankStatement',true);$('.km-modal-open').css('overflow','auto');">
						<img id="loadingBankAccount" src="/assets/images/cms/loading.gif" style="display:none;">
						<form id="upload_bankbook_form" method="post" enctype="multipart/form-data">
							<input onchange="return uploadModifyBankbook()" name="image" type="file" id="fileBankAccount" style="display:none;">
						</form>
						<span style="margin-left:10px;">(Image Formats: png,jpg,gif,pdf; File Size Limit: 1.5MB)</span>
						<button onclick="$('#fileBankAccount').click();" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;float: left;margin: 40px 0 0 30px;">Upload</button>
						<button onclick="$('#bankAccountImage').attr('src','');$('#fileBankAccount').val('');" type="button" class="km-btn km-btn-danger" style="height: 28px;font-size: 12px;padding: 5px 20px;float: left;margin: 40px 0 0 30px;">Delete</button>
						<div class="km-modal-dialog" style="max-width:100%;" id="showFullRecentBankStatement">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title">Copy of Most Recent Bank Statement or Utilities Bill</h4>
								</div>
								<div class="km-modal-body" style="height:400px;overflow-x:hidden;overflow-y:scroll;">
									<img style="width:100%;" src="<?php echo $merchant->merchant_bank_account;?>">
								</div>
								<div class="km-modal-footer">
									<button onclick="location.href='/common/downloadImage?filename=<?php echo $merchant->merchant_bank_account;?>';" type="button" class="km-btn km-btn-success">Download</button>
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_myInfo_Close');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary" style="width: 98%;margin-top:20px;">
		<div class="km-panel-heading">Step 03</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width20p">Bank Details</td>
					<td class="value bl1 tal" colspan="3">
						<span class="km-label km-label-default" style="display:inline-block;">Bank Name</span> : 
						<select id="bank" style="height:30px;margin-bottom:10px;">
							<option value="0">-- Select Bank --</option>
							<?php foreach ($bankList as $key => $value):?>
								<option value="<?php echo $value->bank_id;?>" 
									<?php 
									if($value->bank_id==$merchant->merchant_bank){
										$currentBank=$value;
										echo 'selected';
									}?>
								>
									<?php echo $value->bank_name;?>
								</option>
							<?php endforeach;?>
						</select>
						<span class="km-label km-label-default" style="display:inline-block;margin-left: 10px;">Bank Code</span> : <?php echo isset($currentBank)?$currentBank->bank_code:'';?> <br>
						<span class="km-label km-label-default" style="display:inline-block;">Branch Code</span> : <input type="text" id="bankBranch" value="<?php echo $merchant->merchant_bank_branch;?>" style="width: 120px;height: 16px;display: inline-block;font-size: 12px;background-color:#f5f5f5;" class="km-form-control" disabled> <br>
						<span class="km-label km-label-default" style="display:inline-block;margin-top: 15px;">Account Number</span> : <input type="text" id="accountNumber" value="<?php echo $merchant->merchant_bank_account_number;?>" style="width: 275px;vertical-align: top;margin-top: 10px;" value="<?php echo $merchant->merchant_bank_account_number;?>" class="inp-txt width250" placeholder="Account Number">
					</td>
				  </tr>
				  <tr>
					<td class="field width20p">GST Info</td>
					<td class="value bl1" colspan="3">
						<input type="text" id="GSTName" style="width: 200px;" value="<?php echo $merchant->merchant_gst_name;?>" class="inp-txt width250" placeholder="Name">
						<input type="text" id="GSTRegistrationNo" style="width: 200px;" value="<?php echo $merchant->merchant_gst_number;?>" class="inp-txt width250" placeholder="GST Registration No."><br>
						<input type="text" id="GSTAddress" style="width: 415px;margin-top:10px;" value="<?php echo $merchant->merchant_gst_address;?>" class="inp-txt width250" placeholder="Address">
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<button type="button" class="km-btn km-btn-primary" onclick="saveSellerInfo('Successfully saved!');" style="margin-bottom:20px;">Save</button>
</div>
<div id="waitDiv"><img src="/assets/images/cms/loading.gif"></div>
<div id="bkDiv"></div>
<div id="messageAlert" class="km-alert km-alert-dismissible fade in width40p hide">
  <button type="button" class="km-close" onclick="$('#messageAlert').hide();"><span>×</span></button>
  <strong></strong>
  <span class="km-alert-msg"></span>
</div>
<script src="/assets/js/cms-myInfo.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	
});
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
function modifyShopImg(position,imageSrc){
	var shopImg = new Object();
	shopImg.position = position;
	shopImg.image = imageSrc;
	dataHandler('modify','shopImg',shopImg,null,null,null,'Success',true);
}
function uploadShopTopImage(){
	uploadImageAdvance('#upload_top_image_form',addShopTopImageBeforeUpload,addShopTopImageAfterUpload);
}
function addShopTopImageBeforeUpload(){
	$("#shopTopImage").attr("src","/assets/images/cms/loading.gif");
}
function addShopTopImageAfterUpload(imageSrc){
	$("#shopTopImage").attr("src",imageSrc);
	modifyShopImg('top',imageSrc);
}
function uploadShopMiddleImage(){
	uploadImageAdvance('#upload_middle_image_form',addShopMiddleImageBeforeUpload,addShopMiddleImageAfterUpload);
}
function addShopMiddleImageBeforeUpload(){
	$("#shopMiddleImage").attr("src","/assets/images/cms/loading.gif");
}
function addShopMiddleImageAfterUpload(imageSrc){
	$("#shopMiddleImage").attr("src",imageSrc);
	modifyShopImg('middle',imageSrc);
}
function uploadShopBottomImage(){
	uploadImageAdvance('#upload_bottom_image_form',addShopBottomImageBeforeUpload,addShopBottomImageAfterUpload);
}
function addShopBottomImageBeforeUpload(){
	$("#shopBottomImage").attr("src","/assets/images/cms/loading.gif");
}
function addShopBottomImageAfterUpload(imageSrc){
	$("#shopBottomImage").attr("src",imageSrc);
	modifyShopImg('bottom',imageSrc);
}
function saveShopInfo(){
	var shopInfo = new Object();
	shopInfo.info = shopInfoEditor.html();
	dataHandler('modify','shopInfo',shopInfo,null,null,null,'Success',true);
}
function saveSellerInfo(){
	var merchant = new Object();
	merchant.id = $("#merchantId").val();
	merchant.email = $("#email").val();
	merchant.username = $("#username").val();
	merchant.gender = $('input[name="gender"]:checked').val();
	merchant.country = $("#country").val();
	merchant.birthday = $("#birthday").val();
	merchant.name = $("#name").val();
	merchant.merchantType = $('input[name="merchantType"]:checked').val();
	merchant.phone1 = $("#phone1").val();
	merchant.phone2 = $("#phone2").val();
	merchant.phone3 = $("#phone3").val();
	merchant.homephone1 = $("#homephone1").val();
	merchant.homephone2 = $("#homephone2").val();
	merchant.homephone3 = $("#homephone3").val();
	merchant.address1 = $("#address1").val();
	merchant.address2 = $("#address2").val();
	merchant.salesStaff = $("#salesStaff").val();
	merchant.salesStaffEmail = $("#salesStaffEmail").val();
	merchant.salesStaffPhone1 = $("#salesStaffPhone1").val();
	merchant.salesStaffPhone2 = $("#salesStaffPhone2").val();
	merchant.salesStaffPhone3 = $("#salesStaffPhone3").val();
	merchant.salesStaffMobilePhone1 = $("#salesStaffMobilePhone1").val();
	merchant.salesStaffMobilePhone2 = $("#salesStaffMobilePhone2").val();
	merchant.salesStaffMobilePhone3 = $("#salesStaffMobilePhone3").val();
	merchant.businessLicense = $("#businessLicenseImage").attr('src');
	merchant.bankAccount = $("#bankAccountImage").attr('src');
	merchant.bank = $("#bank").val();
//	merchant.bankBranch = $("#bankBranch").val();
	merchant.accountNumber = $("#accountNumber").val();
	merchant.GSTName = $("#GSTName").val();
	merchant.GSTRegistrationNo = $("#GSTRegistrationNo").val();
	merchant.GSTAddress = $("#GSTAddress").val();
	dataHandler('modify','merchantAllInfo',merchant,successAlert,null,null,null,true);
}
function successAlert(){
	alert('Save successful!');
}

function uploadModifyBusinessLicense(){
	uploadImageAdvance("#upload_BusinessLicense_form",addModifyBusinessLicenseBeforeUpload,addModifyBusinessLicenseAfterUpload)
}
function addModifyBusinessLicenseBeforeUpload(){
	$("#loadingBusinessLicense").show();
}
function addModifyBusinessLicenseAfterUpload(imageSrc){
	$("#loadingBusinessLicense").hide();
	$("#businessLicenseImage").attr('src',imageSrc);
}

function uploadModifyBankbook(){
	uploadImageAdvance("#upload_bankbook_form",addModifyBankbookBeforeUpload,addModifyBankbookAfterUpload)
}
function addModifyBankbookBeforeUpload(){
	$("#loadingBankbook").show();
}
function addModifyBankbookAfterUpload(imageSrc){
	$("#loadingBankbook").hide();
	$("#bankAccountImage").attr('src',imageSrc);
}
var _currentAddressType;
function selectAddress(type){
	$("#addressTypeList li").removeClass('active');
	$("#addressTypeList li:eq("+(type-1)+")").addClass('active');
	_currentAddressType=type;
	$("#addressList").html('');
	var address = new Object();
	address.userId = $("#merchantId").val();
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
	address.userId = $("#merchantId").val();
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