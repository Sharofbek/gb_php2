<?php 
namespace App;
use App\Helper;
class Db extends \PDO
{
	function __construct(){
		$helper = new Helper;
		$host  = $helper->env('DB_HOST');
		$port  = $helper->env('DB_PORT');
		$passwd  = $helper->env('DB_PASSWORD');
		$dbName  = $helper->env('DB_NAME');
		$username  = $helper->env('DB_USERNAME');

		$options = [
		    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
		];
		try {
			parent::__construct("mysql:host=$host;dbname=$dbName;port=$port", $username, $passwd, $options);
		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), (int)$e->getCode());
		}
	}
}
