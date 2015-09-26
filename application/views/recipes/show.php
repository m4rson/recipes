

<div>
  <h4><?= anchor('recipes', 'Powrót'); ?></h4>
<div class='row'>
  <div>
<h1> <?= $recipe->title; ?> </h1>


<div>
<img class='showImage' src="<?= base_url() . 'uploads/' .  $recipe->userfile; ?>" >
</div>
<div class='directions'>
<p> <span><b>Składniki: </b></span><?= $recipe->ingredients; ?> </p>
<p> <span><b>Sposób przygotowania: </b></span><?= $recipe->directions; ?> </p>
<p> <span><b>Dodany: </b></span><?= $recipe->added; ?> </p>
<?php if($this->session->is_admin): ?>
  <?= anchor('recipes/delete/' . $recipe->id . '/' . $recipe->userfile , 'Usuń przepis',
       ['onclick' => "return confirm('Napewno chcesz usunąć?')", 'class' => 'btn btn-sm btn-danger']); ?>
<?php endif; ?>
</div>
</div>
</div>
<hr>

<h4> Napisz komentarz </h4>
<?= form_open('comments/create'); ?>

<fieldset>
  <div><input type='hidden' name='username' value="<?= $this->session->username; ?>" /></div>
  <!-- <label for='body'> Komentarz </label> -->
  <div> <input type='hidden' name='recipe_id' value="<?= $this->uri->segment(3);?>" /> </div>
  <div> <textarea name='body' class='form-control' value="<?= set_value('body');?>" required></textarea> </div>
  <div> <?= form_error('body'); ?></div>
  <div> <input type='hidden' name='added' value="<?= date('Y-m-d'); ?>" ></div>
  <div> <input type='submit' name='submit' value='Dodaj komentarz' class='btn btn-primary'/> </div>
</fieldset>

<?= form_close(); ?>

<div class='comments_box'>
<?php foreach($comments as $comment): ?>
<div class='single_comment'>
  <p>  <b><i><?= $comment->username; ?> :</i></b> <?= $comment->body; ?> </p>
  <p> <b> <i> Dodany :</i></b> <?= $comment->added; ?> </p>
</div>
   <?php if($this->session->is_admin): ?>
    <?= anchor('comments/delete/' . $comment->id, 'Usuń komentarz',
         ['onclick' => "return confirm('Napewno chcesz usunąć?')", 'class' => 'deleteLink btn btn-danger btn-xs']); ?>
  <?php endif; ?>
   <hr>
<?php endforeach; ?>
</div>

</div>
