<html>
						<div class="header">
						<div class="logo"><img src="theme/assets/banner-home.JPG" width= "800" height= "300"></div>
						<nav class="navbar navbar-inverse">
						  <div class="container-fluid">
							<div class="navbar-header">
							<div class="logo"><img src="theme/assets/<?php echo $logo?>" width= "50" height= "50"></div>
							</div>
							<ul class="nav navbar-nav">
							  <li><a href="index.php?page=home">Home</a></li>
							  <li><a href="index.php?page=market">Marketplace</a></li>
							  <li><a href="index.php?page=boss">World Boss</a></li>
							  <li><a href="index.php?page=leaderboard">Leaderboard</a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
							  <
							  <?php 
								if(isset($_SESSION['log'])){
							  ?>
							  
								<li><a href="index.php?page=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>  
								
							  <?php 
							  } else { 
							  ?>
							  	<li><a href="index.php?page=reg"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
								<li><a href="index.php?page=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>  
								
							  <?php
							  } 
							  ?>  
							</ul>
						  </div>
						</nav>
						</div>
</html>