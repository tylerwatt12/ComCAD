<?php include('header.php'); ?>
<?php
	If (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == '3'){
		echo '<b>' . $_SESSION['firstname'] . '\'s Admin Console:</b>';
	 	#populate page with snapins
	 	include('/adminfunc/snapin_newuser.php');
		include('/adminfunc/snapin_rmuser.php');
		echo '<a href="logout.php">Log out</a>';
	}else{
		echo 'You do not have permission to view this page';
		echo '<a href="index.php">Go back</a>';
	}
?>