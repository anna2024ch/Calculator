<?php
// Einbinden der Calculator-Klasse
require_once 'Calculator.php';

// Initialisieren der Variablen
$result = '';
$error = '';

// Überprüfen, ob das Formular abgeschickt wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     // Erstellen einer neuen Instanz der Calculator-Klasse
     $calculator = new Calculator();

     // Abrufen und Validieren der Eingabewerte
     $num1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
     $num2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
     $operation = filter_input(INPUT_POST, 'operation', FILTER_SANITISE_STRING);

    // Überprüfen, ob die Eingaben gültig sind
    if ($num1 !== false && $num2 !== false && $operation){
        try {
            //Ausführen der gewählten Operation
            switch ($operation) {
                case 'add':
                    $result = $calculator->add($num1, $num2);
                    break;
                case 'subtract':
                    $result = $calculator->subtract($num1, $num2);
                    break;
                case 'multiply':
                    $result = $calculator->multiply($num1, $num2);
                    break;
                 case 'divide':
                    $result = $calculator->divide($num1, $num2);
                    break;
            default:
                    $error = "Ungültige Operation";
                }
            } catch (Exception $e) {
                $error = $e->getMessage();
            }
    } else {
        $error = "Bitte gib gültige Zahlen ein.";
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-Taschenrechner</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>PHP-Taschenrechner</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="number" name="num1" step="any" required placeholder="Erste Zahl">
            <select name="operation" required>
                <option value="add">+</option>
                <option value="subtract">-</option>
                <option value="multiply">×</option>
                <option value="divide">÷</option>
            </select>
            <input type="number" name="num2" step="any" required placeholder="Zweite Zahl">
            <input type="submit" value="Berechnen">
        </form>
        <?php
        if ($result !== '') {
            echo "<p class='result'>Ergebnis: $result</p>";
        }
        if ($error !== '') {
            echo "<p class='error'>Fehler: $error</p>";
        }
        ?>
    </div>
</body>
</html>
