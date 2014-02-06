		<form method='post' action='adminfunc/newuser.php'>
			<table border='1'>
				<tr>
					<td colspan="4">Add user</td>
				</tr>
				<tr>
					<td>First Name</td>
					<td><input type="text" name="newuserfname"></td>
					<td>Last Name</td>
					<td><input type="text" name="newuserlname"></td>
				</tr>
				<tr>
					<td colspan="1">Usertype:</td>
					<td colspan="3">
						<select name="accttype">
							<option value="admin">Admin</option>
							<option value="dispatcher">Dispatch</option>
							<option value="officer">Officer</option>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="1">Username:</td>
					<td colspan="3"><input type="text" name="newuseruname"></td>
				</tr>
				<tr>
					<td colspan="1">Password:</td>
					<td colspan="3"><input type="password" name="newuserpw"></td>
				</tr>
				<tr>
					<td colspan="4"><input type='submit' value='Add'></td>
			</table>
		</form>