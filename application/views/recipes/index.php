<!--
 <div  style='float:right'>
  Kategorie
  <?php foreach($categories as $category): ?>
    <ul>
      <li><?= anchor('categories/show/' . $category->id, $category->name); ?></li>
    </ul>
  <?php endforeach; ?>
</div> -->
<div class='container-fluid'>
<div class='row'>
  <!-- <div style='text-align:center'><h1> Ostatio dodane przepisy </h1></div> -->
<?php foreach($recipes as $recipe): ?>
<div class='col-md-3 col-sm-4'>
  <h4> <?= anchor('recipes/show/' . $recipe->id, $recipe->title, ['class' => 'show_link']); ?> </h4>
  <p> <span> <b>Dodane: </b></span><?= $recipe->added; ?> </p>
  <?php if($recipe->userfile): ?>
  <!-- <a href="<?= 'recipes/show/' . $recipe->id; ?>">
    <img src="<?= base_url() . 'uploads/' .  $recipe->userfile; ?>" class='userImage' ></a> -->
    <?= anchor('recipes/show/' . $recipe->id,
    img(['src' => "uploads/$recipe->userfile", 'class' => 'userImage'])); ?>
  <?php endif; ?>
</div>

<?php endforeach; ?>

</div>

</div>

<div class='pagination_links'>
     <?= $this->pagination->create_links(); ?>
 </div>
