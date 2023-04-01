<?php

require_once __DIR__ . '/vendor/autoload.php';
require("functions.php");
$items = query("SELECT * FROM items");

$mpdf = new \Mpdf\Mpdf();
$html = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Items</title>
        <style>
            body {
                font-family: sans-serif;
                font-size: 14px;
            }
            .table {
                border-collapse: collapse;
                overflow: auto;
                max-width: 768px;
            }

            .table__item {
                border: 1px solid black;
                padding: 10px
            }

            .table__item--head {
                background-color: black;
                color: white;
            }

            .table__image {
                width: 100px;
                aspect-ratio: 1;
                object-fit: cover;
            }
        </style>
    </head>
    <body>
        <h1>Item List</h1>
        <table class="table">
        <tr>
            <th class="table__item table__item--head">No.</th>
            <th class="table__item table__item--head">Name</th>
            <th class="table__item table__item--head">Price</th>
            <th class="table__item table__item--head">Description</th>
            <th class="table__item table__item--head">Rating</th>
            <th class="table__item table__item--head">Image</th>
            <th class="table__item table__item--head">Sold</th>
        </tr>';

    foreach($items as $item) {
        $html .= '<tr>
                    <td class="table__item">' . $item["id"] . '</td>
                    <td class="table__item">' . $item["name"] . '</td>
                    <td class="table__item">' . $item["price"] . '</td>
                    <td class="table__item">' . $item["description"] . '</td>
                    <td class="table__item">' . $item["rating"] . '</td>
                    <td class="table__item"><img class="table__image" src="assets/images/' . $item["image"] . '"  ></td>
                    <td class="table__item">' . $item["sold"] . '</td>
                </tr>';
    };

    $html .= "</table>";

$mpdf->WriteHTML($html);
$mpdf->Output("items.pdf", "I");

?>