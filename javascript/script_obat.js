var save_method, table;

 //Date picker
 $('#tanggalBeli').datepicker({
  format: 'yyyy-mm-dd',
  clearBtn:true,
  autoclose: true
})

$('#tanggalExpired').datepicker({
   format: 'yyyy-mm-dd',
   //startDate:'+1y',
   clearBtn:true,
   autoclose: true
 })

//Menampilkan data dengan plugin datatables
$(function(){
  table = $('.table').DataTable({
     "processing" : true,
     "bDestroy": true,
     "ajax" : {
        "url" : "data/data_obat.php?action=table_data",
        "type" : "POST"
     }
     
  });
  
});

function backtoTabel(link){
   $('#isi').hide().load(link).fadeIn("normal");	
}

//Ketika tombol tambah diklik
function resetForm(){
   save_method = "add";
   $('#modal-obat form')[0].reset();
   $('.modal-title').text('Tambah Data Obat');
}

//simpan data
function save_data(){
  
  if(save_method == "add")   url = "data/data_obat.php?action=insert";
  else url = "data/data_obat.php?action=update";
  
  $.ajax({
     url : url,
     type : "POST",
     data : $('#modal-obat form').serialize(),
     success : function(data){
      $('#modal-obat').modal('hide');
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
  $('#modal-obat form')[0].reset();
  $.ajax({
     url : "data/data_obat.php?action=form_data&id="+id,
     type : "GET",
     dataType : "JSON",
     success : function(data){
        $('#modal-obat').modal('show');
        $('.modal-title').text('Edit Data Obat');
        $('#id').val(data.idObat);
        $('#namaObat').val(data.namaObat);
        $('#tanggalBeli').val(data.tanggalBeli);
        $('#tanggalExpired').val(data.tanggalExpired);
        $('#hargaBeli').val(data.hargaBeli);
        $('#hargaJual').val(data.hargaJual);
        $('#stok').val(data.stok);
        $('#satuan').val(data.satuan);
        $('#brand').val(data.brand);
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
       url : "data/data_obat.php?action=delete&id="+id,
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