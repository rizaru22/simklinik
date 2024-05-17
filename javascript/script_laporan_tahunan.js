$(document).ready(function() {
    $('#datepicker').datepicker({
      format: 'yyyy',
      viewMode:"years",
      minViewMode:"years",
      autoclose: true
    });
   
    $('#datepicker').datepicker('setDate', 'today');
    
});

function tampilLaporan(){
    var kirim,tgl,bln,thn;
    var tanggal=$('#datepicker').datepicker('getDate');
    if (tanggal !== null){
        tanggal instanceof Date;
       //tgl=tanggal.getDate();
       //bln=tanggal.getMonth()+1;
       thn=tanggal.getFullYear();
        
    }
    $('#isi').hide().load('content/tampil_laporan_tahunan.php?tahun='+thn).fadeIn('normal');	
}

function cetak(thn,bln){
    $("<iframe id='cetak'>")    
    //.hide()                   
    
    .attr("style","width:0;height:0;border:0;border:none;")  
    .attr("src", "cetak/cetak_laporan_tahunan.php?tahun="+thn)
    .appendTo("body");       
}