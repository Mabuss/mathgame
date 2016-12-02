<?php
session_start();

$error="";

if (isset($_POST["name"])&&isset($_POST["pass"])){
	extract($_POST);

	if (!($name=="a@a.a"&&$pass=="aaa")){
		$error='<p style="color:red;">Invalid username or password.</p>';
	} else {
		$_SESSION["isAuth"]=1;	
		include("index.php");
		die();
	}
}
?>

<?php include("include/header.php");?>
<h1>Math Game</h1>

<form class="row form-horizontal" action="login.php" method="post">

	<div class="form-group">
		<label class="control-label col-sm-3" for="name">Username:</label>
		<div class="col-sm-9">
			<input class="form-control" placeholder="Enter your username" id="name" type="text" name="name" maxlength="30"/>
		</div>
	</div>
	
	<div class="form-group">
		<label class="control-label col-sm-3" for="name">Password:</label>
		<div class="col-sm-9">
			<input class="form-control" placeholder="Enter your password" id="pass" type="password" name="pass" maxlength="30"/>
		</div>
	</div>

	<input class="btn btn-primary" type="submit" value="Login">
	<?php echo $error; ?>
</form>

<?php include("include/footer.php"); ?>