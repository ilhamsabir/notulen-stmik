<!DOCTYPE html>
<html>
<head>
  <title>Notulen Rapat <?php echo TanggalIndo(date('Y-m-d')); ?></title>
</head>
<body>
    <center><img src="<?php echo base_url('./assets/img/header.jpg') ?>"></center>
    <hr>
    <center>
      <?php if ($get_acara->jenis == 'Internal') { echo 'Notulen Rapat'; } elseif ($get_acara->jenis == 'Eksternal') { echo 'Laporan Kegiatan'; } ?>
    </center><hr>
    <table>
      <tbody>
        <?php if ($get_acara->jenis == 'Internal') { ?>
        <tr>
          <td>Kode Rapat</td>
          <td>:</td>
          <td><?php echo $show->kode_acara ?></td>
        </tr>
        <?php } elseif ($get_acara->jenis == 'Eksternal') { ?>
        <tr>
          <td>Nomor Surat</td>
          <td>:</td>
          <td><?php echo $show->nomor_surat ?></td>
        </tr>
        <?php } ?>
        <tr>
          <td>Tanggal</td>
          <td>:</td>
          <td><?php echo TanggalIndo($show->tanggal) ?></td>
        </tr>
        <tr>
          <td>Tempat</td>
          <td>:</td>
          <td><?php echo $show->tempat ?></td>
        </tr>
        <tr>
          <td>Pukul</td>
          <td>:</td>
          <td><?php echo $show->pukul ?> - Selesai</td>
        </tr>
        <tr>
          <td>Notulis</td>
          <td>:</td>
          <td><?php echo $show->nama_notulis ?></td>
        </tr>
        <?php if ($get_acara->jenis == 'Internal') { ?>
        <tr>
          <td>Pemimpin Acara</td>
          <td>:</td>
          <td><?php echo $show->pemimpin ?></td>
        </tr>
        <?php } elseif ($get_acara->jenis == 'Eksternal') { ?>
        <tr>
          <td>Penanggung Jawab</td>
          <td>:</td>
          <td><?php echo $show->penanggung_jawab ?></td>
        </tr>
        <?php } ?>
        <tr>
          <td>Perihal</td>
          <td>:</td>
          <td><?php echo $get_acara->acara ?></td>
        </tr>
        <tr>
          <td>Hasil Rapat</td>
          <td>:</td>
        </tr>
      </tbody>
    </table>
    <?php if ($show->jenis == 'Internal') { ?>
    <p align="justify"><?php echo $show->isi ?></p>
    <?php } elseif ($show->jenis == 'Eksternal') { ?>
    <br> <br>
    <center>
      <table align="center" border="1" width="100%" height="100%">
        <thead>
          <tr>
            <th>No.</th>
            <th>Notulen</th>
            <th>Tujuan</th>
            <th>Pic</th>
            <th>Due Date</th>
            <th>Status</th>
            <th>Keterangan</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach($list as $show): ?>
          <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $show->notulen ?></td>
            <td><?php echo $show->tujuan ?></td>
            <td><?php echo $show->pic ?></td>
            <td><?php echo TanggalIndo($show->due_date) ?></td>
            <td><?php echo $show->status_not ?></td>
            <td><?php echo $show->keterangan ?></td>
          </tr>
          <?php $no++; endforeach; ?>
        </tbody>
      </table>
    </center>
    <br> <br>
    <?php } ?>
    <p><strong>Dokumentasi:</strong></p> <br>
    <?php foreach ($images as $show): ?>
      <img src="<?php echo base_url('assets/img/dokumentasi/'.$show->gambar) ?>" width="30%" height="30%">
    <?php endforeach; ?>
    <table>
      <tbody>
        <?php if ($get_acara->jenis == 'Internal') { ?>
        <tr>
          <td>Peserta Diundang</td>
          <td>:</td>
          <td>
            <ol>
            <?php foreach ($diundang as $show): ?>
            <li><?php echo $show->nama ?></li>
            <?php endforeach; ?>
            </ol>
          </td>
        </tr>
        <tr>
          <td>Peserta Hadir</td>
          <td>:</td>
          <td>
            <ol>
            <?php foreach ($kehadiran as $show): ?>
            <li><?php echo $show->nama ?></li>
            <?php endforeach; ?>
            </ol>
          </td>
        </tr>
        <?php } elseif ($get_acara->jenis == 'Eksternal') { ?>
        <tr>
          <td>Email Penerima Undangan</td>
          <td>:</td>
          <td>
            <ol>
            <?php foreach ($diundang as $show): ?>
            <li><?php echo $show->email_peserta ?></li>
            <?php endforeach; ?>
            </ol>
          </td>
        </tr>
        <tr>
          <td>Kehadiran</td>
          <td>:</td>
          <td>
            <ol>
            <?php foreach ($kehadiran as $show): ?>
            <li><?php echo $show->email ?></li>
            <?php endforeach; ?>
            </ol>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <br><br><br><br><br>
    <?php if ($get_acara->jenis == 'Internal') { ?>
    <table>
      <tr>
        <td align="center">Pemimpin Acara</td>
      </tr>
    </table>
    <br><br><br><br>
    <table>
      <tr>
        <td align="center"><?php echo $get_acara->pemimpin ?></td>
      </tr>
    </table>
    <?php } elseif ($get_acara->jenis == 'Eksternal') { ?>
    <table>
      <tr>
        <td align="center">Penanggung Jawab</td>
      </tr>
    </table>
    <br><br><br><br>
    <table>
      <tr>
        <td align="center"><?php echo $get_acara->penanggung_jawab ?></td>
      </tr>
    </table>
    <?php } ?>
  </body>
</html>