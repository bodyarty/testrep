<?
	function randomFigures($n=1){//функция создания случайных объектов
		$types=array("rectangle","circle","pyramid");
		$objects='';
		for($i=0;$i<$n;$i++){
			switch ($types[array_rand($types)]) 
			{
				case 'circle':
					$objects[] = new Circle(rand(0, 100));
					break;
				case 'rectangle':
					$objects[] = new Rectangle(rand(0, 100),rand(0, 100));
					break;
				case 'pyramid':
					$objects[] = new Pyramid(array(rand(0, 100),rand(0, 100),rand(0, 100)), array(rand(0, 100),rand(0, 100),rand(0, 100)),array(rand(0, 100),rand(0, 100),rand(0, 100)),array(rand(0, 100),rand(0, 100),rand(0, 100)));
					break;                
			}
			$objects[$i]->writeFigure("file.txt");
		}
	}
	function sortFigures($objects){//функция сортировки объектов
		for($i=0;$i<count($objects);$i++){
			for($j=0;($j<count($objects)-1);$j++){
				$obj='';
				if($objects[$j]->getArea()<$objects[$j+1]->getArea()){
					$obj=$objects[$j+1];
					$objects[$j+1]=$objects[$j];
					$objects[$j]=$obj;
				}
			}
		}
		return $objects;
	}
	function readFigures(){//функция чтения объектов из файла
		$figures = ''; 
		$f = file('file.txt');
		foreach ($f as $val)
		{
			$which = explode(',', trim($val));
			switch ($which[0]) 
			{
				case 'Circle':
					$figures[] = new Circle($which[1]);
					break;
				case 'Rectangle':
					$figures[] = new Rectangle($which[1],$which[2]);
					break;
				case 'Pyramid':
					$figures[] = new Pyramid(array($which[1], $which[2], $which[3]),array($which[4], $which[5], $which[6]),array($which[7], $which[8], $which[9]),array($which[10], $which[11], $which[12]));
					break;                
			}
		}
		return $figures;
	}
?>