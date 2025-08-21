<?php
class Book{
    // public $title;
    // public function  setTitle($param){
    //     $this->title = $param;
    // }
    public $title, $author, $type;
    public function __construct($title,$author,$type){
        $this->setTitle($title);
        $this->author = $author;
        $this->type = $type;
    }
    public function __destruct()
    {
        echo "Title: " . $this->title . "<br>";
        echo "Author: " . $this->author . "<br>";
        echo "Type: " . $this->type . "<br>";
    }
    public function setTitle($param){
        $this->title = $param;
    }
}

class Manga extends Book{
    const __MESSAGE = "Greeting!<br>";
    public function links(){
        echo 'Read the Manga <a href="#">here</a><br>';
    }
}

$bk1 = new Book("Libro", "Juan", "Math");
$bk1->setTitle("The Book of Life");
$bk1->author = "John Doe";
$manga = new Manga("Naruto", "Masashi Kishimoto", "Shonen");
echo $manga::__MESSAGE;
$manga->links();
// $bk_math->setTitle("ALGEBRA");
// echo $bk_math->title;
?>