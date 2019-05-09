<?
	require_once "rectangle.php";
	require_once "circle.php";
	require_once "pyramid.php";
	require_once "lib.php";
	randomFigures(4);//вызываем функцию генерации случайных объектов с записью их в файл
	$sorted=sortFigures(readFigures());//читаем из файла объекты и тут же сортируем, после чего записываем их в массив    
	foreach ($sorted as $val)//вывод на экран
	{
	 echo $val->getType(), ' , Площадь=', $val->getArea(), '<br>';
	}

?>