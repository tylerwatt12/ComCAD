<?php include('adminfunc/listusers.php'); ?>
		<form method='post' action='adminfunc/rmuser.php'>
			<table border='1'>
				<tr>
					<td colspan="2">Delete user</td>
				</tr>
				<tr>
					<td><select name="removename"><?php listusers(); ?></select></td>
					<td><input type='submit' value='Remove'></td>
				</tr>
			</table>
		</form>