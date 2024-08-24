<?php
// funcion
function card($id,$horario){
  return '<li class="list-group-item">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheck'.$id.'.'.$horario.'">
              <label class="form-check-label" for="flexCheck'.$id.'.'.$horario.'">
                '.$horario.'
              </label>
            </div>
          </li>';
}
?>