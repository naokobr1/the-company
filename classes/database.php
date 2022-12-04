<?php
class Database {
    private $server_name = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "the_company";

    protected $conn; //connectionを表す

        // Database1クラスが呼び出されたら自動的に実行される。
        public function __construct(){
            // connectionを呼び出す
            // インスタンスを作成
            $this->conn = new mysqli($this->server_name, $this->username, $this->password, $this->db_name);

            if($this->conn->connect_error){
                die('Unable to connect to database');
            }
        }
}

?>