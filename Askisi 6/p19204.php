<!DOCTYPE html>
<html>
    <head>
        <style>
            body
            {
                font-family: 'Verdana';
                background-color: #8f0000;
                color: white;
            }

            h1
            {
                text-align: center;
            }

            hr
            {
                width:90%;
            }

            .payment
            {
                color: #aaaaaa;
                font-size: 85%;
                font-family: Arial;
            }

            form
            {
                margin-left: 5%;
            }

            .lefty
            {
                margin-left: 240px;
            }

            #last, #passwrd
            {
                margin-left: 10%;
            }

            .failed
            {
                color: #ffff00;
                font-family: Arial;
                margin-left: 5%;
                font-size: 20px; 
                font-style: italic;
            }

            .success
            {
                color: #00d800;
                font-family: Arial;
                margin-left: 5%;
                font-size: 15px;
            }

        </style>

        <meta charset="utf-8">
        <title>6η Εργαστηριακή Άσκηση</title>
        <link rel="stylesheet" type="text/css" href="p19204.css">
    </head>
    <body>
        <h1>Συμπλήρωση Φόρμας</h1>
        <hr> <br><br>

        <?php
            function validInputs(){
                $validation_counter = 0;

                if ($_POST['first'] == NULL && !(preg_match("/^[A-Z][a-z]*/", $_POST['first'])) ){
                    echo ("<a class='failed'> [Όνομα]: Μόνο λατινικοί χαρακτήρες ξεκινώντας με κεφαλαίο. </a> <br>");
                }
                else{ $firstname = $_POST['first']; $validation_counter++; }

                if ($_POST['last'] == NULL && !(preg_match("/^[A-Z][a-z]*/", $_POST['last'])) ){
                    echo ("<a class='failed'> [Επώνυμο]: Μόνο λατινικοί χαρακτήρες ξεκινώντας με κεφαλαίο. </a> <br>");
                }
                else{ $lastname = $_POST['last']; $validation_counter++; }

                if ($_POST['mail'] == NULL && !(preg_match("/\S+@\S+\.\S+/", $_POST['mail'])) ){
                    echo ("<a class='failed'> [E-MAIL]: Αυτό δεν είναι ένα έγκυρο e-mail.</a> <br>");
                }
                else{ $email = $_POST['mail']; $validation_counter++; }

                if ($_POST['username'] == NULL){
                    echo ("<a class='failed'> [Username]: Συμπληρώστε το πεδίο. </a> <br>");
                }
                else{ $username = $_POST['username']; $validation_counter++; }

                if ($_POST['passwrd'] == NULL){
                    echo ("<a class='failed'> [Password]: Συμπληρώστε το πεδίο. </a> <br>");                 
                }
                else { $passwrd = $_POST['passwrd']; $validation_counter++; }

                if ($_POST['age'] == NULL){
                    echo ("<a class='failed'> [Ηλικία]: Μόνο αριθμοί μέχρι τρία ψηφία επιτρέπονται. </a> <br>");
                }
                else { $age = $_POST['age']; $validation_counter++; }

                if ($_POST['dob'] == NULL){
                    echo ("<a class='failed'> [Ημ/νία Γέννησης]: Εισάγετε ημερομηνία γέννησης. </a> <br>");
                }
                else { $dob = $_POST['dob']; $validation_counter++; }

                if ($_POST['comment'] == NULL){
                    echo ("<a class='failed'> [Σχόλιο]: Παρακαλώ εισάγετε το σχόλιό σας. </a> <br><br>");
                }
                else { $comm = $_POST['comment']; $validation_counter++; }

                if ($_POST['payment'] == NULL){
                    echo ("<a class='failed'> [Τρόπος Πληρωμής]: Μη έγκυρος τρόπος πληρωμής. </a><br><br>");
                }
                else { $payment = $_POST['payment']; $validation_counter++; }

                if ($validation_counter == 9){
                    $server_name = "localhost";
                    $user_name   = "root";
                    $pass_word   = "";
                    $dbname      = "Ergastirio_6";

                    $conn = new mysqli($server_name, $user_name, $pass_word, $dbname);
                    if (!$conn){
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    $sql = "INSERT INTO input(firstname, lastname, email, username, passwrd, dob, comm, age, payment_method)
                            VALUES('$firstname', '$lastname', '$email', '$username', '$passwrd', '$dob', '$comm', '$age', '$payment')";

                    if (mysqli_query($conn, $sql)){
                        echo("<script> document.getElementById('success').innerHTML = 'Επιτυχής αποθήκευση των δεδομένων.' </script>");
                    }
                    else{
                        echo("Connection with sql failed." . $conn -> error);
                    }
                    
                    
                }
            }

            if (array_key_exists("submit", $_POST)){
                validInputs();    
            }
            
        ?>

        <a class="success"></a><br><br>

        <form name="input" method="post">

            
            <a>Όνομα *</a>                       <a class="lefty">Επώνυμο *</a> <br>

            <input type="text"     id="first"    name="first"    size="20"      placeholder="Yiannis">        
            <input type="text"     id="last"     name="last"     size="20"      placeholder="Papadopoulos"> <br><br>

            <div>Ηλεκτρονικό Ταχυδρομείο *</div>
            
            <input type="email"    id="mail"     name="mail"     size="20"      placeholder="someone@example.org"> <br><br>

            <a>Username *</a>                                                           <a class="lefty">Password *</a> <br>

            <input type="text"     id="username" name="username" size="20"      placeholder="Ψευδώνυμο Χρήστη">
            <input type="password" id="passwrd"  name="passwrd"  size="20"      placeholder="Ο Κωδικός σας"> <br><br>
            
            <a>Ηλικία *</a><br> 
            <select id="age" name="age">
                <option>0-17</option>
                <option>18-29</option>
                <option>30-49</option>
                <option>50-70</option>
                <option>70+</option>
            </select><br><br>
            <a>Ημερομηνία Γέννησης *</a> <br>
            <input type="date"     id="dob"      name="dob"      size="20"> <br><br>

            <a>Τρόπος πληρωμής *</a><br><br>

            <a class="payment">Μετρητά</a>              <input type="radio" name="payment" id="payment" value="0" checked>
            <a class="payment">Κάρτα Πιστωτική</a>      <input type="radio" name="payment" id="payment" value="1">
            <a class="payment">Ηλεκτρονική Τράπεζα</a>  <input type="radio" name="payment" id="payment" value="2">
            <br><br><br>

            <a>Σχόλια *</a> <br>
            <textarea name="comment" id="comment" rows="5" cols="75" maxlength="300"></textarea> <br><br>

            <input type="submit" value="Αποθήκευση" name="submit" id="submit"> <input type="reset" value="Εκκαθάριση">

        </form>
        <br><br><br>

        <hr>
            <form name="search" method="post">
        <input type="text"     id="email_search"        name="email_search"    size="20"      placeholder="test@test.com">        
        <input type="text"     id="username_search"     name="username_search"     size="20"      placeholder="test"> <br><br>
        <input type="submit" value="Search">
        <?php

        $email_search   = $_POST['email_search'];
        $username_search = $_POST['username_search'];

        $server_name = "localhost";
                    $user_name   = "root";
                    $pass_word   = "";
                    $dbname      = "Ergastirio_6";

                    $conn = new mysqli($server_name, $user_name, $pass_word, $dbname);
                    if (!$conn){
                        die("Connection failed: " . mysqli_connect_error());
                    }

        $sql2 = "SELECT * FROM input WHERE email='$email_search' OR username='$username_search'";

        $result = mysqli_query($conn, $sql2);

        if ($result)
        {
            echo("<script> document.getElementById('success').innerHTML = 'Επιτυχής αποθήκευση των δεδομένων.' </script>");
        }
        else
        {
            echo("Connection with sql failed." . $conn -> error);
        }

        while($row = mysqli_fetch_array($result))
        {
            echo print_r($row);
        }
        ?>



    </body>
</html>