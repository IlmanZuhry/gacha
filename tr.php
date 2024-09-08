<?php

function gacha($items) {
    $totalRate = array_sum(array_column($items, 'rate'));
    $randNum = mt_rand(0, $totalRate * 100) / 100;

    $currentRate = 0;
    foreach ($items as $item) {
        $currentRate += $item['rate'];
        if ($randNum <= $currentRate) {
            return $item;
        }
    }
}

$gachaItems = [
    ['name' => 'Item A', 'value' => 100, 'rate' => 0.1],
    ['name' => 'Item B', 'value' => 150, 'rate' => 0.15],
    ['name' => 'Item C', 'value' => 200, 'rate' => 0.2],
    ['name' => 'Item D', 'value' => 50, 'rate' => 0.05],
    ['name' => 'Item E', 'value' => 120, 'rate' => 0.12],
    ['name' => 'Item F', 'value' => 80, 'rate' => 0.08],
    ['name' => 'Item G', 'value' => 90, 'rate' => 0.09],
    ['name' => 'Item H', 'value' => 110, 'rate' => 0.11],
    ['name' => 'Item I', 'value' => 70, 'rate' => 0.07],
];

// Simulate gacha draws for each box
$gridResults = [];
for ($i = 0; $i < 9; $i++) {
    $result = gacha($gachaItems);
    $gridResults[] = $result;
}

// Check if there are three identical items in any row
$isWin = false;
$winningItem = null;
for ($i = 0; $i < 9; $i += 3) {
    $rowItems = array_slice($gridResults, $i, 3);
    $uniqueItems = array_unique(array_column($rowItems, 'name'));
    
    if (count($uniqueItems) === 1) {
        $isWin = true;
        $winningItem = $rowItems[0]['name'];
        break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gacha Simulator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }

        .gacha-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-top: 20px;
        }

        .gacha-box {
            border: 1px solid #ddd;
            padding: 20px;
            text-align: center;
        }

        .gacha-result {
            margin-top: 20px;
            font-weight: bold;
        }

        .gacha-button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h1>Gacha Simulator</h1>

    <div class="gacha-container">
        <?php
        // Display gacha results in a 3x3 grid
        foreach ($gridResults as $result) {
            echo '<div class="gacha-box">';
            echo '<p>' . $result['name'] . ' (Nilai: ' . $result['value'] . ')</p>';
            echo '</div>';
        }
        ?>
    </div>

    <?php if ($isWin) : ?>
    <div class="gacha-result">
        <p>Selamat! Anda memenangkan item <?= $winningItem ?>.</p>
    </div>
<?php else : ?>
    <div class="gacha-result">
        <p>Belum ada kemenangan</p>
    </div>
<?php endif; ?>

    <form method="post">
        <button class="gacha-button" type="submit">Gacha</button>
    </form>

</body>
</html>
