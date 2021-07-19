<?php 

namespace App\Session;

use App\Utils\Messages;

class Session{

  public static function validateAdmin(){
    $user = $_SESSION['user'];
    $authenticated = $user && $user->IS_ADMIN;

    if(!$authenticated){
      header('Location: /home');
    }
  }

  public static function isLogged(){
    $user = $_SESSION['user'];
   
    if(empty($user)){
      return false;
    }else{
      return true;
    }
  }

  public static function setUser($user){
    $_SESSION['user'] = $user;
  }
  
  public static function getUser(){
    return $_SESSION['user'] ? $_SESSION['user'] : null;
  }

  public static function logout(){

    unset($_SESSION['user']);
    Messages::setSuccess('Você foi deslogado!');

  }

}