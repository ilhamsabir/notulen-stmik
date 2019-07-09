<?php $this->session->sess_destroy(); ?>

<!DOCTYPE html>
<html lang="en">
    
<head>
        <title><?php echo $title ?></title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/matrix-login.css" />
        <link href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div id="loginbox">
             <div class="control-group normal_text"> 
                <h3><img src="<?php echo base_url() ?>assets/img/logo.png" alt="Logo" /></h3>
            </div>
            <?php
            //Validasi
            echo validation_errors('<div class="alert alert-danger"><button class="close" data-dismiss="alert">x</button>','</div>');

            //Cetak Notif
              if($this->session->flashdata('sukses'))
              {
                echo '<div class="alert alert-danger">';
                echo '<button class="close" data-dismiss="alert">×</button>';
                echo $this->session->flashdata('sukses');
                echo '</div>';
              }
            ?>
            <?php echo form_open(base_url('login'), array('class' => 'form-vertical', 'id' => 'loginform')); ?>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg"><i class="icon-user"> </i></span>
                        <input type="email" name="email" placeholder="E-mail" value="<?php echo set_value('email'); ?>" />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_ly"><i class="icon-lock"></i></span>
                        <input type="password" name="password" placeholder="Password" />
                    </div>
                </div>
            </div>
             <div class="form-actions">
                <span class="pull-right">
                    <input type="submit" class="btn btn-success" value="Login" />
                </span>
            </div>
            <?php echo form_close(); ?>
        </div>
        
        <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>  
        <script src="<?php echo base_url() ?>assets/js/matrix.login.js"></script> 
    </body>

</html>
