<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

use App\Db;


if (isset($_COOKIE['user_id']) && isset($_COOKIE['name'])) {

	$loader = new FilesystemLoader('../app/views');
	$twig = new Environment($loader);

	echo $twig->render('public/profile.tmp.html', [
		"title"=> "Profile",
		'user' => $_COOKIE['name'],
	]);

}else{
	header("Location: index.php");
	exit();
}


