<?php
include_once('config.php');
include_once('db.php');

if (isset($_POST['submit'])) {
    ////////GET VALUES FROM INPUT FIELD
    $available = 0;
    if ($_POST['available'] === "yes") {
        $available = true;
    }
    $title = $_POST['title'];
    $author = $_POST['author'];
    $pages = $_POST['pages'];
    $isbn = $_POST['isbn'];

    ////MAKE QUERY
    $query = <<<SQL
    INSERT INTO books (title, author,available, pages, isbn)
    VALUES (:title, :author, :available , :pages, :isbn)
    SQL;

    ////PREPARE QUERY
    $statement = $conn->prepare($query);
    $params = [
        'title' => $title,
        'author' => $author,
        'available' => $available,
        'pages' => $pages,
        'isbn' => $pages
    ];

    ///EXECUTE QUERY
    if ($statement->execute($params)) {
        header("Location: index.php");
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Create Book</title>
    <link rel="stylesheet" href="styles/create.css">
</head>

<body>
    <h1 class="title">Upload Book</h1>
    <form action="" method="post" class="upload_book_form">
        <div class="input-group mb-3">
            <input type="text" class="form-control form-control-lg" placeholder="Title" name="title">
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control form-control-lg" placeholder="Author" name="author">
        </div>
        <div class="input-group mb-3">
            <input type="number" class="form-control form-control-lg" placeholder="Pages" name="pages">
        </div>
        <div class="input-group mb-3">
            <input type="number" class="form-control form-control-lg" placeholder="Isbn" name="isbn">
        </div>
        <div style="display: flex;">
            <p class="available">Available</p>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="yes" name="available" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    YES
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="no" name="available" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    NO
                </label>
            </div>
        </div>
        <input type="submit" value="submit" name="submit" class="submit_book">
    </form>
</body>

</html>
