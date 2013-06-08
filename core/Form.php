<?php
class Form{
	
	public $controller; 
	public $errors; 

	public function __construct($controller){
		$this->controller = $controller; 
	}

	public function input($name,$label,$options = array(), $select=array()){
		$error = false; 
		$classError = ''; 
		if(isset($this->errors[$name])){
			$error = $this->errors[$name];
			$classError = ' error'; 
		}
		if(!isset($this->controller->request->data->$name)){
			$value = ''; 
		}else{
			$value = $this->controller->request->data->$name; 
		}
		if($label == 'hidden'){
			return '<input type="hidden" name="'.$name.'" value="'.$value.'">'; 
		}
		$html = '<div class="clearfix"><div class="control-group'.$classError.'">
					<label for="input'.$name.'">'.$label.'</label>
					<div class="input"><div class="controls">';
		$attr = ' '; 
		foreach($options as $k=>$v){ if($k!='type'){
			$attr .= " $k=\"$v\""; 
		}}
		if(!isset($options['type']) && !isset($options['options'])){
			$html .= '<input type="text" id="input'.$name.'" name="'.$name.'" value="'.$value.'"'.$attr.'>';
		}elseif(isset($options['options'])){
			$html .= '<select id="input'.$name.'" name="'.$name.'">';
			foreach($options['options'] as $k=>$v){
				$html .= '<option value="'.$k.'" '.($k==$value?'selected':'').'>'.$v.'</option>'; 
			}
			$html .= '</select>'; 
		}elseif($options['type'] == 'textarea'){
			$html .= '<textarea id="input'.$name.'" name="'.$name.'"'.$attr.'>'.$value.'</textarea>';
        }elseif($options['type'] == 'date'){
            $html .= '<input type="date" id="input'.$name.'" name="'.$name.'" value="'.$value.'"'.$attr.'>';
		}elseif($options['type'] == 'checkbox'){
			$html .= '<input type="hidden" name="'.$name.'" value="0"><input type="checkbox" name="'.$name.'" value="1" '.(empty($value)?'':'checked').'>'; 
		}elseif($options['type'] == 'file'){
			$html .= '<input type="file" class="input-file" id="input'.$name.'" name="'.$name.'"'.$attr.'>';
		}elseif($options['type'] == 'password'){
			$html .= '<input type="password" id="input'.$name.'" name="'.$name.'" value="'.$value.'"'.$attr.'>';
		}elseif($options['type'] == 'select'){
            $html .= '<select name="'.$name.'">';
            foreach($select as $k=>$v){
                if($k==$value){
                    $html .= '<option value="'.$k.'" selected="selected">'.$v.'</option>';
                }else{
                    $html .= '<option value="'.$k.'">'.$v.'</option>';
                }

            }
            $html .='</select>';
        }

		if($error){
			$html .= '<span class="help-inline">'.$error.'</span>';
		}
		$html .= '</div></div></div></div>';
		return $html; 
	}


}