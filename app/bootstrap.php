<?php



require "vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;
use app\model\Configs;


$capsule = new Capsule;

$data_db = Configs::dadodsdb();



$capsule->addConnection([

   "driver" => "mysql",

   "host" =>"127.0.0.1",

   "database" => $data_db['name'],

   "username" => $data_db['user'],

   "password" => $data_db['pass']

]);

$capsule->setAsGlobal();

$capsule->bootEloquent();