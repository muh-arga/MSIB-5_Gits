<?php

function checkRank($player, $score)
{
    for ($i = 0; $i < $player - 1; $i++) {
        if ($score[$i] == $score[$i + 1]) {
            unset($score[$i]);
        }
    }
    return array_values($score);
}

function getRank($gits, $gitsScore, $score)
{
    for ($i = 0; $i < $gits; $i++) {
        $rank = 1;
        for ($j = 0; $j < count($score); $j++) {
            if ($gitsScore[$i] < $score[$j]) {
                $rank++;
            }
        }
        $result[] = $rank;
    }
    return $result;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $player = isset($_POST['player']) ? (int) $_POST['player'] : 0;
    $score = isset($_POST['score']) ? explode(' ', $_POST['score']) : array();
    $gits = isset($_POST['gits']) ? (int) $_POST['gits'] : 0;
    $gitsScore = isset($_POST['gitsScore']) ? explode(' ', $_POST['gitsScore']) : array();


    $updatedScore = checkRank($player, $score);
    $result = getRank($gits, $gitsScore, $updatedScore);
    $output = implode(' ', $result);
} else {
    $output = 'Masukkan angka positif > 0';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dense Ranking</title>
</head>

<body>
    <h1>Dense Ranking Program</h1>
    <form method="POST">
        <label for="player">Player: </label>
        <input type="number" name="player" id="player" min="1" value="<?= isset($player) ? $player : '' ?>" required>
        <br>
        <label for="score">Score: </label>
        <input type="text" name="score" id="score" value="<?= isset($score) ? implode(' ', $score) : '' ?>" required>
        <br>
        <label for="gits">Gits: </label>
        <input type="number" name="gits" id="gits" min="1" value="<?= isset($gits) ? $gits : '' ?>" required>
        <br>
        <label for="gitsScore">Gits Score: </label>
        <input type="text" name="gitsScore" id="gitsScore" value="<?= isset($gitsScore) ? implode(' ', $gitsScore) : '' ?>" required>
        <br>
        <button type="submit">Kirim</button>
    </form>

    <?php if (isset($output)) : ?>
        <p>Ouput: <?= $output; ?></p>
    <?php endif; ?>
</body>

</html>