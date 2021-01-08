<nav class="dash-nav-list">

	<?php 
	if ($ROLE==1){
	?>
	<a href="index.php" class="dash-nav-item"><i class="fas fa-server"></i>Dashboard</a>
	<a href="electronics.php" class="dash-nav-item"><i class="fas fa-desktop"></i>Manage Electronics </a>
    <a href="users.php" class="dash-nav-item"><i class="fas fa-users"></i>Manage Users </a>
    <a href="inventory" class="dash-nav-item"><i class="fas fa-truck-loading"></i>Manage Inventory </a>
	<?php
	}
	if ($ROLE==2){
	?>
	<a href="index.php" class="dash-nav-item"><i class="fas fa-server"></i>Dashboard</a>
    <a href="assignElect.php" class="dash-nav-item"><i class="fas fa-desktop"></i>Assign Electronics</a>
    <a href="issues.php" class="dash-nav-item"><i class="fas fa-exclamation"></i>Issues</a>
    <?php
	} 
	if ($ROLE==0){
	?>
    <a href="index.php" class="dash-nav-item"><i class="fas fa-list-alt"></i>Report</a>
    <?php
	}
	?>  
    <a href="useracc.php" class="dash-nav-item"><i class="fas fa-cog"></i>Manage Account </a>
    	  
</nav>