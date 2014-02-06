<?php include('../header.php'); ?>
<?php
	If (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == '3'){
		$usersfile = '../../db/users';
		#formulate string to be written
		#           RETURN  ID      TAB          Account type   TAB             USERNAME       TAB         PASSWORDINMD5         TAB        FIRST NAME           TAB         LAST NAME
		$newuser =  "\n" . time() . "\t" . $_POST['accttype'] . "\t" . $_POST['newuseruname'] . "\t" . md5($_POST['newuserpw']) . "\t" . $_POST['newuserfname'] . "\t" . $_POST['newuserlname'];
		file_put_contents($usersfile, $newuser, FILE_APPEND | LOCK_EX);
		echo $_POST['newuseruname'] . ' was added to the system. <br>';
		echo '<a href="../admin.php">Go back</a>';
	}else{
		echo 'You do not have permission to view this page';
		echo '<a href="index.php">Go back</a>';
	}