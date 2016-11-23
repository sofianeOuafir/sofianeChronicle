<?php 
session_start();
require 'functions.php';
spl_autoload_register('chargerClasse');
$bdd = connexionBdd();
$utilisateurManager = new utilisateurManager($bdd);
$imageDescriptionManager = new imageDescriptionManager($bdd);
$users = $utilisateurManager->getList();
//$image = $imageDescriptionManager->get($utilisateur->ID_IMAGE());
?>
<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<link href="css/about.css" rel="stylesheet" type="text/css">
<link href="css/library.css" rel="stylesheet" type="text/css">
<title>About - Sofiane's Chronicle</title>
<?php 
include('header.php'); 
?>	

<div class="container-fluid" id="users">
	<?php 
	foreach($users as $user){ 
	$image = $imageDescriptionManager->get($user->ID_IMAGE());
	?>
	<div class="col-md-12" id="user">
		<div class="col-md-2">
			<img class="img-circle" src="<?php echo $image->SOURCE(); ?>" alt=""/>
		</div>
		<div class="col-md-10">
			<div class="col-md-12">
				<div class="col-md-9">
					<h2 class="title"><?php echo $user->PSEUDONYME() ?></h2>
				</div>
				<div class="col-md-3">
				<button type="button" class="btn default">Send a message</button>
				<button type="button" class="btn default">See profile</button>
				</div>
			</div>
			<div class="col-md-12">
				<p class="introduction"><?php echo $user->INTRODUCTION() ?></p>
			</div>
		</div>
	</div>
	<?php } ?>
</div>

	
<script> 
$('.nav li:nth-child(3)').addClass('active');
</script>
<script src="jquery.js"></script>



</body>

</html>