<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url('admin') ?>" title="Ke Dashboard" class="tip-bottom">
    <i class="icon-home"></i> Dashboard</a> <a href="<?php echo base_url('admin/list_notulen') ?>"> List Data Notulen</a> <a href="#" class="current">Edit Data Notulen</a> </div>
    <h1>Edit Data Notulen</h1>
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
            <h5>Form Edit</h5>
          </div>
          <div class="widget-content nopadding">
            <?php echo form_open_multipart(base_url('admin/update_notulen/'.$show->kode), array('class' => 'form-horizontal')) ?>
              <div class="control-group">
                <input type="hidden" name="kode"  value="<?php echo $show->kode ?>">
              <div class="control-group">
                <label class="control-label">Isi Rapat:</label>
                <div class="controls">
                  <textarea name="isi" id="textarea" rows="15"><?php echo $show->isi ?></textarea>
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Update" class="btn btn-info">
                <input type="reset" value="Reset" class="btn btn-default">
              </div>
              <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
