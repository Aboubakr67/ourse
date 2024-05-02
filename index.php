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
<section class="grid">
    <a class="fonctionnement" href="adhesion.php"><h2>1</h2><img src="./images/adhesion.png" alt="adhesion"><h3><u>J'adhère</u></h3></a>
    <a class="fonctionnement" href="la-carte.php"><h2>2</h2><img src="./images/echange.png" alt="echang"><h3><u>J'échange</u></h3></a>
        <a class="fonctionnement" href="la-carte.php"><h2>3</h2><img src="./images/argent.png" alt="argent"><h3><u>J'utilise</u></h3></a>
</section>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam ipsam aperiam voluptatum dolores officiis sint ducimus sequi modi quis? Dolor dolore nobis repellendus ratione, possimus excepturi labore accusamus qui consectetur.</p>
<section class="pourquoiMonnaie">
    <h3>POURQUOI UNE MONNAIE LOCALE ?</h3>
    <section>
    <p><b>IMPULSER</b> <br></br>une consommation responsable</p>
    <p><b>DYNAMISER </b><br></br>l'économie locale</p>
    <img src="./images/ourse.png" alt="ourse">
    <p><b>FAVORISER </b><br></br>l'investissement écologique et solidaire</p>
    <p><b>SE REAPPROPIER </b><br></br>notre outil monétaire</p>
    </section>
</section>
<br></br>
<h3 style="text-align: center;">NOS VALEURS</h3>
<p><b>L'association OURSE (Organisons Une Réappropriation Solidaire de l'Économie) met en place une monnaie locale complémentaire et citoyenne dans la région de basse Vilaine faisant de l?argent un outil de développement local, en dehors de toute spéculation et accumulation.</b>
Nous souhaitons reconsidérer la place de l'argent dans nos systèmes d'échange. Nous savons qu'une monnaie peut être porteuse de sens et de valeurs.</p>
<p class="titreCentre">En adhérant à l'association « OURSE », nous nous engageons à</br></p>
<section class="grid">
    <p class="valeur"> Utiliser la monnaie locale comme :
    <br>- Porteuse de valeurs éthiques, écologiques, et sociales dans une recherche de mieux-être collectif ;</br>
    <br>- Outil pour inciter chacun à mieux comprendre sa façon de produire et de consommer ;</br>
    <br>- Moyen de contribuer à une alternative non-spéculative au modèle économique actuel.</br></p>
    <div class="valeur"><img src="./images/logo.png" alt="logo-ourse"></div>
    <p class="valeur">
    - développer un réseau afin de favoriser la solidarité et la coopération entre différents acteurs</br>
    <br>- utiliser la monnaie locale complémentaire comme un outil collectif destiné à fluidifier les échanges dans un esprit d?équité et d?entraide entre citoyens et entreprises</br>
    <br>- adopter des comportements économiques de production et de consommation plus cohérents, en harmonie avec l?environnement et sauvegardant l?évolution de la vie.</br></p>
</section>

<p class="titreCentre">Nous souhaitons que ce projet soit accessible à tous, pédagogique et construit ensemble dans le respect de nos différences.<br></br>
Nous adhérons à cette charte des valeurs et à son état d'esprit.</p>
<br> </br>
<h3 style="text-align: center;">QUI SOMMES-NOUS ?</h3> 
<section class="grid">
    <div class="infoAsso">
        <h4>Une association créée en 2017.</h4>
        <p>Le siège se situe à la Roche Bernard. Depuis la projection du film Demain, nous nous réunissons chaque jeudi pour faire vivre notre une Monnaie Locale. Nous sommes des citoyens.nes impliqués. es dans la vie locale, désireux.reuses de faire fructifier l'économie de proximité, et redonner du sens à l'échange monétaire.
        </p>
        <p>Pour favoriser les échanges
        En créant un outil monétaire favorisant les circuits courts afin de faire vivre une économie de proximité et humaine.</p>
        <p>
        En toute légalité
        Les monnaies locales sont tout à fait légales. Un rapport parlementaire de 2015 encourage même leur développement. La MLCC circule dans un réseau d?adhérents. Elle s?indexe à parité sur l?Euro.

        tout adhérent d'une des monnaies locales bretonne peut utiliser l'une de ces monnaies sans ré adhérer.</p>
    </div>
    <div class="infoAsso"><img  src="./images/oursecravate.png" alt="ours-cravate"></div>
</section>
<br> </br><br> </br><br> </br>

<?php
require('footer.php');
?>
