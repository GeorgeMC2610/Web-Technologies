<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Αγορά Αναμνηστικών</title>
        <link rel="stylesheet" type="text/css" href="appendDatabase.css">                         
        <map name="backarrow">
            <area href="main.html" shape="rect" coords="0,0,165,104">
        </map>

        <!-- Κουμπί επιστροφής στην αρχική -->
        <img src="backarrow.png" id="backarrow" alt="Πίσω στην Αρχική" usemap="#backarrow">
    </head>
    <body>
        <?php
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $oly = $_POST["oly"];
            $gre = $_POST["gre"];

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mplouzes";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if (!$conn)
            {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "INSERT INTO purchase(poso_gre, poso_oly, firstname, lastname)
                    VALUES('$gre', '$oly', '$firstname', '$lastname')";

            ?>
        <h1>ΛΑΖΑΡΟΣ ΧΡΙΣΤΟΔΟΥΛΟΠΟΥΛΟΣ</h1> 
        <h3>Αγορά Αναμνηστικών</h3>
        <hr> 

        <br><br><br>

        <?php
        
        if (mysqli_query($conn, $sql))
        {
            echo("<a id='success'> Η αγορά ήταν επιτυχής. </a>");
        }
        else
        {
            echo("<a id='failed'> Σφάλμα. </a>");
        }

        ?>
        <br><br><br>
        <hr>
        <div id="outro">Γιώργος Σεϊμένης, Π19204, Τεχνολογίες Διαδικτύου, Πανεπιστήμιο Πειραιώς 2019-2020</div>

    </body>

</html>