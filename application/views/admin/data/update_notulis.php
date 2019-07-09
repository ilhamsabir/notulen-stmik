<!-- Edit Notulis -->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url('admin') ?>" title="Ke Dashboard" class="tip-bottom">
    <i class="icon-home"></i> Dashboard</a> <a href="<?php echo base_url('admin/list_notulis') ?>"> List Data Dosen/Karyawan</a> <a href="#" class="current">Edit Data Dosen/Karyawan</a> </div>
    <h1>Edit Data Dosen/Karyawan</h1>
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
            <h5>Form Edit</h5>
          </div>
          <div class="widget-content nopadding">
            <?php echo form_open_multipart(base_url('admin/update_notulis/'.$show->id), array('class' => 'form-horizontal')) ?>
            <input type="hidden" name="id" value="<?php echo $show->id ?>">
              <div class="control-group">
                <label class="control-label">Nama:</label>
                <div class="controls">
                  <input type="text" name="nama" class="span5" value="<?php echo $show->nama ?>" maxlength="50">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Alamat:</label>
                <div class="controls">
                  <textarea name="alamat" rows="5" class="span5"><?php echo $show->alamat ?></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Nomor Telpon:</label>
                <div class="controls">
                  <input type="text" name="no_telp" class="span5" value="<?php echo $show->no_telp ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  maxlength="15">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Email:</label>
                <div class="controls">
                  <input type="text" name="email" class="span5" value="<?php echo $show->email ?>" maxlength="50">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Password Baru:</label>
                <div class="controls">
                  <input type="password" name="password" class="span5" maxlength="50">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Bagian :</label>
                <div class="controls">
                    <select name="role" class="span3">
                      <option value="General" <?php if(($show->role)=='Admin'){ echo 'selected'; } ?>>Admin</option>
                      <option value="General" <?php if(($show->role)=='General'){ echo 'selected'; } ?>>General</option>
                      <option value="Akademik" <?php if(($show->role)=='Akademik'){ echo 'selected'; } ?>>Akademik</option>
                      <option value="BEM" <?php if(($show->role)=='BEM'){ echo 'selected'; } ?>>BEM</option>
                      <option value="Dosen" <?php if(($show->role)=='Dosen'){ echo 'selected'; } ?>>Dosen</option>
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
<!-- Edit Notulis -->
