<?php

class Student
{

    public $firstName;

    public $lastName;

    public $group;

    public $mark;

    public function __construct($firstName = '', $lastName = '', $group = '', $mark = null)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->group = $group;
        $this->mark = $mark;
    }

    public function getScholarship()
    {
        return ($this->mark == '5') ? "100" : "80";
    }
}

class Aspirant extends Student
{

    public $workName;

    public function __construct($firstName = '', $lastName = '', $group = '', $mark = null, $workName = '')
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->group = $group;
        $this->mark = $mark;
        $this->workName = $workName;
    }

    public function getScholarship()
    {
        return ($this->mark == '5') ? "200" : "180";
    }
}

echo "<pre>";
$Student = new Aspirant('Leonardo', 'DiCaprio', "CI", "4","Python");
print_r($Student);


$Student = array(
    new Student('Leonardo', 'DiCaprio', "CI", "4"),
    new Student('Robert', 'Downey', "FI", "4"),
    new Student('Anthony ', 'Hopkins', "CI", "5"),
    new Student('Will', 'Smith', "PI", "4"),
    new Aspirant('Patrick', 'Dempsey', "PI", "5","JAVA"),
    new Aspirant('Brad', 'Pitt', "CI", "4","PHP"),
    new Aspirant('Sylvester', 'Stallone', "FI", "5","Research"),
);
foreach ($Student as $value) {
    $value->sum=$value->getScholarship();
    ;
}
print_r($Student);

?>
