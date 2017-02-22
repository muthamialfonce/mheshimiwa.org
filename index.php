<?php 
if(isset($_POST)){
	var_dump($_POST);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form enctype="multipart/form-data" method="post">
	<input type="file" name="file">
	<input type="submit">
</form>
</body>
</html>

