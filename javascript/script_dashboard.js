
//Menampilkan data dengan plugin datatables
$(function(){
    table = $('.table').DataTable({
       "processing" : true,
       "bDestroy": true,
       "searching":false,
       "lengthChange": false,
       "ordering": false,
       "ajax" : {
          "url" : "data/data_table_pendapatan.php?action=table_data",
          "type" : "POST"
       }
       
    });
    
  });