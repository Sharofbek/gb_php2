<?php
require 'vendor/autoload.php';
use Core\Db;
$db = new Db('localhost','lesson3','udev','udev');
for($i=1; $i<7; $i++){
	$db->query("INSERT INTO images (title, author, cdate, path) VALUES ('title{$i}', 'Sharofbek', NOW(),'/src/images/img-$i.jpg')");
}