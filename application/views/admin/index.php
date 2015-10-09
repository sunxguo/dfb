<?php /*<div class="index clearfix" style="margin-left:10px;">
<div class="row" style="margin-top:10px;">
	<div class="span10">
		<div class="slate clearfix">
			<a class="stat-column" href="#">
				<span class="number">0</span>
				<span>Open Orders</span>
			</a>
			<a class="stat-column" href="#">
				<span class="number">S$0</span>
				<span>Turnover</span>
			</a>
			<a class="stat-column" href="#">
				<span class="number"><?php echo $userAmount;?></span>
				<span>Users</span>
			</a>
			<a class="stat-column" href="#">
				<span class="number"><?php echo $merchantAmount;?></span>
				<span>Merchants</span>
			</a>
		</div>
		<div class="alertDiv states-info clearfix">
			<div class="alertNewUser" style="float:left;">
				<div class="alert-panel-body">
					<div class="alert-row" style="text-align:center;">
						<div class="">
							<i class="fa fa-gavel"></i>
						</div>
						<div class="">
							<span class="state-title"> 	New Seller Registration requiring review & confirmation  </span>
							<h4 style="line-height: 50px;height: 30px;"><a href="/admin/merchants" style="color:white;font-size:18px;"><?php echo $requiringMerchants;?></a></h4>
						</div>
					</div>
				</div>
			</div>
			<div class="alertNewUser" style="float:right;">
				<div class="alert-panel-body">
					<div class="alert-row" style="text-align:center;">
						<div class="">
							<i class="fa fa-gavel"></i>
						</div>
						<div class="">
							<span class="state-title"> 	New Items listed requiring review & confirmation  </span>
							<h4 style="line-height: 50px;height: 30px;"><a href="/admin/items" style="color:white;font-size:18px;"><?php echo $requiringItems;?></a></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="span10">
		<div class="slate">
			<div class="page-header">
				<h2><i class="icon-signal pull-right fr"><img width="15" height="15" src="/assets/images/admin/signal.png"></i>Turnover</h2>
			</div>
			<div id="canvasDiv" style="padding:0 64px;"></div>
			<script>
				$(function(){
					//创建数据
					var data = [
								{
									name : 'A产品',
									value:[2680,2200,1014,2590,2800,3200,2184,3456,2693,2064,2414,2044],
									color:'#01acb6',
									line_width:2
								}
						   ];
					//创建x轴标签文本   
					var labels = ["One","Two","Three","Four","Five","Six","Seven","Eight","Nine","Ten","Yesterday","Today"];
					   
					var chart = new iChart.Area2D({
							render : 'canvasDiv',
							data: data,
							title:{
								text:'Website recent 12 days Order Statistics',//网站最近12天订单数据分析
								color:'#eff4f8',
								background_color:'#1c4156',
								height:40,
								border:{
									enable:true,
									width:[0,0,4,0],//只显示下边框
									color:'#173a4e'
								}
							},
							subtitle:{
								text:'Unit: ten thousand',//利用副标题设置单位信息  单位:万件
								fontsize:14,
								color:'#eff4f8',
								textAlign:'left',
								padding:'0 40',
								height:20
							},
							footnote:{
								text:'Source: Website database',
								color:'#708794',
								padding:'0 20',
								background_color:'#102c3c',
								height:30,
								border:{
									enable:true,
									width:[3,0,0,0],//只显示上边框
									color:'#0f2b3a'
								}
							},
							padding:'5 1',//设置padding,以便title能占满x轴
							sub_option:{
								label:false,
								hollow_inside:false,//设置一个点的亮色在外环的效果
								point_size:10
							},
							tip:{
								enable:true,
								listeners:{
									 //tip:提示框对象、name:数据名称、value:数据值、text:当前文本、i:数据点的索引
									parseText:function(tip,name,value,text,i){
										return labels[i]+"Orders:<span style='color:red'>"+value+"</span>";
									}
								}
							},
							width : 800,
							height : 400,
							background_color:'#0c222f',
							gradient:true,
							shadow:true,
							shadow_blur:2,
							shadow_color:'#4e8bae',
							shadow_offsetx:0,
							shadow_offsety:0,
							gradient_mode:'LinearGradientDownUp',//设置一个从下到上的渐变背景
							border:{
								radius:5
							},
							coordinate:{
								width : 600,
								height : 240,
								grid_color:'#506e7d',
								background_color:null,//设置坐标系为透明背景
								scale:[{
									 position:'left',	
									 label:{
										 color:'#eff4f8',
										 fontsize:14,
										 fontweight:600
									 },
									 start_scale:0,
									 end_scale:4000,
									 scale_space:500
								},{
									 position:'bottom',	
									 label:{
										 color:'#506673',
										 fontweight:600
									 },
									 labels:labels
								}]
							}
						});
					
					chart.draw();
				});
			</script>
		</div>
	</div>
</div>
<div class="row">
	<div class="span5">
		<div class="slate">
			<div class="page-header">
				<h2><i class="icon-shopping-cart pull-right"></i>Top Shops</h2>
			</div>
			<table class="orders-table table">
			<tbody>
				<tr>
					<td><a href="">#12345 - Joe Bloggs</a> <span class="km-label km-label-success">Paid</span></td>
					<td>$112.00</td>
				</tr>
				<tr>
					<td><a href="">#12345 - Joe Bloggs</a> <span class="km-label km-label-info">Dispatched</span></td>
					<td>$112.00</td>
				</tr>
				<tr>
					<td><a href="">#12345 - Joe Bloggs</a> <span class="km-label km-label-danger">Refunded</span></td>
					<td>$112.00</td>
				</tr>
				<tr>
					<td><a href="">#12345 - Joe Bloggs</a> <span class="km-label km-label-default">Awaiting Payment</span></td>
					<td>$112.00</td>
				</tr>
				<tr>
					<td><a href="">#12345 - Joe Bloggs</a> <span class="km-label km-label-inverse">Failed</span></td>
					<td>$112.00</td>
				</tr>
				<tr>
					<td><a href="">#12345 - Joe Bloggs</a> <span class="km-label km-label-warning">Cancelled</span></td>
					<td>$112.00</td>
				</tr>
				<tr>
					<td><a href="">#12345 - Joe Bloggs</a> <span class="km-label km-label-info">Paid</span></td>
					<td>$112.00</td>
				</tr>
				<tr>
					<td colspan="2"><a href="">View more orders</a></td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>
	<div class="span5" style="margin-left:30px;">
		<div class="slate">
			<div class="page-header">
				<h2><i class="icon-shopping-cart pull-right"></i>Top Products</h2>
			</div>
			<table class="orders-table table">
			<tbody>
				<tr>
					<td><a href="">#12345 - Joe Bloggs</a> <span class="km-label km-label-success">Cookware</span></td>
					<td>346</td>
				</tr>
				<tr>
					<td><a href="">#12345 - Joe Bloggs</a> <span class="km-label km-label-success">Cookware</span></td>
					<td>306</td>
				</tr>
				<tr>
					<td><a href="">#12345 - Joe Bloggs</a> <span class="km-label km-label-success">Cookware</span></td>
					<td>244</td>
				</tr>
				<tr>
					<td><a href="">#12345 - Joe Bloggs</a> <span class="km-label km-label-success">Cookware</span></td>
					<td>120</td>
				</tr>
				<tr>
					<td><a href="">#12345 - Joe Bloggs</a> <span class="km-label km-label-success">Cookware</span></td>
					<td>55</td>
				</tr>
				<tr>
					<td><a href="">#12345 - Joe Bloggs</a> <span class="km-label km-label-success">Cookware</span></td>
					<td>15</td>
				</tr>
				<tr>
					<td><a href="">#12345 - Joe Bloggs</a> <span class="km-label km-label-success">Cookware</span></td>
					<td>12</td>
				</tr>
				<tr>
					<td colspan="2"><a href="">View more orders</a></td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>
</div>
</div>
<script src="/assets/js/ichart/ichart.1.2.min.js" type="text/javascript"></script>
*/?>
