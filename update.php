<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update</title>
        <style type="text/css">@import url("css.css");</style>
    </head>
    <body>    
        <h1>Update</h1>
        <?php
        function nactiTridu($trida) {
            require("tridy/$trida.php");
        }

        spl_autoload_register("nactiTridu");
        db::connect();
        $napln = db::napln();
        ?>
        <div>
        <form action="index.php" method="post">
            Jméno: <br>
            <input type="text" name="Jmeno" value="<?php echo $napln[0]['Jmeno'];?>"> <br>
            Pøíjmení:<br>
            <input type="text" name="Prijmeni" value="<?php echo $napln[0]['Prijmeni'];?>"><br>
            Datum Narození: <br>
            <input type="text" name="DatumNarozeni" value="<?php echo $napln[0]['DatumNarozeni'];?>"><br>
            Obor:<br>
            <input type="text" name="Obor" value="<?php echo $napln[0]['Obor'];?>"><br>
            <input type="hidden" name="id" value="<?php echo $napln[0]['id'];?>">
            <input type="submit" value="Pøidat">
        </form>
        </div>


    </body>
</html>
