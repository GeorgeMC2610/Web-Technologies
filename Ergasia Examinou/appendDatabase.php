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
        <h1>ΛΑΖΑΡΟΣ ΧΡΙΣΤΟΔΟΥΛΟΠΟΥΛΟΣ</h1> 
        <h3>Αγορά Αναμνηστικών</h3>
        <hr> 

        <br>
        <b id="failed"></b>
        <script>
            if(window.location.href.indexOf("?error") > -1)
                document.getElementById("failed").innerHTML = "Ανεπιθύμητοι χαρακτήρες στο ονοματεπώνυμο.";
        </script>
        <br><br>
        <form method="post" name="agora" id="agora" action="purchaseresult.php">
            <a>Όνομα</a><br>
            <input type="text" id="firstname" name="firstname" maxlength="25">
            <br><br>

            <a>Επώνυμο</a><br>
            <input type="text" id="lastname" name="lastname" maxlength="25">
            <br><br>

            <a>Μπλουζάκια Εθνικής Ελλάδος</a> <br>
            <input type="number" id="gre" name="gre" max="10" min="0" readonly>
            <br><br>
            <a>Μπλουζάκια Ολυμπιακού</a> <br>
            <input type="number" id="oly" name="oly" max="10" min="0" readonly>

            <br><br>

            <script type="text/javascript">
                document.getElementById("gre").value = localStorage.getItem("gre");
                document.getElementById("oly").value = localStorage.getItem("oly");
    
                function test()
                {
                    var firstname = document.getElementById("firstname").value;
                    var lastname = document.getElementById("lastname").value;
    
                    var nameRegEx = /[a-zA-Zα-ωΑ-Ω]/;
    
                    if ((firstname.match(nameRegEx)) && (lastname.match(nameRegEx)))
                    {
                        document.getElementById("agora").action = "purchaseresult.php";
                    }
                    else
                    {
                        document.getElementById("agora").action = "appendDatabase.php?error";
                    }
                }
            </script>
            <input type="submit" id="proceed" name="proceed" value="Αποστολή αγοράς" onclick="test()">
            <br><br>
            <a id="price"></a>

            <script type="text/javascript">
                document.getElementById("price").innerHTML = "Χρέωση: €" + (document.getElementById("gre").value * 44.9 + document.getElementById("oly").value * 38.9).toFixed(2);
            </script>
        </form>

        <br><br><br>
        <hr>
        <div id="outro">Γιώργος Σεϊμένης, Π19204, Τεχνολογίες Διαδικτύου, Πανεπιστήμιο Πειραιώς 2019-2020</div>
    </body>

</html>