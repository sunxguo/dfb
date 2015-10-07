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
	<div class="km-panel km-panel-primary" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_sider_SellerInformation');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width15p"><?php echo lang('cms_sider_UserID');?></td>
					<td class="value width17p"><?php echo $merchant->merchant_login_ID;?></td>
					<td class="field width15p"><?php echo lang('cms_sider_Seller');?></td>
					<td class="value width17p"><?php echo $merchant->user_username;?></td>
					<td class="field width15p"><?php echo lang('cms_sider_RegisterDate');?></td>
					<td class="value "><?php echo $merchant->user_reg_time;?></td>
				  </tr>
				  <tr>
					<td class="field"><?php echo lang('cms_sider_Sellertype');?></td>
					<td class="value"><?php echo $merchant->merchant_type=='1'?lang('cms_sider_Person'):'Company';?></td>
					<td class="field"><?php echo lang('cms_sider_Sellerlevel');?></td>
					<td class="value"><?php echo $merchant->user_grade;?><?php //echo lang('cms_sider_StandardSeller');?></td>
					<td class="field"><?php echo lang('cms_sider_Password');?></td>
					<td class="value" style="padding: 2px 0;">
						<button onclick="modifySellerBaseInfoPwd();" type="button" class="km-btn km-btn-primary" style="height: 30px;font-size: 12px;"><?php echo lang('cms_sider_Editpassword');?></button>
						<div class="km-modal-dialog width40p" id="sellerBaseInfoPwd">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title"><?php echo lang('cms_sider_SellerInformation').'-'.lang('cms_sider_EditPassword');?></h4>
								</div>
								<div class="km-modal-body">
									<label for="seller_baseinfo_oldpwd" class="km-control-label"><?php echo lang('cms_sider_CurrentPassword');?>:</label>
									<input type="password" class="km-form-control" id="seller_baseinfo_oldpwd" style="width: 95%;padding: 0 5px;">
									<label for="seller_baseinfo_newpwd" class="km-control-label"><?php echo lang('cms_sider_NewPassword');?>:</label>
									<input type="password" class="km-form-control" id="seller_baseinfo_newpwd" style="width: 95%;padding: 0 5px;">
									<label for="seller_baseinfo_confirmpwd" class="km-control-label"><?php echo lang('cms_sider_ReenterNewPassword');?>:</label>
									<input type="password" class="km-form-control" id="seller_baseinfo_confirmpwd" style="width: 95%;padding: 0 5px;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_sider_Close');?></button>
									<button type="button" class="km-btn km-btn-primary" onclick="saveSellerBaseInfoPwd('Successfully saved!');"><?php echo lang('cms_sider_Savechanges');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_sider_SettleInformation').' (* '.lang('cms_sider_SettleInformationTip').'<a href="mailto:seller_regist@aiimai.com" style="color:white;">[seller_regist@aiimai.com]</a>)';?> </div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width15p"><?php echo lang('cms_sider_Settledate');?></td>
					<td class="value width17p"><?php echo lang('cms_sider_SettledateMsg15');?></td>
					<td class="field width15p"><?php echo lang('cms_sider_SettlementCurrency');?></td>
					<td class="value width17p">SGD</td>
					<td class="field width15p"><?php echo lang('cms_sider_Tax');?></td>
					<td class="value "><!--税--></td>
				  </tr>
				  <tr>
					<td class="field"><?php echo lang('cms_sider_Bank');?></td>
					<td class="value" colspan="3">DBS Bank Ltd / POSB   <?php echo lang('cms_sider_BranchInfo');?>  : POSB Tampines Central</td>
					<td class="field"><?php echo lang('cms_sider_Accountnumber');?></td>
					<td class="value">194186231</td>
				  </tr>
				  <tr>
					<td class="field"><?php echo lang('cms_sider_copyofbusinesslicense');?></td>
					<td class="value" colspan="5">
						<div class="fl">
							<div class="km-input-group fl">
							  <span class="km-input-group-addon" style="font-size: 12px;"><?php echo lang('cms_sider_causeofchanging');?></span>
							  <input id="BusinessLicenseMsg" type="text" class="km-form-control" placeholder="ASM Seller Confirm" style="height:20px;font-size: 12px;">
							</div>
						</div>
						<div class="fl" style="margin-left:50px;">
							<button onclick="$('#fileBusinessLicense').click();" type="button" class="km-btn km-btn-primary" style="height: 32px;font-size: 12px;"><?php echo lang('cms_sider_Upload');?></button>
							<img src="/assets/images/cms/loading.gif" id="loadingBusinessLicense" class="hide">
							<a href="<?php echo $merchant->merchant_business_license;?>" target="_blank"><?php echo lang('cms_sider_Viewimage');?></a>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo lang('cms_sider_ViewimageTip');?>
							<form id="upload_BusinessLicense_form" method="post" enctype="multipart/form-data">
								<input onchange="return uploadBusinessLicense()" name="image" type="file" id="fileBusinessLicense" style="display:none;" accept="image/*">
							</form>
						</div>
					</td>
				  </tr>
				  <tr>
					<td class="field"><?php echo lang('cms_sider_Copyofbankaccount');?></td>
					<td class="value" colspan="5">
						<div class="fl">
							<div class="km-input-group fl">
							  <span class="km-input-group-addon" style="font-size: 12px;"><?php echo lang('cms_sider_causeofchanging');?></span>
							  <input id="BankbookMsg" type="text" class="km-form-control" placeholder="ASM Seller Confirm" style="height:20px;font-size: 12px;">
							</div>
						</div>
						<div class="fl" style="margin-left:50px;">
							<button type="button" onclick="$('#fileBankbook').click();" class="km-btn km-btn-primary" style="height: 32px;font-size: 12px;"><?php echo lang('cms_sider_Upload');?></button>
							<img src="/assets/images/cms/loading.gif" id="loadingBankbook" class="hide">
							<a href="<?php echo $merchant->merchant_bank_account;?>" target="_blank"><?php echo lang('cms_sider_Viewimage');?></a>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo lang('cms_sider_ViewimageTip');?>
							<form id="upload_bankbook_form" method="post" enctype="multipart/form-data">
								<input onchange="return uploadBankbook()" name="image" type="file" id="fileBankbook" style="display:none;" accept="image/*">
							</form>
						</div>
					</td>
				  </tr>
				  <tr>
					<td class="field"><?php echo lang('cms_sider_Requestforapproval');?></td>
					<td class="value">
						<button onclick="requestForSettleInfo()" type="button" class="km-btn km-btn-primary" style="height: 32px;font-size: 12px;"><?php echo lang('cms_sider_Request');?></button>
					</td>
					<td class="field"><?php echo lang('cms_sider_Processingstatus');?></td>
					<td class="value" colspan="3">
						<?php echo lang('cms_sider_ProcessingstatusTip1');?>
					</td>
				  </tr>
				  <?php /*?>
				  <tr>
					<td class="field"><?php echo lang('cms_sider_AaccountPassword');?></td>
					<td class="value" colspan="5">
						<button onclick="modifyAAccountPwd();" type="button" class="km-btn km-btn-primary" style="height: 32px;font-size: 12px;"><?php echo lang('cms_sider_ChangePassword');?></button>
						<div class="km-modal-dialog width40p" id="AAccountPwd">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title"><?php echo lang('cms_sider_SettleInformation').'-'.lang('cms_sider_ChangeAaccountPassword');?></h4>
								</div>
								<div class="km-modal-body">
									<label for="seller_baseinfo_oldpwd" class="km-control-label"><?php echo lang('cms_sider_CurrentPassword');?>:</label>
									<input type="password" class="km-form-control" id="a_account_oldpwd" style="width: 95%;padding: 0 5px;">
									<label for="seller_baseinfo_newpwd" class="km-control-label"><?php echo lang('cms_sider_NewPassword');?>:</label>
									<input type="password" class="km-form-control" id="a_account_newpwd" style="width: 95%;padding: 0 5px;">
									<label for="seller_baseinfo_confirmpwd" class="km-control-label"><?php echo lang('cms_sider_ReenterNewPassword');?>:</label>
									<input type="password" class="km-form-control" id="a_account_confirmpwd" style="width: 95%;padding: 0 5px;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_sider_Close');?></button>
									<button type="button" class="km-btn km-btn-primary"><?php echo lang('cms_sider_Savechanges');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
				  </tr>
				  <?php */?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary" style="width: 98%;">
		<div class="km-panel-heading">GST Info</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width15p">Name</td>
					<td class="value width17p"><input id="gstName" value="<?php echo $merchant->merchant_gst_name;?>" type="text" class="km-form-control" placeholder="" style="height:20px;width:90%;"></td>
					<td class="field width15p">GST Registration No.</td>
					<td class="value width17p"><input id="gstNumber" value="<?php echo $merchant->merchant_gst_number;?>" type="text" class="km-form-control" placeholder="" style="height:20px;width:90%;"></td>
				  </tr>
				  <tr>
					<td class="field">Address</td>
					<td class="value" colspan="3">
						<input id="gstAddress" value="<?php echo $merchant->merchant_gst_address;?>" type="text" class="km-form-control fl" placeholder="" style="height:20px;width:80%;">
						<button onclick="saveGstInfo();" type="button" class="km-btn km-btn-primary fr" style="height: 32px;line-height:20px;font-size: 12px;">Request</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_myInfo_BasicInfo');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p" rowspan="2"><?php echo lang('cms_myInfo_ContactNo');?></td>
					<td class="value width17p">
						<span class="km-label km-label-default fl"><?php echo lang('cms_myInfo_MobilephoneNo');?></span>  <?php echo $merchant->merchant_phone1;?> <?php echo $merchant->merchant_phone2;?>-<?php echo $merchant->merchant_phone3;?> 
						<button onclick="setDivCenter('#baseInfoMobilePhoneNumber',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_myInfo_Edit');?></button>
						<div class="km-modal-dialog width40p" id="baseInfoMobilePhoneNumber">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title"><?php echo lang('cms_myInfo_BasicInfo').'-'.lang('cms_myInfo_MobilephoneNo');?></h4>
								</div>
								<div class="km-modal-body">
									<label for="customer_view_email" class="km-control-label"><?php echo lang('cms_myInfo_MobilephoneNo');?>:</label>
									<select id="merchant_phone1" style="display:block;height: 30px;">
										<option value="">Choose Country</option>
										<option value="AU">Australia</option>
										<option value="BR">Brazil</option>
										<option value="BN">Brunei Darussalam</option>
										<option value="CA">Canada</option>
										<option value="CN">China</option>
										<option value="DK">Denmark</option>
										<option value="EG">Egypt</option>
										<option value="FI">Finland</option>
										<option value="FR">France</option>
										<option value="DE">Germany</option>
										<option value="GR">Greece</option>
										<option value="HK">Hong Kong</option>
										<option value="HU">Hungary</option>
										<option value="IN">India</option>
										<option value="ID">Indonesia</option>
										<option value="IL">Israel</option>
										<option value="IT">Italy</option>
										<option value="JP">Japan</option>
										<option value="KW">Kuwait</option>
										<option value="MO">Macau</option>
										<option value="MY">Malaysia</option>
										<option value="MX">Mexico</option>
										<option value="MM">Myanma</option>
										<option value="NL">Netherlands</option>
										<option value="NZ">New Zealand</option>
										<option value="NO">Norway</option>
										<option value="PH">Philippines</option>
										<option value="PL">Poland</option>
										<option value="PT">Portugal</option>
										<option value="RU">Russia</option>
										<option value="SG" selected>Singapore</option>
										<option value="KR">South Korea</option>
										<option value="ES">Spain</option>
										<option value="SE">Sweden</option>
										<option value="CH">Switzerland</option>
										<option value="TW">Taiwan</option>
										<option value="TH">Thailand</option>
										<option value="TR">Turkey</option>
										<option value="GB">United Kingdom</option>
										<option value="US">United States</option>
										<option value="VN">Vietnam</option>
									</select><br>
									<input type="text" class="km-form-control" id="merchant_phone2" value="<?php echo $merchant->merchant_phone2;?>" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">-
									<input type="text" class="km-form-control" id="merchant_phone3" value="<?php echo $merchant->merchant_phone3;?>" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_myInfo_Close');?></button>
									<button type="button" class="km-btn km-btn-primary" onclick="saveMyInfoMobilephoneNo();"><?php echo lang('cms_myInfo_Savechanges');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
					<td class="field width10p" rowspan="2"><?php echo lang('cms_myInfo_Email');?></td>
					<td class="value width17p" rowspan="2">
						<?php echo $merchant->user_email;?>
						<button onclick="setDivCenter('#baseContactInfoEmail',true);" type="button" class="km-btn km-btn-primary" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_myInfo_Edit');?></button><br>
						<?php echo lang('cms_myInfo_EmailTip');?></td>
						<div class="km-modal-dialog width40p" id="baseContactInfoEmail">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title"><?php echo lang('cms_myInfo_BasicInfo').'-'.lang('cms_myInfo_Email');?></h4>
								</div>
								<div class="km-modal-body">
									<label for="customer_view_email" class="km-control-label"><?php echo lang('cms_myInfo_Email');?>:</label>
									<input type="text" class="km-form-control" id="merchant_email" value="<?php echo $merchant->user_email;?>" style="width: 95%;padding: 0 5px;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_myInfo_Close');?></button>
									<button type="button" class="km-btn km-btn-primary" onclick="saveMyInfoEmail();"><?php echo lang('cms_myInfo_Savechanges');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
				  </tr>
				  <tr>
					<td class="value width17p">
						<span class="km-label km-label-default fl"><?php echo lang('cms_myInfo_Phonenumber');?></span>  <?php echo $merchant->merchant_homephone1;?> <?php echo $merchant->merchant_homephone2;?>-<?php echo $merchant->merchant_homephone3;?> 
						<button onclick="setDivCenter('#baseInfoPhoneNumber',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_myInfo_Edit');?></button>
						<div class="km-modal-dialog width40p" id="baseInfoPhoneNumber">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title"><?php echo lang('cms_myInfo_BasicInfo').'-'.lang('cms_myInfo_Phonenumber');?></h4>
								</div>
								<div class="km-modal-body">
									<label for="customer_view_email" class="km-control-label"><?php echo lang('cms_myInfo_Phonenumber');?>:</label>
									<select id="merchant_homephone1" style="display:block;height: 30px;">
										<option value="">Choose Country</option>
										<option value="AU">Australia</option>
										<option value="BR">Brazil</option>
										<option value="BN">Brunei Darussalam</option>
										<option value="CA">Canada</option>
										<option value="CN">China</option>
										<option value="DK">Denmark</option>
										<option value="EG">Egypt</option>
										<option value="FI">Finland</option>
										<option value="FR">France</option>
										<option value="DE">Germany</option>
										<option value="GR">Greece</option>
										<option value="HK">Hong Kong</option>
										<option value="HU">Hungary</option>
										<option value="IN">India</option>
										<option value="ID">Indonesia</option>
										<option value="IL">Israel</option>
										<option value="IT">Italy</option>
										<option value="JP">Japan</option>
										<option value="KW">Kuwait</option>
										<option value="MO">Macau</option>
										<option value="MY">Malaysia</option>
										<option value="MX">Mexico</option>
										<option value="MM">Myanma</option>
										<option value="NL">Netherlands</option>
										<option value="NZ">New Zealand</option>
										<option value="NO">Norway</option>
										<option value="PH">Philippines</option>
										<option value="PL">Poland</option>
										<option value="PT">Portugal</option>
										<option value="RU">Russia</option>
										<option value="SG" selected>Singapore</option>
										<option value="KR">South Korea</option>
										<option value="ES">Spain</option>
										<option value="SE">Sweden</option>
										<option value="CH">Switzerland</option>
										<option value="TW">Taiwan</option>
										<option value="TH">Thailand</option>
										<option value="TR">Turkey</option>
										<option value="GB">United Kingdom</option>
										<option value="US">United States</option>
										<option value="VN">Vietnam</option>
									</select><br>
									<input type="text" class="km-form-control" id="merchant_homephone2" value="<?php echo $merchant->merchant_homephone2;?>" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">-
									<input type="text" class="km-form-control" id="merchant_homephone3" value="<?php echo $merchant->merchant_homephone3;?>" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_myInfo_Close');?></button>
									<button type="button" class="km-btn km-btn-primary" onclick="saveMyInfoPhonenumber();"><?php echo lang('cms_myInfo_Savechanges');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_myInfo_Sellersinformationdisplayedtocustomer');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p"><?php echo lang('cms_myInfo_Address');?></td>
					<td class="value width17p tal" colspan="3"> 
						<input id="baseInfoAddress" type="checkbox" style="vertical-align: middle;" <?php echo $merchant->merchant_displayed_address_address_display?'checked':'';?>>
						<label for="baseInfoAddress" class="km-label km-label-<?php echo $merchant->merchant_displayed_address_address_display?'success':'danger';?>" style="margin-right:10px;padding:0 0.6em">Display</label>
						 <?php echo $merchant->merchant_displayed_address_address_content;?>	<br>
						<input id="baseInfoPhone" type="checkbox" style="vertical-align: middle;" <?php echo $merchant->merchant_displayed_address_phone_display?'checked':'';?>>
						<label for="baseInfoPhone" class="km-label km-label-<?php echo $merchant->merchant_displayed_address_phone_display?'success':'danger';?>" style="margin-right:10px;padding:0 0.6em">Display</label>
						 <?php echo $merchant->merchant_displayed_address_phone_content1.' '.$merchant->merchant_displayed_address_phone_content2.'-'.$merchant->merchant_displayed_address_phone_content3;?>
						<button onclick="setDivCenter('#MyInfoCustomerViewAddress',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_myInfo_Edit');?></button>
						<div class="km-modal-dialog width40p" id="MyInfoCustomerViewAddress">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title"><?php echo lang('cms_myInfo_Sellersinformationdisplayedtocustomer').'-'.lang('cms_myInfo_Address');?></h4>
								</div>
								<div class="km-modal-body">
									<label for="seller_baseinfo_oldpwd" class="km-control-label">Address:</label>
									<input value="<?php echo $merchant->merchant_displayed_address_address_content;?>" type="text" class="km-form-control" id="baseInfoAddressContent" style="width: 95%;padding: 0 5px;height: 30px;">
									<label for="customer_view_email" class="km-control-label">Phone:</label>
									<select id="baseInfoPhoneContent1" style="display:block;height: 30px;"><?php require('countryPhoneNO.php');?></select><br>
									<input type="text" class="km-form-control" id="baseInfoPhoneContent2" value="<?php echo $merchant->merchant_displayed_address_phone_content2;?>" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">-
									<input type="text" class="km-form-control" id="baseInfoPhoneContent3" value="<?php echo $merchant->merchant_displayed_address_phone_content3;?>" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_myInfo_Close');?></button>
									<button onclick="savebaseInfo();" type="button" class="km-btn km-btn-primary"><?php echo lang('cms_myInfo_Savechanges');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
				  </tr>
				  <tr>
					<td class="field width10p"><?php echo lang('cms_myInfo_Faxnumber');?></td>
					<td class="value width17p">
						<?php echo $merchant->merchant_displayed_faxnumber1.' '.$merchant->merchant_displayed_faxnumber2.'-'.$merchant->merchant_displayed_faxnumber3;?>
						<button onclick="setDivCenter('#MyInfoCustomerViewFax',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_myInfo_Edit');?></button>
						<div class="km-modal-dialog width40p" id="MyInfoCustomerViewFax">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title"><?php echo lang('cms_myInfo_Sellersinformationdisplayedtocustomer').'-'.lang('cms_myInfo_Faxnumber');?></h4>
								</div>
								<div class="km-modal-body">
									<label for="customer_view_email" class="km-control-label"><?php echo lang('cms_myInfo_Faxnumber');?>:</label>
									<select id="baseInfoFaxnumber1" style="display:block;height: 30px;"><?php require('countryPhoneNO.php');?></select><br>
									<input type="text" class="km-form-control" id="baseInfoFaxnumber2" value="<?php echo $merchant->merchant_displayed_faxnumber2;?>" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">-
									<input type="text" class="km-form-control" id="baseInfoFaxnumber3" value="<?php echo $merchant->merchant_displayed_faxnumber3;?>" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_myInfo_Close');?></button>
									<button onclick="saveBaseInfoFaxnumber();" type="button" class="km-btn km-btn-primary"><?php echo lang('cms_myInfo_Savechanges');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
					<td class="field width10p" rowspan="2"><?php echo lang('cms_myInfo_CustomerCenterWorkingHour');?></td>
					<td class="value width17p" rowspan="2"><?php echo $merchant->merchant_displayed_workinghour;?>
						<button onclick="setDivCenter('#MyInfoCustomerViewBusinessHours',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_myInfo_Edit');?></button>
						<div class="km-modal-dialog width40p" id="MyInfoCustomerViewBusinessHours">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title"><?php echo lang('cms_myInfo_Sellersinformationdisplayedtocustomer').'-'.lang('cms_myInfo_CustomerCenterWorkingHour');?></h4>
								</div>
								<div class="km-modal-body">
									<label for="customer_view_email" class="km-control-label"><?php echo lang('cms_myInfo_CustomerCenterWorkingHour');?>:</label>
									<textarea class="km-form-control" id="customer_view_businessHours" style="width:90%;min-height:60px;"><?php echo $merchant->merchant_displayed_workinghour;?></textarea>
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_myInfo_Close');?></button>
									<button onclick="saveBaseInfoWorkinghour();" type="button" class="km-btn km-btn-primary"><?php echo lang('cms_myInfo_Savechanges');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
				  </tr>
				  <tr>
					<td class="field width10p"><?php echo lang('cms_myInfo_Email');?></td>
					<td class="value width17p">
						<?php echo $merchant->merchant_displayed_email;?>
						<button onclick="modifyMyInfoCustomerViewEmail();" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_myInfo_Edit');?></button>
						<div class="km-modal-dialog width40p" id="MyInfoCustomerViewEmail">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title"><?php echo lang('cms_myInfo_Sellersinformationdisplayedtocustomer').'-'.lang('cms_myInfo_Email');?></h4>
								</div>
								<div class="km-modal-body">
									<label for="customer_view_email" class="km-control-label"><?php echo lang('cms_myInfo_Email');?>:</label>
									<input type="text" class="km-form-control" id="displayedInfoEmail" value="<?php echo $merchant->merchant_displayed_email;?>" style="width: 95%;padding: 0 5px;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_myInfo_Close');?></button>
									<button onclick="saveDisplayedInfoEmail();" type="button" class="km-btn km-btn-primary"><?php echo lang('cms_myInfo_Savechanges');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_myInfo_SalesStaffInformation').'-'.lang('cms_myInfo_SalesStaffInformationTip');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p"><?php echo lang('cms_myInfo_Salesstaff');?></td>
					<td class="value width17p">
						<?php echo $merchant->merchant_salesStaff;?>
						<button onclick="setDivCenter('#myInfoSalesstaffDiv',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_myInfo_Edit');?></button>
						<div class="km-modal-dialog width40p" id="myInfoSalesstaffDiv">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title"><?php echo lang('cms_myInfo_SalesStaffInformation').'-'.lang('cms_myInfo_Salesstaff');?></h4>
								</div>
								<div class="km-modal-body">
									<label for="salesStaffName" class="km-control-label">Name:</label>
									<input type="text" class="km-form-control" id="salesStaffName" value="<?php echo $merchant->merchant_salesStaff;?>" style="width: 95%;padding: 0 5px;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_myInfo_Close');?></button>
									<button onclick="saveSalesStaffName();" type="button" class="km-btn km-btn-primary"><?php echo lang('cms_myInfo_Savechanges');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
					<td class="field width10p"><?php echo lang('cms_myInfo_Email');?></td>
					<td class="value width17p">
						<?php echo $merchant->merchant_salesStaff_email;?>
						<button onclick="setDivCenter('#manageEmail',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_myInfo_Edit');?></button><br>
						<div class="km-modal-dialog width40p" id="manageEmail">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title"><?php echo lang('cms_myInfo_SalesStaffInformation').'-'.lang('cms_myInfo_Email');?></h4>
								</div>
								<div class="km-modal-body">
									<label for="salesStaffEmail" class="km-control-label"><?php echo lang('cms_myInfo_Email');?>:</label>
									<input type="text" class="km-form-control" id="salesStaffEmail" value="<?php echo $merchant->merchant_salesStaff_email;?>" style="width: 95%;padding: 0 5px;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_myInfo_Close');?></button>
									<button onclick="saveSalesStaffEmail();" type="button" class="km-btn km-btn-primary"><?php echo lang('cms_myInfo_Savechanges');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
				  </tr>
				  <tr>
					<td class="field width10p"><?php echo lang('cms_myInfo_MobilephoneNo');?></td>
					<td class="value width17p">
						<?php echo $merchant->merchant_salesStaff_mobilephone1;?> <?php echo $merchant->merchant_salesStaff_mobilephone2;?>-<?php echo $merchant->merchant_salesStaff_mobilephone3;?> 
						<button onclick="setDivCenter('#manageMobilePhoneNumber',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_myInfo_Edit');?></button>
						<div class="km-modal-dialog width40p" id="manageMobilePhoneNumber">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title"><?php echo lang('cms_myInfo_SalesStaffInformation').'-'.lang('cms_myInfo_MobilephoneNo');?></h4>
								</div>
								<div class="km-modal-body">
									<label for="salesStaffMobilePhone1" class="km-control-label"><?php echo lang('cms_myInfo_MobilephoneNo');?>:</label>
									<select id="salesStaffMobilePhone1" style="display:block;height: 30px;"><?php require('countryPhoneNO.php');?></select><br>
									<input type="text" class="km-form-control" id="salesStaffMobilePhone2" value="<?php echo $merchant->merchant_salesStaff_mobilephone2;?>" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">-
									<input type="text" class="km-form-control" id="salesStaffMobilePhone3" value="<?php echo $merchant->merchant_salesStaff_mobilephone3;?>" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_myInfo_Close');?></button>
									<button onclick="saveSalesStaffMobilePhone();" type="button" class="km-btn km-btn-primary"><?php echo lang('cms_myInfo_Savechanges');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
					<td class="field width10p"><?php echo lang('cms_myInfo_Phonenumber');?></td>
					<td class="value width17p">
						<?php echo $merchant->merchant_salesStaff_phone1;?> <?php echo $merchant->merchant_salesStaff_phone2;?>-<?php echo $merchant->merchant_salesStaff_phone3;?> 
						<button onclick="setDivCenter('#managePhoneNumber',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_myInfo_Edit');?></button>
						<div class="km-modal-dialog width40p" id="managePhoneNumber">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title"><?php echo lang('cms_myInfo_SalesStaffInformation').'-'.lang('cms_myInfo_Phonenumber');?></h4>
								</div>
								<div class="km-modal-body">
									<label for="salesStaffPhone1" class="km-control-label"><?php echo lang('cms_myInfo_Phonenumber');?>:</label>
									<select id="salesStaffPhone1" style="display:block;height: 30px;"><?php require('countryPhoneNO.php');?></select><br>
									<input type="text" class="km-form-control" id="salesStaffPhone2" value="<?php echo $merchant->merchant_salesStaff_phone2;?>" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">-
									<input type="text" class="km-form-control" id="salesStaffPhone3" value="<?php echo $merchant->merchant_salesStaff_phone3;?>" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_myInfo_Close');?></button>
									<button onclick="saveSalesStaffPhone();" type="button" class="km-btn km-btn-primary"><?php echo lang('cms_myInfo_Savechanges');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
				  </tr>
				  <tr>
					<td class="field width10p"><?php echo lang('cms_myInfo_Faxnumber');?></td>
					<td class="value width17p" colspan="3">
						<?php echo $merchant->merchant_salesStaff_faxnumber1;?> <?php echo $merchant->merchant_salesStaff_faxnumber2;?>-<?php echo $merchant->merchant_salesStaff_faxnumber3;?> 
						<button onclick="setDivCenter('#manageFax',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_myInfo_Edit');?></button>
						<div class="km-modal-dialog width40p" id="manageFax">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title"><?php echo lang('cms_myInfo_SalesStaffInformation').'-'.lang('cms_myInfo_Faxnumber');?></h4>
								</div>
								<div class="km-modal-body">
									<label for="salesStaffFax1" class="km-control-label"><?php echo lang('cms_myInfo_Faxnumber');?>:</label>
									<select id="salesStaffFax1" style="display:block;height: 30px;"><?php require('countryPhoneNO.php');?></select><br>
									<input type="text" class="km-form-control" id="salesStaffFax2" value="<?php echo $merchant->merchant_salesStaff_faxnumber2;?>" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">-
									<input type="text" class="km-form-control" id="salesStaffFax3" value="<?php echo $merchant->merchant_salesStaff_faxnumber3;?>" style="width: 30%;height: 30px;padding: 0 5px;display: inline-block;">
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_myInfo_Close');?></button>
									<button onclick="saveSalesStaffFax();" type="button" class="km-btn km-btn-primary"><?php echo lang('cms_myInfo_Savechanges');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary" style="width: 98%;">
		<div class="km-panel-heading"><?php echo lang('cms_myInfo_ShippingInformation');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width10p"><?php echo lang('cms_myInfo_Shipfromaddress');?></td>
					<td class="value width17p">
						<?php if(isset($shipAddress->address_detail)):?>
						<?php echo ($shipAddress->address_detail).' '.($shipAddress->address_area).' '.($shipAddress->address_country);?>
						<?php echo ($shipAddress->address_mobilephone1).' '.($shipAddress->address_mobilephone2).''.($shipAddress->address_mobilephone3);?>
						<?php endif;?>
						<br>
						<?php echo lang('cms_myInfo_ShipfromaddressTip');?>
						<button onclick="setDivCenter('#shipFromAddressDiv',true);" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_myInfo_Edit');?></button>
						<div class="km-modal-dialog width40p" id="shipFromAddressDiv">
							<div class="km-modal-content">
								<div class="km-modal-header">
									<button type="button" class="km-close"><span>&times;</span></button>
									<h4 class="km-modal-title"><?php echo lang('cms_myInfo_ShippingInformation').'-'.lang('cms_myInfo_Shipfromaddress');?></h4>
								</div>
								<div class="km-modal-body">
									<label for="shipFromAddressTitle" class="km-control-label" style="width: 80px;">Title:</label>
									<input type="text" class="km-form-control" id="shipFromAddressTitle" value="<?php echo isset($shipAddress->address_title)?$shipAddress->address_title:'';?>" style="width: 50%;height: 30px;padding: 0 5px;display: inline-block;"><br><br>
									<label for="shipFromAddressStaffName" class="km-control-label" style="width: 80px;">Staff Name:</label>
									<input type="text" class="km-form-control" id="shipFromAddressStaffName" value="<?php echo isset($shipAddress->address_staffname)?$shipAddress->address_staffname:'';?>" style="width: 50%;height: 30px;padding: 0 5px;display: inline-block;"><br><br>
									<label for="shipFromAddressCountry" class="km-control-label" style="width: 80px;">Country:</label>
									<select id="shipFromAddressCountry" style="height: 30px;width:30%;"><?php require('countryPhoneNO.php');?></select>
									<label for="shipFromAddressArea" class="km-control-label">Area:</label>
									<input type="text" class="km-form-control" id="shipFromAddressArea" value="<?php echo isset($shipAddress->address_area)?$shipAddress->address_area:'';?>" style="width: 37.8%;height: 30px;padding: 0 5px;display: inline-block;"><br><br>
									<label for="shipFromAddressDetail" class="km-control-label" style="width: 80px;">Detail:</label>
									<input type="text" class="km-form-control" id="shipFromAddressDetail" value="<?php echo isset($shipAddress->address_detail)?$shipAddress->address_detail:'';?>" style="width: 74.5%;height: 30px;padding: 0 5px;display: inline-block;"><br><br>
									
									<label for="shipFromAddressMobilephone1" class="km-control-label" style="width: 120px;">Mobile Phone:</label>
									<select id="shipFromAddressMobilephone1" style="height: 30px;"><?php require('countryPhoneNO.php');?></select>
									<input type="text" class="km-form-control" id="shipFromAddressMobilephone2" value="<?php echo isset($shipAddress->address_mobilephone2)?$shipAddress->address_mobilephone2:'';?>" style="width: 20%;height: 30px;padding: 0 5px;display: inline-block;">-
									<input type="text" class="km-form-control" id="shipFromAddressMobilephone3" value="<?php echo isset($shipAddress->address_mobilephone2)?$shipAddress->address_mobilephone2:'';?>" style="width: 20%;height: 30px;padding: 0 5px;display: inline-block;"><br><br>
									<label for="shipFromAddressPhone1" class="km-control-label" style="width: 120px;">Phone Number:</label>
									<select id="shipFromAddressPhone1" style="height: 30px;"><?php require('countryPhoneNO.php');?></select>
									<input type="text" class="km-form-control" id="shipFromAddressPhone2" value="<?php echo isset($shipAddress->address_mobilephone2)?$shipAddress->address_mobilephone2:'';?>" style="width: 20%;height: 30px;padding: 0 5px;display: inline-block;">-
									<input type="text" class="km-form-control" id="shipFromAddressPhone3" value="<?php echo isset($shipAddress->address_mobilephone2)?$shipAddress->address_mobilephone2:'';?>" style="width: 20%;height: 30px;padding: 0 5px;display: inline-block;">
									
								</div>
								<div class="km-modal-footer">
									<button type="button" class="km-btn km-btn-default km-btn-close"><?php echo lang('cms_myInfo_Close');?></button>
									<button onclick="saveShipFromAddress();" type="button" class="km-btn km-btn-primary"><?php echo lang('cms_myInfo_Savechanges');?></button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</td>
					<td class="field width10p"><?php echo lang('cms_myInfo_DeliveryCompany');?></td>
					<td class="value width17p">
						<select id="deliveryCompany" style="height: 30px;">
							<option value="">Select</option>
							<option value="100000002" <?php echo $merchant->merchant_delivery_company==100000002?'selected':'';?>>Singpost normal mail</option>
							<option value="100000003" <?php echo $merchant->merchant_delivery_company==100000003?'selected':'';?>>Singpost registered mail</option>
							<option value="100000040" <?php echo $merchant->merchant_delivery_company==100000040?'selected':'';?>>Singpost Smartpac</option>
							<option value="100000004" <?php echo $merchant->merchant_delivery_company==100000004?'selected':'';?>>TAQBIN</option>
							<option value="100000005" <?php echo $merchant->merchant_delivery_company==100000005?'selected':'';?>>EMS</option>
							<option value="100000011" <?php echo $merchant->merchant_delivery_company==100000011?'selected':'';?>>Korea registered airmail</option>
							<option value="100000012" <?php echo $merchant->merchant_delivery_company==100000012?'selected':'';?>>Korea normal airmail</option>
							<option value="100000020" <?php echo $merchant->merchant_delivery_company==100000020?'selected':'';?>>Qxpress</option>
							<option value="100000053" <?php echo $merchant->merchant_delivery_company==100000053?'selected':'';?>>Qxpress normal mail</option>
							<option value="100000017" <?php echo $merchant->merchant_delivery_company==100000017?'selected':'';?>>Speedpost</option>
							<option value="100000058" <?php echo $merchant->merchant_delivery_company==100000058?'selected':'';?>>SRE</option>
							<option value="100000063" <?php echo $merchant->merchant_delivery_company==100000063?'selected':'';?>>Quantium</option>
							<option value="100000007" <?php echo $merchant->merchant_delivery_company==100000007?'selected':'';?>>Toll</option>
							<option value="100000009" <?php echo $merchant->merchant_delivery_company==100000009?'selected':'';?>>DHL</option>
							<option value="100000025" <?php echo $merchant->merchant_delivery_company==100000025?'selected':'';?>>FedEx</option>
							<option value="100000034" <?php echo $merchant->merchant_delivery_company==100000034?'selected':'';?>>UPS</option>
							<option value="100000026" <?php echo $merchant->merchant_delivery_company==100000026?'selected':'';?>>Chinapost normal airmail</option>
							<option value="100000027" <?php echo $merchant->merchant_delivery_company==100000027?'selected':'';?>>Chinapost registered airmail</option>
							<option value="100000030" <?php echo $merchant->merchant_delivery_company==100000030?'selected':'';?>>Dex-i</option>
							<option value="100000037" <?php echo $merchant->merchant_delivery_company==100000037?'selected':'';?>>HK post normal mail</option>
							<option value="100000038" <?php echo $merchant->merchant_delivery_company==100000038?'selected':'';?>>HK post registered mail</option>
							<option value="100000047" <?php echo $merchant->merchant_delivery_company==100000047?'selected':'';?>>Thailand registered mail</option>
							<option value="100000021" <?php echo $merchant->merchant_delivery_company==100000021?'selected':'';?>>Citylink</option>
							<option value="100000013" <?php echo $merchant->merchant_delivery_company==100000013?'selected':'';?>>USPS registered mail</option>
							<option value="100000056" <?php echo $merchant->merchant_delivery_company==100000056?'selected':'';?>>USPS normal mail</option>
							<option value="100000062" <?php echo $merchant->merchant_delivery_company==100000062?'selected':'';?>>Asendia</option>
							<option value="100000023" <?php echo $merchant->merchant_delivery_company==100000023?'selected':'';?>>Arrow Air Action</option>
							<option value="100000024" <?php echo $merchant->merchant_delivery_company==100000024?'selected':'';?>>Cuckoo Express</option>
							<option value="100000035" <?php echo $merchant->merchant_delivery_company==100000035?'selected':'';?>>Comone Express</option>
							<option value="100000065" <?php echo $merchant->merchant_delivery_company==100000065?'selected':'';?>>YAMATO Global</option>
							<option value="100000019" <?php echo $merchant->merchant_delivery_company==100000019?'selected':'';?>>4PX Express</option>
							<option value="100000029" <?php echo $merchant->merchant_delivery_company==100000029?'selected':'';?>>Aramex</option>
							<option value="100000031" <?php echo $merchant->merchant_delivery_company==100000031?'selected':'';?>>Japanpost registered mail</option>
							<option value="100000036" <?php echo $merchant->merchant_delivery_company==100000036?'selected':'';?>>MypostOnline</option>
							<option value="100000043" <?php echo $merchant->merchant_delivery_company==100000043?'selected':'';?>>Airpak</option>
							<option value="100000057" <?php echo $merchant->merchant_delivery_company==100000057?'selected':'';?>>POS daftar</option>
							<option value="100000052" <?php echo $merchant->merchant_delivery_company==100000052?'selected':'';?>>Pos Laju</option>
							<option value="100000008" <?php echo $merchant->merchant_delivery_company==100000008?'selected':'';?>>Others</option>
						</select>
						<button onclick="saveDeliveryCompany();" type="button" class="km-btn km-btn-primary fr" style="height: 28px;font-size: 12px;padding: 5px 10px;"><?php echo lang('cms_common_save');?></button>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p"><?php echo lang('cms_myInfo_Orderalerttype');?></td>
					<td class="value width17p tal" colspan="3">
						<input id="isOrderAlertEmail" type="checkbox" <?php echo $merchant->merchant_order_alert_isemail==1?'checked':'';?> style="vertical-align: middle;margin-right: 5px;"><?php echo lang('cms_myInfo_ASMAndemailnotify');?> 
						<input id="orderAlertEmail" type="text" class="km-form-control" value="<?php echo $merchant->merchant_order_alert_email;?>" style="width: 30%;height: 25px;padding: 0 5px;display: inline-block; font-size:10px;"> <?php echo lang('cms_myInfo_ASMAndemailnotifyTip');?><br>
						<input id="isOrderAlertSMS" type="checkbox" <?php echo $merchant->merchant_order_alert_issms==1?'checked':'';?> style="vertical-align: middle;margin-right: 5px;"> <?php echo lang('cms_myInfo_SMSreceive');?>
						<div class="km-popover-wrapper">
							<img onclick="$(this).next().toggle(100)" src="/assets/images/cms/questionMark.png" width="14px" style="cursor:pointer;">
							<div class="km-popover km-bottom" style="top: 25px;left:-125px; width:260px;">
							  <div class="km-arrow"></div>
							  <h3 class="km-popover-title"><?php echo lang('cms_myInfo_Description');?></h3>
							  <div class="km-popover-content">
								<p><?php echo lang('cms_myInfo_DescriptionContent');?></p>
							  </div>
							</div>
						</div>
						<?php echo lang('cms_myInfo_MobilephoneNo');?>：<?php echo $merchant->merchant_order_alert_phone1;?> <?php echo $merchant->merchant_order_alert_phone2;?> <button onclick="setDivCenter('#',true);" type="button" class="km-btn km-btn-primary" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_common_Editmobilephonenumber');?></button>
						<button onclick="saveOrderAlert();" type="button" class="km-btn km-btn-primary fr" style="height: 28px;font-size: 12px;padding: 5px 10px;"><?php echo lang('cms_common_save');?></button>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p"><?php echo lang('cms_myInfo_Sendingnotifymail');?></td>
					<td class="value width17p tal" colspan="3">
						<input id="isSendingNotifyMail" type="checkbox" <?php echo $merchant->merchant_is_sending_notify_mail==1?'checked':'';?> style="vertical-align: middle;margin-right: 5px;"> <?php echo lang('cms_myInfo_Use');?> 	<?php echo lang('cms_myInfo_UseTip');?>
						<button onclick="saveIsSendingNotifyMail();" type="button" class="km-btn km-btn-primary fr" style="height: 18px;font-size: 10px;padding: 0px 10px;"><?php echo lang('cms_common_save');?></button>
					</td>
				  </tr>
				  <tr>
					<td class="field width10p">e-Ticket <?php echo lang('cms_sider_Password');?></td>
					<td class="value width17p tal" colspan="3">
						<input type="text" class="km-form-control" id="eticketPassword" value="<?php echo $merchant->merchant_eticket_password;?>" style="width: 30%;height: 25px;padding: 0 5px;display: inline-block;">
						<button onclick="saveEticketPassword();" type="button" class="km-btn km-btn-primary fr" style="height: 22px;font-size: 10px;padding: 2px 10px;"><?php echo lang('cms_common_save');?></button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="km-panel km-panel-primary" style="width: 98%;">
		<div class="km-panel-heading">AiiMai<?php echo lang('cms_sider_staffAndcontactinformation');?></div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width50p" style="border-right: 1px solid #ddd;"><?php echo lang('cms_sider_Salesmanager');?></td>
					<td class="field width50p"><?php echo lang('cms_sider_GeneralSellingInquiryforAiiMai');?></td>
				  </tr>
				  <tr>
					<td class="value width10p tal" style="border-right: 1px solid #ddd;">
						<?php echo lang('cms_myInfo_Name');?>: Deal offer<br>
						<?php echo lang('cms_myInfo_Email');?> : deal@aiimai.com<br>
						<?php echo lang('cms_myInfo_Phonenumber');?> : <br>
						<?php echo lang('cms_myInfo_ForpromotionofyourproductOrservices');?>
					</td>
					<td class="value width17p tal" colspan="3">
						<a href="#no">FAQs</a>    |    <a href="#no"><?php echo lang('cms_myInfo_AskaQuestion');?></a><br><?php echo lang('cms_myInfo_Formoreinformationaboutshippingsettlementetc');?>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
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
</script>
</body>
</html>