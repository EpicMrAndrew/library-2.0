<?php
namespace App;
class Book 
{
    public $author;
    public $title;
    public $published_year;
    public $book_file;
    function __construct($author, $title, $published_year, $book_file)
    {
        $this->author = $author;
        $this->title = $title;
        $this->published_year = $published_year;
        $this->book_file = $book_file;
        Book::addBook($author, $title, $published_year);
    }
    public function addBook($author, $title, $published_year) 
    {
        $db = new PDOConnection();
        $query = $db->prepare('
            INSERT books SET
                author=:author,
                title=:title,
                published_year=:year
        ');
        $query->bindValue(':author', $author, \PDO::PARAM_STR);
        $query->bindValue(':title', $title, \PDO::PARAM_STR);
        $query->bindValue(':year', $published_year, \PDO::PARAM_INT);
        $query->execute();
    }
}
?>