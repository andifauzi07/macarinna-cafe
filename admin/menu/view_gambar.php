  <?php 
  include_once('../../_config/config.php');
  $kd_menu = $_GET['kd_menu'];
  $query_mysql = mysqli_query($con, "SELECT * FROM tb_menu WHERE kd_menu='$kd_menu'") or die (mysqli_error($con));
  $nomor = 1;
  while($r = mysqli_fetch_array($query_mysql)){
  ?>
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel"><P style="font-family: comic sans;"><?php echo $r['menu'];?></P></h4>
      </div>
        <div class="modal-body">
            <div class="form-group">
              <center>
                <img src="../../_assets/img/menu/<?=$r['gambar']?>" class="img-responsive img-rounded" alt="Responsive image">
              </center>
            </div>
            <?php } ?>
        </div>        
    </div>
</div>