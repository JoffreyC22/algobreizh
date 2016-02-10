<?php
class ArticlesManager {

    public static function getAllArticles(){
        $pdo = Database::getInstance()->query('SELECT * FROM articles');
        while($datas = $pdo->fetch(PDO::FETCH_ASSOC)){
             $articles[] = new Articles($datas);
        }
        return (isset($articles)) ? $articles : null ;
    }
    
    public static function getArticlesById($id){
        $pdo = Database::getInstance()->prepare('SELECT * FROM articles WHERE idArticle=:idArticle');
        $pdo->bindValue(':idArticle',$id);
        $pdo->execute();
        $data = $pdo->fetch(PDO::FETCH_ASSOC);
        $articles = new Articles($data);
        return ($data != false ) ? $articles : false;
    }

    public static function getAllArticlesByCodeArticle($codeArticle){
        $pdo = Database::getInstance()->prepare('SELECT * FROM articles WHERE codeArticle=:codeArticle');
        $pdo->bindValue(':codeArticle',$codeArticle);
        $pdo->execute();
        $data = $pdo->fetch(PDO::FETCH_ASSOC);
        $articles = new Articles($data);
        return ($data != false ) ? $articles : false;
    }
    public static function addArticles(Articles $articles){
        try { 
            $pdo = Database::getInstance()->prepare('INSERT INTO  articles (codeArticle,libelleArticle,image,prix,unite,TVA,idFamille ) VALUES (:codeArticle,:libelleArticle,:image,:prix,:unite,:TVA,:idFamille)');
            $pdo->bindValue(':codeArticle',$articles->getCodeArticle());
            $pdo->bindValue(':libelleArticle',$articles->getLibelleArticle());
            $pdo->bindValue(':image',$articles->getImage());
            $pdo->bindValue(':prix',$articles->getPrix());
            $pdo->bindValue(':unite',$articles->getUnite());
            $pdo->bindValue(':TVA',$articles->getTVA());
            $pdo->bindValue(':idFamille',$articles->getIdFamille());
            $pdo->execute();
            $articles->setIdArticle(Database::getInstance()->lastInsertId());
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function updateArticles(Articles $articles){
        try { 
            $pdo = Database::getInstance()->prepare('UPDATE  articles SET codeArticle=:codeArticle,libelleArticle=:libelleArticle,image=:image,prix=:prix,unite=:unite,TVA=:TVA,idFamille=:idFamille WHERE idArticle=:idArticle ');
            $pdo->bindValue(':idArticle',$articles->getIdArticle());
            $pdo->bindValue(':codeArticle',$articles->getCodeArticle());
            $pdo->bindValue(':libelleArticle',$articles->getLibelleArticle());
            $pdo->bindValue(':image',$articles->getImage());
            $pdo->bindValue(':prix',$articles->getPrix());
            $pdo->bindValue(':unite',$articles->getUnite());
            $pdo->bindValue(':TVA',$articles->getTVA());
            $pdo->bindValue(':idFamille',$articles->getIdFamille());
            $pdo->execute();
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function deleteArticles(Articles $articles){
      $pdo = Database::getInstance()->prepare('DELETE FROM articles WHERE idArticle=:idArticle ');
      $pdo->bindValue(':idArticle',$articles->getIdArticle());

      $pdo->execute();
    }
    public static function getFamille($idfamile){
        $pdo = Database::getInstance()->prepare('SELECT libelleFamille as libelleFamille FROM familles WHERE idFamille=:idFamille');
        $pdo->bindValue(':idFamille',$idfamile);
        $pdo->execute();
        $data = $pdo->fetch(PDO::FETCH_ASSOC);
        return $codeFamille = $data['libelleFamille'];
        
    }
}
