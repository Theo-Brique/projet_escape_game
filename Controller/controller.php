<?php
require_once('./Model/photoDAO.php');

function afficher_photo()
{

    $liste_images="";
    $Lienbdd= new photoDAO();
    $nbdephotos=$Lienbdd->select_nbphotos();
    if($nbdephotos>0)
    {
        if ($nbdephotos>3 or $nbdephotos==3)
        {
            $aleanombre1=rand(1,$nbdephotos);
            $aleanombre2=rand(1,$nbdephotos);
            $aleanombre3=rand(1,$nbdephotos);
            while($aleanombre1==$aleanombre2 or $aleanombre1==$aleanombre3 or $aleanombre3==$aleanombre2)
            {
                $aleanombre1=rand(1,$nbdephotos);
                $aleanombre2=rand(1,$nbdephotos);
                $aleanombre3=rand(1,$nbdephotos);
            }
            $liste_images=$Lienbdd->select_image_from_id3($aleanombre1,$aleanombre2,$aleanombre3);
        }
        else
            {
                if($nbdephotos==1)
                {
                    $aleanombre1=rand(1,$nbdephotos);
                    $liste_images=$Lienbdd->select_image_from_id1($aleanombre1);
                }
                if($nbdephotos==2)
                {
                    $aleanombre1=rand(1,$nbdephotos);
                    $aleanombre2=rand(1,$nbdephotos);
                    while($aleanombre1==$aleanombre2)
                    {
                        $aleanombre1=rand(1,$nbdephotos);
                        $aleanombre2=rand(1,$nbdephotos);
                    }
                    $liste_images=$Lienbdd->select_image_from_id2($aleanombre1,$aleanombre2);

                }
            }
    }
    else
        {
            $liste_images="";
        }
    return $liste_images;
}