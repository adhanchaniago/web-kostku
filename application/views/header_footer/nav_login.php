<?php
	$sessData=$this->session->userdata('kostku_logged_in');
?>

	<li class="nav-item">
		
		<a class="nav-link" data-toggle="dropdown" style="color: #FFFFFE;" href="#"><span class="glyphicon glyphicon-user"> </span> &nbsp<?php echo $sessData['username'] ?><span class="caret"></span>&nbsp&nbsp&nbsp</a>
			<ul class="dropdown-menu">
			    <li><a href="<?php echo site_url('Kostku/lihatprofil'); ?>"><span class="glyphicon glyphicon-eye-open"> </span> &nbsp Lihat</a></li>
			    <li><a href="<?php echo site_url('Kostku/edit_profil'); ?>"><span class="glyphicon glyphicon-pencil"> </span> &nbsp Edit</a></li>
			    <li class="divider"></li>
			    <li><a href="<?php echo site_url('Kostku/logout'); ?>"><span class="glyphicon glyphicon-log-out"> </span> &nbspLogout</a></li>
			    <li><a href="<?php echo site_url('Kostku/about'); ?>"><span class="glyphicon glyphicon-info-sign"> </span> &nbsp About Us</a></li>
			</ul>
			
	</li>
						

						
