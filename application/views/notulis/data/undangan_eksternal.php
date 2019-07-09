<!DOCTYPE html>
<html>
<head>
  <title>Undangan Rapat STMIK Bandung</title>
</head>
<body>
    <center><img src="<?php echo base_url('./assets/img/header.jpg') ?>"></center>
    <hr>
    <center>
      Surat Tugas
    </center><hr>
    <p align="right"><?php echo TanggalIndo(date('Y-m-d')) ?></p>
    <table>
      <tbody>
        <tr>
          <td>Nomor Surat</td>
          <td>:</td>
          <td><?php echo $show->nomor_surat ?></td>
        </tr>
        <tr>
          <td>Lamp</td>
          <td>:</td>
          <td>1</td>
        </tr>
        <tr>
          <td>Hal</td>
          <td>:</td>
          <td>Surat Tugas</td>
        </tr>
      </tbody>
    </table> <br>
    Kepada Yth. <br>
    Saudara/i Terundang<br>
    di Tempat<br>
    <p> &emsp; &emsp; &emsp; Dengan Hormat,<br>
    &emsp; &emsp; &emsp; Menunjuk surat undangan dari <?php echo $show->nomor_surat ?> tanggal <?php echo TanggalIndo($show->tanggal) ?> sampai dengan tanggal <?php echo TanggalIndo($show->tanggal_selesai) ?>, maka dengan ini ditugaskan kepada:</p>
    <table align="center">
      <tbody>
        <?php $no = 1; foreach ($invited as $list): ?>
        <tr>
          <td><?php echo $no ?>. </td>
          <td>Nama</td>
          <td>: <?php echo $list->nama_peserta ?></td>
        </tr>
          <tr>
          <td></td>
          <td>Jabatan</td>
          <td>: <?php echo $list->jabatan_peserta ?></td>
        </tr>
        <?php $no++; endforeach; ?>
      </tbody>
    </table> <br>
    <p>&emsp; &emsp; &emsp; Untuk menghadiri undangan dimaksud sesuai jadwal pada Surat Undangan tersebut diatas pada tanggal <?php echo TanggalIndo($show->tanggal) ?>.</p>
    <p>&emsp; &emsp; &emsp; Demikian surat penugasan ini dibuat agar dapat dilaksanakan dengan sebaik-baiknya dan surat penugasan ini batal dengan sendirinya dengan selesainya seluruh laporan yang berkait dengan surat penugasan ini.</p> <br>
    <br><br><br><br><br>
    <table align="right">
      <tr>
        <td align="center">Penanggung Jawab</td>
      </tr>
    </table>
    <br><br><br><br>
    <table align="right">
      <tr>
        <td align="left"><?php echo $show->penanggung_jawab ?></td>
      </tr>
    </table>
  </body>
</html>