<div class="modify_main">
	<div class="tabs-box">
		<div class="tabs-top">
			<a href="#" class="current">Password Modification</a>
		</div>
	</div>
	<!--
	<div class="titA">Modify Password</div>-->
	<form class="form-modify" action="/kmadmin/admin/modify" method="post" enctype="multipart/form-data">
		<div class="tips-error w230" style="margin-left: 160px; width: 200px;" id="errorInfo"></div>
		<div class="item" style="padding-left: 60px;">
			<input class="inp-txt width200" type="text" name="username" id="username" placeholder="Username" value="<?php echo $_SESSION['username'];?>"/>
			<span style="color:red;">*</span>
		</div>
		<div class="item" style="padding-left: 60px;">
			<input class="inp-txt width200" type="password" name="oldpwd" id="oldpwd" placeholder="Old Password"/>
			<span style="color:red;">*</span>
		</div>
		<div class="item" style="padding-left: 60px;">
			<input class="inp-txt width200" type="password" name="newpwd" id="newpwd" placeholder="New Password"/>
			<span style="color:red;">*</span>
		</div>
		<div class="item" style="padding-left: 60px;">
			<input class="inp-txt width200" type="password" name="renewpwd" id="renewpwd" placeholder="Re-Password"/>
			<span style="color:red;">*</span>
		</div>
		<div class="btn-center bor-top">
			<a href="javascript:void(0)" class="btn120" onclick="adminPwd('Successfully Saved!')">Save</a>
		</div>
	</form>
</div>
<script src="/assets/js/db_handler.js" type="text/javascript"></script>