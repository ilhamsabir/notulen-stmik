<div id="content">
<div id="content-header">
  <div id="breadcrumb"> 
    <a href="<?php echo base_url() ?>admin" title="Ke Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> <a href="#" class="current">Laporan Eksternal</a> 
  </div>
  <h1>Laporan Acara Eksternal</h1>
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
  <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Pilih Periode</h5>
          </div>
          <div class="widget-content nopadding">
            <?php echo form_open(base_url('admin/report_eksternal'), array('name' => 'periode', 'class' => 'form-horizontal')) ?>
              <div class="control-group">
                <label class="control-label">Tanggal:</label>
                <div class="controls">
                  <input type="date" name="tglmin" class="span5"> ▬ 
                  <input type="date" name="tglmax" class="span5">
                </div>
              </div>   
              <div class="form-actions">
                <input type="submit" value="Tampilkan" name="tampilkan" class="btn btn-info">
                <input type="submit" value="Cetak" name="cetak" class="btn btn-success">
              </div>
              <?php echo form_close(); ?>
          </div>
        </div>
      </div>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <h5>Data Acara Eksternal Keseluruhan</h5>
        </div>
        <div class="widget-content nopadding">
          <div style="overflow-x: auto;">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Pengaju Acara</th>
                  <th>Tanggal Rapat</th>
                  <th>Tempat Rapat</th>
                  <th>Pukul</th>
                  <th>Status</th>
                  <th>Detail</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach ($list as $show): ?>
                <tr class="gradeX">
                  <td><?php echo $no ?></td>
                  <td><?php echo $show->pengaju ?></td>
                  <td><?php echo TanggalIndo($show->tanggal); ?></td>
                  <td><?php echo $show->tempat ?></td>
                  <td><?php echo $show->pukul ?> - Selesai</td>
                  <td><?php if ($show->status == '') { echo 'Baru Direncanakan'; } else { echo $show->status; } ?></td>
                  <td>
                    <a class="btn btn-default" href="<?php echo base_url('admin/detail_acara/'.$show->kode) ?>" title="Lihat Detail"><i class="icon-eye-open"></i></a> 
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
