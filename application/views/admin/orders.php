

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
			<input type="text" id="keyword" class="inp-txt width200" value="<?php echo isset($_GET["search"])?$_GET["search"]:"";?>">
			<a href="javascript:selectOrder('<?php echo $selectPage;?>')" class="btn80">Search</a>
		</div>
		<div style="float: right;">
			<span class="font12">Status:</span>
			<select id="status" onchange="selectOrder('<?php echo $selectPage;?>')" class="select w100">
                <option value="-1">All</option>
                <option value="0" <?php echo isset($_GET["status"]) && $_GET["status"]==0?'selected = "selected"':'';?>>
					Waiting for payment
				</option>
                <option value="1" <?php echo isset($_GET["status"]) && $_GET["status"]==1?'selected = "selected"':'';?>>
					Waiting for confirmation
				</option>
                <option value="2" <?php echo isset($_GET["status"]) && $_GET["status"]==2?'selected = "selected"':'';?>>
					In the distribution
				</option>
                <option value="3" <?php echo isset($_GET["status"]) && $_GET["status"]==3?'selected = "selected"':'';?>>
					Completed
				</option>
            </select>
		</div>
		<div class="clear">
		</div>
	</div>
	<table>
		<thead>
			<tr class="table-head">
				<th style="width:100px;">订单号</th>
				<th style="width:100px;">称呼</th>
				<th style="width:100px;">手机号</th>
				<th style="width:100px;">车牌号</th>
				<th style="width:200px;">车型</th>
				<th style="width:80px;">颜色</th>
				<th style="width:400px;">地址</th>
				<th style="width:150px;">费用</th>
				<th style="width:250px;">下单时间</th>
				<th style="width:150px;">状态</th>
				<th style="width:100px;">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($orders as $order):?>
			<tr class="list1">
				<td><?php echo $order->number;?></td>
				<td class="column-name">
					<a href="" target="_blank"><?php echo $order->name;?></a>
				</td>
				<td><?php echo $order->user->phone;?></td>
				<td><?php echo $order->licensenumber;?></td>
				<td><?php echo $order->type;?></td>
				<td><?php echo $order->color;?></td>
				<td><?php echo $order->position;?></td>
				<td><?php echo $washTypes[$order->washtype];?></td>
				<td><?php echo $order->time;?></td>
				<td><?php echo /*$order->status*/ '根据订单号查阅微信商户平台';?></td>
				<td>
					<?php /*
					<a href="/admin/contentList?column=<?php echo $order->order_id;?>">Details</a>&nbsp;&nbsp;&nbsp;
					<a href="/admin/editColumn?column=<?php echo $order->order_id;?>">Edit</a>&nbsp;&nbsp;&nbsp;
					<a href="javascript:delColumn('<?php echo $order->order_id;?>','Sure to freeze <<?php echo $order->order_id;?>>？','Successfully froze <?php echo $order->order_id;?>')">Freeze</a>&nbsp;&nbsp;&nbsp;
					<a href="javascript:delColumn('<?php echo $order->order_id;?>','Sure to delete <<?php echo $order->order_id;?>>？','Successfully deleted <?php echo $order->order_id;?>')">Delete</a>
					*/ ?>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
	<nav>
	  共 <font color="red"><?php echo $amount;?></font> 条数据
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