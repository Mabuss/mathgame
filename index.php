<?php
session_start();
$err="";

if (!$_SESSION["isAuth"]==1){
header('Location: login.php');
}

if (!isset($_SESSION["score"]))
	$_SESSION["score"] = 0;

if (!isset($_SESSION["total"]))
	$_SESSION["total"] = 0;

extract($_POST);

if (isset($answer)) {
	if ($isAdd) {
		if ($answer==$a+$b) {
			$_SESSION["score"]++;
			$err='<p style="color:green;">You were correct!</p>';
		} else {
			$err='<p style="color:red;">You were wrong!</p>';
		}
	} else {
		if ($answer==$a-$b) {
			$_SESSION["score"]++;	
			$err='<p style="color:green;">You were correct!</p>';
		} else {
			$err='<p style="color:red;">You were wrong!</p>';
		}
	}
	$_SESSION["total"]++;
}

$a = rand(0,20);
$b = rand(0,20);
$isAdd = rand(0,1);
?>

<?php include("include/header.php"); ?>

<div class="row">
	<h1 class="col-xs-offset-2 col-xs-8">Math Game</h1>
	<a class="btn btn-default col-xs-2" href="logout.php">Logout</a>
</div>


<form class="row form-horizontal" action="index.php" method="post">
	<?php 
	echo $a;
	?>
	<?php 
	if ($isAdd)
		echo ' + ';
	else 
		echo ' - ';
	?>
	<?php 
	echo $b; 
	?>
	<div class="clearfix"></div>
	<div class="col-sm-4 col-sm-offset-4">
	<input class="form-control" type="text" name="answer" placeholder="Enter answer here">
	</div>
	
	<input type="hidden" name="a" value="<?php echo $a; ?>">
	<input type="hidden" name="b" value="<?php echo $b; ?>">
	<input type="hidden" name="isAdd" value="<?php echo $isAdd; ?>">
	
	<div class="clearfix"></div>
	
	<div class="form-group">
	<input class="btn btn-primary " type="submit" value="Submit">
	<div>
	
	<hr/>
	<?php
	echo 'Score: ' . (float) $_SESSION["score"] . '/' . (float) $_SESSION["total"];
	echo '<br/>';
	echo $err;
	
	?>
	
	
	
</form>
<?php include("include/footer.php"); ?>


