<div id="content">
<div id="content-header">
  <div id="breadcrumb"> 
    <a href="#" class="current"><i class="icon-home"></i> Dashboard</a>
  </div>
  <h1>Dashboard</h1>
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
    <a class="btn btn-success" href="<?php echo base_url() ?>notulis/acara_internal"> Kelola Data</a>
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
        <h5>Data Acara Internal (Dipilih)</h5>
      </div>
      <div class="widget-content nopadding">
        <div style="overflow-x: auto;">
          <table class="table table-bordered data-table">
            <thead>
              <tr>
                <th>No.</th>
                <th>Pengaju</th>
                <th>Tempat</th>
                <th>Tanggal</th>
                <th>Pukul</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($list_acaraInt as $show): ?>
              <tr class="gradeX">
                <td><?php echo $no ?></td>
                <td><?php echo $show->pengaju ?></td>
                <td><?php echo $show->tempat ?></td>
                <td><?php echo TanggalIndo($show->tanggal) ?></td>
                <td><?php echo $show->pukul ?> - Selesai</td>
                <td><?php if(($show->status)==''){ echo 'Baru Direncanakan'; } else { echo $show->status; } ?></td>
                <?php $no++; endforeach; ?>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
        <h5>Data Acara Internal (Dibuat Oleh Anda)</h5>
      </div>
      <div class="widget-content nopadding">
        <div style="overflow-x: auto;">
          <table class="table table-bordered data-table">
            <thead>
              <tr>
                <th>No.</th>
                <th>Pengaju</th>
                <th>Tempat</th>
                <th>Tanggal</th>
                <th>Pukul</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($list_acara as $show): ?>
              <tr class="gradeX">
                <td><?php echo $no ?></td>
                <td><?php echo $show->pengaju ?></td>
                <td><?php echo $show->tempat ?></td>
                <td><?php echo TanggalIndo($show->tanggal) ?></td>
                <td><?php echo $show->pukul ?> - Selesai</td>
                <td><?php if(($show->status)==''){ echo 'Baru Direncanakan'; } else { echo $show->status; } ?></td>
                <?php $no++; endforeach; ?>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
        <h5>Data Acara Internal (Keseluruhan)</h5>
      </div>
      <div class="widget-content nopadding">
        <div style="overflow-x: auto;">
          <table class="table table-bordered data-table">
            <thead>
              <tr>
                <th>No.</th>
                <th>Pengaju</th>
                <th>Tempat</th>
                <th>Tanggal</th>
                <th>Pukul</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($acara_internal as $show): ?>
              <tr class="gradeX">
                <td><?php echo $no ?></td>
                <td><?php echo $show->pengaju ?></td>
                <td><?php echo $show->tempat ?></td>
                <td><?php echo TanggalIndo($show->tanggal) ?></td>
                <td><?php echo $show->pukul ?> - Selesai</td>
                <td><?php if(($show->status)==''){ echo 'Baru Direncanakan'; } else { echo $show->status; } ?></td>
                <?php $no++; endforeach; ?>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <?php if ($this->session->userdata('role') != 'Dosen') { ?>
    <a class="btn btn-success" href="<?php echo base_url() ?>notulis/acara_eksternal"> Kelola Data</a>
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
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($list_acaraEks as $show): ?>
              <tr class="gradeX">
                <td><?php echo $no ?></td>
                <td><?php echo $show->pengaju ?></td>
                <td><?php echo $show->tempat ?></td>
                <td><?php echo TanggalIndo($show->tanggal) ?></td>
                <td><?php echo $show->pukul ?> - Selesai</td>
                <td><?php if(($show->status)==''){ echo 'Baru Direncanakan'; } else { echo $show->status; } ?></td>
                <?php $no++; endforeach; ?>
              </tr>
            </tbody>
          </table>
        </div>
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
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($acara_eksternal as $show): ?>
              <tr class="gradeX">
                <td><?php echo $no ?></td>
                <td><?php echo $show->pengaju ?></td>
                <td><?php echo $show->tempat ?></td>
                <td><?php echo TanggalIndo($show->tanggal) ?></td>
                <td><?php echo $show->pukul ?> - Selesai</td>
                <td><?php if(($show->status)==''){ echo 'Baru Direncanakan'; } else { echo $show->status; } ?></td>
                <?php $no++; endforeach; ?>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <?php } ?>
    <a class="btn btn-success" href="<?php echo base_url() ?>notulis/list_notulen"> Kelola Data</a>
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
                <th>Pengaju Acara</th>
                <th>Notulis</th>
                <th>Tanggal Rapat</th>
                <th>Tempat Rapat</th>
                <th>Pukul</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($list_notulen as $show): ?>
              <tr class="gradeX">
                <td><?php echo $no ?></td>
                <td><?php echo $show->pengaju ?></td>
                <td><?php echo $show->nama_notulis ?></td>
                <td><?php echo TanggalIndo($show->tanggal) ?></td>
                <td><?php echo $show->tempat ?></td>
                <td><?php echo $show->pukul ?> - Selesai</td>
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
                <th>Pengaju Acara</th>
                <th>Notulis</th>
                <th>Tanggal Rapat</th>
                <th>Tempat Rapat</th>
                <th>Pukul</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($notulen_ikut as $show): ?>
              <tr class="gradeX">
                <td><?php echo $no ?></td>
                <td><?php echo $show->pengaju ?></td>
                <td><?php echo $show->nama_notulis ?></td>
                <td><?php echo TanggalIndo($show->tanggal) ?></td>
                <td><?php echo $show->tempat ?></td>
                <td><?php echo $show->pukul ?> - Selesai</td>
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
                <th>Pengaju Acara</th>
                <th>Notulis</th>
                <th>Tanggal Rapat</th>
                <th>Tempat Rapat</th>
                <th>Pukul</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($notulen_all as $show): ?>
              <tr class="gradeX">
                <td><?php echo $no ?></td>
                <td><?php echo $show->pengaju ?></td>
                <td><?php echo $show->nama_notulis ?></td>
                <td><?php echo TanggalIndo($show->tanggal) ?></td>
                <td><?php echo $show->tempat ?></td>
                <td><?php echo $show->pukul ?> - Selesai</td>
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
