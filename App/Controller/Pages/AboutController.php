<?php
namespace App\Controller\Pages;

use App\Utils\View;
use App\Utils\RenderPage;
use App\Models\Entity\User as EntityUser;
use App\Models\UsersRepository;

class AboutController extends RenderPage{

    private static function getUsersView(){
        
        $users = UsersRepository::getAllUsers();
        $content = '';
        foreach($users as $user){
           $content .= View::render('About/Users',[
                'name' => $user->NOME,
                'age' => date('d/m/Y', strtotime($user->NASCIMENTO)),
            ]);
        }
        return $content;
    }

    /**
     *  Método responsável por retornar o conteúdo (view) da home.
     *  @return string
     */
    public static function getAbout(){ 
              
        $users = self::getUsersView();
        
        $content = View::render('About/Main', [
            'name' => 'Matheus Brito',
            'age' => 19,
            'users' => $users
        ]);
        
        return parent::getPage('About', $content, true);
    }
}