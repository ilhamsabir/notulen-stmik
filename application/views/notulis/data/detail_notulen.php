<!-- Detail Notulen -->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url('notulis') ?>" title="Ke Dashboard" class="tip-bottom">
    <i class="icon-home"></i> Dashboard</a> <a href="<?php echo base_url('notulis/list_notulen') ?>"> List Data Notulen</a> <a href="#" class="current">Detail Notulen</a> </div>
    <h1>Detail Notulen</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <a href="#" class="btn btn-success" onclick="history.go(-1)">Kembali</a>
    <div class="row-fluid">
      <div class="span6">
        <div class="accordion" id="collapse-group">
        <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse"> <span class="icon"><i class="icon-circle-arrow-right"></i></span>
                <h5>Data Notulen</h5>
                </a> </div>
            </div>
            <div class="collapse in accordion-body" id="collapseGOne">
              <div class="widget-content nopadding">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Field</th>
                      <th>Data</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><b>Jenis Acara</b></td>
                      <td>: <?php echo $show->jenis ?></td>
                    </tr>
                    <tr>
                      <td><b>Pembuat Acara</b></td>
                      <td>: <?php echo $get_eventmaker->nama ?></td>
                    </tr>
                    <tr>
                      <td><b><?php if ($show->jenis == 'Internal') { echo 'Pengaju Acara'; } elseif  ($show->jenis == 'Eksternal') { echo 'Pengundang';  } ?></b></td>
                      <td>: <?php echo $show->pengaju ?></td>
                    </tr>
                    <?php if ($show->jenis == 'Internal') { ?>
                    <tr>
                      <td><b>Pemimpin Acara</b></td>
                      <td>: <?php echo $show->pemimpin ?></td>
                    </tr>
                    <?php } elseif ($show->jenis == 'Eksternal') { ?>
                    <tr>
                      <td><b>Penanggung Jawab Acara</b></td>
                      <td>: <?php echo $show->penanggung_jawab ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                      <td><b>Nama Notulis</b></td>
                      <td>: <?php echo $show->nama_notulis ?></td>
                    </tr>
                    <tr>
                      <td><b>Tempat</b></td>
                      <td>: <?php echo $show->tempat ?></td>
                    </tr>
                    <tr>
                      <td><b>Tanggal<?php if ($show->jenis == 'Eksternal') { echo ' Mulai'; } ?></b></td>
                      <td>: <?php echo TanggalIndo($show->tanggal) ?></td>
                    </tr>
                    <?php if ($show->jenis == 'Eksternal') { ?>
                    <tr>
                      <td><b>Tanggal Selesai</b></td>
                      <td>: <?php echo TanggalIndo($show->tanggal_selesai) ?></td>
                    </tr>
                    <tr>
                      <td><b>Batas Catat Notulen</b></td>
                      <td>: <?php echo TanggalIndo($show->tanggal_deadline) ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                      <td><b>Pukul</b></td>
                      <td>: <?php echo $show->pukul.' - Selesai' ?></td>
                    </tr>
                    <tr>
                      <td><b>Peserta Diundang</b></td>
                      <td>
                        <ol>
                        <?php foreach ($diundang as $show): ?>
                            <li><?php echo $show->nama ?></li>
                        <?php endforeach; ?>
                        </ol>
                      </td>
                    </tr>
                    <tr>
                      <td><b>Peserta Hadir</b></td>
                      <td>
                        <ol>
                        <?php foreach ($kehadiran as $show): ?>
                            <li><?php echo $show->nama ?></li>
                        <?php endforeach; ?>
                        </ol>
                      </td>
                    </tr>
                    <tr>
                      <td><b>Tanggal Dibuat Notulen</b></td>
                      <td>: <?php echo TanggalIndo($get_acara->tanggal_buat) ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
    </div>
      <div class="span6">
        <div class="widget-box collapsible">
          <div class="widget-title"> <a href="#collapseOne" data-toggle="collapse"> <span class="icon"><i class="icon-book"></i></span>
            <h5>Acara</h5>
            </a> </div>
          <div class="collapse in" id="collapseOne">
            <div class="widget-content"><?php echo $get_acara->acara ?></div>
          </div>
          <div class="widget-title"> <a href="#collapseTwo" data-toggle="collapse"> <span class="icon"><i class="icon-briefcase"></i></span>
            <h5>Isi Rapat</h5>
            </a> </div>
          <div class="collapse" id="collapseTwo">
            <div class="widget-content"> 
              <?php echo $get_acara->isi ?>
            </div>
          </div>
          <div class="widget-title"> <a href="#collapseThree" data-toggle="collapse"> <span class="icon"><i class="icon-picture"></i></span>
            <h5>Dokumentasi</h5>
            </a> </div>
          <div class="collapse" id="collapseThree">
            <div class="widget-content"> 
              <ul class="thumbnails">
                <?php foreach ($images as $show): ?>
                  <li class="span4"> <img src="<?php echo base_url().'assets/img/dokumentasi/'.$show->gambar ?>"> 
                  </li>
                <?php endforeach; ?>
              </ul> 
            </div>
          </div>
        </div>
        <a href="<?php echo base_url('report/notulen_notulis/'.$show->kode_acara) ?>" class="btn btn-danger btn-large" title="Download PDF"><i class="icon-file"></i></a>
        <div class="pull-right">
          <a href="<?php echo base_url('notulis/send_notulen/'.$show->kode_acara) ?>" class="btn btn-warning btn-large" title="Kirim Notulen"><i class="icon-envelope"></i></a>
        </div>
      </div>
  </div>
</div>
<!-- Close Detail Notulen -->
