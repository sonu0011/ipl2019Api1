<?php

class DbOperation
{
    //Database connection link
    private $con;

    //Class constructor
    function __construct()
    {
        //Getting the DbConnect.php file
        require_once dirname(__FILE__) . '/DbConnect.php';

        //Creating a DbConnect object to connect to the database
        $db = new DbConnect();

        //Initializing our connection link of this class
        //by calling the method connect of DbConnect class
        $this->con = $db->connect();
    }

    //storing token in database 
    public function registerDevice($token){
            $sql1 = "INSERT INTO  devices (device_name) VALUES ('$token')";
                  if(mysqli_query($this->con, $sql1)){
                    return 0;
                    //device registered
                  }
                  else {
                      return 1 ;
                  }
              }
 
    //getting all tokens to send push to all devices
    public function getAllTokens(){
        $stmt = $this->con->prepare("SELECT device_name FROM devices");
        $stmt->execute(); 
        $result = $stmt->get_result();
        $tokens = array(); 
        while($token = $result->fetch_assoc()){
            array_push($tokens, $token['device_name']);
        }
        return $tokens; 
    }


    //getting all the registered devices from database 
    public function getAllDevices(){
        $stmt = $this->con->prepare("SELECT * FROM devices");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result; 
    }
}