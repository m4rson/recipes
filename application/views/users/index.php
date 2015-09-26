<div class='showUsers'>
<h3> Administrator </h3>

<table class='table'>
  <thead>
   <th> Login </th> <th> Email </th>
  </thead>
  <tbody>
<?php foreach($admins as $admin): ?>
  <tr>
    <td>
      <?= $admin->username; ?>
    </td>
    <td>
      <?= $admin->email; ?>
    </td>
  </tr>

</tbody>
<?php endforeach; ?>
</table>


<h3> Użytkownicy </h3>

<table class='table table-striped table-hover'>
  <thead>
    <!--<th> Id </th>--> <th> Login </th> <th> Email </th> <th> Akcje </th>
  </thead>
  <tbody>
<?php foreach($users as $user): ?>
  <tr>
    <!-- <td>
      <?= $user->id; ?>
    </td> -->
    <td>
      <?= $user->username; ?>
    </td>
    <td>
      <?= $user->email; ?>
    </td>
    <td>
      <?php if($this->session->is_admin): ?>
        <?= anchor('users/delete/' . $user->id, 'Usuń',
        ['onclick' => "return confirm('Napewno chcesz usunąć?')", 'class' => 'btn btn-xs btn-danger']); ?>
      <?php endif; ?>
    </td>
  </tr>


</tbody>
<?php endforeach; ?>
</table>

</div>
