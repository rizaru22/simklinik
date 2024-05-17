var save_method, table;


//Menampilkan data dengan plugin datatables
$(function(){
  table = $('.table').DataTable({
     "processing" : true,
     "bDestroy": true,
     "ajax" : {
        "url" : "data/data_layanan.php?action=table_data",
        "type" : "POST"
     }
     
  });
  
});



//Ketika tombol tambah diklik
function resetForm(){
   save_method = "add";
   $('#modal-layanan form')[0].reset();
   $('.modal-title').text('Tambah Data Layanan');
}

//simpan data
function save_data(){
  
  if(save_method == "add")   url = "data/data_layanan.php?action=insert";
  else url = "data/data_layanan.php?action=update";
  
  $.ajax({
     url : url,
     type : "POST",
     data : $('#modal-layanan form').serialize(),
     success : function(data){
      $('#modal-layanan').modal('hide');
        table.ajax.reload();
     },
     error : function(){
     alert("Tidak dapat menyimpan data!");
   }			
  });
  return false;
}

//Ketika tombol edit diklik
function form_edit(id){
  save_method = "edit";
  $('#modal-layanan form')[0].reset();
  $.ajax({
     url : "data/data_layanan.php?action=form_data&id="+id,
     type : "GET",
     dataType : "JSON",
     success : function(data){
        $('#modal-layanan').modal('show');
        $('.modal-title').text('Edit Data Layanan');
        $('#id').val(data.idLayanan);
        $('#namaLayanan').val(data.namaLayanan);
        $('#tarif').val(data.tarif);
     },
     error : function(){
        alert("Tidak dapat menampilkan data!");
     }
  });
}

//Ketika tombol hapus diklik
function delete_data(id){
  if(confirm("Apakah yakin data akan dihapus?")){
     $.ajax({
       url : "data/data_layanan.php?action=delete&id="+id,
       type : "GET",
       success : function(data){
          table.ajax.reload();
       },
       error : function(){
          alert("Tidak dapat menghapus data!");
       }
    });
  }
}