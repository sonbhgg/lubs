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
