<?php

class Worker
{
    // Задание 1: класс и свойства
    private $name;
    private $age;
    private $salary;
    
    //Задание 6: свойство для изменненого метода getSalary()
    private static $totalSalary = 0;
    
    public function __construct($name, $age, $salary)
    {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
        self::$totalSalary += $salary;
    }
    
    // Задание 3: метод получения имени сотрудника
    public function getName()
    {
        return $this->name;
    }
    
    // Задание 4: метод получения возраста сотрудника
    public function getAge()
    {
        return $this->age;
    }
    
    // Задание 5: метод получения зп
    public function getSalary()
    {
        return $this->salary;
    }
    
    // Задание 6: метод получения зп всех работников
    public static function getTotalSalary()
    {
        return self::$totalSalary;
    }
    
    // Задание 7: изменненый getAge()
    // Задание 8: добавление проверки в метод
    // Задание 9: добавление метода checkAge()
    public function setAge($newAge)
    {
        if ($this->checkAge($newAge)) {
            $this->age = $newAge;
            echo "Возраст работника {$this->name} успешно изменён на {$newAge}<br>";
            return true;
        } else {
            echo "Вам работать в нашей компании еще рано (возраст {$newAge} лет)<br>";
            return false;
        }
    }
    
    // Задание 9: метод для проверки
    private function checkAge($age)
    {
        return $age >= 18;
    }
}

// Задание 1: 2 объекта класса
$worker1 = new Worker("Иван Петров", 25, 50000);
$worker2 = new Worker("Мария Сидорова", 19, 60000);

// Задание 2: сумма зарплат и сумма возрастов
$totalSalary = $worker1->getSalary() + $worker2->getSalary();
$totalAge = $worker1->getAge() + $worker2->getAge();
echo "Сумма зарплат работников: " . $totalSalary . " руб.<br>";
echo "Сумма возрастов работников: " . $totalAge . " лет<br><br>";

// Задание 5: работа метода для вывода зп
echo "Метод getSalary() для worker1: " . $worker1->getSalary() . "<br><br>";

// Задание 6: работа метода
echo "Общая сумма зарплат всех работников: " . Worker::getTotalSalary() . " руб.<br><br>";

// Задание 9: работа метода
$worker2->setAge(20);
echo "Новый возраст Марии: " . $worker2->getAge() . " лет<br><br>";
?>
