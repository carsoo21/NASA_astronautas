<?php
function nasa_reporte(){ 
  global $wpdb;  
  $tabla_candidatos = $wpdb->prefix . 'nasa_candidatos';  
  $candidatos = $wpdb->get_results("SELECT * FROM $tabla_candidatos");
  ?>
  <div class="wrap">
    <h1 class="mb-5">Reportes</h1>
    <table class="wp-list-table widefat fixed striped table-view-list posts">
      <thead>
        <tr>
          <th class="row-title">Nombre</th>
          <th class="row-title">Edad</th>
          <th class="row-title">Sexo</th>
          <th class="row-title">Correo Electronico</th>
          <th class="row-title">Motivo para ir a la luna</th>
          <th class="row-title">Última vez que tuvo contacto con extraterrestres.</th>
        </tr>
      </thead>
      <tbody id="the-list">
        <?php           
        foreach($candidatos as $candidato){
          $nombre = esc_textarea($candidato->Nombre);
          $edad = esc_textarea($candidato->Edad);
          $sexo = esc_textarea($candidato->Sexo);
          $email = esc_textarea($candidato->Email);
          $motivo = esc_textarea($candidato->Motivo);
          $contacto = esc_textarea($candidato->Contacto);
          ?>
          <tr class="iedit author-self level-0 post-1 type-post status-publish format-standard hentry category-sin-categoria">
            <td><?php echo $nombre ?></td>
            <td><?php echo $edad ?></td>
            <td><?php echo $sexo ?></td>
            <td><?php echo $email ?></td>
            <td><?php echo $motivo ?></td>
            <td><?php echo $contacto ?></td>
          </tr>
          <?php
        }
        ?>
      </tbody>
      <tfoot>
        <tr>
          <th class="row-title">Nombre</th>
          <th class="row-title">Edad</th>
          <th class="row-title">Sexo</th>
          <th class="row-title">Correo Electronico</th>
          <th class="row-title">Motivo para ir a la luna</th>
          <th class="row-title">Última vez que tuvo contacto con extraterrestres.</th>
        </tr>
      </tfoot>
    </table>
  </div>
<?php
}