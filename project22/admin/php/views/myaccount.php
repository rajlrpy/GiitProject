

<div class="jq_contents disp-none" id="my_account">
	<div class="container-fluid ">
		<div class="row br-bt-blu">
			<div class="col-sm-4">
				<h3 class="mg-0 pd-5">&nbsp;&nbsp;&nbsp;<big><i class="fa fa-suitcase"></i></big> My Account</h3>
			</div>
			<!--<div class="col-sm-4">
				<div class="input-group " id='searchbox' >
					<input type="text" id="search_user" class="form-control" list="admin_uid" placeholder=" Enter user Id  " />
					<datalist id="admin_uid">
					<?php
					$sql="select uid from admin where user=0 AND status=1;";
					$res = @mysqli_query($con,$sql)or die("unable to execute query");
					if (mysqli_num_rows($res)==0){
					die("fail");
					}
					while($row=mysqli_fetch_array($res)){
						echo("<option value='{$row['uid']}'>{$row['uid']}</option>");
					}
					?>
					</datalist>
					<span class="input-group-addon btn " id ='search' ><i class=" fa fa-search"></i></span>
				</div> 
				<br/>
			</div>
			<div class="col-sm-4">				
				<button class="btn btn-sm btn-link addbutton"><i class="fa fa-plus-circle"></i></a> Add new</button>
			</div> -->
		</div>
		<br />
		<div class="container-fluid">
			<?php
					include('db.php');
					$id=$_SESSION["admin_id"];
					$sql="select * from admin where admin_id='$id';";
					$res = @mysqli_query($con,$sql)or die("unable to execute query");
					if (mysqli_num_rows($res)==0){
						die("fail");
					} 
					$row=mysqli_fetch_array($res);
					$admin_id=$row["admin_id"];
					$userid = $row["uid"];
					$user_name = $row["first_name"];
					$user_email = $row["email"];
					$user_password = $row["pwd"];
					echo ("<table class='table bgblue txt-wh bd-rd-25 table_user table-bordered' uid='my_account_edit' my_name='$user_name' my_email='$user_email' my_uid='$userid'
					my_pwd='$user_password'>");
					echo ("<tr>");
					echo ("<td><center>Name :<input type='text' value='{$row["first_name"]}'  class='text-center txt-wh form-control name bd-tp-bd-0' /></center></td>");
				 	echo ("<td><center>Email :<input type='text' value='{$row["email"]}'  class='text-center form-control txt-wh email bd-tp-bd-0' /></center></td>");
					echo ("<td><center>Username:<input type='text' value='{$row["uid"]}'   class='text-center  username form-control txt-wh bd-tp-bd-0' /></center></td>");
					echo ("<td><center>Password : <input type='text' value='{$row["pwd"]}' class='text-center form-control txt-wh password bd-tp-bd-0' /></center></td>");
					echo ("<td rowspan='2'>
 					<center><button class='btn btn-link cancel_my_account btn txt-wh' cancel_id='$admin_id' ><i class='fa fa-times-circle txt-wh'></i> cancel</button></center>
					<center><button class='btn btn-link save_my_account txt-wh' save_id='$admin_id' ><i class='fa fa-save txt-wh'></i> Save</button></center>
					</td></tr>");
					echo ("</tr>");
					echo "</table>";
				
			?>
	    </div>
	</div>
	 
		
</div>
