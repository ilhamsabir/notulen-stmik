<button title="Hapus" data-target="#myAlert<?php echo $show->kode_acara ?>" data-toggle="modal" class="btn btn-danger">
<i class="icon-trash"></i></button>
  <div id="myAlert<?php echo $show->kode_acara ?>" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3>Hapus Data</h3>
      </div>
      <div class="modal-body">
        <p>Hapus data notulen atas nama notulis: <?php echo $show->nama_notulis ?>?</p>
      </div>
      <div class="modal-footer">
      <a class="btn btn-primary" href="<?php echo base_url('notulis/delete_notulen/'.$show->kode_acara) ?>">Hapus</a>
      <a data-dismiss="modal" class="btn" href="#">Batal</a> </div>
    </div>
  </div>
</div>