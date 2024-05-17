var save_method, table;


//Menampilkan data dengan plugin datatables
$(function(){
  table = $('.table').DataTable({
     "processing" : true,
     "bDestroy": true,
     "ajax" : {
        "url" : "data/data_pendaftar.php?action=table_data",
        "type" : "POST"
     }
     
  });
  
});

//Menampilkan data pada select 2
$('#pasien').select2();


//Ketika tombol tambah diklik
function resetForm(){
   save_method = "add";
   $('#modal-pendaftar form')[0].reset();
   $('.modal-title').text('Tambah Data Pendaftar');
}

//simpan data
function save_data(){
  
  if(save_method == "add")   url = "data/data_pendaftar.php?action=insert";
  else url = "data/data_pendaftar.php?action=update";
  
  $.ajax({
     url : url,
     type : "POST",
     data : $('#modal-pendaftar form').serialize(),
     success : function(data){
      $('#modal-pendaftar').modal('hide');
        table.ajax.reload();
     },
     error : function(){
     alert("Tidak dapat menyimpan data!");
   }			
  });
  return false;
}

//Ketika tombol edit diklik
/*function form_edit(id){
  save_method = "edit";
  $('#modal-pendaftar form')[0].reset();
  $.ajax({
     url : "data/data_pendaftar.php?action=form_data&id="+id,
     type : "GET",
     dataType : "JSON",
     success : function(data){
        $('#modal-pendaftar').modal('show');
        $('.modal-title').text('Edit Data Pendaftar');
        $('#pasien').val(data.tarif);
     },
     error : function(){
        alert("Tidak dapat menampilkan data!");
     }
  });
}*/

//Ketika tombol hapus diklik
function delete_data(id){
  if(confirm("Apakah yakin data akan dihapus?")){
     $.ajax({
       url : "data/data_pendaftar.php?action=delete&id="+id,
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

function open_form_diagnosa(id){
   $.ajax({
      url : "data/data_pendaftar.php?action=updateStatus&id="+id,
      type : "GET",
      success : function(data){
         $('#isi').hide().load('content/diagnosa.php?id='+id).fadeIn('normal');	
      },
      error : function(){
         alert("Tidak dapat memperbaharui data!");
      }
   });
}

function open_form_bayar(id){
         $('#isi').hide().load('content/bayar.php?id='+id).fadeIn('normal');	
}