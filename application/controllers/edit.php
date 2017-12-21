<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="<?php echo LINKPATH.'Home' ?>">Back</a>

<form id="editform" name="editform" method="post" action="<?php echo LINKPATH.'Home/updateitem' ?>">
	Name:<input type="text" name="name"/>
	Salary:<input type="text" name="salary"/>
	<input type="submit" name="submit" value="Save"/>
</form>
</body>
</html>

