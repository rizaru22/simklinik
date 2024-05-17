$(document).ready(function() {
    $('#datepicker').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    });
   
    $('#datepicker').datepicker('setDate', 'today');
    
});

function tampilLaporan(){
    var kirim,tgl,bln,thn;
    var tanggal=$('#datepicker').datepicker('getDate');
    if (tanggal !== null){
        tanggal instanceof Date;
       tgl=tanggal.getDate();
       bln=tanggal.getMonth()+1;
       thn=tanggal.getFullYear();
        kirim=thn+'-'+bln+'-'+tgl;
    }
    $('#isi').hide().load('content/tampil_laporan_harian.php?tanggal='+kirim).fadeIn('normal');	
}