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

    	h4{
    		line-height: 50px !important;
    	}
    </style>
</head>
<body>
	<div class="">
		<?php include('./includes/header.php')?>
		<?php 
					include './includes/connection.php';
				    $uid = $_SESSION['id'];
				    $p_selectquery = "select * from users where id = '$uid'";
				    $p_query = mysqli_query($con, $p_selectquery);
				    $p_res = mysqli_fetch_array($p_query);
    ?>
				<div class="section">
					<div class="left">
						<a href="home.php"><p class="sec ">Home</p></a>
						<a href="student.php"><p class="sec active">student</p></a>
						<a href="notice.php"><p class="sec">Notice</p></a>
						<a href="timetable.php"><p class="sec">Timetable</p></a>
						<a href="result.php"><p class="sec">Result</p></a>
					</div>

					<div class="right" style="padding-top: 50px;">
						<img src="<?php echo $p_res['img']?>" style="width: 200px; height: 200px; float: left; margin-left: 100px; margin-right: 50px;">
						<div class="center">


							<div class="login inHome" style="margin-top: -20px">
				<form method="POST">
				<p></p>
				<h4>Name: <span style="color: #404040"><?php echo $p_res['fullname']; ?></span></h4>
				<div style="display: flex; justify-content: space-between;">
					<h4>Branch: <span style="color: #404040"><?php echo $p_res['branch']; ?></span></h4>
					<h4>Year: <span style="color: #404040"><?php echo $p_res['year']; ?></span></h4>
				</div>
				<h4>Mob: <span style="color: #404040"><?php echo $p_res['mob']; ?></span></h4>
				
				</form>
			</div>	



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