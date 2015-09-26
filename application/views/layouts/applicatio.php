<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel='stylesheet' href="<?= styles_url(); ?>style.css" >
    <link rel='stylesheet' href="<?= styles_url(); ?>bootstrap.min.css" >
    <link rel='stylesheet' href="<?= styles_url(); ?>bootstrap-theme.css" >
    <title>Gumiprzepisy</title>
  </head>
  <body>

    <div id='main'>
      <header>
        <div class='logo'>
         <!-- <img class='logoImage' src="<?= images_url(); ?>grocery.gif" > -->
        </div>
        <div class='nav'>
          <ul>
            <li> <?= anchor('/', 'Home'); ?></li>
            <li> <?= anchor('recipes', 'Przepisy'); ?> </li>


            <?php if(($this->session->is_logged_in)||($this->session->is_admin)): ?>

              <span class="dropdown">
                 <button class="categories_button dropdown-toggle" type="button" data-toggle="dropdown">Kategorie
                     <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <?php foreach($categories as $category): ?>

                          <li><?= anchor('categories/show/' . $category->id, $category->name); ?></li>

                      <?php endforeach; ?>
                   </ul>
                 </span>
               <?php endif;?>

           <?php if($this->session->is_logged_in): ?>
            <li>  <span style='color:#ddd999'>  <?= $this->session->username; ?></span>
              <?= anchor('logout', 'Wyloguj', ['onclick' => "return confirm('Are you sure?')"]); ?></li>
            <?php else: ?>
            <li> <?= anchor('login', 'Zaloguj'); ?></li>
            <li><?= anchor('register', 'Zarejestruj'); ?></li>
            <?php endif; ?>
          </ul>
     </div>


     <div class='admin_nav'>
         <ul>
        <?php if($this->session->is_admin): ?>
          <li><?= anchor('recipes/new', 'Nowy przepis'); ?></li>
          <li><?= anchor('categories/new', 'Nowa kategoria'); ?> </li>
          <li> <?= anchor('users', 'Użytkownicy'); ?> <li>
          <li><span style='color:#ddd999'>  <?= $this->session->username; ?></span>
          <?= anchor('logout', 'Wyloguj', ['onclick' => "return confirm('Are you sure?')"]); ?></li>
        <?php else: ?>
          <li> <?= anchor('admin', 'Admin', ['class' => 'admin_link']); ?> </li>
        <?php endif; ?>
      </ul>
     </div>


       <div style='clear: both'></div>
      </header>


      <div id='container'>
        <?php $this->load->view($yield); ?>
      </div>

      <footer>
        <p> Przepisy <?= date('Y'); ?></p>

      </footer>

    </div>



    <script src="<?= javascript_url(); ?>jquery.js "> </script>
    <script src="<?= javascript_url(); ?>bootstrap.min.js "> </script>
    <script src="<?= javascript_url(); ?>masonr.js "> </script>
    <script src="<?= javascript_url(); ?>app.js "> </script>

  </body>
</html>
