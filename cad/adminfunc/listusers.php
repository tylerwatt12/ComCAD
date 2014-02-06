<?php
#will list users in HTML, needs starting and closing tag
function listusers(){
	$usersloc = '../db/users';
	$f = fopen($usersloc, "r");
		if ($f) {
			#set each line of the users file to an array
			$usersline = explode("\n", fread($f, filesize($usersloc)));
		}
	fclose($f);
	#for every line of users file, do this
	foreach ($usersline as &$eachrow) {
		list($userid, $usertype, $username, $pwhash, $firstname, $lastname) = explode("	", $eachrow);
		echo '<option value="' . $userid . '">' . strtoupper($lastname) . ', ' . strtoupper($firstname) . '</option>' . "\n";
	}
}

?>