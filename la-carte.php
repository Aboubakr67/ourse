<?php
session_start();


require('header.php');
?>


<h1 style="text-align:center; margin: 50px">La carte de nos professionnels</h1>
<p>Vous cherchez où dépenser vos OURSES ?</p>
<p>Cette carte liste tous les professionnels (commerces, artisans) où vous pourrez en profiter.</p>

<iframe width="100%" height="600px" frameborder="0" allowfullscreen="" src="https://umap.openstreetmap.fr/fr/map/les-prestataires-de-lourse_251740?scaleControl=false&amp;miniMap=false&amp;scrollWheelZoom=false&amp;zoomControl=true&amp;allowEdit=false&amp;moreControl=true&amp;searchControl=null&amp;tilelayersControl=null&amp;embedControl=null&amp;datalayersControl=true&amp;onLoadPanel=databrowser&amp;captionBar=false"></iframe>

<a class="bouton" style="text-align:center;margin : 20px;" href="index.php#echange">ECHANGER MON ARGENT CONTRE DES OURSES</a>
<?php
require('footer.php');
?>
