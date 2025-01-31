<?php
include "../dao/daoUtilisateur.php";
$action = $_GET['action'];
$dao = new DaoUtilisateur();
switch($action) {
    case 'insert' :
        $visible = $_POST['visibility'];
        $pseudo = $_POST['name'];
        $site = $_POST['website'];
        $tel = $_POST['telephone'];
        $email = $_POST['email'];
        $psw = $_POST['password'];
        $birth = $_POST['birthdate'];
        $desc = $_POST['description'];
        if (isset($visible,$pseudo,$site,$tel,$email,$psw,$birth,$desc))  {
            $user = new Utilisateur($email,$psw,$pseudo,$birth,$tel,$visible,$site,$desc);
            $dao->saveUser($user);
            echo 'elément ajouté';
        }
        break;
    case 'login':
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (isset($email, $password))
            {
                $user = $dao->findUser($email, $password);
                if ($user != null)
                {

                    session_start();
                    $_SESSION["utilisateur"] = $user;
                    header("Location: ../view/conversation.php");

                }
                else
                {
                    echo '<script>console.log("élément ajouté");</script>';
                    header("Location: ../view/connexion.html");

                }
            }
            break;
        }
        

?>