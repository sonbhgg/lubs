<?php

class Worker
{
    // Задание 1: класс и свойства
    private $name;
    private $age;
    private $salary;
    
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
    
    // Задание 5: метод получения
    public function getSalary()
    {
        return $this->salary;
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
?>
