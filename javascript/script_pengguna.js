var save_method, table;


//Menampilkan data dengan plugin datatables
$(function(){
  table = $('.table').DataTable({
     "processing" : true,
     "bDestroy": true,
     "ajax" : {
        "url" : "data/data_pengguna.php?action=table_data",
        "type" : "POST"
     }
     
  });
  
});



//Ketika tombol tambah diklik
function resetForm(){
   save_method = "add";
   $('#modal-pengguna form')[0].reset();
   $('.modal-title').text('Tambah Data Pengguna');
}

//simpan data
function save_data(){
  
  if(save_method == "add")   url = "data/data_pengguna.php?action=insert";
  else url = "data/data_pengguna.php?action=update";
   var formdata = new FormData();      
   var file = $('#photo')[0].files[0];
   formdata.append('photo', file);
   $.each($('#modal-pengguna form').serializeArray(), function(a, b){
      formdata.append(b.name, b.value);
   });

  $.ajax({
     url : url,
     data: formdata,
     processData: false,
     contentType: false,
     type: 'POST',
     success : function(data){
        if(data !='ok'){
         alert('gagal upload photo, extensi file harus PNG BMP JPEG ');
        }else{
         $('#modal-pengguna').modal('hide');
         table.ajax.reload();
        }
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
  $('#modal-pengguna form')[0].reset();
  $.ajax({
     url : "data/data_pengguna.php?action=form_data&id="+id,
     type : "GET",
     dataType : "JSON",
     success : function(data){
        $('#modal-pengguna').modal('show');
        $('.modal-title').text('Edit Data Pengguna');
        $('#id').val(data.idPengguna);
        $('#namaPengguna').val(data.namaPengguna);
        $('#username').val(data.username);
        $('#level').val(data.level);
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
       url : "data/data_pengguna.php?action=delete&id="+id,
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