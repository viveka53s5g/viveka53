<?php
$api_url = "https://apps.natak.fun/api.php";
$response = file_get_contents($api_url);
$items = json_decode($response, true);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media Grid</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 5px;
            padding: 5px;
        }
        .grid-item {
            border: 1px solid #ddd;
            padding: 3px;
            text-align: center;
        }
        img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 5px;
        }
        .grid-item p {
            font-size: 14px;
            font-weight: normal;
            margin: 3px 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        @media (max-width: 600px) {
            .grid-container { grid-template-columns: repeat(2, 1fr); }
        }
    </style>
</head>
<body>
    <div class="grid-container">
        <?php foreach ($items as $item): ?>
            <div class="grid-item">
                <img src="<?= htmlspecialchars($item['image']) ?>" 
                     onerror="this.onerror=null; this.src='https://via.placeholder.com/150';" 
                     alt="<?= htmlspecialchars($item['title']) ?>">
                <p><?= htmlspecialchars($item['title']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
