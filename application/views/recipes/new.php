<div class='item' style='margin:0 auto' >
<h3>Nowy przepis</h3>
<fieldset>
<?= form_open_multipart('recipes/create'); ?>
<div class='form-group'>
<!-- <label for='category_id'> Kategoria </label> -->
<select class="form-control" name='category_id'>
  <option value=''> Wybierz kategorię</option>
  <?php foreach($categories as $category): ?>
  <option value="<?= $category->id; ?>" > <?= $category->name; ?>  </option>
<?php endforeach; ?>
</select>
<div class='validationError'> <?= form_error('category_id'); ?></div>
<div> <?= form_upload(['name' => 'userfile', 'class' => 'form-control']); ?> </div>
</div>

<div class='form-group'>
<label for='title'> Tytuł </label>
<div>   <input type='text' name='title' value="<?= set_value('title');?>" class='recipeTitle form-control'></div>
<div class='validationError'><?= form_error('title'); ?></div>
</div>

<div class='form-group'>
<label for='ingredients'> Składniki </label>
<div> <textarea name='ingredients' value="<?= set_value('ingredients'); ?>" class='recipeIngredients form-control'></textarea></div>
<div class='validationError'><?= form_error('ingredients'); ?></div>
</div>

<div class='form-group'>
<label for='directions'> Sposób przygotowania </label>
<div> <textarea name='directions' value="<?= set_value('directions'); ?>" class='recipeDirections form-control'></textarea></div>
<div class='validationError'><?= form_error('directions'); ?></div>
</div>
<div> <input type='hidden' name='added' value="<?= date('Y-m-d'); ?>" ></div>

<div> <input type='submit' name='submit' value='Dodaj' class='addRecipeSubmit btn btn-primary' /></div>
<?= form_close(); ?>
</div>
</fieldset>
<div style='clear:both;'></div>
