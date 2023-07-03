<?php


?>
<div class="card card-outline card-info">
	<div class="card-header">
		<h3 class="card-title">Create User</h3>
	</div>
	<div class="card-body">
		<form action="" method="POST"  id="user_form">

			<div class="form-group">
				<label for="firstname" class="control-label">First Name</label>
                <input type="text" name="firstname" id="firstname" class="form-control rounded-0" required value="" />
			</div>

			<div class="form-group">
				<label for="lastname" class="control-label">Last Name</label>
                <input type="text" name="lastname" id="lastname" class="form-control rounded-0" required value="" />
			</div>


			<div class="form-group">
				<label for="username" class="control-label">UserName</label>
                <input type="text" name="username" id="username" class="form-control rounded-0" required value="" />
			</div>


			<div class="form-group">
				<label for="password" class="control-label">Password</label>
                <input type="text" name="password" id="password" class="form-control rounded-0" required value="" />
			</div>
			
		</form>
	</div>
	<div class="card-footer">
		<button class="btn btn-flat btn-primary" type='submit' name='submit' form="user_form">Save</button>
		<a class="btn btn-flat btn-default" href="?page=user/list">Cancel</a>
	</div>
</div>

<?php

if (isset($_POST['submit'])) {

    $firstname = $_POST['firstname'];

    $lastname = $_POST['lastname'];

    $username = $_POST['username'];

    $password = $_POST['password'];

	$hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO `users`(`firstname`, `lastname`, `username`, `password`) VALUES ('$firstname','$lastname','$username','$hashed_password')";

    $result = $conn->query($sql);

    if ($result == TRUE) {

      echo "New record created successfully";
    }else{
        echo "Error:". $sql . "<br>". $conn->error;
    }
    $conn->close(); 
}

?>