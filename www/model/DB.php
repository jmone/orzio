<?php
class DB{
    static $instance = null;
    static public function getInstance(){
        if(!(self::$instance instanceof self)){
            $dsn = 'mysql:dbname=orz;host=127.0.0.1';
            $user = 'root';
            $password = '32100321';

            try {
                self::$instance = new PDO($dsn, $user, $password);
            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
            }
        }
        return self::$instance;
    }
}
?>
