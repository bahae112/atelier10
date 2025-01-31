<?php 
   include "../model/Message.php";
   class DAOMessage {
    private $dbh;

    public function __construct() {
        try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=test_db', 'root', '');
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            error_log('Database Connection Error: ' . $e->getMessage());
            throw new Exception("Database Connection Error");
        }
    }
    public function Savemessage(Message  $msg){
        $stm = $this->dbh->prepare("INSERT INTO message ( message, emetteur, date ) VALUES ( ?, ?, Now()");
        $stm->bindValue(2, $msg->getMsg());
        $stm->bindValue(3, $msg->getEmetteur());
        $stm->execute();
    }
    public function allMsgs(){
        $stm = $this->dbh->prepare("select * from message order by date"); // lignes
        $stm->execute();
        // fetchall permet de faire la recuperation avec une table 
        $result = $stm->fetchAll();
        return $result;
    }
   }
?>