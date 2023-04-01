<?php 
    require("functions.php");
    $keyword = $_GET["keyword"];
    $items = search_item($keyword);
?>

<table class="table">
    <tr>
        <th class="table__item table__item--head">No.</th>
        <th class="table__item table__item--head">Name</th>
        <th class="table__item table__item--head">Price</th>
        <th class="table__item table__item--head">Description</th>
        <th class="table__item table__item--head">Rating</th>
        <th class="table__item table__item--head">Image</th>
        <th class="table__item table__item--head">Sold</th>
        <th class="table__item table__item--head">Action</th>
    </tr>

    <?php foreach($items as $item) : ?>
        <tr>
            <td class="table__item"><?= $item["id"] ?></td>
            <td class="table__item"><?= $item["name"] ?></td>
            <td class="table__item">Rp. <?= $item["price"] ?></td>
            <td class="table__item"><?= $item["description"] ?></td>
            <td class="table__item"><?= $item["rating"] ?></td>
            <td class="table__item"><img class="table__image" src="./assets/images/<?= $item["image"] ?>" alt=""></td>
            <td class="table__item"><?= $item["sold"] ?></td>
            <td class="table__item"><a href="edit-item.php?id=<?= $item["id"]?>">Edit</a> | <a href="delete-item.php?id=<?= $item["id"]?>" onclick="return confirm('Delete item?')">Remove</a></td>
        </tr>
    <?php endforeach; ?>
</table>