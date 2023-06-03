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
						<a href="admin.php"><p class="sec">Students</p></a>
						<a href="addnotice.php"><p class="sec">Add Notice</p></a>
						<a href="createtimetable.php"><p class="sec active">Create Timetable</p></a>
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
				<?php 
					include './includes/connection.php';
				    $uid = $_SESSION['id'];
				   
				    
    ?>

				<textarea placeholder="Time Table Note..." rows="5" name="tnote"></textarea>
				<input type="file" name="pimg">
				
				<button name="submit">Upload</button>
				</form>
			</div>	

<?php if(isset($_POST['submit'])){
          $table = $_POST['tnote'];
          $pimg = $_FILES['pimg'];

 

            echo $p_filename = $pimg['name'];
            $p_filepath = $pimg['tmp_name'];
            $p_fileerror = $pimg['error'];
            if($p_fileerror ==0){ 

            $p_destfile = './upload/'.$p_filename;
            $r_destfile = './upload/'.$p_filename;
  

           move_uploaded_file($p_filepath,  $p_destfile);

          $p_insertquery = "insert into timetable(note, tableimg) values('$table', '$r_destfile')";
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