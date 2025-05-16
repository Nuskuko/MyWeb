<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="styl_1.css">
</head>
<body>
    <header>
        <h1>Portal dla wędkarzy</h1>
    </header>
    <main>
        <section class="blok_lewy_1">
        <h3>Ryby zamieszkujace rzeki</h3>
        <ol>
            <?php
            $baza = new mysqli('localhost','root','','wedkowanie');
            $kw1 = $baza->prepare("SELECT ryby.nazwa , lowisko.akwen,lowisko.wojewodztwo FROM lowisko INNER JOIN ryby on lowisko.Ryby_id = ryby.id WHERE lowisko.rodzaj = 3;");
            $kw1 ->execute();
            $wynik = $kw1->get_result();

            while($row=$wynik->fetch_assoc())
            {
                $nazwa = $row["nazwa"];
                $akwen = $row["akwen"];
                $wojewodztwo=$row["wojewodztwo"];
                echo "<li>$nazwa pływa w rzece $akwen,$wojewodztwo</li>";
            }
            ?>
        </ol>

        </section>
          <section class="blok_prawy">
            <img src="ryba1.jpg" alt="Sum">
            <br>
            <a href="kwerendy.txt">Pobierz kwerendy</a>
        </section>
        <section class="blok_lewy_2">
                <h3>
                Ryby drapeieżne naszych wód
                </h3>
                <table>
                    <thead>
                        <tr><th>L.p.</th><th>Gatunek</th><th>Występowanie</th></tr>
                    </thead>
                    <tbody>

                        <?php
            $baza = new mysqli('localhost','root','','wedkowanie');
            $kw1 = $baza->prepare("SELECT id,nazwa ,ryby.wystepowanie FROM ryby WHERE ryby.styl_zycia = 1;");
            $kw1 ->execute();
            $wynik = $kw1->get_result();

            while($row=$wynik->fetch_assoc())
            {
                $nazwa = $row["nazwa"];
                $id = $row["id"];
                $wystepowanie=$row["wystepowanie"];
                echo"<tr>";
                echo "<td>$id</td>";
                echo "<td>$nazwa</td>";
                echo "<td>$wystepowanie</td>";
                echo "</tr>";
            }

                        
                        ?>

                    </tbody>

                </table>
        </section>
      

    </main>
    <footer>
        <p>Strone wykonał : Patryk Kołodziej</p>
    </footer>
    
</body>
</html>