<?php

namespace App\Custom;

class HashManager
{

    public static function registerPassUser($postpass)
    {

     return password_hash($postpass, PASSWORD_DEFAULT);



    }

   
    public static function checkPassUser($storedpass, $postpass)
    {
//$hash = '$2y$10$nrhNaE5PP51yVuALAab0reSCbTiFBj4obHkkEuR/k3gxY2kElgvjK';
//$hash = '$2y$10$4IjRXiE5PO3qPZbI5vMpoeBCh6Zp0RJbMNR3BZhC1KYP/UMc8R5pG';
$valid = password_verify($postpass, $storedpass);

return $valid ? true : false;

    }

}
