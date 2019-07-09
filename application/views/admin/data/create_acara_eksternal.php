<!-- Create Acara -->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url('admin') ?>" title="Ke Dashboard" class="tip-bottom">
    <i class="icon-home"></i> Dashboard</a> <a href="<?php echo base_url('admin/acara_eksternal') ?>"> List Data Acara Eksternal</a> <a href="#" class="current">Tambah Data Acara</a> </div>
    <h1>Tambah Data Acara Eksternal</h1>
  </div>
  <div class="container-fluid">
  <hr>
    <div class="row-fluid">
      <div class="span12">
      <?php 
        echo validation_errors(
          '<div class="alert alert-danger"><button class="close" data-dismiss="alert">×</button>','</div>');
      ?>
      <a href="<?php echo base_url('admin/acara_eksternal') ?>" class="btn btn-success">Kembali</a>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Form Tambah</h5>
          </div>
          <div class="widget-content nopadding">
            <?php echo form_open(base_url('admin/create_acaraEks'), array('class' => 'form-horizontal')) ?>
              <input type="hidden" name="kode" value="<?php echo $kodeauto ?>">
              <input type="hidden" name="id_pembuat" value="<?php echo $this->session->userdata('id'); ?>">
              <div class="control-group">
                <label class="control-label">Nomor Surat:</label>
                <div class="controls">
                  <input type="text" name="nomor_surat" class="span5" value="<?php echo set_value('nomor_surat'); ?>" maxlength="50">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Pengundang:</label>
                <div class="controls">
                  <input type="text" name="pengaju" class="span5" value="<?php echo set_value('pengaju'); ?>" maxlength="50">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Penanggung Jawab:</label>
                <div class="controls">
                  <input type="text" name="penanggung_jawab" class="span5" value="<?php echo set_value('penanggung_jawab'); ?>" maxlength="50">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Tempat:</label>
                <div class="controls">
                  <textarea name="tempat" rows="5" class="span5"><?php echo set_value('tempat'); ?></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Tanggal:</label>
                <div class="controls">
                  <input type="date" name="tanggal" class="span3" value="<?php echo set_value('tanggal'); ?>"> ▬ 
                  <input type="date" name="tanggal_selesai" class="span3" value="<?php echo set_value('tanggal_selesai'); ?>">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Pukul:</label>
                <div class="controls">
                  <input type="time" name="pukul" class="span3" value="<?php echo set_value('pukul'); ?>"> ▬ 
                  <input type="text" value="Selesai" class="span3" readonly>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Acara:</label>
                <div class="controls">
                  <textarea name="acara" id="textarea" class="span7" rows="6"><?php echo set_value('acara'); ?></textarea>
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Simpan" class="btn btn-info">
                <input type="reset" value="Reset" class="btn btn-default">
              </div>
              <?php echo form_close(); ?>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- Create Acara -->
