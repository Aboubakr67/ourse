<?php
session_start();

if (!isset($_SESSION['auth'])) {
    header('Location: index.php');
    exit();
}
require('header.php');
?>


<h1 style="text-align:center; margin: 50px">Page actualite</h1>
<section class="gridActus">
        <div class="actu"><h2>ACTU 1</h2><p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non dolorem, placeat impedit officiis ex odit architecto temporibus ad, quas, quaerat nesciunt optio sequi laborum eius in dignissimos dolorum accusamus obcaecati!
        {{ actualite.contenu|u.truncate(100, '...')|raw }}
        </p><img src="./images/banniere.jpg" alt="coeur"></div>
        <div class="actu"><h2>ACTU 2</h2><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, amet. Praesentium dolor tenetur labore reiciendis dolorem veniam corporis rerum totam explicabo odio eius atque, ut nesciunt aliquam nulla dicta officiis?|u.truncate(10, '...')</p><img src="./images/ourse.png" alt="visage"></div>
        <div class="actu"><h2>Super actu 3</h2><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore natus impedit vitae suscipit quas enim corporis inventore veritatis, ducimus laudantium. Sapiente aut distinctio eius iure itaque ipsum earum? In, sunt.</p><img src="./images/ourse.png" alt="plantravail"></div>
        <div class="actu"><h2>Super actu 4</h2><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus tempora quasi libero fugit consequatur molestiae repudiandae blanditiis expedita commodi veritatis quod hic, modi voluptas quam perferendis, vitae!</p><img src="./images/ourse.png" alt="skincare"></div>
        <div class="actu"><h2>Super actu 5</h2><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi odit assumenda doloremque tenetur totam id, eveniet reiciendis autem impedit maiores ea unde aspernatur itaque architecto minus adipisci quia quidem tempora?</p><img src="./images/ourse.png" alt="miroir"></div>
        <div class="actu"><h2>ACtu de l"ourse</h2><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse tempora, repellat iusto, id neque voluptas quaerat accusamus voluptatem vero quod asperiores omnis, sit ipsam repudiandae. In perspiciatis accusantium ipsa rerum?</p><img src="./images/ourse.png" alt="gorgeous"></div>

</section>
<?php
require('footer.php');
?>
