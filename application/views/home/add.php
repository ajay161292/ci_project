<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="<?php echo LINKPATH.'Home' ?>">Back</a>

<form id="addform" name="addform" method="post" action="<?php //echo LINKPATH.'Home/additem' ?>">
	Name:<input type="text" name="name"/>
	Salary:<input type="text" name="salary"/>
	<input type="submit" name="submit" value="Save"/>
</form>
</body>
</html>

