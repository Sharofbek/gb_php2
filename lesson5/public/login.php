<?php 

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

use App\Db;
if (isset($_GET['logout'])) {
	$_COOKIE = NULL;
	setcookie('user_id',null,-1,'/');
	setcookie('name',null,-1,'/');
	header("Location: login.php");
	exit();
}

if(isset($_COOKIE['user_id']) && isset($_COOKIE['name']) ){
	header("Location: index.php");
	exit();
}else{
	if(isset($_POST['email']) && isset($_POST['password'])){
		var_dump($_POST);
		$email = $_POST['email'];
		$password = md5("a1b2".$_POST['password']);
		$conn = new Db;
		$stmt = $conn->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
		$stmt->execute([':email'=>$email, ':password'=>$password]);
		$res = $stmt->fetch();
		var_dump($res);
		if($res){
			setcookie('user_id',$res['id'],time()+3600*24*7,'/');
			setcookie('name',$res['name'],time()+3600*24*7,'/');
			header("Location: index.php");
			exit();
		}
	}
	$loader = new FilesystemLoader('../app/views');
	$twig = new Environment($loader);

	echo $twig->render('public/login.tmp.html', [
		"title"=> "Login",
		"email"=>$_POST['email'] ?? NULL,
		"remember"=>$_POST['remember'] ?? NULL,
	]);
}
?>