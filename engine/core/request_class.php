<?php

class Request{

    private $data;

    public function __construct(){

        // +
        $this->data = $this->xss($_REQUEST);

        //$request["func"] = "delete";
       // $request["obj"] = "article";
//        $request["name"] = "title_2";
//        $request["value"] = "CSS";
        //$this->data = $this->xss($request);
        // -

    }

    public function __get($name){
        if(isset($this->data[$name])){
            return $this->data[$name];
        }
    }

    private function xss($data){
        if(is_array($data)){
            $escaped = array();
            foreach ($data as $key => $value){
                $escaped[$key] = $this->xss($value);
            }
            return $escaped;
        }
        return trim(htmlspecialchars($data));
    }

}

?>