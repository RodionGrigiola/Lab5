<?php
include 'form.php';
include 'database.php';
include 'form_help.php';

$dbConnection = connectToDatabase();
$messageBoardCategories = getCategory($dbConnection);
$messageBoardItems = getItems($dbConnection);

$config = [
    'tableHeaders' => [
        'Category' => 'Advertisement category',
        'Title' => 'Advertisement name',
        'Email' => 'Your email',
        'Text' => 'Advertisement text'
    ]
];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Laba_5</title>
    <meta charset="UTF-8">
</head>

<body>
<form name="userAd"  method="post">
    <label>Add Advertisement</label><br><br>
    <label>Category: </label><br>
    <select name="adCategory">
    </select><br><br>
    <label>Name: </label>
    <input name="adTitle"><br><br>
    <label>Email: </label>
    <input name="adEmail"><br><br>
    <label>Text: </label><br>
    <textarea name="adText" rows="10" cols="80"></textarea><br><br>
    <button type="submit">Send</button>
</form>


<p>Advertising List:</p>
<table border="1">
    <tr>
        <th>Category</th>
        <th>Name</th>
        <th>Email</th>
        <th>Text</th>
    </tr>
</table>
</body>
</html>