<?php require_once 'dependencias.php'; ?>
<nav class="navbar navbar-expand-lg navbar-light bg-info">
     <a class="navbar-brand">LAVADORA De Carros</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>

     <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav ml-auto">
         <li class="nav-item active">
           <a class="nav-link" href="inicio.php">Inicio <span class="sr-only">(current)</span></a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="clientes.php">Clientes</a>
         </li>
         <li class="nav-item">
           <a class="nav-link " href="vehiculos.php">Vehiculos</a>
         </li>
         <li class="nav-item">
           <a class="nav-link " href="lavados.php">Lavados</a>
         </li>
         <li class="nav-item">
           <a class="nav-link "><?php echo "Bienvenid@: ".$_SESSION['user']; ?></a>
         </li>
         <li class="nav-item">
           <a class="nav-link " href="../clases/salir.php">SALIR</a>
         </li>
       </ul>
     </div>
   </nav>
