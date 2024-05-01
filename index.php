<?php
session_start();
require('header.php');
require('config/database.php');
?>

<img style="display: block; margin: 0 auto;margin-top:50px;min-width:700px;" src="./images/banniere.jpg" alt="banniere-ourse">
<h1 style="text-align:center; margin: 40px">Bienvenue sur le site de l'OURSE !</h1>
<p>
L'OURSE est la monnaie locale citoyenne complémentaire, sociale et solidaire du Pays de Questembert à celui de Férel.
La monnaie locale participe à favoriser la résilience du territoire en mettant en lumière les acteurs locaux qui oeuvrent près de chez nous tout en gardant la monnaie sur le territoire sans qu'elle puisse retourner dans les bulles spéculatives de la finance.</p>
<h3>L'OURSE, MONNAIE LOCALE</h3>
<p>Comme Papillons Transition nous partons du principe que notre quotidien va être confronté à une diminution des ressources et à des changements climatiques majeurs.</p>
<h3>COMMENT CA MARCHE ?</h3>
<section class="gridActus">
        <div class="actu"><h2>1</h2><img src="./images/adhesion.png" alt="adhesion"><h3><u><a href="adhesion.php">J'adhère</a></u></h3></div>
        <div class="actu"><h2>2</h2><img src="./images/echange.png" alt="echang"><h3><u><a href="la-carte.php">J'échange</a></u></h3></div>
        <div class="actu"><h2>3</h2><img src="./images/argent.png" alt="argent"><h3><u><a href="la-carte.php">J'utilise</a></u></h3></div>
</section>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam ipsam aperiam voluptatum dolores officiis sint ducimus sequi modi quis? Dolor dolore nobis repellendus ratione, possimus excepturi labore accusamus qui consectetur.</p>
<section style="background-color:#ad529d ;color:white;">
    <h3 style="text-align : center;padding-top:20px;">POURQUOI UNE MONNAIE LOCALE ?</h3>
    <section style="display: flex;    flex-wrap: wrap;    justify-content: center;    align-items: center;">
        <div style="color : white;flex-basis: 15%;flex-grow: 1;flex-wrap : wrap;flex-shrink: 1;padding: 20px;margin: 10px;text-align: center;
    height: 50px;">IMPULSER <br></br>une consommation responsable</div>
    <div style="color : white;flex-basis: 15%;flex-grow: 1;flex-wrap : wrap;flex-shrink: 1;padding: 20px;margin: 10px;text-align: center;
    height: 50px;">DYNAMISER <br></br>l'économie locale</div>
    <div ><img style="flex-basis: 15%;flex-grow: 1;flex-shrink: 1;text-align: center;
    max-width: 300px;" src="./images/ourse.png" alt="ourse"></div>
    <div style="color : white;flex-basis: 15%;flex-grow: 1;flex-wrap : wrap;flex-shrink: 1;padding: 20px;margin: 10px;text-align: center;
    height: 50px;">FAVORISER <br></br>l'investissement écologique et solidaire</div>
    <div style="color : white;flex-basis: 15%;flex-grow: 1;flex-wrap : wrap;flex-shrink: 1;padding: 20px;margin: 10px;text-align: center;
    height: 50px;">SE REAPPROPIER <br></br>notre outil monétaire</div>
    </section>
</section>
<br></br>
<h3 style="text-align: center;">NOS VALEURS</h3>
<img style="display: block; margin: 0 auto;margin-top:50px;min-width:400px;" src="./images/logo.png" alt="logo-ourse">
<br> </br>
<h3 style="text-align: center;">QUI SOMMES-NOUS ?</h3> 
<br> </br><br> </br><br> </br>

<?php
require('footer.php');
?>
