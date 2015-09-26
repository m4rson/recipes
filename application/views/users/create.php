<div class='item'>
<h2> Zarejestruj </h2>

<?= form_open('users/register'); ?>
<div class='form-group'>
<label for='username'> Login </label>
<div> <?php //echo form_input('username', set_value('username')); ?>
<input type='text' name='username' value="<?= set_value('username'); ?>"class='registerUsername registry form-control' required />
</div>
</div>
<div class='form-group'>
<div> <?= form_error('username', '<p style="color:red">'); ?></div>
<label for='email'> Email </label>
<div> <?php //echo form_input('email', set_value('email')); ?>
</div>
<div class='form-group'>
<input type='email' name='email' value="<?= set_value('email'); ?>" class='registerEmail registry form-control' required />
</div>
<div> <?= form_error('email', '<p style="color:red">'); ?> </div>
<label for='password'> Hasło </label>
<div> <?php //echo form_password('password'); ?>
<input type='password' name='password' minlength='6' class='registerPassword registry form-control' required />
</div>
</div>
<div> <?= form_error('password', '<p style="color:red">'); ?> </div>
<div> <?php //echo form_submit('submit', 'Register'); ?>
 <input type='submit' value='Zarejestruj' name='registerSubmit' class='registerSubmit btn btn-primary' />
</div>

<?= form_close(); ?>

</div>
