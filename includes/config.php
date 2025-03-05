<?php
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/src/about.php":
			$CURRENT_PAGE = "About"; 
			$PAGE_TITLE = "About Us";
			break;
		case "/src/404.php":
			$CURRENT_PAGE = "404"; 
			$PAGE_TITLE = "404";
			break;
		case "/contact.php":
			$CURRENT_PAGE = "Contact"; 
			$PAGE_TITLE = "Contact Us";
			break;
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "Welcome to my homepage!";
	}

?>