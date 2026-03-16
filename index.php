<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szkolenia i kursy</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>SZKOLENIA</h1>
    </header>
    <main>
        <div class="left">
            <table>
                <thead>
                    <tr>
                        <th>Kurs</th>
                        <th>Nazwa</th>
                        <th>Cena</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
$conn = mysqli_connect("localhost", "root", "", "szkolenia");

if ($conn) {
    $sql = "SELECT kod, nazwa, cena FROM kursy ORDER BY cena ASC;";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td><img src='" . $row['kod'] . ".jpg' alt='kurs'></td>";
        
        echo "<td>" . $row['nazwa'] . "</td>";
        
        echo "<td>" . $row['cena'] . "</td>";
        echo "</tr>";
    }

    mysqli_close($conn);
}
?>
                </tbody>
            </table>
        </div>
        <div class="right">
            <h2>Zapisy na kursy</h2>
            <form action="index.php">
                <label for="name">Imię</label>
                <input type="text" name="name">
                <label for="nazwisko">Nazwisko</label>
                <input type="text" name="nazwisko">
                <label for="wiek">Wiek</label>
                <input type="number" name="wiek">
                <label for="rodzaj">Rodzaj Kursu</label>
                <select name="rodzaje" id="rodzaje">
                    <?php
$conn = mysqli_connect("localhost", "root", "", "szkolenia");

if ($conn) {
    $sql_kursy = "SELECT nazwa FROM kursy;";
    $result_kursy = mysqli_query($conn, $sql_kursy);

    while ($row = mysqli_fetch_assoc($result_kursy)) {
        echo "<option value='" . $row['nazwa'] . "'>" . $row['nazwa'] . "</option>";
    }

    mysqli_close($conn);
}
?>
                </select>
                <input type="submit" value="Dodaj dane">
            </form>

        </div>
    </main>

    <footer>
        <p>Stronę wytonał: 0000000000000</p>
    </footer>
</body>

</html>