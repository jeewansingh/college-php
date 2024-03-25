<?php

// class Person {
//     public $name, $email, $address, $phone;
//     function sayHello(){
//         echo "Hello !";
//     }
// }
// // Create Object
// $ramesh = new Person();

// // Assign
// $ramesh->name = "Ramesh Bahadur";
// $ramesh->email = "ramesh@xyz.com";
// $ramesh->address = "Lalitpur";
// $ramesh->phone = 9876543210;

// // Method Call
// $ramesh->sayHello();

// print_r($ramesh);

// echo $ramesh->name;
// echo $ramesh->email;
// echo $ramesh->address;
// echo $ramesh->phone;

// echo '<br/>Name: ' .$ramesh->name ;
// echo '<br/>Address: ' .$ramesh->address;
// echo '<br/>Phone: ' .$ramesh->phone;
// echo '<br/>Email: ' .$ramesh->email;

class Teacher {
    public $id, $name, $email, $qualification, $subject, $salary;

    // public function setTeacher($id, $name, $email, $qualification, $subject, $salary){
    //     $this->id = $id;
    //     $this->name = $name;
    //     $this->email = $email;
    //     $this->qualification = $qualification;
    //     $this->subject = $subject;
    //     $this->salary = $salary;
    // }

    // Constructor
    public function __construct($id, $name, $email, $qualification, $subject, $salary){
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->qualification = $qualification;
            $this->subject = $subject;
            $this->salary = $salary;
        }
    
    // Destructor
    public function __destruct(){
        echo "<br />Finish for ".$this->name;
    }


    public function getTeacher(){
        echo '<br/>ID: '.$this->id;
        echo '<br/>Name: '.$this->name;
        echo '<br/>Email: '.$this->email;
        echo '<br/>Qualification: '.$this->qualification;
        echo '<br/>Subject: '.$this->subject;
        echo '<br/>Salary: '.$this->salary . '<br/>';
    }
}
// $Teacher1 = new Teacher();
// $Teacher1->setTeacher(1,"Basanta Chapagain","basanta@gmail.com","MCA","Scripting Language",500000);

// $Teacher2 = new Teacher();
// $Teacher2->setTeacher(2,"Bhoj Raj Joshi","bhoj@gmail.com","MCA","Numerical Method",50000) ;

$Teacher1 = new Teacher(1,"Basanta Chapagain","basanta@gmail.com","MCA","Scripting Language",500000);
$Teacher2 = new Teacher(2,"Bhoj Raj Joshi","bhoj@gmail.com","MCA","Numerical Method",50000);

$Teacher1->getTeacher();
$Teacher2->getTeacher();


?>