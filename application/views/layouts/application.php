<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href="<?= styles_url(); ?>style.css" >
     <!-- <link rel='stylesheet' href="<?= styles_url(); ?>bootstrap.min.css" >  -->
    <!-- <link rel='stylesheet' href="<?= styles_url(); ?>bootstrap-theme.css" > -->
    <link rel='stylesheet' href="<?= styles_url(); ?>bootstrap_spacelab.css" >
    <title>Przepisy</title>
  </head>
  <body>

    <div id='main'>
      <header>
        <div class='logo'>
        </div>


        <div class="navbar navbar-inverse navbar-fixed-top">
         <div class="container">
           <div class="navbar-header">
              <!-- <img src="<?= images_url(); ?>basket.png" > -->
             <?= anchor('/', 'Przepisy', ['class'=> 'navbar-brand']); ?>
             <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
             </button>
           </div>

           <div class="navbar-collapse collapse" id="navbar-main">

             <ul class="nav navbar-nav">
               <?php if(($this->session->is_logged_in)||($this->session->is_admin)): ?>
               <li> <?= anchor('recipes', 'Przepisy'); ?> </li>
               <li class="dropdown">
                 <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Kategorie <span class="caret"></span></a>
                 <ul class="dropdown-menu" aria-labelledby="themes">

                   <?php foreach($categories as $category): ?>

                       <li><?= anchor('categories/show/' . $category->id, $category->name); ?></li>

                   <?php endforeach; ?>

                 </ul>
               </li>
               <?php endif;?>

               <?php if($this->session->is_logged_in): ?>
                  <li style='padding-top:20px; padding-left:20px;padding-right:20px;'> <?= $this->session->username; ?> </li>
                  <li> <?= anchor('logout', 'Wyloguj', ['onclick' => "return confirm('Chcesz się wylogować?')"]); ?></li>
                 <!-- <li> <a href='logout' onclick="return confirm('Napewno chcesz się wylogować?')">
                   Wyloguj <span style='color:green'><?= $this->session->username; ?> </span></a></li> -->
                <?php else: ?>
                <li> <?= anchor('login', 'Zaloguj'); ?></li>
                <li><?= anchor('register', 'Zarejestruj'); ?></li>
                <?php endif; ?>

             </ul>

             <ul class="nav navbar-nav navbar-right">
               <?php if($this->session->is_admin): ?>
                 <li><?= anchor('recipes/new', 'Nowy przepis'); ?></li>
                 <li><?= anchor('categories/new', 'Kategorie'); ?> </li>
                 <li> <?= anchor('users', 'Użytkownicy'); ?> </li>
                 <li style='padding-top:20px; padding-left:20px;padding-right:20px'> <?= $this->session->username; ?> </li>
                 <li><?= anchor('logout', 'Wyloguj', ['onclick' => "return confirm('Chcesz się wylogować?')"]); ?></li>
                 <?php else: ?>
                 <li> <?= anchor('admin', 'Admin', ['class' => 'admin_link']); ?> </li>
               <?php endif; ?>
             </ul>

           </div>
         </div>
       </div>



       <div style='clear: both'></div>
      </header>


      <div id='container'>

        <?php if($this->session->flashdata('message')): ?>
            <div class='alert alert-dismissible alert-info'>
                <?= $this->session->flashdata('message'); ?>
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
       <?php endif; ?>

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
    <script src="<?= javascript_url(); ?>scrip.js "> </script>

  </body>
</html>
