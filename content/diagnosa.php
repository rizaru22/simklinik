<script type="text/javascript" src="javascript/script_diagnosa.js"> </script>
<?php include "../library/function_form_modal.php";?>

<?php include "../library/function_view.php";?>
<?php include "../library/config.php";?>
    <!-- Content Header (Page header) -->
    <?php header_page("Diagnosa","Diagnosa",""); ?>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-lg-12">
        <div class="alert alert-warning alert-dismissible">
        <button type="button" class="btn btn-primary btn-lg btn-flat pull-right" onclick="saveDiagnosa()"><i class="icon fa fa-save"></i>Simpan</button>        
        <h4><i class="icon fa fa-info-circle"></i> </h4>
         Lakukan perubahan data pada kolom dibawah, klik tombol simpan jika sudah selesai melakukan penambahan/perubahan data
         </div>
        </div>
      </div>
      <div class="row">
        <?php
          $id=$_GET['id'];
          $query=mysqli_query($mysqli,"SELECT p.noRM,p.nama,d.diagnosa
          FROM pasien as p
          inner join pendaftaran as d on d.noRM=p.noRM
          WHERE d.idPendaftaran=$id");
          while($row=mysqli_fetch_row($query)){
            $noRM=$row[0];
            $namaPasien=$row[1];
            $diagnosa=$row[2];
          }
        ?>
        <div class="col-md-6">
        <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Data Pasien</h3>
              </div>
              <form id="diagnosa" role="form">
                <?php
                echo '<div class="box-body">
                <input type="hidden" class="form-control"  id="id" name="id" value="'.$id.'">
                <div class="form-group">
                  <label>No Rekam Medis</label>
                  <input type="text" class="form-control" value="'.$noRM.'" disabled>
                </div>
                <div class="form-group">
                  <label>Nama Pasien</label>
                  <input type="text" class="form-control" value="'.$namaPasien.'" disabled>
                </div>
                <!-- textarea -->
                <div class="form-group">
                  <label>Diagnosa</label>
                  <textarea class="form-control" id="diagnosa" name="diagnosa" rows="3" value="'.$diagnosa.'"></textarea>
                </div>';
                ?>
                
                </div>
              </form>
            </div>
        </div>
        <div class="col-md-6">
        <div class="box box-warning">
        <div class="box-header with-border">
              <h3 class="box-title">Data Layanan</h3>
              <button  type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-layanan" onclick="resetFormLayanan()"><i class="fa fa-plus"></i> Tambah Layanan</button>
            </div>
            <div class="box-body">
            <?php 
                
                
                  //echo '<button  type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-layanan" onclick="resetFormLayanan()"><i class="fa fa-plus"></i> Tambah Layanan</button>';
                  create_table_id(array("Nama Layanan","Tarif","Aksi"),'layanan');
                  echo '</div>';
                  ?>
        </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
        <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Data Obat</h3>
              <button  type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-obat" onclick="resetFormObat()"><i class="fa fa-plus"></i> Tambah Obat</button>
            </div>
            <div class="box-body">
               <?php  
                  create_table_id(array("Nama Obat","Dosis","Harga","Jumlah","Biaya","Aksi"),'obat');
                  ?>
          </div>
            
        </div>
      </div>
    </section>
<?php
  open_form('modal-primary','modal-layanan','Tambah Data Layanan Pasien');
  $list=array();
  $query=mysqli_query($mysqli,"SELECT idLayanan,namaLayanan FROM layanan");
  while($r=mysqli_fetch_array($query)){
      $list[]=array($r[0],$r[1]);
  }
  create_combo_cari("Layanan","ccLayanan",$list,"required");
  echo '</form></div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success" onclick="save_data_layanan('.$id.')"><i class="fa fa-save"></i> Simpan</button>
             
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>';


        open_form('modal-success','modal-obat','Tambah Data Obat Pasien');
        $list=array();
        $query=mysqli_query($mysqli,"SELECT idObat,namaObat FROM obat WHERE stok > 1 AND curdate()+7 < tanggalExpired ");
        while($r=mysqli_fetch_array($query)){
            $list[]=array($r[0],$r[1]);
        }
        create_combo_cari("Obat","ccObat",$list,"required");
        create_textbox("Dosis", "dosis","text",5,"","required");
        create_textbox("Jumlah", "jumlah","number",5,"","required");
        echo '</form></div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-warning pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                      <button type="submit" class="btn btn-primary" onclick="save_data_obat('.$id.')"><i class="fa fa-save"></i> Simpan</button>
                   
                     
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>';
?>
    <script>
     var id=<?php echo "$id"; ?>;
     
     $(function(){
    table = $('#layanan').DataTable({
       "processing" : true,
       "searching"   : false,
       "lengthChange": false,
       "bDestroy": true,
       "ajax" : {
          "url" : "data/data_diagnosa.php?action=table_layanan&id="+id,
          "type" : "POST"
       }
       
    });
   
  });

  $(function(){
    table = $('#obat').DataTable({
       "processing" : true,
       "searching"   : false,
       "lengthChange": false,
       "bDestroy": true,
       "ajax" : {
          "url" : "data/data_diagnosa.php?action=table_obat&id="+id,
          "type" : "POST"
       }
       
    });
    
  });
</script>
