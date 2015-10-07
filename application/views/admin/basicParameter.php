<div class="padding10 formList clearfix">
	<div class="km-panel km-panel-primary mt10" style="width: 98%;">
		<div class="km-panel-heading">Basic Parameter</div>
		<div class="km-panel-body" style="padding:0px;">
			<table class="km-table">
				<tbody>
				  <tr>
					<td class="field width20p tal br">
						Website Name
					</td>
					<td class="value width30p tal">
						<input id="websiteName" type="text" value="<?php echo $websiteConfig['website_name_english'];?>" class="km-form-control" style="width: 80%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
					<td class="field width20p tal br">
						Website Url
					</td>
					<td class="value width30p tal">
						<input id="websiteUrl" type="text" value="<?php echo $websiteConfig['website_url'];?>" class="km-form-control" style="width: 80%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				  <tr>
					<td class="field width20p tal br">
						Website Logo
					</td>
					<td class="value width30p tal">
						<img src="<?php echo $websiteConfig['website_logo_en_cn'];?>" width="60">
					</td>
					<td class="field width20p tal br">
						Copyright
					</td>
					<td class="value width30p tal">
						<input id="websiteCopyright" type="text" value="<?php echo $websiteConfig['website_copyright'];?>" class="km-form-control" style="width: 80%;height: 30px;padding: 0px 5px;display: inline-block;font-size:12px;">
					</td>
				  </tr>
				  <tr>
					<td class="value tar" colspan="4">
						<button onclick="saveBasicParameter('Successfully Saved!');" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Save</button>
					</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>