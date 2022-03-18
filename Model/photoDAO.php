<?php

declare(strict_types = 1);

class photoDAO
{
    // Objet PDO d'accès à la BD
    private $bdd;

    // Exécute une requête SQL éventuellement paramétrée
    protected function executerRequete($sql, $params = null)
    {
        if ($params == null) {
            $resultat = $this->dbconnect()->query($sql);    // exécution directe
        } else {
            $resultat = $this->dbconnect()->prepare($sql);  // requête préparée
            $resultat->execute($params);
        }
        return $resultat;
    }

    /* -------------------------*/
    /* Db connection à images */
    /* -------------------------*/
    private function dbconnect()
    {
        try {
            $this->bdd = new PDO('mysql:host=localhost;dbname=images', 'root', 'firegun742002',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            return $this->bdd;
        } catch (Exception $e){
        }
    }
    public function select_photo(){


    }
    public function  select_nbphotos()
    {
        $requete='SELECT COUNT(img_id) as "Nombres" from images';
        $resultat=$this->executerRequete($requete);
        $nombre=0;
        foreach ($resultat as $nb)
        {
            $nombre=$nb['Nombres'];
        }
        return $nombre;
    }
    public function select_image_from_id3($id1,$id2,$id3)
    {
        $requete='SELECT * from images where img_id= :id1 or img_id= :id2 or img_id= :id3';
        $resultat=$this->executerRequete($requete,array('id1'=>$id1,'id2'=>$id2,'id3'=>$id3));
        return $resultat;
    }

    public function select_image_from_id2($id1,$id2)
    {
        $requete='SELECT * from images where img_id= :id1 or img_id= :id2 ';
        $resultat=$this->executerRequete($requete,array('id1'=>$id1,'id2'=>$id2));
        return $resultat;
    }

    public function select_image_from_id1($id1)
    {
        $requete='SELECT * from images where img_id= :id1 ';
        $resultat=$this->executerRequete($requete,array('id1'=>$id1));
        return $resultat;
    }
}