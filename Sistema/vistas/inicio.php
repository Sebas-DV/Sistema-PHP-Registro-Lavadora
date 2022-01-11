<?php
  session_start();

  if(isset($_SESSION['user']))
  {
    ?>
    <!DOCTYPE html>
    <html lang="es" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title></title>
      </head>
      <body>
        <div class="container">
          <?php require_once 'menu.php'; ?>
        </div>
      </body>
    </html>
    <?php
  }
  else
  {
    header('Location: ../index.php');
  }
?>
