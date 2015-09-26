<div>
<h2> Admin Login</h2>
<fieldset>
<?= form_open('admins/auth'); ?>
<div class='form-group'>
<label for='username'> Login </label>
<div> <?php //echo form_input('username', set_value('username')); ?>
<input type='text' name='username' value="<?= set_value('username');?>"class='registerUsername registry logins form-control' required />
</div>
<div> <?= form_error('username', '<p style="color:red">'); ?></div>
</div>
<div class='form-group'>
<label for='password'> Hasło </label>
<div> <?php //echo form_password('password'); ?>
   <input type='password' name='password' minlength='6' class='registerPassword registry logins form-control' required />
</div>
<div> <?= form_error('password', '<p style="color:red">'); ?> </div>
</div>
<div> <?php //echo form_submit('submit', 'Log in'); ?>
  <input type='submit' value='Zaloguj' name='loginSubmit' class='btn btn-primary loginSubmit' />
</div>
</fieldset>
<?= form_close(); ?>

<?php if(!$alreadyAdmin): ?>

<div>
<h2>Admin rejestracja </h2>

<fieldset>
  <?= form_open('admins/register'); ?>
  <div class='form-group'>
  <label for='username'> Login </label>
  <div> <?php //echo form_input('username', set_value('username')); ?>
  <input type='text' name='username' value="<?= set_value('username'); ?>"class='registerUsername registry form-control' required />
  </div>
  <div> <?= form_error('username', '<p style="color:red">'); ?></div>
  </div>

  <div class='form-group'>
    <label for='email'> Email </label>
    <div> <?php //echo form_input('email', set_value('email')); ?>
    <input type='email' name='email' value="<?= set_value('email'); ?>" class='registerEmail registry form-control' required />
    </div>
    <div> <?= form_error('email', '<p style="color:red">'); ?> </div>
  </div>

  <div class='form-group'>
    <label for='password'> Hasło </label>
    <div> <?php //echo form_password('password'); ?>
    <input type='password' name='password' minlength='6' class='registerPassword registry form-control' required />
    </div>
    <div> <?= form_error('password', '<p style="color:red">'); ?> </div>
  </div>

  <div> <?php //echo form_submit('submit', 'Register'); ?>
   <input type='submit' value='Zarejestruj' name='registerSubmit' class='btn btn-primary registerSubmit' />
  </div>
<?= form_close(); ?>
</fieldset>

</div>

<?php endif; ?>
<div style='clear:both'></div>
</div>
