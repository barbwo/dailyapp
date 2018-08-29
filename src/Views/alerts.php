<?php
  function renderAlerts($alerts, $type){
    if(count($alerts) > 0) {
      echo '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">';
      echo '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>';
      foreach($alerts as $alert) {
        echo $alert . '<br/>';
      }
      echo '</div>';
    }
  }
  renderAlerts($this->informations, 'success');
  renderAlerts($this->errors, 'danger');