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

    public static function addDetails(Details $details){
        try { 
            $pdo = Database::getInstance()->prepare('INSERT INTO  details (codeArticle,qteArticle,montant,idCommande,idCommande_commandes,idArticle ) VALUES (:codeArticle,:qteArticle,:montant,:idCommande,:idCommande_commandes,:idArticle)');
            $pdo->bindValue(':codeArticle',$details->getCodeArticle());
            $pdo->bindValue(':qteArticle',$details->getQteArticle());
            $pdo->bindValue(':montant',$details->getMontant());
            $pdo->bindValue(':idCommande',$details->getIdCommande());
            $pdo->bindValue(':idCommande_commandes',$details->getIdCommande_commandes());
            $pdo->bindValue(':idArticle',$details->getIdArticle());
            $pdo->execute();
            $details->setIdDetail(Database::getInstance()->lastInsertId());
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function updateDetails(Details $details){
        try { 
            $pdo = Database::getInstance()->prepare('UPDATE  details SET codeArticle=:codeArticle,qteArticle=:qteArticle,montant=:montant,idCommande=:idCommande,idCommande_commandes=:idCommande_commandes,idArticle=:idArticle WHERE idDetail=:idDetail ');
            $pdo->bindValue(':idDetail',$details->getIdDetail());
            $pdo->bindValue(':codeArticle',$details->getCodeArticle());
            $pdo->bindValue(':qteArticle',$details->getQteArticle());
            $pdo->bindValue(':montant',$details->getMontant());
            $pdo->bindValue(':idCommande',$details->getIdCommande());
            $pdo->bindValue(':idCommande_commandes',$details->getIdCommande_commandes());
            $pdo->bindValue(':idArticle',$details->getIdArticle());
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
