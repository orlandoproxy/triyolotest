<?php

/* @var $this yii\web\View */


$this->title = 'Triyolo';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
          <div class="col-md-5">
            <div class="row">
              <div class="form-group col-md-6">
                <label for="exampleFormControlSelect1">Oficina Entrega</label>
                <select autocomplete="on" class="form-control" id="checkin_id">
                  <?php foreach ($data['station_check_in'] as $key => $value) {
                  echo '<option id="'.$value['StationId'].'">'.$value['StationName'].'</option>';
                  } ?>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="exampleFormControlSelect1">Oficina Devolucion</label>
                <select class="form-control" id="checkout_id">
                  <?php foreach ($data['station_check_out'] as $key => $value) {
                  echo '<option id="'.$value['StationId'].'">'.$value['StationName'].'</option>';
                  } ?>
                </select>
              </div>
            </div>

          </div>
        </div>

    </div>
</div>
