<?php
/**
 * Welcome controller
 *
 * @author David Carr - dave@novaframework.com
 * @version 3.0
 */

namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;

/**
 * Sample controller showing a construct and 2 methods and their typical usage.
 */
class Admin extends Controller
{
    /**
     * Call the parent construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->language->load('Welcome');
    }

    /**
     * Define Index page title and load template files
     */
    public function indexAdmin()
    {
		
        View::renderTemplate('header', $data);
        View::render('Admin/Admin', $data);
        View::renderTemplate('footer', $data);
    }

    /**
     * Define Subpage page title and load template files
     */
    public function recette()
    {
		echo 'recette';
        View::renderTemplate('header', $data);
        View::render('Admin/Admin', $data);
        View::renderTemplate('footer', $data);
    }
}
