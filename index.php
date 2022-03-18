<?php

require_once 'Controller/controller.php';
afficher_photo();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Espace de travail Escape Game</title>


    <!--CSS-->
    <link rel="stylesheet" href="css/index.css">
</head>
<header>
    <div>
        <ul>
            <li> <a href="#accueil">Accueil</a></li>
            <li> <a href="#photo&commentaires">Commentaires</a></li>
            <li> <a href="#reservation">Réservation</a></li>
            <li> <a href="#statistiques">Statistiques</a></li>
        </ul>
    </div>
</header>
<body>
<div id="accueil"></div>
<section class ="bloc_accueil">
    <article class="Titre">
        <br>
        <br>
        <h1> ESCAPE GAME</h1>
    </article>
</section>

<div id="photo&commentaires"></div>
<section class ="bloc_photo_commentaires">
        <section class="Titre2">
            <h1>PHOTOS ET COMMENTAIRES</h1>
        </section>
    <?php

    $liste_images=afficher_photo();
    ?>
    <?php if($liste_images!=""){

        foreach ($liste_images as $ligne ) { ?>
            <section class="photo_commentaire">
                <img src="img/img_random/<?php echo($ligne["img_nom"]) ?>" alt="">
            </section>
         <section class="nom_client">
                <?php echo( $ligne["img_nom_client"]) ?>
        </section>
                <br>
                <br>
        <section class="commentaire_client">
                <?php echo($ligne["img_commentaire"]) ?>
        </section>
            <?php }}
            ?>
</section>
</body>
</html>
