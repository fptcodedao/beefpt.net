<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Homes;
use \App\Models\All;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Home extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {	
    	$sliders = All::getSilde();
    	$Cate = Homes::getCate();
    	$Cater = Homes::GetRich();
        View::renderTemplate('Home/index.html',[
        	'slider' => $sliders,
        	'caterich' => $Cater,
        	'categories' => $Cate
        ]);
    }
}
