<?php


class Worker extends User
{
    private $salary;

    public function __construct(string $name, float $age, float $salary)
    {
        parent::__construct($name, $age);
        $this->salary = $salary;
    }

    public function setSalary(float $salary)
    {
        $this->salary = $salary;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }
}
