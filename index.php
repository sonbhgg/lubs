interface AreaCalculable
{
    public function getArea();
}

abstract class Figure
{
    protected $area;       
    protected $color;      
    protected $sidesCount; 
    
    abstract public function infoAbout();
}

class Rectangle extends Figure implements AreaCalculable
{
    private $a;
    private $b;
}

class Square extends Figure implements AreaCalculable
{
    private $a;
}

class Triangle extends Figure implements AreaCalculable
{
    private $a;
    private $b;
    private $c;
}
