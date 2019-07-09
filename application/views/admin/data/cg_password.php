<!-- Edit Notulis -->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url('admin') ?>" title="Ke Dashboard" class="tip-bottom">
    <i class="icon-home"></i> Dashboard</a> <a href="#" class="current">Edit Password</a> </div>
    <h1>Edit Password</h1>
  </div>
  <div class="container-fluid">
  <hr>
    <div class="row-fluid">
      <div class="span12">
      <?php 
        echo validation_errors(
          '<div class="alert alert-danger"><button class="close" data-dismiss="alert">×</button>','</div>');
      ?>
      <a href="<?php echo base_url('admin') ?>" class="btn btn-success">Ke Dashboard</a>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Form Edit</h5>
          </div>
          <div class="widget-content nopadding">
            <?php echo form_open(base_url('admin/cg_password/'.$show->id), array('class' => 'form-horizontal')) ?>
            <input type="hidden" name="id" value="<?php echo $show->id ?>">
              <div class="control-group">
                <label class="control-label">Password Baru:</label>
                <div class="controls">
                  <input type="password" name="password" class="span5" maxlength="30">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Konfirmasi Password:</label>
                <div class="controls">
                  <input type="password" name="passconf" class="span5" maxlength="30">
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
