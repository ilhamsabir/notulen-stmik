<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url('notulis') ?>" title="Ke Dashboard" class="tip-bottom">
    <i class="icon-home"></i> Dashboard</a> <a href="<?php echo base_url('notulis/list_notulen') ?>"> List Data Notulen</a> <a href="#" class="current">Kirim Hasil Notulen</a> </div>
    <h1>Kirim Hasil Notulen</h1>
  </div>
  <div class="container-fluid">
  <hr>
    <div class="row-fluid">
      <div class="span12">
      <?php 
        echo validation_errors(
          '<div class="alert alert-danger"><button class="close" data-dismiss="alert">×</button>','</div>');
      ?>
      <a href="#" onclick="history.go(-1)" class="btn btn-success">Kembali</a>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
          </div>
          <div class="widget-content nopadding">
            <?php echo form_open(base_url('notulis/send_notulen/'.$show->kode_acara), array('class' => 'form-horizontal')) ?>
            <input type="hidden" name="kode" value="<?php echo $show->kode_acara ?>">
              <div class="control-group">
                <label class="control-label">Kirimkan Ke:</label>
                <div class="controls">
                  <?php foreach ($hadir as $show): ?>
                     <label>
                    <input type="checkbox" name="kehadiran[]" value="<?php echo $show->email ?>" />
                    <?php echo $show->nama ?> (<?php echo $show->email ?>)<br><br>
                    <?php if($show->foto != '') { ?>
                    <img src="<?php echo base_url().'assets/img/foto/'.$show->foto ?>" width="7%" height="7%">
                    <?php } elseif($show->foto == '') { ?>
                    <img src="<?php echo base_url().'assets/img/belum_upload.jpg' ?>" width="7%" height="7%">
                    <?php } ?></label><br><br>
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Kirim" class="btn btn-info">
              </div>
              <?php echo form_close(); ?>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
