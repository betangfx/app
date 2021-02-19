<ul class="sidebar-nav">
    <?php 
		include 'function_menu.php';
		$GroupModulList 	= getGroupModul();
		$UserModulIDList 	= getUserModulIDList($usergroup);
		
		foreach ($GroupModulList as $row) {
			$GroupModulID = $row['GroupModulID'];
			$GroupModul = $row['GroupModul'];
		?>
		<li class="sidebar-header">
			<?php echo $GroupModul;?>
		</li>
		<?php
			foreach (getUserModul($GroupModulID, $UserModulIDList) as $row) {
				$ModulID = $row['ModulID'];
				$Modul = $row['Modul'];
				$Link = $row['Link'];
			?>
			<li class="sidebar-item">
				<a href="<?php echo $Link;?>" class="sidebar-link">
					<i class="align-middle" data-feather="layout"></i> <span class="align-middle"><?php echo $Modul;?></span>
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
            <h5 class="mb-1"><?php echo $username;?></h5>
            <div>
                <i class="fas fa-circle text-success"></i> Online
			</div>
		</div>
	</div>
</div>