<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="fa/css/fa.css" rel="stylesheet">
        <script src="bootstrap/js/jq.js"></script>
		 <link href="stylesheet.css" rel="stylesheet">
        <script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="admin.js"></script>
        
<?php
session_start();

if (!isset(	$_SESSION["admin_id"])  || !isset($_SESSION["login_status"])){
	header("location:login.php");
	exit();
}
include('db.php');
	$id=$_SESSION["admin_id"];
	$sql="select * from admin where admin_id='$id';";
	$res = @mysqli_query($con,$sql)or die("unable to execute query");
	if (mysqli_num_rows($res)==0){
		die("fail");
	} 
	$row=mysqli_fetch_array($res);
	$user=$row["user"];
	$ebooks=$row["ebooks"];
	$topic=$row["topic"];
	$scope=$row["scope"];
	$category=$row["category"];
?>
<nav class=" navbar-inverse navbar navbar-default  bd-rd-0 sh">
	<div class="container-fluid>
		<div class="navbar-header" >
		<div class="navbar-brand">
		<?php
			$sql="select first_name from admin where admin_id='$id';";
			$res = @mysqli_query($con,$sql)or die("unable to execute query");
			if (mysqli_num_rows($res)==0){
			die("fail");
			} 
			$row=@mysqli_fetch_array($res);
			echo ("Welcome {$row["first_name"]} !");
		
		?>
				
		</div>
		<button data-toggle="collapse"  data-target="#dropdown" class="toggle navbar-toggle" type="button">
		<span class="fa fa-bars"></span>
		</button>
		</div>
		<div class="collapse navbar-collapse" id="dropdown">
			<ul class="nav navbar-nav navbar-right">
				<?php
					$query = "SELECT COUNT(*) as ebk FROM ebooks WHERE type='PDF';";
					$res = @mysqli_query( $con, $query );
					$row = mysqli_fetch_array($res);
					$eb = $row["ebk"];
					echo("
						<li><a>Ebook : $eb</a></li>
					");
					$query = "SELECT COUNT(*) as vid FROM ebooks WHERE type='VIDEO';";
					$res = @mysqli_query( $con, $query );
					$row = mysqli_fetch_array($res);
					$vd = $row["vid"] or 0;
					echo("
						<li><a>Videos : $vd</a></li>
					");
					/*$query = "SELECT COUNT(*) as adm FROM admin;";
					$res = @mysqli_query( $con, $query );
					$row = mysqli_fetch_array($res);
					$ad = $row["adm"];
					echo("
						<li><a>Admins : $ad</a></li>
					");*/
				?>
				<li id="log"> <a href="logout.php"> Logout</a></li>
			</ul>
			
		</div>
	
	</div>
</nav>


<div class="container">
	<div class="row">
		<div class="col-sm-1"></div>
	  	<div class="col-sm-2">
			<BR /><center><img src="id.jpg" class="img-responsive img-rounded "></center><br />
			<ul class="nav br-blu">
			
			 	<li><a class=" fa fa-user bg-blue jq_menu" jq_content="#admin"> Admins</a> </li>
				<li><a class=" fa fa-globe jq_menu" jq_content="#scope_table"> Scope</a></li>
				<li><a class=" fa fa-list-alt jq_menu" jq_content="#category_table"> Category</a></li>
				<li><a class=" fa fa-list jq_menu" jq_content="#topic_table"> Topic</a> </li>
				<li><a class=" fa fa-pencil jq_menu" jq_content="#tutorial_table"> Tutorials</a></li>
				<li><a class=" fa fa-suitcase jq_menu" jq_content="#my_account">  My Account</a> </li>
				
		 	</ul>
		</div>
		<div class="col-sm-8">
			<br />
			<?php
				require("php/views/admins.php");
				require("php/views/category.php");
				require("php/views/topic.php");
				require("php/views/tutorial.php");
				require("php/views/scope.php");
				require("php/views/myaccount.php");
	 		?>
		</div>
			 
			<div class="col-sm-1"></div>
				
	 
	 
 
	</div>
	

</div>




