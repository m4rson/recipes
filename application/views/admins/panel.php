
<div class='item' style='float:right'>
<h2> Dodaj kategorię </h2>
<?= form_open('categories/create'); ?>
  <label for='name'> Nazwa </label>
  <div> <input type='text' name='name' class='categoryName' required/> </div>
  <div> <?= form_error('name'); ?> </div>
  <div> <input type='submit' name='submit' value='Dodaj' class='addCategorySubmit' /> </div>
<?= form_close(); ?>
</div>

<div class='item' style='float:left'>
<h2> Dodaj nowy przepis </h2>

<?= form_open_multipart('recipes/create'); ?>
<!-- <label for='category_id'> Kategoria </label> -->
<select class="" name='category_id'>
  <option value=''> Wybierz kategorię</option>
  <?php foreach($categories as $category): ?>
  <option value="<?= $category->id; ?>" > <?= $category->name; ?>  </option>
<?php endforeach; ?>
</select>
<div> <?= form_upload('userfile'); ?> </div>
<label for='title'> Tytuł </label>
<div>   <input type='text' name='title' value="<?= set_value('title');?>" class='recipeTitle' required ></div>

<label for='ingredients'> Składniki </label>
<div> <textarea name='ingredients' value="<?= set_value('ingredients'); ?>" class='recipeIngredients' required ></textarea></div>

<label for='directions'> Sposób przygotowania </label>
<div> <textarea name='directions' value="<?= set_value('directions'); ?>" class='recipeDirections' required ></textarea></div>

<div> <input type='hidden' name='added' value="<?= date('Y-m-d'); ?>" ></div>

<div> <input type='submit' name='submit' value='Dodaj przepis' class='addRecipeSubmit' /></div>
<?= form_close(); ?>
</div>
<div style='clear:both;'></div>
