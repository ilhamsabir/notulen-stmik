
<!--sidebar-menu-->

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-list"></i></a>
  <ul>
    <li><a href="<?php echo base_url('admin') ?>"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li><a href="<?php echo base_url('admin/list_notulis') ?>"><i class="icon icon-user"></i> <span>Dosen/Karyawan</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-envelope"></i> <span>Acara</span> <span class="label label-info">▼</span></a>
      <ul>
        <li><a href="<?php echo base_url('admin/acara_internal') ?>">Acara Dalam (Internal)</a></li>
        <li><a href="<?php echo base_url('admin/acara_eksternal') ?>">Acara Luar (Eksternal)</a></li>
      </ul>
    </li>
    <li><a href="<?php echo base_url('admin/list_notulen') ?>"><i class="icon icon-book"></i> <span>Notulen</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-envelope"></i> <span>Laporan</span> <span class="label label-info">▼</span></a>
      <ul>
        <li><a href="<?php echo base_url('admin/report_internal') ?>">Acara Dalam (Internal)</a></li>
        <li><a href="<?php echo base_url('admin/report_eksternal') ?>">Acara Luar (Eksternal)</a></li>
      </ul>
    </li>
  </ul>
</div>

<!--close-left-menu-stats-sidebar-->
