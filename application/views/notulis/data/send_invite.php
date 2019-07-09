<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url('notulis') ?>" title="Ke Dashboard" class="tip-bottom">
    <i class="icon-home"></i> Dashboard</a> <a href="<?php if($show->jenis == 'Internal'){ echo base_url('notulis/acara_internal'); } elseif($show->jenis == 'Eksternal') { echo base_url('notulis/acara_eksternal'); } ?>"> List Data Acara</a> <a href="#" class="current">Kirim Undangan Acara</a> </div>
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

      <?php if($show->status == '' && $show->jenis == 'Internal') { ?>
      <a href="#" onclick="history.go(-1)" class="btn btn-success">Kembali</a>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
          </div>
          <div class="widget-content nopadding">
            <?php echo form_open_multipart(base_url('notulis/send_invite/'.$show->kode), array('class' => 'form-horizontal')) ?>
            <input type="hidden" name="kode_acara" value="<?php echo $show->kode ?>">
            <div class="control-group">
                <label class="control-label">Pengaju Acara:</label>
                <div class="controls">
                  <input type="text" name="pengaju" class="span5" value="<?php echo $show->pengaju ?>" readonly>
                </div>
              </div>
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
                <label class="control-label">Bagian Umum:</label>
                <div class="controls">
                  <?php foreach ($umum as $show): ?>
                    <label>
                    <input type="checkbox" name="undangan[]" value="<?php echo $show->email ?>" />
                    <?php echo $show->nama ?> (<?php echo $show->email ?>)<br><br>
                    <?php if($show->foto != '') { ?>
                    <img src="<?php echo base_url().'assets/img/foto/'.$show->foto ?>" width="7%" height="7%">
                    <?php } elseif($show->foto == '') { ?>
                    <img src="<?php echo base_url().'assets/img/belum_upload.jpg' ?>" width="7%" height="7%">
                    <?php } ?></label><br><br>
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Bagian Akademik:</label>
                <div class="controls">
                  <?php foreach ($akademik as $show): ?>
                   <label>
                    <input type="checkbox" name="undangan[]" value="<?php echo $show->email ?>" />
                    <?php echo $show->nama ?> (<?php echo $show->email ?>)<br><br>
                    <?php if($show->foto != '') { ?>
                    <img src="<?php echo base_url().'assets/img/foto/'.$show->foto ?>" width="7%" height="7%">
                    <?php } elseif($show->foto == '') { ?>
                    <img src="<?php echo base_url().'assets/img/belum_upload.jpg' ?>" width="7%" height="7%">
                    <?php } ?></label><br><br>
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Dosen:</label>
                <div class="controls">
                  <?php foreach ($dosen as $show): ?>
                   <label>
                    <input type="checkbox" name="undangan[]" value="<?php echo $show->email ?>" />
                    <?php echo $show->nama ?> (<?php echo $show->email ?>)<br><br>
                    <?php if($show->foto != '') { ?>
                    <img src="<?php echo base_url().'assets/img/foto/'.$show->foto ?>" width="7%" height="7%">
                    <?php } elseif($show->foto == '') { ?>
                    <img src="<?php echo base_url().'assets/img/belum_upload.jpg' ?>" width="7%" height="7%">
                    <?php } ?></label><br><br>
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Bagian BEM:</label>
                <div class="controls">
                  <?php foreach ($bem as $show): ?>
                    <label>
                    <input type="checkbox" name="undangan[]" value="<?php echo $show->email ?>" />
                    <?php echo $show->nama ?> (<?php echo $show->email ?>)<br><br>
                    <?php if($show->foto != '') { ?>
                    <img src="<?php echo base_url().'assets/img/foto/'.$show->foto ?>" width="7%" height="7%">
                    <?php } elseif($show->foto == '') { ?>
                    <img src="<?php echo base_url().'assets/img/belum_upload.jpg' ?>" width="7%" height="7%">
                    <?php } ?></label><br><br>
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="control-group">
              <label class="control-label">File Pendukung:</label>
                <div class="controls">
                  <input type="file" name="berkas[]" multiple="multiple" />
                  <span class="help-block blue">PDF/DOC/DOCX/XLSX/PPT/JPG/PNG/MP4 2MB Maks</span>
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Kirim" class="btn btn-info">
              </div>
              <?php echo form_close(); ?>
          </div>
        </div>
      </div>

      <?php } elseif ($show->status == '' && $show->jenis == 'Eksternal') { ?>
      <a href="#" onclick="history.go(-1)" class="btn btn-success">Kembali</a>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
          </div>
          <div class="widget-content nopadding">
            <?php echo form_open_multipart(base_url('notulis/invite_eks/'.$show->kode), array('class' => 'form-horizontal')) ?>
            <input type="hidden" name="kode_acara" value="<?php echo $show->kode ?>">
            <div class="control-group">
                <label class="control-label">Pengaju Acara:</label>
                <div class="controls">
                  <input type="text" name="pengaju" class="span5" value="<?php echo $show->pengaju ?>" readonly>
                </div>
              </div>
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
              <?php for($i = 1; $i <= $emails; $i++) { ?>
              <div class="control-group">
                <label class="control-label">Penerima Undangan Ke-<?php echo $i; ?>:</label>
                <div class="controls">
                  Nama: <input type="text" name="nama[]" class="span3" required> 
                  Jabatan: <input type="text" name="jabatan[]" class="span3" required> 
                  Email: <input type="text" name="undangan[]" class="span3" required>
                </div>
              </div>
              <?php } ?>
              <div class="control-group">
              <label class="control-label">File Pendukung:</label>
                <div class="controls">
                  <input type="file" name="berkas[]" multiple="multiple" />
                  <span class="help-block blue">PDF/DOC/DOCX/XLSX/PPT/JPG/PNG/MP4 2MB Maks</span>
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Kirim" class="btn btn-info">
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
