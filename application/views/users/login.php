<div class='item'>
<h2>Zaloguj</h2>

<?= form_open('users/auth'); ?>
<div class='form-group'>
<label for='username'> Login </label>
<div> <?php //echo form_input('username', set_value('username')); ?>
<input type='text' name='username' value="<?= set_value('username');?>"class='registerUsername registry logins form-control' required />
<div> <?= form_error('username', '<p style="color:red">'); ?></div>
</div>
</div>
<div class='form-group'>
<label for='password'> Hasło </label>
<div> <?php //echo form_password('password'); ?>
   <input type='password' name='password' minlength='6' class='registerPassword registry logins form-control' required />
</div>
<div> <?= form_error('password', '<p style="color:red">'); ?> </div>
</div>
<div> <?php //echo form_submit('submit', 'Log in'); ?>
  <input type='submit' value='Zaloguj' name='loginSubmit' class='loginSubmit btn btn-primary' />
</div>

<?= form_close(); ?>
</div>
