<!-- Create Notulis -->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url('admin') ?>" title="Ke Dashboard" class="tip-bottom">
    <i class="icon-home"></i> Dashboard</a> <a href="<?php echo base_url('admin/list_notulis') ?>"> List Data Dosen/Karyawan</a> <a href="#" class="current">Tambah Data Dosen/Karyawan</a> </div>
    <h1>Tambah Data Dosen/Karyawan</h1>
  </div>
  <div class="container-fluid">
  <hr>
    <div class="row-fluid">
      <div class="span12">
      <?php 
        echo validation_errors(
          '<div class="alert alert-danger"><button class="close" data-dismiss="alert">×</button>','</div>');
      ?>
      <a href="<?php echo base_url('admin/list_notulis') ?>" class="btn btn-success">Kembali</a>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Form Tambah</h5>
          </div>
          <div class="widget-content nopadding">
            <?php echo form_open_multipart(base_url('admin/create_notulis'), array('class' => 'form-horizontal')) ?>
              <div class="control-group">
                <label class="control-label">Nama:</label>
                <div class="controls">
                  <input type="text" name="nama" class="span5" value="<?php echo set_value('nama'); ?>" maxlength="50">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Alamat:</label>
                <div class="controls">
                  <textarea name="alamat" rows="5" class="span5"><?php echo set_value('alamat'); ?></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Nomor Telpon:</label>
                <div class="controls">
                  <input type="text" value="+62" class="span1" readonly> ▬ 
                  <input type="text" name="no_telp" class="span4" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  value="<?php echo set_value('no_telp'); ?>"maxlength="11">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Email:</label>
                <div class="controls">
                  <input type="text" name="email" class="span5" value="<?php echo set_value('email'); ?>" maxlength="50">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Password:</label>
                <div class="controls">
                  <input type="password" name="password" class="span5" maxlength="50">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Bagian:</label>
                <div class="controls">
                    <select name="role" class="span3">
                      <option value="Admin">Admin</option>
                      <option value="General">General</option>
                      <option value="Akademik">Akademik</option>
                      <option value="BEM">BEM</option>
                      <option value="Dosen">Dosen</option>
                    </select>
                </div>
              </div>
              <div class="control-group">
              <label class="control-label">Foto:</label>
                <div class="controls">
                  <input type="file" name="foto">
                  <span class="help-block blue">Maks. 2MB</span>
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
<!-- Create Notulis -->
