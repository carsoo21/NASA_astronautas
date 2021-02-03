
<div class="wrap"> 
  <h1>Configuraciones</h1>    
  <hr>
  <h2>Inserte logo para la vista del formulario</h2>
  <p>El logo se utiliza en el front end</p>
  <?php require_once("upload_img.php"); 
  ?>
  <hr>
  <h2>Configuracion de textos y mensajes</h2>
  <p>Estos textos se visualizan en el front end</p>
  <form class="formulario-admin" action="options.php" method="post">
    <?php settings_fields('nasa_coniguracion_grupo'); ?>
    <?php do_settings_sections('nasa_coniguracion_grupo'); ?>        

    <div class="contenedor-grid">
      <div class="header">
        <h2>Opciones generles</h2>
        <p><em>Estas son las opciones generales para la carga de datos de contacto que se mostraran en el sitio.</em></p>
      </div>
      <table class="form-table">
        <tr valign="top">
          <th scope="row">
            <h4>Texto de introducción</h4>
            <p><em>Ingrese el texto que sea mostrar en el sitio</em></p>
          </th>
          <td><textarea name="nasa_texto" value="<?php echo esc_textarea(get_option('nasa_texto')); ?>" rows="4"><?php echo esc_textarea(get_option('nasa_texto')); ?></textarea></td>
        </tr>
        <tr valign="top">
          <th scope="row">
            <h4>Mensaje agradecimiento</h4>
            <p><em>Ingrese el texto que sea mostrar en el sitio</em></p>
          </th>
          <td><textarea name="nasa_mensajeAgradecimiento" value="<?php echo esc_textarea(get_option('nasa_mensajeAgradecimiento')); ?>" rows="4"><?php echo esc_textarea(get_option('nasa_mensajeAgradecimiento')); ?></textarea></td>
        </tr>        
      </table>
    </div>

    <div class="contenedor-grid footer">
      <div class="columnas8-8 ">
        <?php submit_button(); ?>
      </div>
    </div>
  </form>
</div>