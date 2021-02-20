<ul class="sidebar-nav">
    <?php 
		$left_menu = new left_menu();
		$GroupMenuList 		= $left_menu->getgroupmenu();
		$UserMenuIDList 	= $left_menu->getusermenuList($UserLevel);
		
		foreach ($GroupMenuList as $row) {
			$GroupMenuID 	= $row['GroupModulID'];
			$GroupMenu 		= $row['GroupModul'];
		?>
		<li class="sidebar-header">
			<?php echo $GroupMenu;?>
		</li>
		<?php
			foreach ($left_menu->getusermenu($GroupMenuID, $UserMenuIDList) as $row) {
				$MenuID 	= $row['ModulID'];
				$Menu 		= $row['Modul'];
				$Link 		= $row['Link'];
			?>
			<li class="sidebar-item">
				<a href="<?php echo $Link;?>" class="sidebar-link">
					<i class="align-middle" data-feather="layout"></i> <span class="align-middle"><?php echo $Menu;?></span>
				</a>
			</li>
			<?php 
			}
		}
	?>
</ul>

<div class="sidebar-bottom d-none d-lg-block">
    <div class="media">
        <img class="rounded-circle mr-3" src="<?php echo $site_url;?>/images/avatars/user-login.jpg" alt="Chris Wood"
		width="40" height="40">
        <div class="media-body">
            <h5 class="mb-1"><?php echo $Username;?></h5>
            <div>
                <i class="fas fa-circle text-success"></i> Online
			</div>
		</div>
	</div>
</div>