<div style='text-align:center'><h2> <?= ucfirst($category->name); ?> </h2></div>

 <!-- <div  style='float:right'>
  Kategorie
  <?php foreach($categories as $category): ?>
    <ul>
      <li><?= anchor('categories/show/' . $category->id, $category->name); ?></li>
    </ul>
  <?php endforeach; ?>
</div> -->


<div class='container-fluid'>
  <div class='row'>
<?php if($categorized): ?>
<?php foreach($categorized as $recipe): ?>

  <div class='col-md-3 col-sm-4'>
    <h4> <?= anchor('recipes/show/' . $recipe->id, $recipe->title, ['class' => 'show_link']); ?> </h4>
    <p> <span> <b>Dodane: </b></span><?= $recipe->added; ?> </p>
    <?php if($recipe->userfile): ?>
      <!-- <img src="<?= base_url() . 'uploads/' .  $recipe->userfile; ?>" class='userImage' > -->
        <?= anchor('recipes/show/' . $recipe->id,
        img(['src' => "uploads/$recipe->userfile", 'class' => 'userImage'])); ?>
    <?php endif; ?>
  </div>

<?php endforeach; ?>

<?php else: ?>
  <h2>W kategorii <?= $category->name; ?>  nie ma jeszcze przepisów</h2>
<?php endif; ?>

 </div>
</div>

<div class='pagination_links'>
   <?= $this->pagination->create_links(); ?>
</div>
