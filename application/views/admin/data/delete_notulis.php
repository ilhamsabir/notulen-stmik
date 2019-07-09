<button title="Hapus" data-target="#myAlert<?php echo $show->id ?>" data-toggle="modal" class="btn btn-danger">
<i class="icon-trash"></i></button>
	<div id="myAlert<?php echo $show->id ?>" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3>Hapus Data</h3>
      </div>
      <div class="modal-body">
        <p>Hapus data notulis atas nama: <?php echo $show->nama ?>?</p>
      </div>
      <div class="modal-footer">
      <a class="btn btn-primary" href="<?php echo base_url('admin/delete_notulis/'.$show->id) ?>">Hapus</a>
      <a data-dismiss="modal" class="btn" href="#">Batal</a> </div>
    </div>
  </div>
</div>