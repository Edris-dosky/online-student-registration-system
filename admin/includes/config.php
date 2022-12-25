<?php

use connection as GlobalConnection;

class connection{
    public $db ;

    public function __construct()
    {
        $this->connect_database();
    }

    public function connnection_database(){
        $this->db = new mysqli('localhost','root','','collage');
        if($this->db->connect_errno){
            exit ("database error". $this->db->connect_error);
        }
    }

    public function query($sql){
        $result = $this->db->query($sql);
        if($result){
            return $result ;
        }else{
          exit ($this->db->error);
        }
    }
    
    public function secure($data){
        $data = $this->db->real_escape_string(htmlspecialchars($data));
        return $data ;
    }

}
$db = new connection();

?>