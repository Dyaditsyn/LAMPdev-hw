<?php


class Driver extends Worker
{
    private $experience;
    private $category;

    public function __construct(string $name, float $age, float $salary, float $experience, string $category)
    {
        parent::__construct($name, $age, $salary);
        $this->experience = $experience;
        $this->setCategory($category);
    }

    public function setExperience(float $experience)
    {
        $this->experience = $experience;
    }

    public function getExperience(): float
    {
        return $this->experience;
    }

    public function setCategory(string $category)
    {
        if ($category === 'A' || $category === 'B' || $category === 'C') {
            $this->category = $category;
        }
    }

    public function getCategory(): string
    {
        return $this->category ? $this->category : 'No category set';
    }
}
