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
						<a href="addnotice.php"><p class="sec active">Add Notice</p></a>
						<a href="createtimetable.php"><p class="sec">Create Timetable</p></a>
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
				<form method="POST">
				<p></p>
				<?php 
					include './includes/connection.php';
				    $uid = $_SESSION['id'];
				    $p_selectquery = "select * from users";
				    $p_query = mysqli_query($con, $p_selectquery);
				    
    ?>

				<textarea placeholder="Notice..." rows="5" name="notice"></textarea>
				<select name="to">
						<option>Send To</option>
						<option value="all">All</option>
						<?php while($p_res = mysqli_fetch_array($p_query)){ ?>
                <option value="<?php echo $p_res['id'] ?>"><?php echo $p_res['fullname'] ?></option>
						<?php } ?>
						
						
					</select>
				
				<button name="submit">Send Notice</button>
				</form>
			</div>	

<?php 
         if(isset($_POST['submit'])){
         $notice = $_POST['notice'];
         $to = $_POST['to'];
         $from =  $_SESSION['fullname'];
        
$insertquery = "insert into notice(notice, noteto, notefrom) values('$notice', '$to', '$from')";
         		$iquery = mysqli_query($con, $insertquery);
       
 

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