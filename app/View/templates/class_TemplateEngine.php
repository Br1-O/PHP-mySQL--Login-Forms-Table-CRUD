<?php

class TemplateEngine {

    //■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Private_Variables ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■//


        private $template;
        private $headLoader;
        private $data;

    //■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■    Constructor    ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■//


        public function __construct($template, $headLoader= 'templates\headLoader.php'){
            $this->template=$template;
            $this->headLoader=$headLoader;
            $this->data=array();
        }

    //■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■      Getters      ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■//


        public function getData(){
            return $this->data;
        }

        public function getTemplate(){
            return $this->template;
        }

        public function getHeadLoader(){
            return $this->headLoader;
        }

    //■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■      Setters      ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■//


        public function setData($key,$data){
            $this->data[$key]=$data;
        }

        public function setTemplate($template){
            $this->template=$template;
        }

        public function setHeadLoader($headLoader){
            $this->headLoader=$headLoader;
        }

    //■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  Dinamic Methods  ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■//


        //asignamos los datos a cambiar de los placeholder de los template, con tuplas clave-valor, [key, value] donde key = placeholder
        public function assign(...$data){
            foreach ($data as $tuple) {
                if (is_array($tuple)&&count($tuple)===2){
                    [$key, $value]=$tuple;
                    $this->data[$key]=$value;
                }else {
                    throw new InvalidArgumentException('¡Formato invalido! Pase los datos del método assign como tuplas con argumentos clave-valor.');
                }
            }
        }

        public function render(){
            extract($this->data);
            include ($this->headLoader);
            include ($this->template);
            ob_start();
            $applied_template= ob_get_contents();
            ob_end_clean();
            return $applied_template;
        }

        //Este método va a tomar como argumento un array asociativo antes creado por nosotros,
            //dicho array va a tener como key los roles de los usuarios y como value el contenido a visualizar por ellos
            //antes tenemos que haber definido el value de user dentro del array 'data' del objeto para que seleccione qué renderizar!!!

        public function renderForRole($ArrayAssocRoleContent){
            $userRole=$this->data['role'];
            if(isset($ArrayAssocRoleContent[$userRole])){
                extract($this->data);
                include ($this->headLoader);
                $content=$ArrayAssocRoleContent[$userRole];
                ob_start();
                $roleContent= ob_get_contents();
                ob_end_clean();
                echo $roleContent;
            }else{
                include ($this->headLoader);
                $content=$ArrayAssocRoleContent['default'];
            }
            echo $content;
        }

    //■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  Static Methods   ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■//


}