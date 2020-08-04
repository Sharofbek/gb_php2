<?php 

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

use App\Helper;

$x = (new Helper)->getProductsApi();

if($x['ok']){
	die();
}


$loader = new FilesystemLoader('../app/views');
$twig = new Environment($loader);

echo $twig->render('public/index.tmp', [
	'arrs' => [
		['title'=>'arr1.title','body'=>'arr1.body'],
		['title'=>'arr2.title','body'=>'arr2.body'],
		['title'=>'arr3.title','body'=>'arr3.body'],
		['title'=>'arr4.title','body'=>'arr4.body'],
	], 
	"title"=> "Online Shopping",
	'user' => $_COOKIE['name'],
]);
?>