
<!--sidebar-menu-->

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-list"></i></a>
  <ul>
    <li><a href="<?php echo base_url() ?>notulis"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-envelope"></i> <span>Acara</span> <span class="label label-important">▼</span></a>
      <ul>
        <li><a href="<?php echo base_url('notulis/acara_internal') ?>">Acara Dalam (Internal)</a></li>
        <?php if ($this->session->userdata('role') != 'Dosen') { ?>
        <li><a href="<?php echo base_url('notulis/acara_eksternal') ?>">Acara Luar (Eksternal)</a></li>
        <?php } ?>
      </ul>
    </li>
    <li><a href="<?php echo base_url() ?>notulis/list_notulen"><i class="icon icon-book"></i> <span>Notulen</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-tasks"></i> <span>Laporan</span> <span class="label label-important">▼</span></a>
      <ul>
        <li><a href="<?php echo base_url('notulis/report_internal') ?>">Acara Dalam (Internal)</a></li>
        <li><a href="<?php echo base_url('notulis/report_eksternal') ?>">Acara Luar (Eksternal)</a></li>
      </ul>
    </li>
  </ul>
</div>

<!--close-left-menu-stats-sidebar-->
