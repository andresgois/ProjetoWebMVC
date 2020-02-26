<?php

    namespace App\Controller;
    use Src\Classes\ClassRender;
    use Src\Interfaces\InterfaceView;

    class ControllerHome extends ClassRender implements InterfaceView{

        public function __construct()
        {
            $this->setTitle("Página inicial");
            $this->setDescription("Site MVC");
            $this->setKeywords("MVC completo, curso mvc");
            $this->setDir("home/");
            $this->renderLayout();
        }
    }

?>