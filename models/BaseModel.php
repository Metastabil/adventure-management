<?php
namespace App\Models;

use System\Classes\Database;
use PDO;

class BaseModel {
    protected Database $database_instance;
    protected PDO $db;

    public function __construct() {
        $this->database_instance = new Database();
        $this->db = $this->database_instance->connect();
    }

    protected function get_query(string $folder, string $file) :string {
        return file_get_contents(dirname(__DIR__) . "/sql/$folder/$file.sql");
    }
}