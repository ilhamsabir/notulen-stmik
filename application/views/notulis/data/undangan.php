<!DOCTYPE html>
<html>
<head>
  <title>Undangan Rapat STMIK Bandung</title>
</head>
<body>
    <center><img src="<?php echo base_url('./assets/img/header.jpg') ?>"></center>
    <hr>
    <center>
      <?php if ($get_acara->jenis == 'Internal') { echo 'Undangan Rapat'; } elseif ($get_acara->jenis == 'Eksternal') { echo 'Surat Tugas'; } ?>
    </center><hr>
    <p align="right"><?php echo TanggalIndo(date('Y-m-d')) ?></p>
    Kepada Yth.<br>
    Bapak/Ibu Terundang <br>
    di Tempat<br>
    <p> Dengan Hormat,<br>
    Bersama surat ini, kami mengundang Bapak/Ibu untuk hadir pada:</p>
    <table align="center">
      <tbody>
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
          <td>Waktu</td>
          <td>:</td>
          <td><?php echo $show->pukul ?> - Selesai</td>
        </tr>
        <?php if ($show->jenis == 'Internal') { ?>
        <tr>
          <td>Dipimpin Oleh</td>
          <td>:</td>
          <td><?php echo $show->pemimpin ?></td>
        </tr>
        <tr>
          <td>Notulis Terpilih</td>
          <td>:</td>
          <td><?php echo $get_notulis->nama ?></td>
        </tr>
        <?php } elseif ($show->jenis == 'Eksternal') { ?>
        <tr>
          <td>Penanggung Jawab</td>
          <td>:</td>
          <td><?php echo $show->penanggung_jawab ?></td>
        </tr>
        <?php } ?>
        <tr>
          <td>Perihal</td>
          <td>:</td>
          <td rowspan="2"><?php echo $show->acara ?></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
    <p>Demikian undangan ini disampaikan, besar harapan kami Bapak/Ibu dapat menghadiri acara tersebut di atas. Terima kasih.</p> <br>
    <br><br><br><br><br>
    <?php if ($show->jenis == 'Internal') { ?>
  	<table>
  		<tr>
  		  <td align="center">Pemimpin Acara</td>
  		</tr>
  	</table>
  	<br><br><br><br>
  	<table>
  		<tr>
  		  <td align="center"><?php echo $show->pemimpin ?></td>
  		</tr>
  	</table>
	 <?php } elseif ($show->jenis == 'Eksternal') { ?>
    <table>
      <tr>
        <td align="center">Penanggung Jawab</td>
      </tr>
    </table>
    <br><br><br><br>
    <table>
      <tr>
        <td align="center"><?php echo $show->penanggung_jawab ?></td>
      </tr>
    </table>
    <?php } ?>
  </body>
</html>