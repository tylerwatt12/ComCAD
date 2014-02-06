<?php include('../header.php'); ?>
<?php
	If (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == '3'){
		$usersfile = '../../db/users';
		$f = fopen($usersfile, "r");
		if ($f) {
			#set each line of the users file to an array
			$usersline = explode("\n", fread($f, filesize($usersfile)));
			#this variable is for omission of \n's when user file is rewritten.
			$oldline = count($usersline) - 2;
		}
		fclose($f);
		#set counter to 'zero'
		$inc = -1;
		#for every line of users file, do this
		foreach ($usersline as &$eachrow) {
			list($userid, $usertype, $username, $pwhash, $firstname, $lastname) = explode("	", $eachrow);
			#increment counter
			$inc++;
			#If submitted ID matches line from users file
			If ($userid == $_POST['removename']){
				#delete line in users file
				unset($usersline["$inc"]);
				#open file for writing
				$f = fopen($usersfile, 'w+');
				#get counter ready for newline detection
				$cinc = 0;
				#for every line in users file (after user was removed)
				foreach($usersline as $line) { 
					#If the counter is below the line number required to skip \n's
					if ($cinc < $oldline){
						#NOT last line, do not omit new line
						#write file, proceed in loop again
						fwrite($f,$line . "\n");
					} else {
						#LAST LINE FOUND, omit \n
						#write file, done with loop.
						fwrite($f,$line);
					}
					#increment counter that checks which line to remove
					$cinc++;
				}
				#close file for writing
				fclose($f);
				echo 'User was removed from the system. <br>';
				echo '<a href="../admin.php">Go back</a>';
			}		
		}
			
	}else{
		#permission denied page
		echo 'You do not have permission to view this page';
		echo '<a href="index.php">Go back</a>';
	}