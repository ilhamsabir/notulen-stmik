<!-- Detail Acara -->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url('admin') ?>" title="Ke Dashboard" class="tip-bottom">
    <i class="icon-home"></i> Dashboard</a> <a href="<?php if($show->jenis == 'Internal'){ echo base_url('admin/acara_internal'); } elseif($show->jenis == 'Eksternal') { echo base_url('admin/acara_eksternal'); } ?>"> List Data Acara</a> <a href="#" class="current">Detail Acara</a> </div>
    <h1>Detail Acara</h1>
  </div>
  <div class="container-fluid">
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
    <hr>
    <a href="#" class="btn btn-success" onclick="history.go(-1)">Kembali</a>
    <div class="row-fluid">
      <div class="span6">
        <div class="accordion" id="collapse-group">
        <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse"> <span class="icon"><i class="icon-circle-arrow-right"></i></span>
                <h5>Data Acara</h5>
                </a> 
              </div>
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
                    <tr>
                      <td><b>Notulis Terpilih</b></td>
                      <td>: <?php echo $get_notulis->nama ?></td>
                    </tr>
                    <?php } ?>
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
                    <?php } ?>
                    <tr>
                      <td><b>Pukul</b></td>
                      <td>: <?php echo $show->pukul.' - Selesai' ?></td>
                    </tr>
                    <tr>
                      <td><b>Status</b></td>
                      <td>: <?php if ($show->status == '') { echo 'Baru Direncanakan'; } else { echo $show->status; } ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
    </div>
      <div class="span6">
        <?php if($show->id_pembuat == $this->session->userdata('id') && $show->id_pembuat == ' || Undangan Terkirim') { ?>
        <a href="<?php echo base_url('admin/tunda_acara/'.$show->kode) ?>" class="btn btn-warning" >Tunda Acara</a> 
        <a href="<?php echo base_url('admin/cancel_acara/'.$show->kode) ?>" class="btn btn-danger" >Batalkan Acara</a>
        <?php } elseif($show->status == 'Ditunda' || $show->status == 'Dibatalkan') {  ?>
        <a href="<?php echo base_url('admin/rollback_invite/'.$show->kode) ?>" class="btn btn-default" >Rollback Acara</a>
        <?php } elseif($show->status == 'Notulen Dibuat') { } ?>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list-alt"></i> </span>
            <h5>Acara</h5>
          </div>
          <div class="widget-content"> 
          <?php echo $show->acara ?>
          </div>
        </div>
        <a href="<?php if($show->jenis == 'Internal'){ echo base_url('report/undangan_admin/'.$show->kode); } elseif($show->jenis == 'Eksternal') { echo base_url('report/undangan_adminEks/'.$show->kode); } ?>" class="btn btn-danger btn-large" title="Download PDF"><i class="icon-file"></i></a>
        <?php if(($show->status)=='') { ?>
        <div class="pull-right">
          <?php if ($show->jenis == 'Internal' && $show->id_pembuat == $this->session->userdata('id')) { ?>
          <a href="<?php echo base_url('admin/send_invite/'.$show->kode) ?>" class="btn btn-warning btn-large" title="Kirim Undangan"><i class="icon-envelope"></i></a>
          <?php } elseif ($show->jenis == 'Eksternal' && $show->id_pembuat == $this->session->userdata('id')) { ?>
          <a href="<?php echo base_url('admin/jumlah_inviteEks/'.$show->kode) ?>" class="btn btn-warning btn-large" title="Kirim Undangan"><i class="icon-envelope"></i></a>
          <?php } ?>
        </div>
        <?php } elseif(($show->status)=='Undangan Terkirim' || ($show->status)=='Sedang Berlangsung') { ?>
        <div class="pull-right">
          <?php if ($show->id_pembuat == $this->session->userdata('id')) { ?>
          <a href="<?php echo base_url('admin/rollback_invite/'.$show->kode) ?>" class="btn btn-default btn-large" title="Rollback Undangan"><i class="icon-envelope"></i></a> 
          <?php } if ($show->id_notulis == $this->session->userdata('id') && $show->jenis == 'Internal') { ?>
          <a href="<?php echo base_url('admin/create_notulen/'.$show->kode) ?>" class="btn btn-success btn-large" title="Buat Notulen"><i class="icon-book"></i></a>
          <?php } ?>
        </div>
        <?php } elseif($show->status == 'Notulen Dibuat') { ?>
        <div class="pull-right">
          <a href="<?php if($show->jenis == 'Internal') { echo base_url('admin/detail_notulen/'.$show->kode); } elseif($show->jenis == 'Eksternal') { echo base_url('admin/detail_notulenEksternal/'.$show->kode); } ?>" class="btn btn-success btn-large" title="Lihat Notulen"><i class="icon-eye-open"></i></a>
        </div>
        <?php } ?>
        </div>
      </div> 
  </div>
</div>
<!-- Close Detail Acara -->
