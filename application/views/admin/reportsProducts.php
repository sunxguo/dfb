<div class="index reports topTab clearfix" style="">
<div class="tabs-box">
	<div class="tabs-top">
		<a href="/admin/reportsTurnover">Turnover</a>
		<a href="#" class="current">Products</a>
	</div>
</div>
<div class="row">
	<div class="span10" style="margin:0 auto;margin-top:10px;">
		<div class="slate">
			<form class="form-inline">
				<select class="span2">
					<option value=""> - From Date - </option>
				</select>
				<select class="span2">
					<option value=""> - To Date - </option>
				</select>
				<select class="span2">
					<option value=""> - Category - </option>
				</select>
				<input type="text" class="input_text" placeholder="Keyword...">
				<button type="submit" class="btn km-btn-primary" style="margin-top:0px;padding:0px;">Filter Report</button>
			</form>
		</div>
	</div>
</div>
<div class="row">
	<div class="span10" style="margin:0 auto;margin-top:10px;">
		<div class="slate">
			<div class="page-header">
				<h2><i class="icon-signal pull-right fr"><img width="15" height="15" src="/assets/images/admin/signal.png"></i>Products</h2>
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
								text:'Website recent 12 days Products Statistics',//网站最近12天订单数据分析
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
										return labels[i]+"订单数:<span style='color:red'>"+value+"</span>万件";
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
	<div class="span10" style="margin:0 auto;margin-top:10px;">
		<div class="slate">
			<div class="page-header">
				<div class="km-btn-group pull-right" style="float:right;">
					<button class="btn dropdown-toggle km-btn-default" style="margin-top:0px;padding:0px;width: 100px;" onclick="$('#exportType').toggle();">
						<i class="icon-download-alt"><img src="/assets/images/admin/download.png" width="15" height="10"></i> Export
						<span class="caret"><img src="/assets/images/admin/bottom.png" width="8" height="8"></span>
					</button>
					<ul class="km-dropdown-menu" id="exportType">
						<li><a href="">CSV</a></li>
						<li><a href="">Excel</a></li>
						<li><a href="">PDF</a></li>
					</ul>
				</div>
				<h2 style="display:inline-block;">Report Data</h2>
			</div>
			<table class="orders-table table">
				<thead>
					<tr>
						<th>Day</th>
						<th class="value">Quantity</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Today</td>
						<td class="value">121</td>
					</tr>
					<tr>
						<td>Yesterday</td>
						<td class="value">121</td>
					</tr>
					<tr>
						<td>5th June 2014</td>
						<td class="value">121</td>
					</tr>
					<tr>
						<td>4th June 2014</td>
						<td class="value">121</td>
					</tr>
					<tr>
						<td>3rd June 2014</td>
						<td class="value">121</td>
					</tr>
					<tr>
						<td>2nd June 2014</td>
						<td class="value">121</td>
					</tr>
					<tr>
						<td>1st June 2014</td>
						<td class="value">121</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
<script src="/assets/js/ichart/ichart.1.2.min.js" type="text/javascript"></script>
