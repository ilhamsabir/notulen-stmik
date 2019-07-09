
<!--Header-part-->
<div id="header">
  <h1><a href="#">Matrix Admin</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text"><?php echo $this->session->userdata('nama'); ?></span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="<?php echo base_url('notulis/cg_data/'.$this->session->userdata('id')) ?>"><i class="icon-edit"></i> Update Data Diri</a></li>
        <li class="divider"></li>
        <li><a href="<?php echo base_url('notulis/cg_password/'.$this->session->userdata('id')) ?>"><i class="icon-key"></i> Update Password</a></li>
      </ul>
    </li>
    <li class=""><a href="#logoutModal" data-toggle="modal"><i class="icon icon-share-alt"></i>
      <span class="text">Logout</span></a>
    </li>
  </ul>
</div>

<!-- Logout Modal -->
<div id="logoutModal" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3>Logout</h3>
      </div>
      <div class="modal-body">
        <p>Anda yakin ingin melakukan logout?</p>
      </div>
      <div class="modal-footer"> 
      <a class="btn btn-primary" href="<?php echo base_url().'login/logout' ?>">Konfirmasi</a>
      <a data-dismiss="modal" class="btn" href="#">Batal</a> </div>
    </div>
  </div>
</div>
