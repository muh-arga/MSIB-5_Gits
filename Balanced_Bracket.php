<?php
const OPENING_BRACKETS = ['(', '[', '{'];
const CLOSING_BRACKETS = [')', ']', '}'];

function isBalanced($bracket)
{
    $stack = [];
    $length = strlen($bracket);
    for ($i = 0; $i < $length; $i++) {
        $char = $bracket[$i];
        if (in_array($char, OPENING_BRACKETS)) {
            array_push($stack, $char);
        } else if (in_array($char, CLOSING_BRACKETS)) {
            $last = array_pop($stack);
            if ($last != OPENING_BRACKETS[array_search($char, CLOSING_BRACKETS)]) {
                return "NO";
            }
        }
    }
    if (count($stack) > 0) {
        return "NO";
    }
    return "YES";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bracket = isset($_POST['bracket']) ? $_POST['bracket'] : '';
    $output = isBalanced($bracket);
} else {
    $output = 'Masukkan bracket (, ), [, ], {, atau } (tanpa spasi)';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balanced Bracket</title>
</head>

<body>
    <h1>Balanced Breacket</h1>
    <form method="POST">
        <label for="bracket">Bracket: </label>
        <input type="text" name="bracket" id="bracket" value="<?= isset($bracket) ? $bracket : '' ?>" required>
        <button type="submit">Kirim</button>
    </form>

    <?php if (isset($output)) : ?>
        <p>Ouput: <?= $output; ?></p>
    <?php endif; ?>
</body>

</html>