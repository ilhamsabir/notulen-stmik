
<head>

<title><?php echo $title ?></title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/colorpicker.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/datepicker.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/uniform.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/select2.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/matrix-style.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/matrix-media.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-wysihtml5.css" />
    <link href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <script src="<?php echo base_url() ?>assets/js/tinymce/jquery.tinymce.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/tinymce/tinymce.min.js"></script>

    <script>
      tinymce.init({
        selector: '#textarea',
        plugins: 'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker mediaembed  contextmenu colorpicker textpattern help',
        height: 300,
        width: 600
      });
    </script>

</head>
