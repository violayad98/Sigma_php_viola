<?php

class Animal
{

    public $food;

    public $location;

    public function __construct($food = '', $location = '')
    {
        $this->food = $food;
        $this->location = $location;
    }

    public function makeNoise()
    {
        return "Звуки пророди ";
    }

    public function eat()
    {
        return "Така тварина їсть їжу ";
    }

    public function sleep()
    {
        return "Така тварина спить ";
    }
}

class Dog extends Animal
{

    public $bone_size;

    public function __construct($food = '', $location = '')
    {
        $this->food = $food;
        $this->location = $location;
    }

    public function makeNoise()
    {
        return "Гав ";
    }

    public function eat()
    {
        return "Така тварина їсть $food ";
    }
}

class Cat extends Animal
{

    public $tray_type;

    public function __construct($food = '', $location = '')
    {
        $this->food = $food;
        $this->location = $location;
    }

    public function makeNoise()
    {
        return "Мяу ";
    }

    public function eat()
    {
        return "Така тварина їсть $food ";
    }
}

class Horse extends Animal
{

    public $carrot_count;

    public function __construct($food = '', $location = '')
    {
        $this->food = $food;
        $this->location = $location;
    }

    public function makeNoise()
    {
        return "Ігого ";
    }

    public function eat()
    {
        return "Така тварина їсть $food ";
    }
}

class Vet{
    function treatAnimal(Animal $animal) {
        print_r($animal->makeNoise());
        print_r($animal->eat());
    }
}
echo "<pre>";


$animal = array(
    new Animal('щось', 'зоопарк'),
    new Dog('ковбасу', 'будинок'),
    new Horse('моркву', 'стайня'),
    new Cat('рибу', 'квартира'),
)
;
print_r($animal);
$vet= new Vet;
foreach ($animal as $value) {
   $vet->treatAnimal($value);
    echo "</br>";
}


?>
