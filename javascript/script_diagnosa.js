//Menampilkan data dengan plugin datatables
var save_method, table;



//Menampilkan data pada select 2
$('#ccLayanan').select2();
$('#ccObat').select2();

function resetFormLayanan(){
    save_method = "addL";
    $('#modal-layanan form')[0].reset();
    $('.modal-title').text('Tambah Data Layanan Pasien');
 }

 function resetFormObat(){
    save_method = "addO";
    $('#modal-obat form')[0].reset();
    $('.modal-title').text('Tambah Data Obat Pasien');
 }

 //simpan data obat
 //simpan data
function save_data_layanan(id){
   if(save_method == "addL")   url = "data/data_diagnosa.php?action=insertLayanan&id="+id;
   $.ajax({
      url : url,
      type : "POST",
      data : $('#modal-layanan form').serialize(),
      success : function(data){
       $('#modal-layanan').modal('hide');
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
      },
      error : function(){
      alert("Tidak dapat menyimpan data!");
    }			
   });
   return false;
 }

 function delete_data_layanan(id,idL){
   if(confirm("Anda akan menghapus data layanan pasien ?")){
      $.ajax({
        url : "data/data_diagnosa.php?action=deleteLayanan&id="+id+"&idLayanan="+idL,
        type : "GET",
        success : function(data){
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
        },
        error : function(){
           alert("Tidak dapat menghapus data!");
        }
     });
   }
 }

 function save_data_obat(id){
   if(save_method == "addO")   url = "data/data_diagnosa.php?action=insertObat&id="+id;
   $.ajax({
      url : url,
      type : "POST",
      data : $('#modal-obat form').serialize(),
      success : function(data){
       $('#modal-obat').modal('hide');
       if (data=="stok kurang"){
         alert("Stok Obat Tidak Mencukupi !!")
       }else{
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
      }
      },
      error : function(){
      alert("Tidak dapat menyimpan data!");
    }			
   });
   return false;
 }

 function delete_data_obat(id,idO){
   if(confirm("Anda akan menghapus data obat pasien ?")){
      $.ajax({
        url : "data/data_diagnosa.php?action=deleteObat&id="+id+"&idObat="+idO,
        type : "GET",
        success : function(data){
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
        },
        error : function(){
           alert("Tidak dapat menghapus data!");
        }
     });
   } 
 }

 function saveDiagnosa(){
   $.ajax({
      url : "data/data_diagnosa.php?action=saveDiagnosa",
      type : "POST",
      data : $('#diagnosa').serialize(),
      success : function(data){
         $('#isi').hide().load('content/pendaftaran.php').fadeIn('normal');	
      },
      error:function(){
         alert("Tidak dapat menyimpan data");
      }
   });
 }