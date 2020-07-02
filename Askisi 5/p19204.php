<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Εργαστηριακή Άσκηση 5</title>
        <style>
        table
        {
            border: 2px solid blue;
        }

        td
        {
            width: 10px;
            padding: 20px;
            background-color: green;
        }

        .red
        {
            background-color: red;
        }
        </style>
    </head>
    <body>
        <?php
            function display_message($msg)
            {
                echo("<script> var inpt = prompt('". $msg ."'); </script>");
                $input = "<script> document.write(inpt); </script>";

                return ($input);
            }

            $character_input = display_message("Εισάγετε έναν χαρακτήρα:");

            echo("<table>");
            for ($i = 0; $i < 10; $i++)
            {
                echo("<tr>");
                for ($j = 0; $j < 10; $j++)
                {
                    if($i % 2 == 0) {echo("<td class='red'> $character_input </td>");}
                    else            {echo("<td></td>");}
                }
                echo("</tr>");
            }
            echo("</table>");
        ?>
    </body>
</html>