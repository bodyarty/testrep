<?php
	require_once "figure.php";
	class Circle extends Figure
    {
        private $radius;
        function __construct($r = 0)
        {
            $this->type = '';
            $r = floatval($r);
            if ($r > 0)
            {
                $this->type = 'Circle';
                $this->radius = $r;   
            }    
                
        } 
        public function getArea()
        {
            if (!$this->type) return 0;
            return M_PI * $this->radius * $this->radius;
        }
		public function writeFigure($file="file.txt")
        {
			if (!$this->type) return 0;
			$fileopen=fopen($file, "a+");
			$write=$this->type.",".$this->radius."\r\n";
			fwrite($fileopen,$write);
			fclose($fileopen);		   
        }		
    }  
?>