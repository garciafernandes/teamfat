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
use App\Models\Queries\recetteSQL;
use Helpers\Url;
use  Helpers\Gump;
use App\Models\Tables\Recette;
use Helpers\DB\EntityManager;

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
		
		$sql = new RecetteSQL();
		$data['recettes'] = $sql->prepareFindAll()->orderBy('id desc')->execute();
		$recettes = $data['recettes'];
		
        View::renderTemplate('header', $data);
        View::render('Admin/Admin', $data);
        View::renderTemplate('footer', $data);
    } 
	
	public function ajoutrecette() {
	
	  $_POST = Gump::sanitize($_POST);
	
		if (isset($_POST['submit'])) {
			$nom = $_POST['nom'];
			$etapes = $_POST['etapes'];
			$categorie = $_POST['categorie-recette'];
			$temps = $_POST['temps'];
			$budget = $_POST['budget'];
	
			$Addrecette = new Recette($nom, $etapes, $categorie, $temps, $budget, "", Session::get('id'));
			EntityManager::getInstance()->save($Addrecette);
			Url::redirect('admin'); // page demander ''
		}
		
		
		$data['title'] = 'Ajout de recette';
		View::renderTemplate('header', $data);
        View::render('Admin/ajout', $data);
        View::renderTemplate('footer', $data);
	}
}
