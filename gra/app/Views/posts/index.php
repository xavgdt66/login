<?php 
// bien mettre cette url => http://localhost/gra/public/index.php?p=home
// 22:10 
//?>


<!------------------------------------------------------------------------------------------------------------------------>
<div class="row">
   <div class="col-sm-8">
<!-------------$posts viens du controller PostsController.php------------>
   <?php foreach($posts as $post): ?>

                  <h2> <a href="<?php echo $post->url ?>"><?php echo $post->titre; ?></a> </h2>

                  <p><?= $post->categorie; ?></p>
               
                  <p><?= $post->extrait; ?></p>

   <?php endforeach; ?>

</div>

<div class="col-sm-4">

<ul> 
   <!-------------$categories viens du controller PostsController.php------------>
<?php foreach( $categories as $categorie): ?>
<li><a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></a>  </li>

   <?php endforeach ?>
   </ul>
</div>



</div>











