<?php 
  class message {

    private $id;
    private $message;
    private $emetteur;
    private $date;
    public_function_construct($id,$message,$emetteur,$date){
        this->id = $id;
        this->message=$message;
        this->emetteur = $emetteur;
        this->date = $date;
    }
    public function getId(){
        return this->id;
    }
    public function getMsg(){
        return this->message;
    }
    public function getEmetteur(){
        return this->emetteur;
    }
    public function getDate(){
        return this->date;
    }
    public function setId($id){
       this->id = $id;
    }
    public function setMsg($msg){
        rthis->message = $msg;
    }
    public function setEmetteur($emetteur){
        this->emetteur = $emetteur;
    }
    public function setDate($date){
        this->date = $date;
    }
  }
?>