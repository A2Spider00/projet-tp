<?php require_once 'views/parts/header.php'; ?> <!--J'ai utilisée require_once pour inclure le contenu du fichier spécifié (header.php) dans le fichier où cette instruction est appelée.-->

<!--J'ai mis une image de fond sur ma page principale avec un overlay, qui est une couche sur l'image pour mieux voir mes textes, et un bouton de drop qui, en appuyant dessus, nous ramène sur une autre page(page home).-->
<div class="indexbg"> <!--bg image-->
  <div class="overlay"> <!--overlay-->
    <h1 class="h1bgmain"><strong>A2Spider</strong></h1> <!-- titre principal-->
    <a href="/home"> <!--le lien vers la deuxième page-->
      <button class="btnbgmain"> <!--mon button-->
        <strong>Drop</strong>
      </button>
    </a>
  </div>
</div>
<!--fin-->
<hr>  <!--une ligne horizontale-->
<h2 class="text-white text-center"> Information</h2> <!--mon titre niveau 2 -->
<!--vous avez inséré une balise <a> à l'intérieur d'une balise <p> pour créer un lien-->
<p class="text-center text-white fs-4 mt-4">
  <a href="views/cgv.php">C.G.V</a>
</p>








<?php require_once 'views/parts/footer.php'; ?><!--J'ai utilisée require_once pour inclure le contenu du fichier spécifié (header.php) dans le fichier où cette instruction est appelée.-->