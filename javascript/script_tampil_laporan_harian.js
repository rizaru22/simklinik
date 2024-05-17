function cetak(tanggal) {
   
    $("<iframe id='cetak'>")    
        //.hide()                   
        
        .attr("style","width:0;height:0;border:0;border:none;")  
        .attr("src", "cetak/cetak_laporan_harian.php?tanggal="+tanggal) 
        .appendTo("body");           
    }