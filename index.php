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
}
