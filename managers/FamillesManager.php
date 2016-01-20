<?php
class FamillesManager {

    public static function getAllFamilles(){
        $pdo = Database::getInstance()->query('SELECT * FROM familles');
        while($datas = $pdo->fetch(PDO::FETCH_ASSOC)){
             $familles[] = new Familles($datas);
        }
        return (isset($familles)) ? $familles : null ;
    }

    public static function getFamillesById($id){
        $pdo = Database::getInstance()->prepare('SELECT * FROM familles WHERE idFamille=:idFamille');
        $pdo->bindValue(':idFamille',$id);
        $pdo->execute();
        $data = $pdo->fetch(PDO::FETCH_ASSOC);
        $familles = new Familles($data);
        return ($data != false ) ? $familles : false;
    }

    public static function addFamilles(Familles $familles){
        try { 
            $pdo = Database::getInstance()->prepare('INSERT INTO  familles (libelleFamille,codeFamille ) VALUES (:libelleFamille,:codeFamille)');
            $pdo->bindValue(':libelleFamille',$familles->getLibelleFamille());
            $pdo->bindValue(':codeFamille',$familles->getCodeFamille());
            $pdo->execute();
            $familles->setIdFamille(Database::getInstance()->lastInsertId());
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function updateFamilles(Familles $familles){
        try { 
            $pdo = Database::getInstance()->prepare('UPDATE  familles SET libelleFamille=:libelleFamille,codeFamille=:codeFamille WHERE idFamille=:idFamille ');
            $pdo->bindValue(':idFamille',$familles->getIdFamille());
            $pdo->bindValue(':libelleFamille',$familles->getLibelleFamille());
            $pdo->bindValue(':codeFamille',$familles->getCodeFamille());
            $pdo->execute();
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function deleteFamilles(Familles $familles){
      $pdo = Database::getInstance()->prepare('DELETE FROM familles WHERE idFamille=:idFamille ');
      $pdo->bindValue(':idFamille',$familles->getIdFamille());

      $pdo->execute();
    }

}
