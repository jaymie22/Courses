<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Courses</title>
	<link rel="stylesheet" href="/assets/css/courses.css">
</head>
<body>
<div id="delete_wrapper">
	<h3>Are you sure you want to delete the following course?</h3>

	<div>
		<label> Name: </label>
		<span><?= $delete_data['name'] ?></span>
	</div>
	
	<div>
		<label>Description: </label>
		<span><?= $delete_data['description'] ?></span>
	</div>
	
	<a href="<?= base_url() ?>" class="no_button">No!</a>
	<a href="/courses/destroy_process/<?= $delete_data['id'] ?>" class="yes_button">Yes! I want ro delete this. </a>

</div>
</body>
</html>