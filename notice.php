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
						<a href="student.php"><p class="sec">student</p></a>
						<a href="notice.php"><p class="sec active">Notice</p></a>
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

    <?php 
				
				    $n_selectquery = "select * from notice where noteto = '$uid'";
				    $n_query = mysqli_query($con, $n_selectquery);
				    while($n_res = mysqli_fetch_array($n_query)){ ?>
            <div class="new">
            	<i style="color: grey">-<?php echo $n_res['notefrom']; ?></i>
				<p><?php echo $n_res['notice']; ?></p>
			</div>
				<?php    } ?>


				 <?php 
				
				    $na_selectquery = "select * from notice where noteto = 'all'";
				    $na_query = mysqli_query($con, $na_selectquery);
				    while($na_res = mysqli_fetch_array($na_query)){ ?>
            <div class="new">
            	<i style="color: grey">-<?php echo $na_res['notefrom']; ?></i>
				<p><?php echo $na_res['notice']; ?></p>

			</div>
				<?php    } ?>
			
				
						</div>
					</div>
				</div>

			
	</div>

</body>
</html>