<?php 
//include_once "include/function.php";

if (isset($_GET['url']) && !empty($_GET['url'])) {
	include_once "include/function.php";
	$url = strtolower(trim ($_GET['url']));
	$link = db_query("SELECT * FROM `links` WHERE `short_link` = '$url';")->fetch();
	if(empty($link)){
			echo "такая ссылка не найдена";
			die;
	}
		db_exec("UPDATE `links` SET `vives` = `vives` + 1 WHERE `short_link` = '$url';");
		header('Location: ' . $link['long_linc']);
		die;
} 
include_once "include/header.php"; 
?>
	<main class="container">
		<div class="row mt-5">
			<div class="col">
				<h2 class="text-center">Необходимо <a href="<?php echo get_url('register.php');?>">зарегистрироваться</a> или <a href="<?php echo get_url('login.php');?>">войти</a> под своей учетной записью</h2>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col">
				<h2 class="text-center">Пользователей в системе:    <?php echo $user_counte  ?></h2>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col">
				<h2 class="text-center">Ссылок в системе: <?php echo $link_counte ?></h2>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col">
				<h2 class="text-center">Всего переходов по ссылкам: <?php echo $yiewss_counte ?></h2>
			</div>
		</div>
	</main>
	<?php include "include/foter.php"; ?>

