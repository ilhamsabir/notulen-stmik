<div id="content">
<div id="content-header">
  <div id="breadcrumb"> 
    <a href="<?php echo base_url() ?>notulis" title="Ke Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> <a href="#" class="current">List Data Notulen</a> 
  </div>
  <h1>List Data Notulen</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <?php 
      //Cetak Notif
      if($this->session->flashdata('berhasil'))
      {
        echo '<div class="alert alert-info">';
        echo '<button class="close" data-dismiss="alert">×</button>';
        echo $this->session->flashdata('berhasil');
        echo '</div>';
      }
    ?>
  <a class="btn btn-primary" href="<?php echo base_url() ?>notulis/acara_internal">
  Data Acara Internal</a> <a class="btn btn-primary" href="<?php echo base_url() ?>notulis/acara_eksternal">
  Data Acara Eksternal</a>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <h5>List Data Notulen (Dibuat Oleh Anda)</h5>
        </div>
        <div class="widget-content nopadding">
          <div style="overflow-x: auto;">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Jenis</th>
                  <th>Pengaju Acara</th>
                  <th>Tanggal Rapat</th>
                  <th>Tempat Rapat</th>
                  <th>Pukul</th>
                  <th>Detail</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach ($list as $show): ?>
                <tr class="gradeX">
                  <td><?php echo $no ?></td>
                  <td><?php echo $show->jenis ?></td>
                  <td><?php echo $show->pengaju ?></td>
                  <td><?php echo TanggalIndo($show->tanggal); ?></td>
                  <td><?php echo $show->tempat ?></td>
                  <td><?php echo $show->pukul ?> - Selesai</td>
                  <td>
                    <a class="btn btn-default" href="<?php echo base_url('notulis/detail_notulen/'.$show->kode) ?>" title="Lihat Detail"><i class="icon-eye-open"></i></a> 
                  </td>
                  <td>
                    <?php if($show->jenis != 'Eksternal') { ?>
                    <a class="btn btn-success" href="<?php echo base_url('notulis/update_notulen/'.$show->kode) ?>" title="Edit"><i class="icon-edit"></i></a> 
                    <?php } ?>
                    <?php include 'delete_notulen.php' ?>
                  </td>
                  <?php $no++; endforeach; ?>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <h5>List Data Notulen (Acara Anda Ikuti)</h5>
        </div>
        <div class="widget-content nopadding">
          <div style="overflow-x: auto;">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Jenis</th>
                  <th>Pengaju Acara</th>
                  <th>Tanggal Rapat</th>
                  <th>Tempat Rapat</th>
                  <th>Pukul</th>
                  <th>Detail</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach ($notulen_ikut as $show): ?>
                <tr class="gradeX">
                  <td><?php echo $no ?></td>
                  <td><?php echo $show->jenis ?></td>
                  <td><?php echo $show->pengaju ?></td>
                  <td><?php echo TanggalIndo($show->tanggal); ?></td>
                  <td><?php echo $show->tempat ?></td>
                  <td><?php echo $show->pukul ?> - Selesai</td>
                  <td>
                    <a class="btn btn-default" href="<?php if($show->jenis == 'Internal') { echo base_url('notulis/detail_notulen/'.$show->kode); } elseif($show->jenis == 'Eksternal') { echo base_url('notulis/detail_notulenEksternal/'.$show->kode); } ?>" title="Lihat Detail"><i class="icon-eye-open"></i></a> 
                  </td>
                  <td>
                    <?php if ($show->id_notulis == $this->session->userdata('id')) {?>
                      <?php if($show->jenis != 'Eksternal') { ?>
                    <a class="btn btn-success" href="<?php echo base_url('notulis/update_notulen/'.$show->kode) ?>" title="Edit"><i class="icon-edit"></i></a> 
                      <?php } ?>
                    <?php include 'delete_notulen.php'; } ?>
                  </td>
                  <?php $no++; endforeach; ?>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <h5>List Data Notulen (Keseluruhan)</h5>
        </div>
        <div class="widget-content nopadding">
          <div style="overflow-x: auto;">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Jenis</th>
                  <th>Pengaju Acara</th>
                  <th>Tanggal Rapat</th>
                  <th>Tempat Rapat</th>
                  <th>Pukul</th>
                  <th>Detail</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach ($notulen_all as $show): ?>
                <tr class="gradeX">
                  <td><?php echo $no ?></td>
                  <td><?php echo $show->jenis ?></td>
                  <td><?php echo $show->pengaju ?></td>
                  <td><?php echo TanggalIndo($show->tanggal); ?></td>
                  <td><?php echo $show->tempat ?></td>
                  <td><?php echo $show->pukul ?> - Selesai</td>
                  <td>
                    <a class="btn btn-default" href="<?php if($show->jenis == 'Internal') { echo base_url('notulis/detail_notulen/'.$show->kode); } elseif($show->jenis == 'Eksternal') { echo base_url('notulis/detail_notulenEksternal/'.$show->kode); } ?>" title="Lihat Detail"><i class="icon-eye-open"></i></a> 
                  </td>
                  <td>
                    <?php if ($show->id_notulis == $this->session->userdata('id')) {?>
                      <?php if($show->jenis != 'Eksternal') { ?>
                    <a class="btn btn-success" href="<?php echo base_url('notulis/update_notulen/'.$show->kode) ?>" title="Edit"><i class="icon-edit"></i></a>
                      <?php } ?>
                    <?php include 'delete_notulen.php'; } ?>
                  </td>
                  <?php $no++; endforeach; ?>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
