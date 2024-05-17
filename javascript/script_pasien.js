var save_method, table;

 //Date picker
 $('#tanggalLahir').datepicker({
  format: 'yyyy-mm-dd',
  startView:"decade",
  minView:"decade",   
  autoclose: true
})

//Menampilkan data dengan plugin datatables
$(function(){
   //table.destroy();
  table = $('.table').DataTable({
     "processing" : true,
     "bDestroy": true,
     "ajax" : {
        "url" : "data/data_pasien.php?action=table_data",
        "type" : "POST"
     }
     
  });
  
});

//Ketika tombol tambah diklik
function resetForm(){
  save_method = "add";
  $('#modal-pasien form')[0].reset();
  $('.modal-title').text('Tambah Data Pasien');
  
}

//simpan data
function save_data(){
  
  if(save_method == "add") url = "data/data_pasien.php?action=insert";
  else url = "data/data_pasien.php?action=update";
  
  $.ajax({
     url : url,
     type : "POST",
     data : $('#modal-pasien form').serialize(),
     success : function(data){
        $('#modal-pasien').modal('hide');
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
  $('#modal-pasien form')[0].reset();
  $.ajax({
     url : "data/data_pasien.php?action=form_data&id="+id,
     type : "GET",
     dataType : "JSON",
     success : function(data){
        $('#modal-pasien').modal('show');
        $('.modal-title').text('Edit Data Pasien');
        $('#id').val(data.noRM);
        $('#nik').val(data.nik);
        $('#nama').val(data.nama);
        $('#tempatLahir').val(data.tempatLahir);
        $('#tanggalLahir').val(data.tanggalLahir);
        $('#jk').val(data.jk);
        $('#goDa').val(data.goDa);
        $('#noHp').val(data.noHP);
        $('#alamat').val(data.alamat);
        
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
       url : "data/data_pasien.php?action=delete&id="+id,
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