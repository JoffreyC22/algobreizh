<?PHP

class Panier {

    private $panier = array();

    // constructeur
    function __construct() { // constructeur
        @session_start();
        if (!isset($_SESSION['cart']))
            $_SESSION['cart'] = array();
        $this->panier = & $_SESSION['cart'];
    }

    // ajouter un article $refproduit
    public function addItem($refproduit = "", $nb = 1) {
        @$this->panier[$refproduit]['quantity'] += $nb;
        if ($nb <= 0)
            unset($this->panier[$refproduit]);
    }

    // supprimer un article $refproduit
    public function removeItem($refproduit = "", $nb = 1) {
        unset($this->panier[$refproduit]);
//        @$this->panier[$refproduit]['quantity'] -= $nb;
//        if ($nb <= 0)
//            unset($this->panier[$refproduit]);
    }
    public function removeCart(){
        $_SESSION['cart'] = array();
    }
    // afficher la liste des articles (et accessoirement, leur quantité)

    public function showCart() {
        $list = array();
        $i = 0;
        foreach ($this->panier as $ref => $data) {
            $list['ref'][$i] = $ref;
            $list['qte'][$i] = $data['quantity'];
            $i++;
        } 
        return $list;
    }

}

// fin de la classe
?>