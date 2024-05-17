function cetak(id) {
    $("<iframe id='cetak'>")    
        //.hide()                   
        .attr("style","width:0;height:0;border:0;border:none;")  
        .attr("src", "cetak/cetak_bayar.php?id="+id) 
        .appendTo("body");           
    }

function updateBayar(id){
    $.ajax({
        url : "data/data_bayar.php?action=update&id="+id,
        type : "GET",
        success : function(data){
           if (data=='ok'){
            $('#isi').hide().load('content/pendaftaran.php').fadeIn('normal');
           }
        },
        error : function(){
           alert("Tidak dapat memperbaharui data!");
        }
     });
   }
