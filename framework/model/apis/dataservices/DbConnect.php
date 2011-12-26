<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DbConnect
 *
 * @author saini
 */
require_once 'framework/model/api/dataservices/DbHelper.php';

class DbConnect {
    private static $instance;
    private $host;
    private $username;
    private $password;
    private $port;
    private $database;

    private function __construct() {
        $this->host = DB_HOST;
        $this->username = DB_USERNAME;
        $this->password = DB_PASSWORD;
        $this->port = DB_PORT;
        $this->database = DATABASE;
    }

            /**
     *
     * @return <type> connection object
     */
    public function getInstance(){
        if ( ! isset ( self :: $instance ) ) {
            self :: $instance = new DbConnect ();
        }
        return self :: $instance;
    }
    public function getConnection(){
        try{
            $conn = mysql_connect($this->host, $this->username, $this->password );
            if($conn){
                mysql_select_db($this->database,$conn);
            }
            else{
                throw new Exception('Connection object is null ');
            }
        }
        catch (Exception $e){
            throw new Exception('Could not connect to MySQL: ' . $e->getMessage());
        }
        return $conn;
    }
    
    /**
     *
     * @param <type> $conn  The connection object to close.
     */
    public function closeConnection(&$conn){
        mysql_close($conn);
    }

    public function getHost() {
        return $this->host;
    }

    public function setHost($host) {
        $this->host = $host;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getPort() {
        return $this->port;
    }

    public function setPort($port) {
        $this->port = $port;
    }

}
?>
