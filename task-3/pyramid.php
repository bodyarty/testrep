<?php
	class Pyramid extends Figure
    {
        private $a, $b, $c, $d;
        function __construct($a = array(3), $b = array(3), $c = array(3),$d = array(3))
        {
			$this->type = '';
			$this->a = $a;//координаты точки а                   
			$this->b = $b;//координаты точки b 
			$this->c = $c;//координаты точки c 
			$this->d = $d;//координаты точки d 
			if((($this->b[0]-$this->a[0])*($this->c[1]-$this->a[1])*($this->d[2]-$this->a[2]) + ($this->b[1]-$this->a[1])*($this->c[2]-$this->c[2])*($this->d[0]-$this->a[0]) + ($this->b[2]-$this->a[2])*//проверка не лежат ли все точки пирамиды в одной плоскости
			($this->c[0]-$this->a[0])*($this->d[1]-$this->a[1]) - ($this->b[2]-$this->a[2])*($this->c[1]-$this->a[1])*($this->d[0]-$this->a[0]) - ($this->b[0]-$this->a[0])*($this->c[2]-$this->c[2])*
			($this->d[1]-$this->a[1]) - ($this->b[1]-$this->a[1])*($this->c[0]-$this->a[0])*($this->d[2]-$this->a[2]) )!=0 ){
				$this->type = 'Pyramid';
			}				
        }
        
        public function getArea()
        {
			
			/*Поочередный подсчет площади каждой грани, зная коородинаты каждой точки*/
            if (!$this->type) return 0;
			$abc=(sqrt(pow(((($this->b[1]-$this->a[1])*($this->c[2]-$this->a[2]))-(($this->b[2]-$this->a[2])*($this->c[1]-$this->a[1]))),2)+
				 pow(((($this->b[0]-$this->a[0])*($this->c[2]-$this->a[2]))-(($this->b[2]-$this->a[2])*($this->c[0]-$this->a[0]))),2)+
				 pow(((($this->b[0]-$this->a[0])*($this->c[1]-$this->a[1]))-(($this->b[1]-$this->a[1])*($this->c[0]-$this->a[0]))),2)))/2
			;
			
			$abd=(sqrt(pow(((($this->b[1]-$this->a[1])*($this->d[2]-$this->a[2]))-(($this->b[2]-$this->a[2])*($this->d[1]-$this->a[1]))),2)+
				 pow(((($this->b[0]-$this->a[0])*($this->d[2]-$this->a[2]))-(($this->b[2]-$this->a[2])*($this->d[0]-$this->a[0]))),2)+
				 pow(((($this->b[0]-$this->a[0])*($this->d[1]-$this->a[1]))-(($this->b[1]-$this->a[1])*($this->d[0]-$this->a[0]))),2)))/2
			;
			
			$acd=(sqrt(pow(((($this->c[1]-$this->a[1])*($this->d[2]-$this->a[2]))-(($this->c[2]-$this->a[2])*($this->d[1]-$this->a[1]))),2)+
				 pow(((($this->c[0]-$this->a[0])*($this->d[2]-$this->a[2]))-(($this->c[2]-$this->a[2])*($this->d[0]-$this->a[0]))),2)+
				 pow(((($this->c[0]-$this->a[0])*($this->d[1]-$this->a[1]))-(($this->c[1]-$this->a[1])*($this->d[0]-$this->a[0]))),2)))/2
			;
			$bcd=(sqrt(pow(((($this->c[1]-$this->b[1])*($this->d[2]-$this->b[2]))-(($this->c[2]-$this->b[2])*($this->d[1]-$this->b[1]))),2)+
				 pow(((($this->c[0]-$this->b[0])*($this->d[2]-$this->b[2]))-(($this->c[2]-$this->b[2])*($this->d[0]-$this->b[0]))),2)+
				 pow(((($this->c[0]-$this->b[0])*($this->d[1]-$this->b[1]))-(($this->c[1]-$this->b[1])*($this->d[0]-$this->b[0]))),2)))/2
			;
			$s=$abc+$abd+$acd+$bcd;//Подсчет площади поверхности пирамиды путем сложения площадей всех граней
            return $s;
        }
		public function writeFigure($file="file.txt")
        {
			if (!$this->type) return 0;
			$fileopen=fopen($file, "a+");
			$write=$this->type.",".$this->a[0].",".$this->a[1].",".$this->a[2].",".$this->b[0].",".$this->b[1].",".$this->b[2].",".$this->c[0].",".$this->c[1].",".$this->c[2].",".$this->d[0].",".$this->d[1].",".$this->d[2]."\r\n";
			fwrite($fileopen,$write);
			fclose($fileopen);		   
        }		
    }
?>