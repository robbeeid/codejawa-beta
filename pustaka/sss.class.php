<?php 
class view{
    public $viewName = NULL;
    public $data = array();
    public $isRender = FALSE;
    public function __construct($view){
        $this->viewName = $view;
    }
    public function bind ($name, $value = ''){
        if(is_array($name)){
            foreach($name as $attr=>$val){
                $this->data[$attr] = $val;
            }
        }
        else{
            foreach($value as $attr=>$val){
                $this->{$name}[$attr] = $val;
            }        
        } 
        
    }
    
    public function forceRender(){
        $this->isRender = TRUE;
        extract($this->data);
        $view = 'modul'.'/'.'views'.'/'.$this->viewName.'.view.php';
        if(file_exists($view)) require_once $view;
                else echo('View Not Found');
    }
    
    public function __destruct(){
        if(!$this->isRender) $this->forceRender();
    }
}