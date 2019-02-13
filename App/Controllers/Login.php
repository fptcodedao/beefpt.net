<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\User;
use \App\Session;
use \App\Noti;

/**
 * User controller
 *
 * PHP version 7.0
 */
class Login extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        View::renderTemplate('Login/index.html');
    }
    public function createAction()
    {
        $remember = isset($_POST['remem']);
        $email = User::checklogin($_POST['user'],$_POST['pass']);
        if ($email) {
            Session::login($email, $remember);
            Noti::Message('Login Successful');
            $this->rejs('/', 3);
        }else{
            Noti::Message('Login UnSuccessful',Noti::ERROR);
        }
    }
    public function logoutAction()
    {
        $_SESSION = [];
        session_destroy();
        $this->redirect('/');
    }
}
