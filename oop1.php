<?php

//! OOP - Object Oriented Programming (Programmazione orientata agli oggetti).
// Paradigma basato su classe e oggett: serve a strutturare il nostro codice in blocchi che si possono ripetere (le classi) e servono a instanziare gli oggetti ("istanza di una classe")

//NOME DELLE CLASSI - INGLESE, SINGOLARE, INIZIALE MAIUSCOLA
// class Class{
//elementi della classe
//! ATTRIBUTI/PROPRIETA'
//! FUNZIONE COSTRUTTORE
//!METODI/COMPORTAMENTI
// }
//! definito una classe

//? ACCESS MODIFIER - modificatore di accesso,dice dove un attributo o un metodo é visibile
//PUBLIC - ACCESSIBILE IN LETTURA E SCRITTURA OVUNQUE NELL'ALGORITMO 

// PROTECTED - ACCESSIBILE IN LETTURA E SCRITTURA SOLO ALL'INTERNO DELLA CLASSE. 
// DATA HIDING  

// PRIVATE - come protected MA NON EREDITATO DALLE CLASSI FIGLIE

// attributi/metodi STATICI - FANNO RIFERIMENTO ALLA CLASSE
class Animal
{
    //! ATTRIBUTI/PROPRIETA'
    // tutti gli oggetti di classe animal avranno questi tre attributi
    public $species;
    protected $name;
    public $age;


    public static $counter = 0;

    //! COSTRUTTORE - _ _ construct()

    public function __construct($_species, $_name, $_age)
    {
        $this->species = $_species;
        $this->name = $_name;
        $this->age = $_age;
        //:: -scope resolution operator 
        // if ($this->species == "cane") {
        //Animal::$counter++;
        self::$counter++; //versione più pulita
        // }
    }

    //! METODI
    public function info()
    {
        echo "E' un/a $this->species, si chiama $this->name e ha $this->age anni \n";
    }
    // public static function printAnimalsNumber()
    // {
    //     echo "Gli animali creati sono " . Animal::$counter . "\n";
    // }

    public function printName() // FUNZIONI GETTER
    {
        echo $this->name . "\n";
    }
    public function setName($string) // FUNZIONE SETTER
    {
        $this->name = $string;
    }
}

// class Ciccio{
//     public static $counter;
// }

//! CREATO GLI OGGETTI
$dylan = new Animal('cane', 'Dylan', 15);
// $dylan->name = 'Genoveffo';
$dylan->setName('Pippo');
$dylan->printName();

$micia = new Animal('gatto', 'Micia', 19);


//var_dump($dylan);

$babi = new Animal('cane', 'Babi', 6);
Animal::$counter . " \n";

//var_dump($babi);
// $babi->info();
// $dylan->info();

// echo $dylan->name;

//! EREDITARIETA - possibilita di una classe di ereditare da un'altra tutti gli attributi e i metodi, per estenderla e specificarla

//EREDITARIETA SINGOLA - eredito da una sola classe parent
// multipla 

//ANIMALI DOMESTICI - proprietario, citta
//la classe Pet estende Animal -    EREDITA le caratteristiche di Animal
class Pet extends Animal
{
    public $owner;
    public $city;
    public static $counter = 0;

    public function __construct($specie, $nome, $eta, $proprietario, $citta)
    {
        // $this->species = $specie;
        // $this->name = $nome;
        // $this->age = $eta;
        parent::__construct($specie, $nome, $eta);
        $this->owner = $proprietario;
        $this->city = $citta;
        self::$counter++;
        parent::$counter;
    }

    public function sayHello()
    {
        echo "Ciao sono $this->owner, il mio $this->species si chiama $this->name, ha $this->age anni e abitiamo insieme a $this->city \n";
    }
}

$ares = new Pet('Cane', 'Ares', 10, 'Mattia', 'Napoli');
// var_dump($ares);
// $ares->sayHello();
// echo "Ho creato" . Animal::$counter . " animali \n";
// echo Pet::$counter . " sono animali domestici \n";

class Wild extends Animal
{
    public $habitat;
    public $researcher;
    public static $counter = 0;

    public function __construct($specie, $nome, $eta, $luogo, $ricercatore)
    {
        parent::__construct($specie, $nome, $eta);
        $this->habitat = $luogo;
        $this->researcher = $ricercatore;
        self::$counter++;
    }

    public function sayHello()
    {
        echo "Sono $this->researcher e studio $this->species: si chiama $this->name, ha $this->age anni e vive nell'habitat $this->habitat \n";
    }
}

$leone = new Wild('Leone', 'Simba', 10, 'Savana', 'Arcangelo');
var_dump($leone);
// $leone->sayHello();
// $leone->info();
// echo Animal::$counter;
// echo "numero di animali selvatici: " . Wild::$counter . "\n";

echo $leone->age;
