<?php
  function open_form($tipe,$id,$title){
        echo '<div class="modal '.$tipe.' fade" id="'.$id.'">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">'.$title.'</h4>
              </div>
              <div class="modal-body">';
              echo '<form role="form" class="form-horizontal">
              <input type="hidden" class="form-control"  id="id" name="id">';
           
    }

  function create_textbox($label, $name, $type="text", $width='5', $class="", $attr=""){
        echo'<div class="form-group">
        <label for="'.$name.'" class="col-sm-3 control-label"> '.$label.'</label>
        <div class="col-sm-'.$width.'">
           <input type="'.$type.'" class="form-control '.$class.'" id="'.$name.'" name="'.$name.'" '.$attr.'/>
        </div> </div>';
     }
     function create_textbox_palceholder($label, $name, $type="text", $width='5', $class="", $attr="",$text){
      echo'<div class="form-group">
      <label for="'.$name.'" class="col-sm-4 control-label"> '.$label.'</label>
      <div class="col-sm-'.$width.'">
         <input type="'.$type.'" class="form-control '.$class.'" value="'.$text.'" id="'.$name.'" name="'.$name.'" '.$attr.'/>
      </div> </div>';
   }
   function close_form(){
            echo '</form></div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success" onclick="save_data()"><i class="fa fa-save"></i> Simpan</button>
             
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>';}

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

function create_combo_cari($label,$name,$list,$attr=""){
  echo '
  <div class="form-group">
    <label for="'.$name.'" class="col-sm-3 control-label">'.$label.'</label>
    <div class="col-sm-5">
    <select class="form-control select2" name="'.$name.'" style="width: 100%;" id="'.$name.'" '.$attr.'>
      <option value="">--Pilih '.$label.'--</option>';
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
    <textarea class="form-control '.$class.'" id="'.$name.'" rows="4" name="'.$name.'" '.$attr.'></textarea>
  </div> </div>';
}

//Date Picker
function create_datepicker($label,$name,$width='3',$attr=''){
echo '<div class="form-group">
   <label for="'.$name.'" class="col-sm-3 control-label">'.$label.'</label>
   <div class="col-sm-6">
       <input type="text" class="form-control" id="'.$name.'" name="'.$name.'" '.$attr.'/>
    </div>
    </div>';
}
    function modal_form(){
      echo '<div class="modal modal-primary fade" id="modal-primary">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Primary Modal</h4>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-outline">Save changes</button>

            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->';
    }
?>