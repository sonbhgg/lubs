abstract class Figure
{
    protected $area;       
    protected $color;      
    protected $sidesCount; 
    
    abstract public function infoAbout();
}

class Rectangle extends Figure implements AreaCalculable
{}

class Square extends Figure implements AreaCalculable
{}

class Triangle extends Figure implements AreaCalculable
{}
