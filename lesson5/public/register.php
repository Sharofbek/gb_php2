<?php 

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

use App\Db;
if(isset($_COOKIE['user_id']) && isset($_COOKIE['name'])){
	header("Location: index.php");
	exit();
}else{
	if(isset($_POST['email']) 
		&& isset($_POST['name']) 
		&& isset($_POST['password']) 
		&& isset($_POST['repassword'])
		&& $_POST['password'] == $_POST['repassword']
	){
		$email = $_POST['email'];
		$password = md5("a1b2".$_POST['password']);
		$name = $_POST['name'];
		$conn = new Db;
		try {
			$res = $conn->prepare('INSERT INTO users (name,email, password) VALUES (:name,:email, :password)')->execute([':email'=>$email, ':password'=>$password, ':name'=>$name]);
		} catch (\PDOException $e) {
			echo $e->getMessage();
		}

		if($res){
			setcookie('user_id',$conn->lastInsertId(),time()+3600*24*7,'/');
			setcookie('name',$_POST['name'],time()+3600*24*7,'/');
			header("Location: index.php");
			exit();
		}
	}
	
	$loader = new FilesystemLoader('../app/views');
	$twig = new Environment($loader);

	echo $twig->render('public/register.tmp.html', [
		"title"=> "Register",
		"name"=> $_POST['name'] ?? NULL,
		"email"=> $_POST['email'] ?? NULL,
	]);
}
?>