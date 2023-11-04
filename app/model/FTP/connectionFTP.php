<?php

class connectionFTP {
    private static $instance = null;

    private $connection;
    private $host;
    private $username;
    private $password;

    private function __construct($host, $username, $password) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->connect();
    }
    public static function getInstance($host = 'localhost', $username = 'user', $password = 'pass') {
        if (self::$instance === null) {
            self::$instance = new connectionFTP($host, $username, $password);
        }
        return self::$instance;
    }
    private function connect() {
        $this->connection = ftp_connect($this->host) or die("Couldn't connect to $this->host");
        if (!ftp_login($this->connection, $this->username, $this->password)) {
            die("Couldn't login to $this->host as $this->username");
        }
    }
    public function getConnection() {
        return $this->connection;
    }
    public function close() {
        if ($this->connection) {
            ftp_close($this->connection);
        }
    }
}
?>