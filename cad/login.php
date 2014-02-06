<?php include('header.php'); ?>
<?php
	#CHECK LOGIN CREDS
	if (!empty($_POST["username"]) && !empty($_POST["password"])) {
			#location to users file
			#users file formatting: 'usertype'[tab]'username'[tab]'md5passwordhash'[tab]'firstname'[tab]'lastname'
			#USERS FILE MUST BE OUTSIDE OF PUBLIC FOLDER
			$usersloc = '../db/users';
			$f = fopen($usersloc, "r");
				if ($f) {
					#set each line of the users file to an array
					$usersline = explode("\n", fread($f, filesize($usersloc)));
				}
			fclose($f);
			#for every line of users file, do this
			foreach ($usersline as &$eachrow) {
				#separate each data type (eg usertype username md5password) into a variable, delimited by [tab]
				@list($userid, $usertype, $username, $pwhash, $firstname, $lastname) = explode("	", $eachrow);
				if (strtoupper($username) == strtoupper($_POST["username"]) && md5($_POST["password"]) == $pwhash){
					#redir to correct page
					$_SESSION['firstname'] = $firstname;
					$_SESSION['lastname'] = $lastname;
					if ($usertype == 'dispatcher'){
						#set loggedin variable
						$_SESSION['loggedin'] = '1';
						header('Location: dispatcher.php');
					}
					if ($usertype == 'officer'){
						#set loggedin variable
						$_SESSION['loggedin'] = '2';
						header('Location: officer.php');
					}
					if ($usertype == 'admin'){
						#set loggedin variable
						$_SESSION['loggedin'] = '3';
						header('Location: admin.php');
					}

				} else {
					#DO NOT ENABLE
					#echo '<a href="index.php">Go back</a>';
					#echo '<br>';
					#echo 'could not log in because: <br>';
					#echo md5($_POST["password"]) . ' did not equal: ' . $pwhash . '<br>';
					#echo 'or ' . strtoupper($_POST["username"]) . ' did not equal: ' . strtoupper($username);
				}
			}
	} else {

	}
?>

