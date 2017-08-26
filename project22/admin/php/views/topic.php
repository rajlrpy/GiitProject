
<div class="jq_contents disp-none" id="topic_table">
	<div class="container-fluid ">
		<div class="row br-bt-blu">
			<div class="col-sm-3">
				<h3 class="mg-0">&nbsp;&nbsp;&nbsp;<big><i class="fa fa-list"></i></big> Topic</h3>
			</div>
			<div class="col-sm-6">
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
			<div class="col-sm-3">				
				<button class="btn btn-sm btn-link addbutton"><i class="fa fa-plus-circle"></i></a> Add new</button>
			</div>
		</div>
		<br />
		<div class="container-fluid" id="alluser">
			<?php
				$sql="select * from topic;";
				$res = @mysqli_query($con,$sql)or die("unable to execute query");
				if (mysqli_num_rows($res)==0){
					die("fail");
				} 
				//$per = array("none","add","delete","add/delete");
				$c = 0;
				while($row=mysqli_fetch_array($res)){
					if($c<10)
						$dspn = "";
					else
						$dspn = "disp-none";
					$c++;
					$catid = $row["topic_id"];
					$catnm = $row["topic_nm"];
			 		echo ("<table class='table bgblue txt-wh bd-rd-25 table_user $dspn table-bordered' uid='$userid' >");
					echo ("<tr>");
					echo ("<td><center>category :</td>
					<td><input type='text' value='{$row['topic_nm']}' readonly  class='text-center txt-wh form-control name bd-tp-bd-0'></center></td>
					<td rowspan='2'><center><button class='btn btn-link cancel_account_table txt-wh disp-none'><i class='fa fa-edit txt-wh'></i> Cancel</button></center>
					<center><button class='btn btn-link disable_account_btn txt-wh' disable_id='$userid'><i class='fa fa-trash txt-wh'></i> Delete</button></center><br />
					<center><button class='btn btn-link edit_account_btn txt-wh' edit_id='$userid'><i class='fa fa-edit txt-wh'></i> Edit</button></center>
					<center><button class='btn btn-link save_account_btn txt-wh disp-none' save_id='$userid'><i class='fa fa-save txt-wh'></i> Save</button></center>
					</td></tr>");
 
						//<span id ='scope'>{$per[$row["scope"]]}</span>
						echo ("<tr><td><center>Scope: </center></td><td>
						<select class='form-control text-primary scope'>");
						
							$sql="select * from category;";
							$query=@mysqli_query($con,$sql) or die("error in query");
							
							while($row=mysqli_fetch_array($query)){
								echo("<option value='{$row['cat_id']}'>{$row['cat_nm']}</option>");
							}
					
					echo("</select></td>");
				
					
					
				}
			?>
	    </div>
	</div>
		<!-- ADD NEW FORM -->
		<div class="panel panel-primary disp-none" id ="addnewadmin">
			<div class="panel-heading">
				ADD NEW USER
			</div>
			<div class="panel-body"><?php
				echo ("<table class='table bgblue txt-wh bd-rd-25' uid='$userid' >");
					echo ("<tr>");
					echo ("<td><center>Name :<input type='text' class='text-center txt-wh form-control name bd-tp-bd-0'></center></td>");
				 	echo ("<td><center>Email :<input type='text' class='text-center form-control txt-wh email bd-tp-bd-0' ></center></td>");
					echo ("<td><center>Username:<input type='text' class='text-center  username form-control txt-wh bd-tp-bd-0'></center></td>");
					echo ("<td><center>Password : <input type='text' class='text-center form-control txt-wh password bd-tp-bd-0'></center></td>");
				    
					echo ("<td rowspan='2'>
 					<center><button class='btn btn-link cancel_user btn txt-wh'><i class='fa fa-times-circle txt-wh'></i> cancel</button></center>
					<center><button class='btn btn-link save_user txt-wh ' ><i class='fa fa-save txt-wh'></i> Save</button></center>
					</td></tr>");
					echo ("<tr>");
					echo ("<td>Scope: <span id ='scope'></span>
					<select class=' text-primary scope'>
					<option value='0'>None</option>
					<option value='1'>add</option>
					<option value='2'>delete</option>
					<option value='3'>add/delete</option></select>
					</td>");
				 	echo ("<td>Category:<span id ='category'> </span>
					<select class='  text-primary category'>
					<option value='0'>None</option>
					<option value='1'>add</option>
					<option value='2'>delete</option>
					<option value='3'>add/delete</option></select>
					</td>");
					echo ("<td>Topic :<span id='topic'>  </span>
					
					<select class=' text-primary topic'>
					<option value='0'>None</option>
					<option value='1'>add</option>
					<option value='2'>delete</option>
					<option value='3'>add/delete</option></select></td>");
					echo ("<td>Ebooks :<span id='tutorial'> </span>
					
					<select class=' text-primary tutorial'>
					<option value='0'>None</option>
					<option value='1'>add</option>
					<option value='2'>delete</option>
					<option value='3'>add/delete</option>
					</select></td>");
					
					echo "</table>";
					?>
			</div>
		</div>
	 
		 
</div>
