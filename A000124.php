<?php

function a000124($n)
{
    return ($n * ($n + 1) / 2) + 1;
}

function sequence($limit)
{
    $seq  = array();
    for ($i = 0; $i < $limit; $i++) {
        $seq[] = a000124($i);
    }
    return $seq;
}

function printOutput($seq)
{
    return implode('-', $seq);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $limit = isset($_POST['limit']) ? (int) $_POST['limit'] : 0;
    $seq = sequence($limit);
    $ouput = printOutput($seq);
} else {
    $ouput = 'Masukkan angka positif > 0';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A000124</title>
</head>

<body>
    <h1>Rumus A000124</h1>
    <form method="post">
        <label for="limit">Masukkan angka: </label>
        <input type="number" name="limit" id="limit" min="1" value="<?= isset($limit) ? $limit : '' ?>" required>
        <button type="submit">Kirim</button>
    </form>
    <?php if (isset($ouput)) : ?>
        <p>Ouput: <?= $ouput; ?></p>
    <?php endif; ?>
</body>

</html>