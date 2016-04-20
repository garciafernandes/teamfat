<?php
/**
 * Created by PhpStorm.
 * User: audemard
 * Date: 06/03/2016
 * Time: 09:44
 */

namespace App\Modules\ORM;


use Core\Controller;
use Helpers\DB\DBManager;
use Helpers\Spyc;
use Helpers\Twig;
use Helpers\Url;

class ORMGenerator extends Controller {
    private $data;
    public function __construct() {
        parent::__construct();
        if ($_SERVER["SERVER_NAME"] != "localhost")
            Url::redirect("404");
    }

    public function index() {
        echo "<b>Warning</b>:
            <ul>
                <li>Tables (and contents) will be destroyed</li>
                <li>Models\Tables\ classes will be replaced</li>
                <li>Models\Queries\ classes will be replaced</li>
            </ul>
            <a href='".DIR."generateorm/confirm'>Click</a> to confirm<br />
            ";
    }

    public function generate() {
        $file = ROOTDIR."orm/database.yml";
        if(!file_exists($file))
            throw new \Exception("$file does not exists");
        $this->data = Spyc::YAMLLoad($file);

        echo "<b>Generate tables</b><br />";
        $this->generateSQL();
        echo "<b>Generate Queries Classes</b><br />";
        $this->generateQueriesClasses();
        echo "<b>Generate Tables Classes</b><br />";
        $this->generateTablesClasses();

    }



    private function generateSQL() {
        echo "<blockquote>";
        foreach($this->data as $table=>$content) {
            $sql = "DROP table IF EXISTS $table;\nCREATE TABLE $table(id int(11) NOT NULL\n";
            foreach($content as $field=>$type) {
                $sql.=", $field $type\n";
            }
            $sql .=");\n";
            $sql .= "ALTER TABLE $table ADD PRIMARY KEY (id);\n";
            $sql .=  "ALTER TABLE $table MODIFY id int(11) NOT NULL AUTO_INCREMENT;\n";
            $pdo = DBManager::getInstance()->getPDO();
            $pdo->query($sql);
            echo "Table $table created<br />";
        }
        echo "</blockquote>";
    }

    private function generateQueriesClasses() {
        $directory=APPDIR."Models/Queries";
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
            echo "Create $directory<br />";
        }


        echo "<blockquote>";
        foreach ($this->data as $table => $content) {
            $data['tableName'] = ucfirst($table)."SQL";
            $tableName = $data['tableName'];
            $content = Twig::generateRenderingModule("ORM/Views/queries",$data);
            file_put_contents($directory."/$tableName.php", $content);
            echo $directory."/$tableName.php<br />";
        }
        echo "</blockquote>";
    }


    private function generateTablesClasses() {
        $directory=APPDIR."Models/Tables";
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
            echo "Create $directory<br />";
        }
        echo "<blockquote>";
        foreach ($this->data as $table => $fields) {
            $data["tableName"] = ucfirst($table);
            $tableName = ucfirst($table);
            $data["fields"] = $fields;

            $content = Twig::generateRenderingModule("ORM/Views/classes",$data);
            file_put_contents($directory."/$tableName.php", $content);
            echo $directory."/$tableName.php<br />";
        }
        echo "</blockquote>";


    }
}
