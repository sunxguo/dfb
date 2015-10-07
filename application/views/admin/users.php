<div class="padding10 contentlist column-list">
	<div id="appDiv" class="titA tit-bot pb5" style="">
		<div style="float: right;margin-left:10px;">
			<input type="text" id="keyword" class="inp-txt width200" value="<?php echo isset($_GET["search"])?$_GET["search"]:"";?>">
			<a href="javascript:selectUser('<?php echo $selectPage;?>')" class="btn80">Search</a>
		</div>
		<div style="float: right;">
			<span class="font12">Status:</span>
			<select id="status" onchange="selectUser('<?php echo $selectPage;?>')" class="select w100">
                <option value="-1">All</option>
                <option value="0" <?php echo isset($_GET["status"]) && $_GET["status"]==0?'selected = "selected"':'';?>>
					Normal
				</option>
                <option value="1" <?php echo isset($_GET["status"]) && $_GET["status"]==1?'selected = "selected"':'';?>>
					Frozen
				</option>
            </select>
		</div>
		<div style="float: right;margin-right:10px;">
			<span class="font12">Gender:</span>
			<select id="gender" onchange="selectUser('<?php echo $selectPage;?>')" class="select w100">
                <option value="-1">All</option>
                <option value="0" <?php echo isset($_GET["gender"]) && $_GET["gender"]==0?'selected = "selected"':'';?>>
					Male
				</option>
                <option value="1" <?php echo isset($_GET["gender"]) && $_GET["gender"]==1?'selected = "selected"':'';?>>
					Female
				</option>
            </select>
		</div>
		<div class="clear">
		</div>
	</div>
	<input id="orderUser" type="hidden" value="<?php echo isset($_GET['orderUser'])?$_GET['orderUser']:'';?>">
	<input id="orderEmail" type="hidden" value="<?php echo isset($_GET['orderEmail'])?$_GET['orderEmail']:'';?>">
	<table>
		<thead>
			<tr class="table-head">
			<!--
				<th style="width:100px;">Avatar</th>-->
				<th style="width:30px;"><input type="checkbox" id="checkAll"></th>
				<th style="width:100px;" class="field-order" onclick="orderUser('<?php echo $selectPage;?>','username')">Username <?php if(isset($_GET['orderUser'])){if($_GET['orderUser']=='desc') echo '↑';else echo '↓';}?></th>
				<th style="width:100px;" class="field-order" onclick="orderUser('<?php echo $selectPage;?>','email')">Email <?php if(isset($_GET['orderEmail'])){if($_GET['orderEmail']=='desc') echo '↑';else echo '↓';}?></th>
				<th style="width:100px;">Phone</th>
				<th style="width:100px;">Gender</th>
				<th style="width:100px;">State</th>
				<th style="width:100px;">Grade</th>
				<th style="width:100px;">Country</th>
				<th style="width:150px;">Birthday</th>
				<th style="width:150px;">Vip</th>
				<th style="width:280px;">Operation</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($users as $user):?>
			<tr class="list1">
			<!--
				<td><img src="<?php echo $user->user_avatar;?>" width="54"></td>-->
				<td><input type="checkbox" name="checkedUserId" value="<?php echo $user->user_id;?>"></td>
				<td class="column-name"><a href="" target="_blank"><?php echo $user->user_username;?></a></td>
				<td><?php echo $user->user_email;?></td>
				<td><?php echo $user->user_phone;?></td>
				<td><?php echo $user->user_gender==0?'Male':'Female';?></td>
				<td><?php echo $user->user_state==0?'<span class="km-label km-label-success" style="display: inline-block;">Normal</span>':'<span class="km-label km-label-default" style="display: inline-block;">Frozen</span>';?></td>
				<td><?php echo $user->user_grade;?></td>
				<td><?php echo $user->user_country;?></td>
				<td><?php echo $user->user_birthday;?></td>
				<td><?php echo $user->user_vip_grade==0?'No':$user->user_vip_grade;?></td>
				<td>
					<a href="javascript:window.open('/admin/modifyUser?userId=<?php echo $user->user_id;?>','Edit User','height=500,width=900,toolbar=no,menubar=no')">Edit</a>&nbsp;&nbsp;&nbsp;
<!--					<a href="/admin/editColumn?column=<?php echo $user->user_id;?>">Edit</a>&nbsp;&nbsp;&nbsp;-->
					<?php if($user->user_state==0):?>
					<a href="javascript:freezeUser('<?php echo $user->user_id;?>','Sure to freeze <<?php echo $user->user_username;?>>？','Successfully froze <?php echo $user->user_username;?>')">Freeze</a>&nbsp;&nbsp;&nbsp;
					<?php else:?>
					<a href="javascript:unfreeze('<?php echo $user->user_id;?>','Sure to unfreeze <<?php echo $user->user_username;?>>？','Successfully unfroze <?php echo $user->user_username;?>')">unfreeze</a>&nbsp;&nbsp;&nbsp;
					<?php endif;?>
					<a href="javascript:delUser('<?php echo $user->user_id;?>','Sure to delete <<?php echo $user->user_username;?>>？','Successfully deleted <?php echo $user->user_username;?>')">Delete</a>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
	<div>
		<button onclick="deleteCheckedUsers();" type="button" class="km-btn km-btn-danger" style="height: 18px;font-size: 10px;padding: 0px 10px;margin: 10px 0 0 0;">Delete</button>
		<button onclick="setDivCenter('#statusCheckedUsersDiv',true);" type="button" class="km-btn km-btn-success" style="height: 18px;font-size: 10px;padding: 0px 10px;margin: 10px 0 0 0;">Status</button>
		<div class="km-modal-dialog width40p" id="statusCheckedUsersDiv">
			<div class="km-modal-content">
				<div class="km-modal-header">
					<button type="button" class="km-close"><span>&times;</span></button>
					<h4 class="km-modal-title">Change Status</h4>
				</div>
				<div class="km-modal-body">
					<select id="statusChanged" class="select w100">
						<option value="0">
							Normal
						</option>
						<option value="1">
							Frozen
						</option>
					</select>
				</div>
				<div class="km-modal-footer">
					<button type="button" class="km-btn km-btn-default km-btn-close">Close</button>
					<button type="button" class="km-btn km-btn-primary" onclick="statusCheckedUsers();">Save</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
	<nav>
	  Total <?php echo $amount;?>
	  <ul class="km-pagination">
		<li <?php if($firstPage=="no"):?>class="disabled"<?php endif;?>>
			<a href="<?php echo $firstPage=="no"?"#":$firstPage;?>"><span>«</span></a>
		</li>
		<?php for($i=1;$i<=$pageAmount;$i++):?>
		<li <?php if($currentPage==$i):?>class="active"<?php endif;?>>
			<a href="<?php echo $jumpPage.$i;?>"><?php echo $i;?></a>
		</li>
		<?php endfor;?>
		<li <?php if($lastPage=="no"):?>class="disabled"<?php endif;?>>
			<a href="<?php echo $lastPage=="no"?"#":$lastPage;?>"><span>»</span></a>
		</li>
	  </ul>
	</nav>
</div>
<div id="msg_content" class="showinfo">
	<div class="dialog-hd">信息内容</div>
	<div class="itemPar" id="msgwait"><img src="/assets/images/cms/loading.gif" width="60" height="60"></div>
	<div class="itemPar" id="msgdata"></div>
</div>
<script src="/assets/js/admin.js" type="text/javascript"></script>