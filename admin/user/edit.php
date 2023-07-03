<?php
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `users` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}

?>
<div class="card card-outline card-info">
	<div class="card-header">
		<h3 class="card-title">Edit User</h3>
	</div>
	<div class="card-body">
		<form action="" method="POST"  id="user_form">
        <input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
			<div class="form-group">
				<label for="firstname" class="control-label">First Name</label>
                <input type="text" name="firstname" id="firstname" class="form-control rounded-0" required value="<?php echo isset($firstname) ? $firstname : '' ?>" />
			</div>

			<div class="form-group">
				<label for="lastname" class="control-label">Last Name</label>
                <input type="text" name="lastname" id="lastname" class="form-control rounded-0" required value="<?php echo isset($lastname) ? $lastname : '' ?>" />
			</div>


			<div class="form-group">
				<label for="username" class="control-label">UserName</label>
                <input type="text" name="username" id="username" class="form-control rounded-0" required value="<?php echo isset($username) ? $username : '' ?>"/>
			</div>
			
		</form>
	</div>
	<div class="card-footer">
		<button class="btn btn-flat btn-primary" type='submit' name='submit' form="user_form">Update</button>
		<a class="btn btn-flat btn-default" href="?page=user/list">Cancel</a>
	</div>
</div>

<?php

if (isset($_POST['submit'])) {

    $firstname = $_POST['firstname'];

    $lastname = $_POST['lastname'];

    $username = $_POST['username'];

    $sql = "UPDATE `users` SET `firstname`='$firstname',`lastname`='$lastname',`username`='$username'  where id = '{$_GET['id']}'"; 

    $result = $conn->query($sql);

    if ($result == TRUE) {

      echo "User Updated successfully";
    }else{
        echo "Error:". $sql . "<br>". $conn->error;
    }
    $conn->close(); 
}

?>