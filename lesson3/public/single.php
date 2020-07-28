<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require __DIR__ . '/../vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Core\Db;
use Core\Images;


if(!(isset($_GET['id']) && is_numeric($_GET['id']))){
	header("Location: ".$_SERVER['HTTP_REFERER']);
	exit();
}

$loader = new FilesystemLoader(__DIR__ . '/../templates');
$twig = new Environment($loader);

$db = new Db('localhost','lesson3','udev','udev');
$image = (new Images($db))->getImage($_GET['id']);

echo $twig->render('single.tpl.html', [
	'image' => $image, 
	"title"=> "Gallery Single"
]);