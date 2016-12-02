<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!$_SESSION["isAuth"]==1){
header('Location: index.php');
}

if (!isset($_SESSION["score"]))
	$_SESSION["score"] = 0;

if (!isset($_SESSION["total"]))
	$_SESSION["total"] = 0;

extract($_POST);

if (isset($answer)) {
	if ($isAdd) {
		if ($answer==$a+$b)
			$_SESSION["score"]++;
	} else {
		if ($answer==$a-$b)
			$_SESSION["score"]++;
	}
	$_SESSION["total"]++;
}

$a = rand(0,20);
$b = rand(0,20);
$isAdd = rand(0,1);
?>

<?php include("include/header.php"); ?>

<a style="float:right;" href="logout.php" class="btn btn-default">Logout</a>

<h1>Math Game</h1>

<form action="mathgame.php" method="post">
<p><?php echo $a; ?> <?php 
if ($isAdd)
	echo '+';
else 
	echo '-';
?> <?php echo $b; ?></p>
<input type="hidden" name="a" value="<?php echo $a; ?>">
<input type="hidden" name="b" value="<?php echo $b; ?>">
<p><input type="text" name="answer"></p>
<p><input type="submit" value="Submit"></p>
</form>

<hr/>

<?php
echo (float) $_SESSION["score"] . '/' . (float) $_SESSION["total"];
?>

<?php include("include/footer.php"); ?>


