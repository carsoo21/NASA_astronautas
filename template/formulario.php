<?php  
add_action( 'template_redirect', 'nasa_formulario_candidatos' );
function nasa_formulario_candidatos(){ 
  global $wpdb;
  
  if( !empty($_POST) 
      AND $_POST['nombre'] != ''
      AND $_POST['edad'] != ''
      AND $_POST['sexo'] != ''
      AND $_POST['contacto'] != ''
      AND $_POST['motivo'] != ''
      AND is_email($_POST['email'])      
  ){
    $tabla_candidatos = $wpdb->prefix . 'nasa_candidatos';
    $nombre = sanitize_text_field($_POST['nombre']);
    $edad = sanitize_text_field($_POST['edad']);
    $sexo = sanitize_text_field($_POST['sexo']);
    $contacto = sanitize_text_field($_POST['contacto']);
    $motivo = sanitize_text_field($_POST['motivo']);
    $email = sanitize_email($_POST['email']);    
    $wpdb->insert(
      $tabla_candidatos, 
      array(
      'nombre' => $nombre,
      'edad' => $edad,
      'sexo' => $sexo,
      'contacto' => $contacto,
      'motivo' => $motivo,
      'email' => $email      
      )
    );

    wp_redirect( home_url( '/nasa-gracias/' ) );
    exit();
  }
  ob_start();
?>
<div class="container">
  <div class="card-nasa border p-3 p-sm-4 p-md-5">
    <div class="row mb-3 mb-md-5">  
      <div class="col-8 col-md-6">
        <h1 class="mb-3"><?php the_title(); ?></h1>
        <p><?php echo esc_html( get_option( 'nasa_texto' ) ); ?></p>
      </div>
      <div class="col-4 col-md-6 text-right">
        <img class="logo-nasa img-fluid" src="<?php echo wp_get_attachment_url( get_option( 'media_selector_attachment_id' ) ); ?>" alt="">
      </div>        
    </div>  

    <form action="" class="form-nasa" method="post">
      <?php wp_nonce_field('graba_candidatos', 'candidato_nonce') ?>
      <div class="form-row">
        <div class="col-12 col-md-6 mb-3">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
        </div>
        <div class="col-12 col-md-6 mb-3">
          <label for="edad">Edad</label>
          <input type="text" class="form-control" id="edad" name="edad" placeholder="Edad" required>
        </div>
      </div>
      <div class="form-row">
        <div class="col-12 col-md-6 mb-3">
          <label for="sexo">Sexo</label>
          <input type="text" class="form-control" id="sexo" name="sexo" placeholder="Sexo" required>
        </div>
        <div class="col-12 col-md-6 mb-3">
          <label for="email">Correo Electrónico</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="Email" aria-describedby="inpMail" required>
        </div>
      </div>
      <div class="form-row">
        <div class="col-12 col-md-6 mb-3">
          <label for="contacto">Última vez que tuvo contacto con extraterrestres.</label>
          <input type="text" class="form-control" name="contacto" id="contacto" required>
        </div>
        <div class="col-12 col-md-6 mb-3">
          <label for="motivo">Motivo para ir a la luna</label>
          <textarea class="form-control" id="motivo" name="motivo" rows="4" required></textarea>
        </div>
      </div>
      <div class="from-row">
        <div class="col-12">
          <button type="submit" id="enviar_a_mensaje" class="btn btn-light" >Enviar</button>          
        </div>
      </div>
    </form>
  </div>
</div>
<?php return ob_get_clean();
} 