<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="<?php echo LINKPATH.'Home' ?>">Back</a>

<?php //echo $data;exit; ?>


<form id="editform" name="editform" method="post" action="<?php //echo LINKPATH.'Home/updateitem' ?>">
	Name:<input type="text" name="name" value="<?php echo $name;?>" />
	Salary:<input type="text" name="salary" value="<?php echo $salary; ?>" />
	<input type="submit" name="submit" value="Save"/>
</form>
</body>
</html>

