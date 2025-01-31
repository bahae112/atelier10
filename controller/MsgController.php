<?php
include "../dao/DAOMESSAGE.php";
$action = $_GET['action'];  // l'action toujours recuperer par get 
$dao = new DAOMESSAGE();
switch($action) {
    case 'send' :
        $msg = new Message(0,$_POST['message'],$_SESSION['utilisateur']->getemail(),getdate());
        $dao = Savemessage($msg);
        break;
    case 'msgs':
        $result = $dao->allMsgs;
        foreach($result as $row){
            $msg = new Message($row['id'],$row['message'],$row['emetteur'],$row['date']);
            echo $_SESSION['utilisateur']->getEmetteur() . " " . $msg->getdate() . " : " . $msg->getmessage() ;
        }
    }
        

?>