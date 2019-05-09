<?php
	require_once "figure.php";
	class Rectangle extends Figure
		{
			private $side1;
			private $side2;
			function __construct($a = 0,$b=0)
			{
				$this->type = '';
				$a = floatval($a);
				$b = floatval($b);
				if ($a > 0 && $b > 0)
				{
					$this->type = 'Rectangle';
					$this->side1 = $a;
					$this->side2 = $b;
				}
			}
			public function getArea()
			{
				if (!$this->type) return 0;
				return $this->side1 * $this->side2;
			}
			public function writeFigure($file="file.txt")
			{
				if (!$this->type) return 0;
				$fileopen=fopen($file, "a+");
				$write=$this->type.",".$this->side1.",".$this->side2."\r\n";
				fwrite($fileopen,$write);
				fclose($fileopen);		   
			}
		}
?>