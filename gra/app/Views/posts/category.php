

<h1><?= $categorie->titre ?></h1>


<!--------(http://localhost/gra/public/index.php?p=categorie&id=2)---->


<div class="row">
   <div class="col-sm-8">

<?php foreach($articles as $post): ?>

      <h2>  
     
      <a href="<?=  $post->url ?>"><?= $post->titre ?>  </a>
      </h2>

      <p><?= $post->categorie ?></p>
    
      <p><?= $post->extrait; ?></p>
<?php endforeach ?>
</div>

<div class="col-sm-4">

<ul> 
<?php foreach($categories as $categorie): ?>
<li><a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></a>  </li>

   <?php endforeach ?>
   </ul>
</div>



</div>
