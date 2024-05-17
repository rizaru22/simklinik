<?php
    function form_start($id){
     echo '<form id='.$id.' class="form-horizontal">
        <div class="box-body">';
    }


    function create_textbox($label, $name, $type="text", $width='5', $class="", $attr=""){
        echo'<div class="form-group">
        <label for="'.$name.'" class="col-sm-3 control-label"> '.$label.'</label>
        <div class="col-sm-'.$width.'">
           <input type="'.$type.'" class="form-control '.$class.'" id="'.$name.'" placeholder="'.$label.'" name="'.$name.'" '.$attr.'/>
        </div> </div>';
     }

     //Fungsi untuk membuat combobox / select box
function create_combobox($label, $name, $list, $width='5', $class="", $attr=""){
    echo'<div class="form-group">
    <label for="'.$name.'" class="col-sm-3 control-label"> '.$label.'</label>
    <div class="col-sm-'.$width.'">
       <select class="form-control '.$class.'" name="'.$name.'" id="'.$name.'" '.$attr.'>
          <option value="">- Pilih -</option>';
  
  foreach($list as $ls){
    echo '<option value='.$ls[0].'>'.$ls[1].'</option>';
  }
   
    echo '</select>
    </div> </div>';
  }

  //Fungsi untuk membuat textarea
  function create_textarea($label, $name, $class='', $attr=''){
    echo'<div class="form-group">
    <label for="'.$name.'" class="col-sm-3 control-label"> '.$label.'</label>
    <div class="col-sm-6">
      <textarea class="form-control '.$class.'" id="'.$name.'" placeholder="'.$label.'" rows="4" name="'.$name.'" '.$attr.'></textarea>
    </div> </div>';
  }
  
  //Date Picker
  function create_datepicker($label,$name,$width='3',$attr=''){
  echo '<div class="form-group">
     <label for="'.$name.'" class="col-sm-3 control-label">'.$label.'</label>
     <div class="col-sm-'.$width.'">
         <input type="text" class="form-control" id="'.$name.'" placeholder="'.$label.'" name="'.$name.'" '.$attr.'/>
      </div>
      </div>';
  }

function form_stop($link){
  echo '<div class="box-footer">
                  <button type="button" class="btn btn-warning" onclick="backtoTabel('.$link.')"><i class="fa fa-close"></i> Batal</button>
                  <button type="submit" class="btn btn-info pull-right" onclick="save_data()"><i class="fa fa-save"></i> Simpan</button>
                </div>
                <!-- /.box-footer -->
              </form>';
}
?>