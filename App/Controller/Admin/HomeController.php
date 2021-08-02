<?php

namespace App\Controller\Admin;

use App\Utils\View;

class HomeController extends RenderPage{

  public static function getView($request){
   
    $content = View::render('Admin/modules/main',[]);

    return parent::getPanel('Home',$content, 'home');
  }
}