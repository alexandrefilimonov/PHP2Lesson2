<?php

trait singleton {
    private static $singleton = false;
    private function __construct() {
        $this->__instance();
    }

    public static function getInstance() {
        if (self::$singleton === false) {
            self::$singleton = new self();
        }
        return self::$singleton;
    }
}

// A dummy database driver 
class MySQLDatabase extends Database {
    use singleton;
    public function __instance() {
        // Create database connection...
    }
}

// Fetch our database driver:
$db = Database::getInstance();

?>

