<?php


class Utilisateur {
    private $email;
    private $psw;
    private $name;
    private $birthday;
    private $tel;
    private $visibility;
    private $site;
    private $desc;

    public function __construct($email, $psw, $name, $birthday, $tel, $visibility, $site, $desc) {
        $this->email = $email;
        $this->psw = $psw;
        $this->name = $name;
        $this->birthday = $birthday;
        $this->tel = $tel;
        $this->visibility = $visibility;
        $this->site = $site;
        $this->desc = $desc;
    }

    // Getters
    public function getName() {
        return $this->name;
    }
  
    public function getWebsite() {
        return $this->site;
    }
  
    public function getTelephone() {
        return $this->tel;
    }
  
    public function getEmail() {
        return $this->email;
    }
  
    public function getPassword() {
        return $this->psw;
    }
  
    public function getBirthdate() {
        return $this->birthday;
    }
  
    public function getDescription() {
        return $this->desc;
    }
  
    public function getVisibility() {
        return $this->visibility;
    }
  
    // Setters
    public function setName($name) {
        $this->name = $name;
    }
  
    public function setWebsite($site) {
        $this->site = $site;
    }
  
    public function setTelephone($tel) {
        $this->tel = $tel;
    }
  
    public function setEmail($email) {
        $this->email = $email;
    }
  
    public function setPassword($psw) {
        $this->psw = $psw;
    }
  
    public function setBirthday($birthday) {
        $this->birthday = $birthday;
    }
  
    public function setDescription($desc) {
        $this->desc = $desc;
    }
  
    public function setVisibility($visibility) {
        $this->visibility = $visibility;
    }
}
