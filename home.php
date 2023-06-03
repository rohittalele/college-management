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
						<a href="home.php"><p class="sec active">Home</p></a>
						<a href="student.php"><p class="sec">student</p></a>
						<a href="notice.php"><p class="sec">Notice</p></a>
						<a href="timetable.php"><p class="sec">Timetable</p></a>
						<a href="result.php"><p class="sec">Result</p></a>
					</div>

					<div class="right">
						<div class="center">

		<?php 
					include './includes/connection.php';
				    $uid = $_SESSION['id'];
				    $p_selectquery = "select * from users where id = '$uid'";
				    $p_query = mysqli_query($con, $p_selectquery);
				    $p_res = mysqli_fetch_array($p_query);
    ?>
							<div class="login inHome">
								<form method="POST" novalidate enctype="multipart/form-data">
				<p></p>
				<input type="file" name="proimg" placeholder="Full Name">
				
				<button name="imgsub">Upload Image</button>
				</form>

				<form method="POST" style="margin-top: 50px">
				<p></p>
				<input type="text" name="name" value="<?php echo $p_res['fullname']; ?>" placeholder="Full Name">
				<div style="display: flex;">
					<input type="text" name="branch" value="<?php echo $p_res['branch']; ?>" placeholder="College Year">
					<input type="text" name="year" value="<?php echo $p_res['year']; ?>" placeholder="College Year">
				</div>
				<input type="text" value="<?php echo $p_res['mob']; ?>" name="mob" placeholder="Mobile Number">
				
				<button name="submit">Update Infromation</button>
				</form>

				<form method="POST" novalidate enctype="multipart/form-data" style="margin-top: 50px">
				<p></p>
				<input type="file" name="adhar" placeholder="Full Name">
				
				<button name="adharsub">Update Verification Document</button>
				</form>
			</div>	

<?php 
         if(isset($_POST['submit'])){
         $name = $_POST['name'];
             $year = $_POST['year'];
         	 $branch = $_POST['branch'];
            $mob = $_POST['mob'];
             $uid;

$infoupdate = "update users set fullname='$name', year='$year', branch='$branch', mob='$mob' where id='$uid'";

$updateres = mysqli_query($con, $infoupdate);
if($updateres){
header('home.php');
}else{
  echo "Not updated";
}

 

}
  ?>

  <?php if(isset($_POST['adharsub'])){
    
          $pimg = $_FILES['adhar'];

 

            echo $p_filename = $pimg['name'];
            $p_filepath = $pimg['tmp_name'];
            $p_fileerror = $pimg['error'];
            if($p_fileerror ==0){ 

            $p_destfile = './upload/'.$p_filename;
            $r_destfile = './upload/'.$p_filename;
  

           move_uploaded_file($p_filepath,  $p_destfile);

          $p_insertquery = "update users set adharimg='$r_destfile' where id = $uid";
          $p_iquery = mysqli_query($con, $p_insertquery);

          if($p_iquery){

              
          }else{
            echo "string";
          }
        }  
    }     
  ?>



  <?php if(isset($_POST['imgsub'])){
    
          $pimg = $_FILES['proimg'];

 

            echo $p_filename = $pimg['name'];
            $p_filepath = $pimg['tmp_name'];
            $p_fileerror = $pimg['error'];
            if($p_fileerror ==0){ 

            $p_destfile = './upload/'.$p_filename;
            $r_destfile = './upload/'.$p_filename;
  

           move_uploaded_file($p_filepath,  $p_destfile);

          $p_insertquery = "update users set img='$r_destfile' where id = $uid";
          $p_iquery = mysqli_query($con, $p_insertquery);

          if($p_iquery){

              
          }else{
            echo "string";
          }
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