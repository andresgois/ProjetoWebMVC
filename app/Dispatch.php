<?php
    namespace App;

    use Src\Classes\ClassRoutes;

    class Dispatch extends ClassRoutes{

        # Atributos
        private $Method;
        private $Param=[];
        private $Obj;

        protected function getMethod(){  return $this->Method; }
        public function setMethod($Method){ $this->Method = $Method;  }
        protected function getParam(){  return $this->Param; }
        public function setParam($Param){ $this->Param = $Param;  }

        # Método construtor
        public function __construct()
        {
            // redireciona para o método controle
            self::addController();
        }
        # Método de adição de controller
        public function addController(){
            $RotaController = $this->getRota();
            $NameS = "App\\Controller\\{$RotaController}";
            $this->Obj = new $NameS;

            // chama o addMethod para o primeiro elemento dentro do controller
            if(isset($this->parserUrl()[1])){
                self:: addMethod();
            }
        }
        # Método de adição de método do controller
        public function addMethod(){
            // verifica se o método existe dentro do controller chamado
            if(method_exists($this->Obj, $this->parserUrl()[1])){
                if(method_exists($this->Obj, $this->parserUrl()[1])){
                    $this->setMethod("{$this->parserUrl()[1]}");
                    self::addParam();
                    call_user_func_array([$this->Obj, $this->getMethod()], $this->getParam());
                }
            }
        }
        # Método de adição de parâmetros do controller
        public function addParam(){
            $ContArray = count($this->parserUrl());

            if($ContArray > 2){
                foreach($this->parserUrl() as $key => $value){
                    //echo $key."=>".$value."<br>";
                    if($key > 1){
                        $this->setParam($this->Param += [$key => $value]);
                    }
                }
                
            }
        }

    }
?>