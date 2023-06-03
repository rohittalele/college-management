<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
    <?php include('./includes/links.php')?>
    <style type="text/css">
    	
    	.section .left a{
    		color: #000;
    		text-decoration: none;
    	}

    	.section .left .sec:hover, .section .left .active{
    		background: #000 !important;
    		color: #fff !important;
    	}
    </style>
</head>
<body>
	<div class="">
		<?php include('./includes/header.php')?>

				<div class="section">
					<div class="left">
						<a href="students.php"><p class="sec active">Students</p></a>
						<a href="addnotice.php"><p class="sec">Add Notice</p></a>
						<a href="addresult.php"><p class="sec">Create Results</p></a>
					</div>

					<div class="right">
						<div class="center">

		<?php 
					include './includes/connection.php';

				    $uid = $_GET['id'];
				    $p_selectquery = "select * from users where id = '$uid'";
				    $p_query = mysqli_query($con, $p_selectquery);
				    $p_res = mysqli_fetch_array($p_query);
    ?>
							<div class="login inHome">
				<form method="POST"  novalidate enctype="multipart/form-data"> 
				<p></p>
				<input type="text" name="name" value="<?php echo $p_res['fullname']; ?>" placeholder="Full Name">
				<div style="display: flex;">
					<input type="text" name="branch" value="<?php echo $p_res['branch']; ?>" placeholder="College Year">
					<input type="text" name="year" value="<?php echo $p_res['year']; ?>" placeholder="College Year">
				</div>
				<input type="text" value="<?php echo $p_res['mob']; ?>" name="mob" placeholder="Mobile Number">
				<label style="margin-top: 50px;">Upload Result</label>
				<input type="file" name="pimg">
				
				<button name="submit">Update</button>
				</form>
			</div>	

<?php 
         if(isset($_POST['submit'])){
         $name = $_POST['name'];
             $year = $_POST['year'];
         	 $branch = $_POST['branch'];
            $mob = $_POST['mob'];
             $uid;
             $pimg = $_FILES['pimg'];

 

            echo $p_filename = $pimg['name'];
            $p_filepath = $pimg['tmp_name'];
            $p_fileerror = $pimg['error'];

            $p_destfile = './upload/'.$p_filename;
            $r_destfile = $p_filename;
  

           move_uploaded_file($p_filepath,  $p_destfile);

$infoupdate = "update users set fullname='$name', year='$year', branch='$branch', mob='$mob', result='$r_destfile' where id='$uid'";

$updateres = mysqli_query($con, $infoupdate);
if($updateres){
header('home.php');
}else{
  echo "Not updated";
}



}
  ?>

			<!-- <div class="new">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
			</div>

			<div class="new">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
			</div> -->
						</div>
					</div>
				</div>

			
	</div>

</body>
</html>