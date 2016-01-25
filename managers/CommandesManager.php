<?php

class CommandesManager {

    public static function getAllCommandes() {
        $pdo = Database::getInstance()->query('SELECT * FROM commandes');
        while ($datas = $pdo->fetch(PDO::FETCH_ASSOC)) {
            $commandes[] = new Commandes($datas);
        }
        return (isset($commandes)) ? $commandes : null;
    }

    public static function getCommandesById($id) {
        $pdo = Database::getInstance()->prepare('SELECT * FROM commandes WHERE idCommande=:idCommande');
        $pdo->bindValue(':idCommande', $id);
        $pdo->execute();
        $data = $pdo->fetch(PDO::FETCH_ASSOC);
        $commandes = new Commandes($data);
        return ($data != false ) ? $commandes : false;
    }

    public static function addCommandes(Commandes $commandes) {
        try {
            $pdo = Database::getInstance()->prepare('INSERT INTO  commandes (montant,dateCommande,codeClient,valide,idUtilisateur ) VALUES (:montant,:dateCommande,:codeClient,:valide,:idUtilisateur)');
            $pdo->bindValue(':montant', $commandes->getMontant());
            $pdo->bindValue(':dateCommande', $commandes->getDateCommande());
            $pdo->bindValue(':codeClient', $commandes->getCodeClient());
            $pdo->bindValue(':valide', $commandes->getValide());
            $pdo->bindValue(':idUtilisateur', $commandes->getIdUtilisateur());
            $pdo->execute();
            $commandes->setIdCommande(Database::getInstance()->lastInsertId());
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function updateCommandes(Commandes $commandes) {
        try {
            $pdo = Database::getInstance()->prepare('UPDATE  commandes SET montant=:montant,dateCommande=:dateCommande,codeClient=:codeClient,valide=:valide,idUtilisateur=:idUtilisateur WHERE idCommande=:idCommande ');
            $pdo->bindValue(':idCommande', $commandes->getIdCommande());
            $pdo->bindValue(':montant', $commandes->getMontant());
            $pdo->bindValue(':dateCommande', $commandes->getDateCommande());
            $pdo->bindValue(':codeClient', $commandes->getCodeClient());
            $pdo->bindValue(':valide', $commandes->getValide());
            $pdo->bindValue(':idUtilisateur', $commandes->getIdUtilisateur());
            $pdo->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function deleteCommandes(Commandes $commandes) {
        $pdo = Database::getInstance()->prepare('DELETE FROM commandes WHERE idCommande=:idCommande ');
        $pdo->bindValue(':idCommande', $commandes->getIdCommande());

        $pdo->execute();
    }

    public static function countCommandesValidees() {
        $pdo = Database::getInstance()->query('SELECT COUNT(idCommande) as nbCommande FROM commandes WHERE valide= 1 ');

        $data = $pdo->fetch(PDO::FETCH_ASSOC);

        return $data['nbCommande'];
    }

    public static function countCommandesEncours() {
        $pdo = Database::getInstance()->query('SELECT COUNT(idCommande) as nbEncours FROM commandes WHERE valide= 0 ');

        $data = $pdo->fetch(PDO::FETCH_ASSOC);
        
        return $data['nbEncours'];
    }

}
