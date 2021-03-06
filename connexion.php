<?php
session_start();
require 'functions.php';
if(!connecter())
{
?>
<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link href="css/connexion.css" rel="stylesheet" type="text/css">
<title>Golbit - Connexion</title>

<?php include('header.php'); ?>
<div class="container-fluid" id="container-index">
	<div class="alert alert-danger col-md-offset-4 col-md-4 col-md-offset-4" role="alert" id="alert-loginFailed">Login failed . Please try again</div>
	<div class="row">
		<div class="col-md-offset-4 col-md-4 col-md-offset-4">
			<form method="post" action="controller/connexion.controller.php">
			  <div class="form-group">
			    <label for="username">Username</label>
			    <input type="text" class="form-control" name="PSEUDONYME" id="username" placeholder="Username">
			  </div>
			  <div class="form-group">
			    <label for="password">Password</label>
			    <input type="password" class="form-control" name="PASSWORD" placeholder="Password" id="password">
			  </div>
			  <div id="submit">
			  	<button type="submit" class="btn btn-default">Log in</button>
			  </div>
			</form>
		</div>
	</div>
</div>
</body>

<script>
$('form').submit(function() {
	var isConsistent = true;
 	if (isConsistent) {
		var data = new FormData($('form')[0]);
		jQuery.ajax({
		    url: 'controller/connexion.controller.php',
		    data: data,
		    cache: false,
		    contentType: false,
		    processData: false,
		    type: 'POST',
		    success: function(data){
		    	if (data == 0) {
		    		$('#alert-loginFailed').show();
		    	}
		    	else if (data == 1) {
		    		window.location.replace("index.php");
		    	}
		    	else {
		    		$('#alert-loginFailed').hide();
		    	}
		    }
		 });
		 return false;
	}
	else {
		return false;
	}	
});

$('#alert-loginFailed').hide();
</script>
</html>
<?php
} 
else{
?>
<script>window.location.replace("index.php");</script>
<?php
}
?>
