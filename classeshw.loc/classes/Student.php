<?php


class Student extends User
{
    private $scholarship;
    private $course;

    public function __construct(string $name, float $age, float $scholarship, string $course)
    {
        parent::__construct($name, $age);
        $this->scholarship = $scholarship;
        $this->course = $course;
    }

    public function setScholarship(float $scholarship)
    {
        $this->scholarship = $scholarship;
    }

    public function getScholarship(): float
    {
        return $this->scholarship;
    }

    public function setCourse(string $course)
    {
        $this->course = $course;
    }

    public function getCourse(): string
    {
        return $this->course;
    }
}
