<?php
function EventLogger($type,$data){

}

			$usersloc = '../db/users';
			$f = fopen($usersloc, "r");
				if ($f) {
					#set each line of the users file to an array
					$usersline = explode("\n", fread($f, filesize($usersloc)));
				}
			fclose($f);
?>