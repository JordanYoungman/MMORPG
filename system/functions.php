<?php
	function getPage(){
	if(isset($_GET['page']))
		{
			$page = $_GET['page'];
			if($page == "home"){
				require_once("theme/pages/index.php");
			}
			else if ($page == "contact"){
				require_once("theme/pages/contact.php");
			}
			else if ($page == "login"){
				require_once("theme/pages/login.php");
			}
			else if ($page == "reg"){
				require_once("theme/pages/register.php");
			}
			else if ($page == "logout"){
				session_destroy();
				echo "BYE!";
				header("Location: index.php");
				die();
			}
			else if ($page == "boss"){
				require_once("theme/pages/wboss.php");
			}
			else if ($page == "leaderboard"){
				require_once("theme/pages/leaderboard.php");
			}
			else if ($page == "market"){
				require_once("theme/pages/items.php");
			}
		}		
		else {
			require_once("theme/pages/index.php");
		}
	}
?>