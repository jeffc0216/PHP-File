<?php
	session_start();
?>
<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
	<title>
		
	</title>
	</head>
	<body>
		<?php
			$_SESSION["xyz"]="100";
		?>
		<p>Form.php</p>
		<form action="1.php?m=list" method="post" enctype="multipart/form-data">
			username:<input type="text" name="username"><br>
			password:<input type="password" name="password"><br>
			photo:<input type="file" name="photo"><br>
			<input type="submit" value="Login">
		</form>

	</body>
</html>