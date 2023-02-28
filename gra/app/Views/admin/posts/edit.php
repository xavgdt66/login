
/<!--------FORMULAIRE MODIFICATION POST ----->
<form method="post"> 
<!-- Créer un un input (via la méthode) avec le label + placeholder  -->
<?= $form->input('titre', 'Titre de l\'article'); ?>
<!-- Créer un un input ( via la méthod) avec le label + placeholder + ibdique le parametre a prendre de la function input  ! -->
<?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
<!-- Créer un un input ( via la méthod)   ! -->
<?= $form->select('category_id', 'Catégorie', $categories); ?>
<button class="btn btn-primary">Sauvegarder</button>
</form>