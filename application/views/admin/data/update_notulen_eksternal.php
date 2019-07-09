<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <div id="breadcrumb"> <a href="<?php echo base_url('admin') ?>" title="Ke Dashboard" class="tip-bottom">
    <i class="icon-home"></i> Dashboard</a> <a href="<?php echo base_url('admin/list_notulen') ?>"> List Data Notulen</a> <a href="#" class="current">Detail Notulen</a> </div> 
    </div>
    <h1>Edit Notulen Eksternal</h1>
  </div>
  <div class="container-fluid">
  <hr>
    <a href="#" class="btn btn-success" onclick="history.go(-1)">Kembali</a>
    <div class="row-fluid">
      <div class="span12">
      <?php 
        echo validation_errors(
          '<div class="alert alert-danger"><button class="close" data-dismiss="alert">×</button>','</div>');
      ?>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Form Edit Notulen Eksternal</h5>
          </div>
          <div class="widget-content nopadding">
            <?php echo form_open(base_url('admin/edit_notEks/'.$show->id), array('class' => 'form-horizontal')) ?>
                <input type="hidden" name="id" value="<?php echo $show->id ?>">
                <div class="control-group">
                  <label class="control-label">Notulen:</label>
                  <div class="controls">
                    <textarea name="notulen" rows="5" class="span6" required><?php echo $show->notulen ?></textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Tujuan</label>
                  <div class="controls">
                    <input type="text" name="tujuan" value="<?php echo $show->tujuan ?>" required />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Pic:</label>
                  <div class="controls">
                    <input type="text" name="pic" value="<?php echo $show->pic ?>" required />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Due Date:</label>
                  <div class="controls">
                    <input type="date" class="span3" name="due_date" value="<?php echo $show->due_date ?>" required />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Status:</label>
                  <div class="controls">
                    <select name="status" class="span3">
                      <option value="Running" <?php if($show->status_not == 'Running') { echo 'selected'; } ?>>Running</option>
                      <option value="Canceled" <?php if($show->status_not == 'Canceled') { echo 'selected'; } ?>>Canceled</option>
                      <option value="Done" <?php if($show->status_not == 'Done') { echo 'selected'; } ?>>Done</option>
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Keterangan:</label>
                  <div class="controls">
                    <textarea name="keterangan" rows="5" class="span6" required><?php echo $show->keterangan ?></textarea>
                  </div>
                </div>
              <div class="form-actions">
                <input class="btn btn-primary" type="submit" value="Update" />
                <input class="btn btn-default" type="reset" value="Reset" />
              </div>
              <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

