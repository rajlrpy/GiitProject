
<div class="jq_contents disp-none" id="scope_table">
	<div class="container-fluid ">
		<div class="row br-bt-blu">
			<div class="col-sm-3">
				<h3 class="mg-0">&nbsp;&nbsp;&nbsp;<big><i class="fa fa-globe"></i></big> Scope</h3>
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
		<div class="container-fluid addscopeshow">
			<?php
				$sql="select * from scope;";
				$res = @mysqli_query($con,$sql)or die("unable to execute query");
				if (mysqli_num_rows($res)==0){
					die("fail");
				} 
			 
				while($row=mysqli_fetch_array($res)){
				/*	if($c<10)
						$dspn = "";
					else
						$dspn = "disp-none";
					$c++;*/
					$scope_id = $row["scope_id"];
					$scope_name = $row["scope_nm"];
					
					echo ("<table class=' table  bgblue txt-wh bd-rd-25 table_user $dspn table-bordered' uid='$scope_id' scope_edit_nm='$scope_name'>");
					echo ("<tr>");
					echo ("
						<td><center>Name</center></td>
						<td> <input type='text' value='{$row["scope_nm"]}' readonly  class='text-center txt-wh form-control name bd-tp-bd-0'></TD>
						<td><button class='btn btn-link cancel_scope_btn txt-wh' cancel_scope_id ='$scope_id'><i class='fa fa-edit txt-wh'></i> Cancel</button>
						 
						<button class='btn btn-link edit_scope_btn txt-wh' edit_id='$scope_id'><i class='fa fa-edit txt-wh'></i> Edit</button> 
						<button class='btn btn-link save_scope_btn txt-wh disp-none' save_scope_id='$scope_id'><i class='fa fa-save txt-wh'></i> Save</button> 
						</td></tr>");
			 		echo "</table>";
				}
			?>
	    </div>
	</div>
		<!-- ADD NEW FORM -->
		<div class="panel panel-primary disp-none" id="addnewscope" >
			<div class="panel-heading">
				ADD NEW SCOPE
			</div>
			<div class="panel-body"><?php
				echo ("<table class='table bgblue txt-wh bd-rd-25' uid='$userid' >");
					echo ("<tr>");
					echo ("<td><center>Name :<input type='text' class='text-center txt-wh form-control name bd-tp-bd-0'></center></td>
					<td><button class='btn btn-link add_scope_cancel txt-wh' cancel_scope_id ='$scope_id'><i class='fa fa-edit txt-wh'></i> Cancel</button>
					<button class='btn btn-link add_scope_save txt-wh' save_scope_id='$scope_id'><i class='fa fa-save txt-wh'></i> Save</button> ");
				 	echo("</tr>");
					echo ("</table>");
					?>
			</div>
		</div>
		
</div>
