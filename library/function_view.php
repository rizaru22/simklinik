<?php
//Fungsi Header Halaman
function header_page($title,$sub,$sub1,$link="'content/dashboard.php'"){
   echo '<section class="content-header">
   <h1>'
     .$title.
     '<small></small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="#" onclick="navigasi2('.$link.')" ><i class="fa fa-dashboard"></i> Home</a></li>
     <li class="active">'.$sub.'</li>
     <li class="active">'.$sub1.'</li>
   </ol>
 </section>';
}

//Fungsi untuk membuat tabel
function create_table($header){
   echo'<div class="table-responsive box-body">
   <table class="table table-bordered table-striped" width="100%">
   <thead><tr>
   <th style="width: 10px">No</th>';

foreach($header as $h){
   echo '<th>'.$h.'</th>';
}			
	
   echo '</tr></thead>
   <tbody></tbody>
   <tfooter><tr>
   <th style="width: 10px">No</th>';
	
foreach($header as $h){
  echo '<th>'.$h.'</th>';
}			
	
   echo'</tr></tfooter>
   </table>
   </div><br/>';

}

function create_table_id($header,$id){
   echo'<div class="table-responsive box-body">
   <table  class="table table-bordered table-striped" width="100%" id='.$id.'>
   <thead><tr>
   <th style="width: 10px">No</th>';

foreach($header as $h){
   echo '<th>'.$h.'</th>';
}			
	
   echo '</tr></thead>
   <tbody></tbody>
   <tfooter><tr>
   <th style="width: 10px">No</th>';
	
foreach($header as $h){
  echo '<th>'.$h.'</th>';
}			
	
   echo'</tr></tfooter>
   </table>
   </div><br/>';

}

//Fungsi untuk membuat tombol aksi pada tabel
function create_action($id, $edit=true, $delete=true){
    $view = "";
    if($edit) $view .= ' <a class="btn btn-primary btn-edit" onclick="form_edit(\''.$id.'\')"><i class="glyphicon glyphicon-pencil"></i></a>';
    if($delete)	$view .= ' <a class="btn btn-danger btn-delete" onclick="delete_data(\''.$id.'\')"><i class="glyphicon glyphicon-trash"></i></a>';
    return $view;
 }

 function button_cetak($id){
    $view = ' <a class="btn btn-warning btn-edit" onclick="form_cetak(\''.$id.'\')"><i class="glyphicon glyphicon-print"></i></a>';
    return $view;
 }

 function create_label($class,$text){
    $view='<span class="label label-'.$class.'">'.$text.'</span>';
    return $view;
 }

 function open_form_diagnosa($id){
    $view=' <a class="btn btn-warning " onclick="open_form_diagnosa(\''.$id.'\')"><i class="fa fa-plus-square"></i></a>';
    return $view;
 }

 function open_form_bayar($id){
   $view=' <a class="btn btn-success " onclick="open_form_bayar(\''.$id.'\')"><i class="fa fa-dollar"></i></a>';
   return $view;
}

function small_box($color,$h3,$p,$icon,$link){
echo '<div class="col-lg-3 col-xs-6">
<div class="small-box bg-'.$color.'">
  <div class="inner">
    <h3>'.$h3.'</h3>

    <p>'.$p.'</p>
  </div>
  <div class="icon">
    <i class="icon ion-'.$icon.'"></i>
    
  </div>
  <a href="#" class="small-box-footer" onclick="navigasi2(\''.$link.'\')">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>';
}
?>