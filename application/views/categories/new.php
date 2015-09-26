<div class='item' style='margin: 0 auto'>
<fieldset>
<h3> Nowa kategoria</h3>
<?= form_open('categories/create'); ?>
<div class='form-group'>
  <label for='name'> Nazwa </label>
  <div> <input type='text' name='name' class='categoryName form-control'/> </div>
  <div class='validationError'> <?= form_error('name'); ?> </div>
</div>

  <div> <input type='submit' name='submit' value='Dodaj' class='addCategorySubmit btn btn-primary' /> </div>
<?= form_close(); ?>
</fieldset>


  <table class='table table-striped table-hover'>
    <thead>
      <th> Nazwa </th> <th> Akcje </th>
    </thead>
    <tbody>
      <?php foreach($categories as $category): ?>
      <tr>
        <td> <?= anchor('categories/show/' . $category->id, $category->name); ?> </td>
        <td> <?= anchor('categories/delete/' . $category->id, 'Usuń',
        ['onclick' => "return confirm('Napewno chcesz usunąć?')", 'class' => 'btn btn-xs btn-danger']); ?> </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>
