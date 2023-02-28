<?php if($errors): ?>
<div class="alert alert-danger">
  Identifiant incorects 
</div>
<?php  endif;   ?>



<form method="post"> 
<!-- Créer un un input avec le label + placeholder  -->
<?= $form->input('username', 'Pseudo'); ?>
<!-- Créer un un input avec le label + placeholder + ibdique le parametre a prendre de la function input  ! -->
<?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
<button class="btn btn-primary">Envoyer</button>
</form>