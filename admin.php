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

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

.vstu{
	padding: 5px 10px;
	border-radius: 10px;
	background: #000;
	color: #fff;
	border: none;
	outline: none;
	float: right;
}
</style>
</head>
<body>
	<div class="">
		<?php include('./includes/header.php')?>

				<div class="section">
					<div class="left">
						<a href="admin.php"><p class="sec active">Students</p></a>
						<a href="addnotice.php"><p class="sec">Add Notice</p></a>
						<a href="createtimetable.php"><p class="sec">Create Timetable</p></a>
					</div>

					<div class="right">
						<div class="center">

		<?php 
					include './includes/connection.php';
				    $uid = $_SESSION['id'];
				    $p_selectquery = "select * from users where status='0'";
				    $p_query = mysqli_query($con, $p_selectquery);
				    
    ?>

<table>
  <tr>
    <th>Student Name</th>
    <th>Roll No</th>
    <th>Branch</th>
    <th>Student Proof</th>
    <th></th>
  </tr>
  <?php while($p_res = mysqli_fetch_array($p_query)){ ?>
  	<tr>
    <td><?php echo $p_res['fullname']; ?></td>
    <td>234</td>
    <td><?php echo $p_res['branch']; ?></td>
    <td><img src="<?php echo $p_res['adharimg']; ?>" style="width:40px; height: 40px;"></td>
    <td><a href="viewstudent.php?id=<?php echo $p_res['id'] ?>"><button class="vstu">View Student</button></a></td>
  </tr>

 <?php }?>
  
  
</table>



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