<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url('admin') ?>" title="Ke Dashboard" class="tip-bottom">
    <i class="icon-home"></i> Dashboard</a> <a href="<?php if($show->jenis == 'Internal'){ echo base_url('admin/acara_internal'); } elseif($show->jenis == 'Eksternal') { echo base_url('admin/acara_eksternal'); } ?>"> List Data Acara</a> <a href="#" class="current">Kirim Undangan Acara</a> </div>
    <h1>Kirim Undangan Acara</h1>
  </div>
  <div class="container-fluid">
  <hr>
    <div class="row-fluid">
      <div class="span12">
      <?php 
        echo validation_errors(
          '<div class="alert alert-danger"><button class="close" data-dismiss="alert">×</button>','</div>');
      ?>
      
      <?php if ($show->status == '') { ?>
      <a href="#" onclick="history.go(-1)" class="btn btn-success">Kembali</a>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
          </div>
          <div class="widget-content nopadding">
            <?php echo form_open(base_url('admin/invite_eks/'.$show->kode), array('class' => 'form-horizontal')) ?>
            <div class="control-group">
                <input type="hidden" name="kode_acara" value="<?php echo $show->kode ?>">
                <label class="control-label">Jumlah Penerima:</label>
                <div class="controls">
                  <input type="text" name="penerima" class="span2" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  value="<?php echo set_value('penerima'); ?>" maxlength="10" required>
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Berikutnya" class="btn btn-info">
              </div>
              <?php echo form_close(); ?>
          </div>
        </div>
      </div>

      <?php } elseif ($show->status = 'Undangan Terkirim') { ?>
      <div class="container-fluid">
          <a href="#" onclick="history.go(-1)" class="btn btn-success">Kembali</a>
          <div class="row-fluid">
            <div class="span12">
              <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                  <h5>Error 404</h5>
                </div>
                <div class="widget-content">
                  <div class="error_ex">
                    <h1>404</h1>
                    <p>Undangan untuk acara ini telah terkirim.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>
</div>
