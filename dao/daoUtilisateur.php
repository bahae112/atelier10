<?php
include "../model/utilisateur.php";

class DaoUtilisateur {
    private $dbh;

    public function __construct() {
        try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=test_dbb', 'root', '');
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            error_log('Database Connection Error: ' . $e->getMessage());
            throw new Exception("Database Connection Error");
        }
    }

    public function saveUser(Utilisateur $user): void {
        $stm = $this->dbh->prepare("INSERT INTO utilisateur2 (email, password, name, birthdate, telephone, visibility, website, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        $stm->bindValue(1, $user->getEmail());
        $stm->bindValue(2, $user->getPassword());
        $stm->bindValue(3, $user->getName());
        $stm->bindValue(4, $user->getBirthdate());
        $stm->bindValue(5, $user->getTelephone());
        $stm->bindValue(6, $user->getVisibility());
        $stm->bindValue(7, $user->getWebsite());
        $stm->bindValue(8, $user->getDescription());

        $stm->execute();
    }

    public function findUser(string $email, string $psw): ?Utilisateur {
        try {
            $stm = $this->dbh->prepare("SELECT * FROM utilisateur WHERE email = ? AND password = ?");
            $stm->bindValue(1, $email);
            $stm->bindValue(2, $psw);
            $stm->execute();
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            
            if (!empty($result)) {
                return new Utilisateur(
                    $result["email"], 
                    $result["password"], 
                    $result["name"], 
                    $result["birthdate"], 
                    $result["telephone"], 
                    $result["visibility"], 
                    $result["website"], 
                    $result["description"]
                );
            } else {
                return null;
            }
        } catch (PDOException $e) {
            
            error_log('Database Error: ' . $e->getMessage());
        
            throw new Exception("Database Error");
        }
    }
}
?>
