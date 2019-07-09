<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
    </div>
    <h1>Catat Notulen</h1>
  </div>
  <div class="container-fluid">
  <hr>
    <div class="row-fluid">
      <div class="span12">
      <?php 
        echo validation_errors(
          '<div class="alert alert-danger"><button class="close" data-dismiss="alert">×</button>','</div>');
      ?>
      <?php if(date($show->tanggal) < date('Y-m-d')) { ?>
      <div class="alert alert-error alert-block">
              <h4 class="alert-heading">Peringatan</h4>
              Acara rapat ini baru akan dimulai pada tanggal <strong><?php echo TanggalIndo($show->tanggal) ?></strong> pada pukul <?php echo $show->pukul ?> WIB. Jika peringatan ini muncul, maka acara rapat belum dimulai atau sudah kadaluarsa. Silahkan buat notulen pada tanggal yang tertera.
      </div>
      <?php } elseif (date('Y-m-d') > date($show->tanggal_deadline)) { ?>
      <div class="alert alert-error alert-block">
              <h4 class="alert-heading">Peringatan</h4>
              Batas pencatatan notulen telah habis, yaitu pada tanggal <strong><?php echo TanggalIndo($show->tanggal_deadline) ?></strong>
      </div>
      <?php } if ($show->status == 'Undangan Terkirim' || $show->status == 'Sedang Berlangsung') { ?>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Form Pencatatan</h5>
          </div>
          <div class="widget-content nopadding">
            <?php echo form_open_multipart(base_url('notulis/create_notulenEks/'.$show->kode), array('class' => 'form-horizontal')) ?>
                <input type="hidden" name="kode" value="<?php echo $kodeauto ?>">
                <input type="hidden" name="kode_acara" value="<?php echo $show->kode ?>">
                <div class="control-group">
                <label class="control-label">Pengaju Acara:</label>
                <div class="controls">
                  <input type="text" name="pengaju" class="span6" value="<?php echo $show->pengaju ?>" readonly>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Tempat:</label>
                <div class="controls">
                  <textarea name="tempat" rows="5" class="span6" readonly><?php echo $show->tempat ?></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Tanggal:</label>
                <div class="controls">
                  <input type="text" name="tanggal" class="span3" value="<?php echo TanggalIndo($show->tanggal) ?>" readonly> ▬ 
                  <input type="text" name="tanggal_selesai" class="span3" value="<?php echo TanggalIndo($show->tanggal_selesai) ?>" readonly>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Pukul:</label>
                <div class="controls">
                  <input type="text" name="pukul" class="span3" value="<?php echo $show->pukul ?> - Selesai" readonly>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Nama Lengkap Anda:</label>
                <div class="controls">
                  <input type="text" name="nama" class="span6" value="<?php echo set_value('nama'); ?>" required>
                </div>
              </div>
                <div class="control-group">
                  <label class="control-label">Notulen:</label>
                  <div class="controls">
                    <textarea name="notulen" rows="5" class="span6" value="<?php echo set_value('notulen'); ?>" required></textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Tujuan</label>
                  <div class="controls">
                    <textarea name="tujuan" rows="5" class="span6" value="<?php echo set_value('tujuan'); ?>" required></textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Pic:</label>
                  <div class="controls">
                    <input type="text" class="span6" name="pic" value="<?php echo set_value('pic'); ?>" required />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Due Date:</label>
                  <div class="controls">
                    <input type="date" class="span3" name="due_date" value="<?php echo date('Y-m-d', strtotime($show->tanggal_selesai.' + 7 days')) ?>" readonly />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Status:</label>
                  <div class="controls">
                    <label>
                      <input type="radio" name="status" value="Running" />
                      Running</label>
                    <label>
                      <input type="radio" name="status" value="Canceled" />
                      Canceled</label>
                    <label>
                      <input type="radio" name="status" value="Done" />
                      Done</label>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Keterangan:</label>
                  <div class="controls">
                    <textarea name="keterangan" rows="5" class="span6" value="<?php echo set_value('keterangan'); ?>" required></textarea>
                  </div>
                </div>
              <div class="control-group">
              <label class="control-label">Gambar:</label>
                <div class="controls">
                  <input type="file" name="gambar[]" multiple="multiple" />
                  <span class="help-block blue">Maks. 2MB/File</span>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Peserta Yang Hadir:</label>
                <div class="controls">
                  <?php foreach ($invited as $show): ?>
                    <label>
                    <input type="checkbox" name="kehadiran[]" value="<?php echo $show->email_peserta ?>" />
                    <?php echo $show->email_peserta ?></label>
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="form-actions">
                <input class="btn btn-primary" type="submit" value="Simpan" />
                <input class="btn btn-default" type="reset" value="Reset" />
              </div>
              <?php echo form_close(); ?>
          </div>
        </div>
        <?php } elseif ($show->status == 'Notulen Dibuat') { ?>
          <div class="container-fluid">
            <div class="row-fluid">
              <div class="span12">
                <div class="widget-box">
                  <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Error 404</h5>
                  </div>
                  <div class="widget-content">
                    <div class="error_ex">
                      <h1>404</h1>
                      <p>Notulen untuk acara terkait sudah dicatat.</p>
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
</div>

