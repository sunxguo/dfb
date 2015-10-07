<div class="padding10 contentlist column-list">
<!--
	<div class="titA tit-bot pb5" style="">
		<div style="float: right;margin-left:10px;">
			<a href="/admin/addColumn" class="msg-btn">添加栏目</a>
		</div>
		<div class="clear">
		</div>
	</div>-->
	<div id="appDiv" class="titA tit-bot pb5" style="">
		<div style="float: right;margin-left:10px;">
			<input type="text" id="keyword" class="inp-txt width200" value="<?php echo isset($_GET["search"])?$_GET["search"]:"";?>" placeholder="Company Name">
			<a href="javascript:selectShipCompany('<?php echo $selectPage;?>')" class="btn80">Search</a>
		</div>
		<div style="float: right;">
			<span class="font12">Status:</span>
			<select id="status" onchange="selectShipCompany('<?php echo $selectPage;?>')" class="select w100">
                <option value="-1">All</option>
                <option value="1" <?php echo isset($_GET["status"]) && $_GET["status"]==1?'selected = "selected"':'';?>>
					ON
				</option>
                <option value="0" <?php echo isset($_GET["status"]) && $_GET["status"]==0?'selected = "selected"':'';?>>
					OFF
				</option>
            </select>
		</div>
		<div class="clear">
		</div>
	</div>
	<table>
		<thead>
			<tr class="table-head">
				<th style="width:100px;">Logo</th>
				<th style="width:400px;">Company</th>
				<th style="width:150px;">Address</th>
				<th style="width:150px;">Status</th>
				<th style="width:150px;">Time</th>
				<th style="width:280px;">Operation</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($shipCompanys as $shipCompany):?>
			<tr class="list1">
				<td><img src="<?php echo $shipCompany->shipcompany_logo;?>" width="54" height="43"></td>
				<td class="column-name"><a href="" target="_blank"><?php echo $shipCompany->shipcompany_name;?></a></td>
				<td><?php echo $shipCompany->shipcompany_address;?></td>
				<td><?php echo $shipCompany->shipcompany_status;?></td>
				<td>
					<a href="/admin/contentList?column=<?php echo $shipCompany->shipcompany_id;?>">Details</a>&nbsp;&nbsp;&nbsp;
					<a href="/admin/editColumn?column=<?php echo $shipCompany->shipcompany_id;?>">Edit</a>&nbsp;&nbsp;&nbsp;
					<a href="javascript:delColumn('<?php echo $shipCompany->shipcompany_id;?>','Sure to freeze it?<<?php echo $shipCompany->shipcompany_name;?>>？','成功删除 <?php echo $shipCompany->shipcompany_name;?>')">Freeze</a>&nbsp;&nbsp;&nbsp;
					<a href="javascript:delColumn('<?php echo $shipCompany->shipcompany_id;?>','Sure to delete it?<<?php echo $shipCompany->shipcompany_name;?>>？','成功删除 <?php echo $shipCompany->shipcompany_name;?>')">Delete</a>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
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