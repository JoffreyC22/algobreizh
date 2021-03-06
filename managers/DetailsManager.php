<?php
class DetailsManager {

    public static function getAllDetails(){
        $pdo = Database::getInstance()->query('SELECT * FROM details');
        while($datas = $pdo->fetch(PDO::FETCH_ASSOC)){
             $details[] = new Details($datas);
        }
        return (isset($details)) ? $details : null ;
    }

    public static function getDetailsById($id){
        $pdo = Database::getInstance()->prepare('SELECT * FROM details WHERE idDetail=:idDetail');
        $pdo->bindValue(':idDetail',$id);
        $pdo->execute();
        $data = $pdo->fetch(PDO::FETCH_ASSOC);
        $details = new Details($data);
        return ($data != false ) ? $details : false;
    }
    
     public static function getDetailsByIdCommande($id){
        $pdo = Database::getInstance()->query('SELECT * FROM details WHERE idCommande =' . $id);
        while ($data = $pdo->fetch(PDO::FETCH_ASSOC)) {
            $details[] = new Details($data);
        }
        return (isset($details)) ? $details : null;
    }

    public static function addDetails(Details $details){
        try { 
            $pdo = Database::getInstance()->prepare('INSERT INTO  details (codeArticle,libelleArticle,qteArticle,montant,idCommande) VALUES (:codeArticle,:libelleArticle,:qteArticle,:montant,:idCommande)');
            $pdo->bindValue(':codeArticle',$details->getCodeArticle());
            $pdo->bindValue(':libelleArticle', $details->getLibelleArticle());
            $pdo->bindValue(':qteArticle',$details->getQteArticle());
            $pdo->bindValue(':montant',$details->getMontant());
            $pdo->bindValue(':idCommande',$details->getIdCommande());
            $pdo->execute();
            $details->setIdDetail(Database::getInstance()->lastInsertId());
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function updateDetails(Details $details){
        try { 
            $pdo = Database::getInstance()->prepare('UPDATE  details SET codeArticle=:codeArticle,libelleArticle=:libelleArticle,qteArticle=:qteArticle,montant=:montant,idCommande=:idCommande WHERE idDetail=:idDetail ');
            $pdo->bindValue(':idDetail',$details->getIdDetail());
            $pdo->bindValue(':codeArticle',$details->getCodeArticle());
            $pdo->bindValue(':libelleArticle', $details->getLibelleArticle());
            $pdo->bindValue(':qteArticle',$details->getQteArticle());
            $pdo->bindValue(':montant',$details->getMontant());
            $pdo->bindValue(':idCommande',$details->getIdCommande());
            $pdo->execute();
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function deleteDetails(Details $details){
      $pdo = Database::getInstance()->prepare('DELETE FROM details WHERE idDetail=:idDetail ');
      $pdo->bindValue(':idDetail',$details->getIdDetail());

      $pdo->execute();
    }
    

}
