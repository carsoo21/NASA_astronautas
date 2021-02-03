<?php
function nasa_mensaje_agradecimiento(){
  ob_start(); ?>
    <div class="container">
      <div class="card-nasa border p-3 p-sm-4 p-md-5">
        <div class="row d-flex align-items-center">  
          <div class="col-8 col-md-8 ">
            <h5 class="mb-0"><?php echo esc_html( get_option( 'nasa_mensajeAgradecimiento' ) ); ?></h5>
          </div>
          <div class="col-4 col-md-4 text-right">
            <img class="logo-nasa img-fluid" src="<?php echo wp_get_attachment_url( get_option( 'media_selector_attachment_id' ) ); ?>" alt="">
          </div>        
        </div>
      </div>
    </div>
  <?php
  return ob_get_clean();
}