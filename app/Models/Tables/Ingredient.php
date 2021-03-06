<?php

/**
*
* Ingredient
*
* This class was generated by a script. Please be careful changing it.
* Regenerate it will erase all changes!
*/

namespace App\Models\Tables;

use Helpers\DB\Entity;

class Ingredient extends Entity {
    public $nom;     // varchar(45)
    public $type;     // varchar(45)

    public function __construct(
        $nom = "",
        $type = "",
    $id = false) {
        parent::__construct($id);

        $this->nom = $nom;
        $this->type = $type;
    }
}
?>
