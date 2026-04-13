<?php
interface AreaCalculable
{
    public function getArea();
}

abstract class Figure
{
    protected $area;       
    protected $color;      
    protected $sidesCount; 
    
    public function __construct($color = 'белый')
    {
        $this->color = $color;
    }
    
    abstract public function infoAbout();
}

class Rectangle extends Figure implements AreaCalculable
{
    private $a;
    private $b;
    
    public function __construct($a, $b, $color = 'белый')
    {
        parent::__construct($color);
        $this->a = $a;
        $this->b = $b;
        $this->sidesCount = 4;
    }
    
    public function getArea()
    {
        $this->area = $this->a * $this->b;
        return $this->area;
    }
    
    public function infoAbout()
    {
        return "Это класс прямоугольника. У него {$this->sidesCount} стороны.";
    }
}

class Square extends Figure implements AreaCalculable
{
    private $a;
    
    public function __construct($a, $color = 'белый')
    {
        parent::__construct($color);
        $this->a = $a;
        $this->sidesCount = 4;
    }
    
    public function getArea()
    {
        $this->area = $this->a * $this->a;
        return $this->area;
    }
    
    public function infoAbout()
    {
        return "Это класс квадрата. У него {$this->sidesCount} стороны.";
    }
}

class Triangle extends Figure implements AreaCalculable
{
    private $a;
    private $b;
    private $c;
    
    public function __construct($a, $b, $c, $color = 'белый')
    {
        parent::__construct($color);
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
        $this->sidesCount = 3;
    }
    
    public function getArea()
    {
        $s = ($this->a + $this->b + $this->c) / 2;
        $this->area = sqrt($s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c));
        return $this->area;
    }
    
    public function infoAbout()
    {
        return "Это класс треугольника. У него {$this->sidesCount} стороны.";
    }
}

echo "<h3>Прямоугольники</h3>";
$rect1 = new Rectangle(5, 10, 'красный');
$rect2 = new Rectangle(3, 7, 'синий');

echo $rect1->infoAbout() . " Площадь: " . $rect1->getArea() . "<br>";
echo $rect2->infoAbout() . " Площадь: " . $rect2->getArea() . "<br>";

echo "<h3>Квадраты</h3>";
$square1 = new Square(4, 'зелёный');
$square2 = new Square(6, 'жёлтый');

echo $square1->infoAbout() . " Площадь: " . $square1->getArea() . "<br>";
echo $square2->infoAbout() . " Площадь: " . $square2->getArea() . "<br>";

echo "<h3>Треугольники</h3>";
$tri1 = new Triangle(3, 4, 5, 'оранжевый');
$tri2 = new Triangle(5, 5, 6, 'фиолетовый');

echo $tri1->infoAbout() . " Площадь: " . $tri1->getArea() . "<br>";
echo $tri2->infoAbout() . " Площадь: " . $tri2->getArea() . "<br>";
