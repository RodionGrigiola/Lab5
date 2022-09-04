<?php

include 'form.php';
include 'formHelper.php';

function First_User(): mysqli
{
    $database = new mysqli(
        'db',
        'root',
        'db_password',
        'web'
    );
    if (mysqli_connect_errno()) {
        echo mysqli_connect_errno() . ": " . mysqli_connect_error();
    }
    return $database;
}

function addItem(mysqli $databaseSettings, array $params): void
{
    $query = "
    INSERT INTO web.ad (Title, Text, Category, Email)
	VALUES (?, ?, ?, ?)
	";

    $preparedStatement = mysqli_prepare($databaseSettings, $query);
    mysqli_stmt_bind_param($preparedStatement, "s", $params);
    mysqli_stmt_execute($preparedStatement);
}

function getItems(mysqli $databaseSettings): array
{
    $items = [];
    $query = "
		SELECT Title, Text, Category, Email FROM web.ad;
	";
    $resultQuery = $databaseSettings->query($query);

    foreach ($resultQuery as $row)
    {
        $items[] = buildTask($row);
    }

    return $items;
}

function getCategory(mysqli $databaseSettings): array
{
    $categories = [];
    $query = "
		SELECT Category FROM web.ad 
	";
    $resultQuery = $databaseSettings -> query($query);

    foreach ($resultQuery as $row)
    {
        $categories[] = $row['Category'];
    }
    return $categories;
}