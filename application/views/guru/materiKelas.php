<div id="content-wrapper">

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?php echo site_url('index.php/guru/overviewGuru')?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Guru</li>
  </ol>
  <?php if ($this->session->userdata('level') == '2'){ ?>
  <!-- <div align="left">
    <a href="<?php echo base_url('index.php/admin/guru/tambah/'); ?>" class="btn btn-success">Tambah</a>
  </div> -->
  <br>
<?php } ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <!-- MAP DATA-->
            <div class="map-data m-b-40">
                <h3 class="title-3 m-b-30">Materi Kelas</h3>
                <div class="mx-auto d-block">
                    <div class="container-fluid">
                    <?php foreach ($kelas as $k) { ?>
                      <div class="card card-body">
                         <h5><?=$k->NamaKelas?></h5>
                        <hr>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <?php foreach ($mapelKelas as $m) {
                                        if ($k->KodeKelas == $m->KodeKelas) {
                                     ?>
                                        <tr>
                                            <td width="100%"><?=$m->NamaMapel?></td>
                                            <?php if ($m->NamaMapel == $mapelKelas[0]->KodeMapel) { ?>
                                                <td><a href="<?=base_url()?>guru/listMateri/<?=$m->KodeKelas?>/
                                                <?= $m->KodeMapel?>/" class="btn btn-success">Materi</a></td>
                                            <?php }else{?>
                                                <td></td>
                                            <?php }?>
                                        </tr>
                                    <?php } }?>
                                    </tbody>
                                </table>
                            </div>
                      </div>
                      <?php } ?>
                    </div>
                </div>
                <br>
                
            </div>
            <!-- END MAP DATA-->
        </div>
    </div>
    
</div>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">??</span>
    </button>
  </div>
  <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
  <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
    <a class="btn btn-primary" href="<?php echo site_url('index.php/login/logout'); ?>">Logout</a>
  </div>
</div>
</div>
</div>

<!-- Bootstrap core CSS-->
<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

<!-- Custom fonts for this template-->
<link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

<!-- Page level plugin CSS-->
<link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.css') ?>" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="<?php echo base_url('css/sb-admin.css') ?>" rel="stylesheet">

<!-- ... -->
<!-- di sini ada kode yang panjang -->
<!-- ... -->

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js') ?>"></script>
<!-- Page level plugin JavaScript-->
<script src="<?php echo base_url('assets/chart.js/Chart.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.js') ?>"></script>
<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('js/sb-admin.min.js') ?>"></script>
<!-- Demo scripts for this page-->
<script src="<?php echo base_url('js/demo/datatables-demo.js') ?>"></script>
<script src="<?php echo base_url('js/demo/chart-area-demo.js') ?>"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready( function () {
$('#myTable').DataTable();


$('#stok_kurang').keyup(function(){
getBerdasarStok();
});

function getBerdasarStok() {
var stok = $('#stok_kurang').val();
if (!stok) {
  $.ajax({
        type: "POST",
        dataType: "json",
        url: "<?php echo base_url(); ?>" + "index.php/admin/obat/getObatSemua/",
        success: function(data) {
          var obj = data;
          $('#isi_obat').empty();
          $.each(obj, function(index) {
            $('#isi_obat').append('<tr><td>'+(index+1)+'</td><td>'+obj[index].nama_obat+'</td><td>'+obj[index].nama_supplier+'</td><td>'+parseInt(obj[index].stok_obat)+'</td><td>'+obj[index].kategori_obat+'</td><td>Satuan - per-satuan 1 -  Rp. '+parseInt(obj[index].harga_satuan)+' <br>Strip - per-strip '+obj[index].jumlah_strip+' - Rp. '+parseInt(+obj[index].harga_strip)+' <br>Pack - per-pack '+obj[index].jumlah_pack+' -  Rp. '+parseInt(obj[index].harga_pack)+' <br>Dos - per-dos '+obj[index].jumlah_dus+' - Rp. '+parseInt(obj[index].harga_dus)+'</td><?php if ($this->session->userdata("level") == "1" || $this->session->userdata("level") == "2") { ?><td><a href="<?php echo base_url("index.php/admin/obat/edit/");?>'+obj[index].kode_obat+'" class="btn btn-warning">Edit</a> <a onclick="return confirm("Apakah yakin ingin hapus?")" href="<?php echo base_url("index.php/admin/obat/hapus/");?>'+obj[index].kode_obat+'" class="btn btn-danger">Hapus</a></td><?php } ?></tr>');

          })
       }
     });
} else {
  $.ajax({
        type: "POST",
        dataType: "json",
        data: {stok : stok},
        url: "<?php echo base_url(); ?>" + "index.php/admin/obat/getBerdasarStok/",
        success: function(data) {
          var obj = data;
          $('#isi_obat').empty();
          $.each(obj, function(index) {
            $('#isi_obat').append('<tr><td>'+(index+1)+'</td><td>'+obj[index].nama_obat+'</td><td>'+obj[index].nama_supplier+'</td><td>'+parseInt(obj[index].stok_obat)+'</td><td>'+obj[index].kategori_obat+'</td><td>Satuan - per-satuan 1 -  Rp. '+parseInt(obj[index].harga_satuan)+' <br>Strip - per-strip '+obj[index].jumlah_strip+' - Rp. '+parseInt(+obj[index].harga_strip)+' <br>Pack - per-pack '+obj[index].jumlah_pack+' -  Rp. '+parseInt(obj[index].harga_pack)+' <br>Dos - per-dos '+obj[index].jumlah_dus+' - Rp. '+parseInt(obj[index].harga_dus)+'</td><?php if ($this->session->userdata("level") == "1" || $this->session->userdata("level") == "2") { ?><td><a href="<?php echo base_url("index.php/admin/obat/edit/");?>'+obj[index].kode_obat+'" class="btn btn-warning">Edit</a> <a onclick="return confirm("Apakah yakin ingin hapus?")" href="<?php echo base_url("index.php/admin/obat/hapus/");?>'+obj[index].kode_obat+'" class="btn btn-danger">Hapus</a></td><?php } ?></tr>');

          })
       }
     });

}
}

} );

</script>


</body>

</html>