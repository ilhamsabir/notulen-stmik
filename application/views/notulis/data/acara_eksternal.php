<div id="content">
<div id="content-header">
  <div id="breadcrumb"> 
    <a href="<?php echo base_url() ?>notulis" title="Ke Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> <a href="#" class="current">List Data Acara Eksternal</a> 
  </div>
  <h1>Data Acara Eksternal</h1>
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
  <?php if ($this->session->userdata('role') != 'Dosen') { ?>
  <a class="btn btn-info" href="<?php echo base_url() ?>notulis/create_acaraEks">
  <i class="icon-plus"></i> Tambah Data</a>
  <?php } ?>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <h5>Data Acara Eksternal (Dibuat Oleh Anda)</h5>
        </div>
        <div class="widget-content nopadding">
          <div style="overflow-x: auto;">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Pengundang</th>
                  <th>Tempat</th>
                  <th>Tanggal</th>
                  <th>Pukul</th>
                  <th>Status</th>
                  <?php if ($this->session->userdata('role') != 'Dosen') { ?>
                  <th>Detail</th>
                  <th>Aksi</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach ($list_eksternal as $show): ?>
                <tr class="gradeX">
                  <td><?php echo $no ?></td>
                  <td><?php echo $show->pengaju ?></td>
                  <td><?php echo $show->tempat ?></td>
                  <td><?php echo TanggalIndo($show->tanggal); ?></td>
                  <td><?php echo $show->pukul ?> - Selesai</td>
                  <td><?php if(($show->status)==''){ echo 'Baru Direncanakan'; } else { echo $show->status; } ?></td>
                  <?php if ($this->session->userdata('role') != 'Dosen') { ?>
                  <td>
                    <a class="btn btn-default" href="<?php echo base_url('notulis/detail_acara/'.$show->kode) ?>" title="Lihat Detail"><i class="icon-eye-open"></i></a> 
                  </td>
                  <td>
                    <a class="btn btn-success" href="<?php echo base_url('notulis/update_acaraEks/'.$show->kode) ?>" title="Edit"><i class="icon-edit"></i></a> 
                    <?php include 'delete_acara.php' ?>
                  </td>
                  <?php } ?>
                  <?php $no++; endforeach; ?>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <h5>Data Acara Eksternal (Keseluruhan)</h5>
        </div>
        <div class="widget-content nopadding">
          <div style="overflow-x: auto;">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Pengundang</th>
                  <th>Tempat</th>
                  <th>Tanggal</th>
                  <th>Pukul</th>
                  <th>Status</th>
                  <?php if ($this->session->userdata('role') != 'Dosen') { ?>
                  <th>Detail</th>
                  <th>Aksi</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach ($acara_eksternal as $show): ?>
                <tr class="gradeX">
                  <td><?php echo $no ?></td>
                  <td><?php echo $show->pengaju ?></td>
                  <td><?php echo $show->tempat ?></td>
                  <td><?php echo TanggalIndo($show->tanggal); ?></td>
                  <td><?php echo $show->pukul ?> - Selesai</td>
                  <td><?php if(($show->status)==''){ echo 'Baru Direncanakan'; } else { echo $show->status; } ?></td>
                  <?php if ($this->session->userdata('role') != 'Dosen') { ?>
                  <td>
                    <a class="btn btn-default" href="<?php echo base_url('notulis/detail_acara/'.$show->kode) ?>" title="Lihat Detail"><i class="icon-eye-open"></i></a> 
                  </td>
                  <td>
                    <?php if ($show->id_pembuat == $this->session->userdata('id')) { ?>
                    <a class="btn btn-success" href="<?php echo base_url('notulis/update_acaraEks/'.$show->kode) ?>" title="Edit"><i class="icon-edit"></i></a> 
                    <?php include 'delete_acara.php'; } ?>
                  </td>
                  <?php } $no++; endforeach; ?>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
