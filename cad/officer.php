<?php include('header.php'); ?>
<?php
	If (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == '2'){
		echo 'Officer';
		echo '<a href="logout.php">Log out</a>';
	}else{
		echo 'You do not have permission to view this page';
		echo '<a href="index.php">Go back</a>';
	}
?>