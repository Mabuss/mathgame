<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



extract($_POST);

if ($name=="a@a.a"&&$pass=="aaa"){
	include("mathgame.php");
	$_SESSION["isAuth"]=1;	
	die();
}
?>

<?php include("include/header.php"); echo $name;
?>
<h1>Math Game</h1>

<form class="row form-horizontal" action=index.php method="post">

	<div class="form-group">
		<label class="control-label col-sm-2" for="name">Username:</label>
		<div class="col-sm-4">
			<input class="form-control" placeholder="Enter your username" id="name" type="text" name="name" size="30"/>
		</div>
	</div>
	
	<div class="form-group">
		<label class="control-label col-sm-2" for="name">Password:</label>
		<div class="col-sm-4">
			<input class="form-control" placeholder="Enter your password" id="pass" type="text" name="pass" size="30"/>
		</div>
	</div>

	<input class="btn btn-primary" type="submit" value="Login">
</form>

<?php include("include/footer.php"); ?>