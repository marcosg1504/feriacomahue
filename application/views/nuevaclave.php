<?php
 /* $from = "";
  if(isset($_GET["from"]))
  {
    $from = $_GET["from"];
  }*/
?>

<section class="shop spad">
    <div class="container">
        <div class="row">
         
          <div class="col-lg-6">
          <div class="col-lg-12" style="border:solid 1px gray; border-radius:10px;padding:20px;">
					<h2>Cambiar clave</h2>
            <form action="<?= base_url("login/cambioClave"); ?>" method="POST">
                Correo
              <input type="text" name="correo" class="form-control" required />
              Nueva   Contraseña
              <input type="password" name="contrasena" class="form-control" required />
              Codigo recibido
              <input type="number" name="codigoRecibido" class="form-control"/>
            

             
              <input type="submit" value="Confirmar" class="btn btn-primary form-control" />
            </form>
         </div>			
           
    </div>

   





</section>
