<?php
require __DIR__ . '/../vendor/autoload.php';
// $db = new PDO('mysql:host=' . '127.0.0.1' .
//                             ';dbname=' . 'bwtlibrary' .
//                             ';charset=' . 'utf8',
//                             'root',
//                             'sa');
// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

if (filter_input(INPUT_POST, 'submit'))
{
    $book = new \App\Book($_POST['author'], $_POST['title'], $_POST['year'], $_POST['filename']);
}

?>
<h1>Добавление книги</h1>

<form method="POST" action="<?= $_SERVER["PHP_SELF"]?>" enctype="multipart/form-data">
    <p><input name="author" required placeholder="Автор книги" size="30">
    <p><input name="title" required placeholder="Название книги" size="30">
    <p><input name="year" required placeholder="Год издания книги" size="30">
    <p>Загрузите файл с книгой: 
        <input type="file" name="filename" required accept=".txt">
    <p><input type="submit" name="submit" value="Добавить книгу!">
</form>