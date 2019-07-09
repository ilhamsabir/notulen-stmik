<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title ?></title>
  <style type="text/css">
    #outtable{
      padding: 20px;
      border:1px solid #e3e3e3;
      width:600px;
      border-radius: 5px;
    }
 
    .short{
      width: 50px;
    }
 
    .normal{
      width: 150px;
    }
 
    table{
      border-collapse: collapse;
      font-family: arial;
      color:#5E5B5C;
    }
 
    thead th{
      text-align: left;
      padding: 10px;
    }
 
    tbody td{
      border-top: 1px solid #e3e3e3;
      padding: 10px;
    }
 
    tbody tr:nth-child(even){
      background: #F6F5FA;
    }
 
    tbody tr:hover{
      background: #EAE9F5
    }
  </style>
</head>
<body>
  <center>
    <img src="<?php echo base_url('./assets/img/header.jpg') ?>">
    <hr>
    Data Acara Keseluruhan (Eksternal)<hr>
	  <table align="center">
	  	<thead>
		  	<tr>
			  	<th>No.</th>
		        <th>Pengaju Acara</th>
		        <th>Pembuat Acara</th>
		        <th>Tanggal Rapat</th>
		        <th>Tempat Rapat</th>
		        <th>Pukul</th>
            <th>Status</th>
		  	</tr>
	  	</thead>
	  	<tbody>
	  	<?php $no=1; ?>
	  	<?php foreach($list as $show): ?>
		  	<tr>
			  	<td><?php echo $no ?></td>
		        <td><?php echo $show->pengaju ?></td>
		        <td><?php echo $get_eventmaker->nama ?></td>
		        <td><?php echo TanggalIndo($show->tanggal); ?></td>
		        <td><?php echo $show->tempat ?></td>
		        <td><?php echo $show->pukul ?> - Selesai</td>
            <td><?php echo $show->status ?></td>
		  	</tr>
	  	<?php $no++; ?>
	  	<?php endforeach; ?>
	  	</tbody>
	  </table>
  </center>
  </body>
</html>