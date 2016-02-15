<?php

class UtilisateursManager {

    public static function getAllUtilisateurs() {
        $pdo = Database::getInstance()->query('SELECT * FROM utilisateurs');
        while ($datas = $pdo->fetch(PDO::FETCH_ASSOC)) {
            $utilisateurs[] = new Utilisateurs($datas);
        }
        return (isset($utilisateurs)) ? $utilisateurs : null;
    }

    public static function getUtilisateursById($id) {
        $pdo = Database::getInstance()->prepare('SELECT * FROM utilisateurs WHERE idUtilisateur=:idUtilisateur');
        $pdo->bindValue(':idUtilisateur', $id);
        $pdo->execute();
        $data = $pdo->fetch(PDO::FETCH_ASSOC);
        $utilisateurs = new Utilisateurs($data);
        return ($data != false ) ? $utilisateurs : false;
    }

    public static function getUtilisateurByCodeClient($codeClient) {
        $pdo = Database::getInstance()->prepare('SELECT * FROM utilisateurs WHERE codeClient=:codeClient');
        $pdo->bindValue(':codeClient', $codeClient);
        $pdo->execute();
        $data = $pdo->fetch(PDO::FETCH_ASSOC);
        $utilisateurs = new Utilisateurs($data);
        return ( $data != false ) ? $utilisateurs : false;
    }

    public static function getUtilisateurByCodeClientAndPassword($codeClient, $motDePasse) {
        $pdo = Database::getInstance()->prepare('SELECT * FROM utilisateurs WHERE codeClient=:codeClient AND motDePasse=:motDePasse');
        $pdo->bindValue(':codeClient', $codeClient);
        $pdo->bindValue(':motDePasse', sha1($motDePasse));
        $pdo->execute();
        $data = $pdo->fetch(PDO::FETCH_ASSOC);
        $utilisateurs = new Utilisateurs($data);
        return ( $data != false ) ? $utilisateurs : false;
    }

    public static function getUtilisateurByCodeClientAndEmail($codeClient, $email){
        $pdo = Database::getInstance()->prepare('SELECT * FROM utilisateurs WHERE codeClient=:codeClient AND email=:email');
        $pdo->bindValue(':codeClient', $codeClient);
        $pdo->bindValue(':email', $email);
        $pdo->execute();
        $data = $pdo->fetch(PDO::FETCH_ASSOC);
        $newUtilisateurs = new Utilisateurs($data);
        return ($data != false ) ? $newUtilisateurs : false;
    }

    public static function addUtilisateurs(Utilisateurs $utilisateurs){
        try { 
            $pdo = Database::getInstance()->prepare('INSERT INTO  utilisateurs (codeClient,email,nom,prenom,ville,codePostal,adresse,telephone,motDePasse,teleprospecteur ) VALUES (:codeClient,:email,:nom,:prenom,:ville,:codePostal,:adresse,:telephone,:motDePasse,:teleprospecteur)');
            $pdo->bindValue(':codeClient', $utilisateurs->getCodeClient());
            $pdo->bindValue(':email', $utilisateurs->getEmail());
            $pdo->bindValue(':nom', $utilisateurs->getNom());
            $pdo->bindValue(':prenom', $utilisateurs->getPrenom());
            $pdo->bindValue(':ville', $utilisateurs->getVille());
            $pdo->bindValue(':codePostal', $utilisateurs->getCodePostal());
            $pdo->bindValue(':adresse', $utilisateurs->getAdresse());
            $pdo->bindValue(':telephone', $utilisateurs->getTelephone());
            $pdo->bindValue(':motDePasse', $utilisateurs->getMotDePasse());
            $pdo->bindValue(':teleprospecteur', $utilisateurs->getTeleprospecteur());
            $pdo->execute();
            $utilisateurs->setIdUtilisateur(Database::getInstance()->lastInsertId());
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function updateUtilisateurs(Utilisateurs $utilisateurs) {
        try {
            $pdo = Database::getInstance()->prepare('UPDATE  utilisateurs SET codeClient=:codeClient,email=:email,nom=:nom,prenom=:prenom,ville=:ville,codePostal=:codePostal,adresse=:adresse,telephone=:telephone,motDePasse=:motDePasse,teleprospecteur=:teleprospecteur WHERE idUtilisateur=:idUtilisateur ');
            $pdo->bindValue(':idUtilisateur', $utilisateurs->getIdUtilisateur());
            $pdo->bindValue(':codeClient', $utilisateurs->getCodeClient());
            $pdo->bindValue(':email', $utilisateurs->getEmail());
            $pdo->bindValue(':nom', $utilisateurs->getNom());
            $pdo->bindValue(':prenom', $utilisateurs->getPrenom());
            $pdo->bindValue(':ville', $utilisateurs->getVille());
            $pdo->bindValue(':codePostal', $utilisateurs->getCodePostal());
            $pdo->bindValue(':adresse', $utilisateurs->getAdresse());
            $pdo->bindValue(':telephone', $utilisateurs->getTelephone());
            $pdo->bindValue(':motDePasse', $utilisateurs->getMotDePasse());
            $pdo->bindValue(':teleprospecteur', $utilisateurs->getTeleprospecteur());
            $pdo->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function deleteUtilisateurs(Utilisateurs $utilisateurs) {
        $pdo = Database::getInstance()->prepare('DELETE FROM utilisateurs WHERE idUtilisateur=:idUtilisateur ');
        $pdo->bindValue(':idUtilisateur', $utilisateurs->getIdUtilisateur());

        $pdo->execute();
    }

}
