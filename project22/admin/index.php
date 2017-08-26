<?php
session_start();
$_SESSION["login_verification_id"] =time();
?>


<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta charset="UTF-8">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="stylesheet.css" rel="stylesheet">
        <link href="fa/css/fa.css" rel="stylesheet">
        <script src="bootstrap/js/jq.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
		
        <script src="bootstrap.js"></script>
        <script>
        </script>
    </head>
    <body class="bgimg">
            <div class="container topmg ">
                 <div class="row  ">
                    <div class="col-sm-4"></div>
                     <div class="col-sm-4  ">
                          <div class="well login " > <br/>
                                <div class="input-group ">
                                    <span class="input-group-addon"><i class=" fa fa-envelope"></i></span>
                                    <input type="text" id="uid" class="form-control" placeholder="User Id" />
                                </div>
                                <br />
                                <div class="input-group">
                                    <span class="input-group-addon"><i class=" fa fa-lock"></i></span>
                                    <input type="password" id="pwd" class="form-control" placeholder="Password" />
                                </div>
                          
								<center><b><p id="err" class="text-danger"></p></b></center>
                        <button class="btn btn-primary center-block" id ="btn-login" >Login &nbsp; <i class="fa fa-sign-in"></i></button> 
                        <div class=""></div>
                        </div>
                        
                        
                    </div>
                    <div class="col-sm-4"></div>
                     
            </div>
                        
        

    </body>

</html>