<div class="slider" style="position: absolute;">
<h3 <?php echo isset($index) && $index?'class="current"':'';?>>
	<a href="/admin" id="menu_portal">
		<span class="ico ico-sy"></span>
		控制面板
	</a>
</h3>
<!--
<h3>
	<a href="" id="menu_promotionManage">
		<span class="ico ico-tggl"></span>
		推广管理
	</a>
</h3>
-->
<h3 <?php echo isset($data) && $data?'class="current"':'';?>>
	<a href="/admin/items" id="menu_manageApp">
		<span class="ico ico-jbgl"></span>
		数据管理
	</a>
</h3>
<ul style="display: block;">
	<li><a href="/admin/order" <?php echo isset($order) && $order?'class="current"':'';?>>订单管理</a></li>
	<li><a href="/admin/user" <?php echo isset($user) && $user?'class="current"':'';?>>用户管理</a></li>
</ul>
<?php /*
<h3 <?php echo isset($reports) && $reports?'class="current"':'';?>>
	<a href="/admin/reportsTurnover" id="menu_portal">
		<span class="ico ico-shgl"></span>
		<?php echo lang('admin_sider_Tools');?>
	</a>
</h3>
<!--
<h3 <?php echo isset($content) && $content?'class="current"':'';?>>
	<a href="/admin/contentList" id="menu_portal">
		<span class="ico ico-tsxx"></span>
		内容管理
	</a>
</h3>
-->
<ul style="display: block;">
	<li><a href="/admin/reportsTurnover" <?php echo isset($reports) && $reports?'class="current"':'';?>><?php echo lang('admin_sider_Reports');?></a></li>
	<li><a href="/admin/account" <?php echo isset($account) && $account?'class="current"':'';?>><?php echo lang('admin_sider_Account');?></a></li>
	<li><a href="/admin/searchStatistics" <?php echo isset($searchStatistics) && $searchStatistics?'class="current"':'';?>><?php echo lang('admin_sider_SearchStatistics');?></a></li>
	<li><a href="/admin/sendMessage" <?php echo isset($sendMessage) && $sendMessage?'class="current"':'';?>><?php echo lang('admin_sider_SendMessage');?></a></li>
	<li><a href="/admin/asmNotice" <?php echo isset($asmNotice) && $asmNotice?'class="current"':'';?>>ASM Notice</a></li>
</ul>
<h3 <?php echo isset($setting) && $setting?'class="current"':'';?>>
	<a href="/admin/basicParameter">
		<span class="ico ico-yygl"></span>
		<?php echo lang('admin_sider_SystemSettings');?>
	</a>
</h3>
<ul style="display: block;">
	<li><a href="/admin/basicParameter" <?php echo isset($basicParameter) && $basicParameter?'class="current"':'';?>><?php echo lang('admin_sider_BasicParameter');?></a></li>
	<li><a href="/admin/database" <?php echo isset($database) && $database?'class="current"':'';?>><?php echo lang('admin_sider_Database');?></a></li>
	<li><a href="/admin/securityCenter" <?php echo isset($securityCenter) && $securityCenter?'class="current"':'';?>><?php echo lang('admin_sider_SecurityCenter');?></a></li>
<!--	<li><a href="/admin/template" <?php echo isset($template) && $template?'class="current"':'';?>><?php echo lang('admin_sider_Template');?></a></li>
	<li><a href="/admin/emergencyContacts" <?php echo isset($emergencyContacts) && $emergencyContacts?'class="current"':'';?>><?php echo lang('admin_sider_EmergencyContacts');?></a></li>-->

</ul>
<!--
<h3 <?php echo isset($account) && $account?'class="current"':'';?>>
	<a href="/admin/account" id="menu_accountInfo">
		<span class="ico ico-zhxx"></span>
		账户信息
	</a>
</h3>
-->
*/?>
</div>
