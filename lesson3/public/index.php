<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require __DIR__ . '/../vendor/autoload.php';
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Core\Db;
use Core\Images;

$loader = new FilesystemLoader(__DIR__ . '/../templates');
$twig = new Environment($loader);

$db = new Db('localhost','lesson3','udev','udev');
$images = (new Images($db))->getAllImages();

echo $twig->render('index.tpl.html', [
	'images' => $images, 
	"title"=> "Gallery"
]);