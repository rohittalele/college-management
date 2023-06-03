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
						<a href="home.php"><p class="sec">Home</p></a>
						<a href="student.php"><p class="sec">Student</p></a>
						<a href="notice.php"><p class="sec">Notice</p></a>
						<a href="timetable.php"><p class="sec  active">Timetable</p></a>
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

    <?php 
				
				    $n_selectquery = "select * from timetable";
				    $n_query = mysqli_query($con, $n_selectquery);
				    while($n_res = mysqli_fetch_array($n_query)){ ?>
            <div class="new">
				<p><?php echo $n_res['note']; ?></p>
				<img src="<?php echo $n_res['tableimg']; ?>" style="width: 100%; text-align: center;">
			</div>
				<?php    } ?>

						</div>
					</div>
				</div>

			
	</div>

</body>
</html>