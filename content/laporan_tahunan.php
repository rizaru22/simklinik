<script type="text/javascript" src="javascript/script_laporan_tahunan.js"> </script>
<?php include "../library/function_form.php";?>
<?php include "../library/function_view.php";?>
    <!-- Content Header (Page header) -->
    <?php header_page("Laporan Tahunan","Laporan","Tahunan"); ?> 

    <!-- Main content -->
    

      <!--------------------------
        | Your Page Content Here |
        -------------------------->


    <!-- /.content -->
<section class="content container-fluid">
    <div class="row ">
        <div class="col-xs-6 col-xs-push-3">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Pilih Tahun</h3>            
                </div>
                <div class="box-body">  
                    <div class="form-group">
                            <label>Date:</label>

                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                    <input type="text" class="form-control pull-right" id="datepicker">
                    </div>
                    <!-- /.input group -->
                    </div>
                    
                    
                </div>
                <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right" onclick="tampilLaporan()"><i class="fa fa-print"></i> Tampilkan Laporan</button>
              </div>
            </div>
        </div>
    </div>
</section>
 