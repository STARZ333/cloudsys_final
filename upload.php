<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Upload File</title>
	<style>
		body {
			background-color: #F5F5F5;
			font-family: Arial, sans-serif;
		}
		h1 {
			font-size: 24px;
			font-weight: bold;
			margin-bottom: 20px;
			text-align: center;
			color: #333333;
		}
		form {
			margin: 0 auto;
			width: 400px;
			padding: 20px;
			background-color: #FFFFFF;
			border-radius: 10px;
			box-shadow: 0px 0px 10px #CCCCCC;
		}
		input[type=file] {
			margin-bottom: 10px;
		}
		input[type=submit] {
			background-color: #4CAF50;
			border: none;
			color: #FFFFFF;
			cursor: pointer;
			font-size: 16px;
			font-weight: bold;
			padding: 10px 20px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			border-radius: 5px;
			transition: background-color 0.3s ease;
		}
		input[type=submit]:hover {
			background-color: #3E8E41;
		}
	</style>
</head>
<body>

	<h1>Upload File</h1>

	<form method="post" action="exe.php" enctype="multipart/form-data">
		<input type="file" name="uploadFile"><br>
		<input type="submit" value="Submit">
	</form>

</body>
</html>

