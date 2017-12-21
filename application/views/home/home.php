<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
</head>
<body>
<div>
<a href="">Countries</a><br/>
<a href="">Countries</a><br/>
<a href="">Countries</a><br/>
</div>
<a href="<?php echo LINKPATH.'Home/additem' ?>">Add New Item</a><br/><br/><br/>

<table border="3">
	<tbody>
	<tr>
		<td>Id</td><td>Name</td><td>Salary</td><td colspan="2">Action</td>
	</tr>
<?php
	// print_r($list);exit;
	foreach($list as $v){
		echo'<tr>
				<td>'.$v['id'].'</td>
				<td>'.$v['name'].'</td>
				<td>'.$v['salary'].'</td>
				<td><a href="'.LINKPATH.'Home/deleteitem?id='.$v['id'].' ">Delete</a></td>
				<td><a href="'.LINKPATH.'Home/updateitem?id='.$v['id'].' ">Update</a></td>
			</tr>';
	}
?>
	</tbody>
</table>
</body>
</html>