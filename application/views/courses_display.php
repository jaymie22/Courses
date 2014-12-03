<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Courses</title>
	<link rel="stylesheet" href="/assets/css/courses.css">
</head>
<body>
<div id="wrapper">
<?php 
		if(function_exists('validation_errors') && validation_errors() != '')
		{
?>
			<?= validation_errors() ?> 
<?php			
		}
?>
	<h3>Add a new course</h3>
	<form action="/courses/add" method="post">
		<div>
			<label for="name">Name: </label>
			<input type="text" name="course_name">
		</div>

		<div>
			<label for="description">Description: </label>
			<textarea name="course_description"></textarea>
		</div>

		<input type="submit" value="Add">
	</form>
	<h3>Courses</h3>
	<table>
		<thead>
			<th>Course Name</th>
			<th>Description</th>
			<th>Date Added</th>
			<th>Actions</th>
		</thead>
		<tbody>
<?php  
		if(!empty($courses))
		{
			foreach ($courses as $course) 
			{	?>
			<tr>
				<td><?=  $course['name'] ?></td>
				<td><?=  $course['description'] ?></td>
				<td><?=  $course['created_at'] ?></td>
				<td><a href="/courses/destroy/<?= $course['id'] ?>">remove</a></td>
			</tr>
<?php	
			}
		}	?>
		</tbody>
	</table>
</div>
</body>
</html>