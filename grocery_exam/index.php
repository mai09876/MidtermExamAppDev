<?php

require 'dbconfig.php';

// We'll get all items and order them by name
$sql = "SELECT id, name, category, price, quantity FROM grocery_items ORDER BY name ASC";
$stmt = $pdo->query($sql);

$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocery Item List</title>
    
    <style>
        body {
            font-family: "Georgia", "Times New Roman", Times, serif;
            margin: 40px;
            background-color: #fdfaf6; /* A very light, warm beige */
            color: #5d4037; /* Dark brown text */
        }
        h2 {
            color: #4e342e; /* Even darker brown for the heading */
            text-align: center;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden; /* Keeps the rounded corners */
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #d7ccc8; /* Light brown border */
        }
        /* Dark brown table header */
        th {
            background-color: #5d4037;
            color: #ffffff;
            font-weight: bold;
        }
        /* Alternating row colors */
        tr:nth-child(even) {
            background-color: #efebe9; /* Lightest brown-gray */
        }
        tr:nth-child(odd) {
            background-color: #ffffff;
        }
        /* Hover effect */
        tr:hover {
            background-color: #d7ccc8; /* A slightly darker beige for hover */
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h2>Grocery Item Inventory</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // 5. LOOP THROUGH RESULTS AND CREATE TABLE ROWS
            // The foreach loop goes through each '$item' in the '$items' array
            foreach ($items as $item):
            ?>
            <tr>
                <td><?= htmlspecialchars($item['id']) ?></td>
                <td><?= htmlspecialchars($item['name']) ?></td>
                <td><?= htmlspecialchars($item['category']) ?></td>
                <td>$<?= htmlspecialchars(number_format($item['price'], 2)) ?></td>
                <td><?= htmlspecialchars($item['quantity']) ?></td>
            </tr>
            <?php
            endforeach; // End the loop
            ?>
        </tbody>
    </table>

</body>
</html>