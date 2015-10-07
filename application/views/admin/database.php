<div class="modify_main password-div">
	<div class="titA" style="margin-left:20px;">Backup the database</div>
	<div class="form-modify">
		<div class="tips-error w230" style="margin-left: 160px; width: 200px;" id="errorInfo"></div>
		<div class="item" style="padding-left:0px;">
			The last backup time: <?php echo date("Y-m-d H:i:s");?>
		</div>
		<div class="item" style="padding-left:0px;">
			<input class="inp-txt width200" type="text" name="filename" id="filename" placeholder="File name" value="zb.sql"/>
			<span style="color:red;">*</span>
		</div>
		<div class="btn-center bor-top" style="width:212px;">
			<a href="javascript:backUp()" class="btn120">Begin</a>
		</div>
	</div>
</div>