<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fita 1</title>
    <style>
        table,
        th,
        td {
            padding: 10px;
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>

    <table>
        <?php
        $n = 16;
        $m = 8;

        for ($i = 0; $i <= $m; $i++) {
            echo "<tr>\n";
            for ($j = 0; $j <= $n; $j++) {
                if ($i == $m && $j == $n) {
                    echo "\t<td>X</td>\n";
                } else if ($j == $n) {
                    echo "\t<td>" . chr(65 + $i) . "</td>\n";
                } else if ($i == $m) {
                    echo "\t<td>" . $j . "</td>\n";
                } else if ($j % 2 != 0 && $i % 2 != 0) {
                    echo "\t<td>X</td>\n";
                } else if ($j % 2 == 0 && $i % 2 == 0) {
                    echo "\t<td>X</td>\n";
                } else {

                    // echo "\t<td>i= " . $i . "<br>j= " . $j . "</td>\n";
                    echo "\t<td>" . chr(32) . "</td>\n";
                }

            }
            echo "\t</tr>\n";
        }
        ?>
    </table>


</body>

</html>