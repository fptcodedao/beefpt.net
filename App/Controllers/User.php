<?php

namespace App\Controllers;

use \Core\View;

/**
 * User controller
 *
 * PHP version 7.0
 */
class User extends Authenticated
{
    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        View::renderTemplate('User/index.html');
    }
    public function addNewAction()
    {
    	echo "Bla Bla";
    }
    public function editAction($value='')
    	// var_dump($_GET);
    {
    }
}
