<?php
class DbConnectionPool implements \Countable{

    private $locked = [];
    private $DbConnection;
    private $unlocked = [];
    private $_host = "localhost";
	private $_username = "root";
	private $_password = "";
    private $_database = "echs_database";

    public function get(){

        if (count($this->unlocked) == 0) {
            $this->DbConnection=new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
            		// Error handling
		    if(mysqli_connect_error()) {
			    trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),
				    E_USER_ERROR);
		    }
        } else {
            $this->DbConnection = array_pop($this->unlocked);
        }
        $this->locked[spl_object_hash($this->DbConnection)] = $this->DbConnection;
        return $this->DbConnection;
    }
    public function dispose(mysqli $DbConnection){
        
        $key = spl_object_hash($this->DbConnection);
        if (isset($this->locked[$key])) {
            unset($this->locked[$key]);
            $this->unlocked[$key] = $this->DbConnection;
        }
    }
    public function count(): int{
        return count($this->locked) + count($this->unlocked);
    }
}

//$connection=new DbConnectionPool();

class DbconnectionSingleton {
	private $_connection;
	private static $_instance; //The single instance

  
  // Constructor
	private function __construct() {
		$this->_connection =new DbConnectionPool(); 
  }
  
	public static function getInstance() {
		if(!self::$_instance) { // If no instance then make one
			self::$_instance = new self();
		}
		return self::$_instance;
	}


  private function __clone() { }
  
	// Get mysqli connection
	public function getConnection() {
		return $this->_connection;
	}
}

$instance = DbConnectionSingleton::getInstance();
$dbConnectionPool = $instance->getConnection();