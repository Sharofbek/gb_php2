<?php 
namespace Core;
class Db extends \PDO
{
	function __construct(string $host, string $dbName,string $username, string $passwd = ""){
		$options = [
		    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
		];
		try {
			parent::__construct("mysql:host=$host;dbname=$dbName", $username, $passwd, $options);
		} catch (\PDOException $e) {
		     throw new \PDOException($e->getMessage(), (int)$e->getCode());
		}
	}
}