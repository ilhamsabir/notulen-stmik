<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url('admin') ?>" title="Ke Dashboard" class="tip-bottom">
    <i class="icon-home"></i> Dashboard</a> <a href="<?php echo base_url('admin/list_acara') ?>"> List Data Acara</a> <a href="#" class="current">Tambah Data Notulen</a> </div>
    <h1>Tambah Data Notulen</h1>
  </div>
  <div class="container-fluid">
  <hr>
    <div class="row-fluid">
      <div class="span12">
      <?php 
        echo validation_errors(
          '<div class="alert alert-danger"><button class="close" data-dismiss="alert">×</button>','</div>');
      ?>
      <?php if($show->tanggal != date('Y-m-d')) { ?>
      <div class="alert alert-error alert-block">
              <h4 class="alert-heading">Peringatan</h4>
              Acara rapat ini baru akan dimulai pada tanggal <strong><?php echo TanggalIndo($show->tanggal) ?></strong> pada pukul <?php echo $show->pukul ?> WIB. Jika peringatan ini muncul, maka acara rapat belum dimulai atau sudah kadaluarsa. Silahkan buat notula pada tanggal yang tertera.</div>
      <a href="#" onclick="history.go(-1)" class="btn btn-success">Kembali</a>
      <?php } elseif($show->status == 'Undangan Terkirim' || $show->status == 'Sedang Berlangsung') { ?>
      <a href="#" onclick="history.go(-1)" class="btn btn-success">Kembali</a>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Form Tambah</h5>
          </div>
          <div class="widget-content nopadding">
            <?php echo form_open_multipart(base_url('admin/create_notulen/'.$show->kode), array('class' => 'form-horizontal')) ?>
            <input type="hidden" name="kode"  value="<?php echo $kodeauto ?>">
            <input type="hidden" name="kode_acara" value="<?php echo $show->kode ?>">
            <input type="hidden" name="id_notulis" value="<?php echo $this->session->userdata('id'); ?>">
            <input type="hidden" name="nama_notulis"  value="<?php echo $this->session->userdata('nama'); ?>">
              <div class="control-group">
                <label class="control-label">Pengaju Acara:</label>
                <div class="controls">
                  <input type="text" name="pengaju" class="span5" value="<?php echo $show->pengaju ?>" readonly>
                </div>
              </div>
              <?php if ($show->jenis == 'Internal') { ?>
              <div class="control-group">
                <label class="control-label">Pemimpin Acara:</label>
                <div class="controls">
                  <input type="text" name="pemimpin" class="span5" value="<?php echo $show->pemimpin ?>" readonly>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Notulis Terpilih:</label>
                <div class="controls">
                  <input type="text" name="notulis" class="span5" value="<?php echo $get_notulis->nama ?>" readonly>
                </div>
              </div>
              <?php } ?>
              <div class="control-group">
                <label class="control-label">Tempat:</label>
                <div class="controls">
                  <textarea name="tempat" rows="5" class="span5" readonly><?php echo $show->tempat ?></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Tanggal:</label>
                <div class="controls">
                  <input type="text" name="tanggal" class="span5" value="<?php echo TanggalIndo($show->tanggal) ?>" readonly>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Pukul:</label>
                <div class="controls">
                  <input type="text" name="pukul" class="span3" value="<?php echo $show->pukul ?> - Selesai" readonly>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Isi Rapat:</label>
                <div class="controls">
                  <textarea name="isi" id="textarea" rows="15"><?php echo set_value('isi'); ?></textarea>
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
                    <input type="checkbox" name="kehadiran[]" value="<?php echo $show->email ?>" />
                    <?php echo $show->nama ?></label>
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Simpan" class="btn btn-info">
                <input type="reset" value="Reset" class="btn btn-default">
              </div>
              <?php echo form_close(); ?>
          </div>
        </div>
        <?php } elseif ($show->status == 'Notulen Dibuat') { ?>
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

