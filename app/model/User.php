<?php

namespace app\model;
use Illuminate\Database\Eloquent\Model as Eloquent;
require __DIR__."/../bootstrap.php";
class User extends Eloquent
{
protected $table = "usuarios";
}