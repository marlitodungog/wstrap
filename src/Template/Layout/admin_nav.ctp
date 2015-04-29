<?php 
	$nav_selected = $this->NavigationSelector->selectedMainNavigation($nav_selected[0]);
	if (!empty($sub_nav_selected)) {
		$sub_nav_selected = $this->NavigationSelector->selectedSubNavigation($sub_nav_selected['parent'],$sub_nav_selected['child']);
	}else{
		$sub_nav_selected = array();
	}
	
?>
<aside class="left-side sidebar-offcanvas">
	<section class="sidebar">
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li class="<?= $nav_selected["dashboard"] ?>">
				<?= $this->Html->link('<i class="fa fa-dashboard"></i> <span>Dashboard</span> ',["controller" => "users", "action" => "dashboard"],["escape" => false]) ?>
			</li>
			<li class="<?= $nav_selected["user"] ?>">
				<?= $this->Html->link('<i class="fa fa-user"></i> <span>User</span> ',["controller" => "users", "action" => "index"],["escape" => false]) ?>
			</li>
			<li class="<?= $nav_selected["hosting_related"] ?>">
				<?= $this->Html->link('<i class="fa fa-cloud"></i> <span>Hosting Related</span> ',["controller" => "hostings", "action" => "index"],["escape" => false]) ?>
			</li>
			<li class="<?= $nav_selected["services_related"] ?>">
				<?= $this->Html->link('<i class="fa fa-globe"></i> <span>Services Related</span> ',["controller" => "services", "action" => "index"],["escape" => false]) ?>
			</li>
			<li class="<?= $nav_selected["slides"] ?>">
				<?= $this->Html->link('<i class="fa fa-picture-o"></i> <span>Slides</span> ',["controller" => "slides", "action" => "index"],["escape" => false]) ?>
			</li>
			<li class="<?= $nav_selected["other_pages"] ?>">
				<?= $this->Html->link('<i class="fa fa-list-alt"></i> <span>Other Pages</span> ',["controller" => "other_pages", "action" => "index"],["escape" => false]) ?>
			</li>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>