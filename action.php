
<?php 

	include 'connection.php';
	$result = array("error" => false);

	$action ="";

	if(isset($_GET['action']) && !empty($_GET['action'])){

		  $action = $_GET['action'];

		  if($action == "get"){
		  	$query = mysqli_query($con,"SELECT * FROM students")or die(mysqli_error($con));
		  	$row_data = array();
		  	while ($row = mysqli_fetch_assoc($query)) {
		  		array_push($row_data,$row);
		  		
		  	}

		  	$result['users'] = $row_data;

		  }

		  if($action == "add"){
		  	// print_r($_POST);
		  	// exit;
		  	$name = $_POST['name'];
		  	$email = $_POST['email'];
		  	$mobile = $_POST['mobile'];
		  	$query = mysqli_query($con,"INSERT INTO students(username,email,mobile) values('".$name."','".$email."','".$mobile."')")or die(mysqli_error($con));
		  	if ($query) {
		  		// $result['error']= false;
		  		$result['message'] = "Record Successfully Inserted !! ";
		  	}else{
		  		$result['error']= true;
		  		$result['message'] = "Inserted Failled !";
		  	}
		  	


		  }
		  if($action == "update"){
		  	// echo "<pre>";
		  	// print_r($_POST);
		  	// exit;
		  	$id = $_POST['id'];
		  	$name = $_POST['username'];
		  	$email = $_POST['email'];
		  	$mobile = $_POST['mobile'];
		  	$query = mysqli_query($con,"UPDATE `students` SET `username`='".$name."',`mobile`='".$mobile."',`email`='".$email."' WHERE id=".$id)or die(mysqli_error($con));
		  	if ($query) {
		  		
		  		$result['message'] = "Record Successfully Updated !! ";
		  	}else{
		  		$result['error']= true;
		  		$result['message'] = "Update Failled !";
		  	}

		  }

		  if($action == "delete"){
		  	$id = $_POST['id'];
		  	$query = mysqli_query($con,"DELETE FROM `students` WHERE id=".$id)or die(mysqli_error($con));
		  	if ($query) {
		  		
		  		$result['message'] = "Record Successfully Deleted !! ";
		  	}else{
		  		$result['error']= true;
		  		$result['message'] = "Delete Failled !";
		  	}
		  }

	}

	// echo "<pre>";
	// print_r($result);
	echo json_encode($result);






 ?>