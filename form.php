<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nový Student</title>
        <style type="text/css">@import url("css.css");</style>
    </head>
    <body>    
        <h1>Nový Student</h1>
        <div>
        <form action="index.php" method="post" name="novy">
            Jméno: <br><input type="text" name="Jmeno"> <br>
            Pøíjmení:<br><input type="text" name="Prijmeni"><br>
            Datum Narození: (rok-mìsíc-den)<br><input type="text" name="DatumNarozeni"><br>
            Obor: (vložte èíslo od 1 do 4)<br><input type="text" name="Obor"><br>
            <input type="submit" value="Pøidat">
        </form>
        </div>


    </body>
</html>
