<div id="content">
<div id="content-header">
  <div id="breadcrumb"> 
    <a href="<?php echo base_url() ?>admin" title="Ke Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> <a href="#" class="current">List Data Dosen/Karyawan</a> 
  </div>
  <h1>List Data Dosen/Karyawan</h1>
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
  <a class="btn btn-info" href="<?php echo base_url() ?>admin/create_notulis">
  <i class="icon-plus"></i> Tambah Data</a>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <h5>List Data Dosen/Karyawan</h5>
        </div>
        <div class="widget-content nopadding">
          <div style="overflow-x: auto;">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Nomor Telepon</th>
                  <th>Sekretaris Bagian</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach ($list as $show): ?>
                <tr class="gradeX">
                  <td><?php echo $no ?></td>
                  <td><?php echo $show->nama ?></td>
                  <td><?php echo $show->email ?></td>
                  <td><?php echo $show->no_telp ?></td>
                  <td><?php echo $show->role ?></td>
                  <td>
                    <a class="btn btn-success" href="<?php echo base_url('admin/update_notulis/'.$show->id) ?>" title="Edit">
                      <i class="icon-edit"></i></a> 
                    <?php include 'delete_notulis.php' ?>
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
