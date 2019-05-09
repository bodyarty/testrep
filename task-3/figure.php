<?php
	error_reporting(-1);
	header('Content-Type: text/html; charset=utf-8');
	class Figure
    {
        protected $type = '';
        public function getArea() {}//метод подсчета площади
        public function writeFigure($file="file.txt") {}//метод записи объекта в файл
        public function getType()
        {
            if ($this->type == '') return 'Фигура задана неверно';
            else return $this->type;
        }
    }
    
    
    
    