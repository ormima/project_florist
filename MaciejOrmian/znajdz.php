<?php
    $res = "";
    if(isset($_POST['submit']) && $_POST["miasto"]){
        $con = mysqli_connect('localhost', 'root', '', 'kwiaciarnia');
        $miasto = $_POST["miasto"];
        $sql = "SELECT kwiaciarnie.nazwa, kwiaciarnie.ulica FROM `kwiaciarnie` WHERE kwiaciarnie.miasto = '$miasto'"; 
        
        $query = mysqli_query($con, $sql);
        if ($con){
            while($row = mysqli_fetch_row($query)){
                $res .= "Nazwa kwiaciarni: $row[0], lokalizacja kwiaciarni: $row[1].";
            }
        } else{
            echo "something went wrong!!!";
        }

        mysqli_close($con);
    }

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwiaty</title>
    <link rel="stylesheet" href="./styl3.css"/>
</head>
<body>
    <div class="container">
        <header>
            <h1>Grupa Polskich Kwiaciarni</h1>
        </header>
        <div class="box">
            <div class="left">
                <h2>Menu</h2>
                <ol>
                    <li><a href="./index.html">Strona główna</a></li>
                    <li><a href="https://www.kwiaty.pl" target="_blank">Rozpoznaj kwiaty</a></li>
                    <li>
                        <a href="./znajdz.php">Znajdź kwiaciarnię</a>
                        <ul>
                            <li>w Warszawie</li>
                            <li>w Malborku</li>
                            <li>w Poznaniu</li>
                        </ul>
                    </li>
                </ol>
            </div>
            <div class="right">
                <h2>Znajdź kwiaciarnię</h2>
                <form action="./znajdz.php" method="post">
                    <span>Podaj nazwę miasta:</span>
                    <input type="text" name="miasto"/>
                    <input type="submit" name="submit" value="SPRAWDŹ">
                    <!-- Script_1 result (teoretycznie) -->
                    <p>
                        <?=

                            $res;

                        ?>
                    </p>
                </form>
            </div>
        </div>
        <footer>
            <p>Stronę opracował: <i>000</i></p>
        </footer>
    </div>
</body>
</html>