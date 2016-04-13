<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">@import url("css.css");</style>
    </head>
    <body>
        <?php

        function nactiTridu($trida) {
            require("tridy/$trida.php");
        }

        spl_autoload_register("nactiTridu");
        
        if (isset($_POST['Jmeno']) && isset($_POST['DatumNarozeni']) && isset($_POST['Prijmeni']) && isset($_POST['Obor'])){
            db::connect();
            $Jmeno = filter_input(INPUT_POST,'Jmeno');
            $DatumNarozeni = filter_input(INPUT_POST,'DatumNarozeni');
            $Prijmeni = filter_input(INPUT_POST,'Prijmeni');
            $Obor = filter_input(INPUT_POST,'Obor');
            $id = filter_input(INPUT_POST, 'id');
            db::update($id, $Jmeno, $Prijmeni, $DatumNarozeni, $Obor);
        }

        if(isset($_POST['Jmeno'])){
        if ($_POST['Jmeno'] && $_POST['Prijmeni'] && $_POST['DatumNarozeni'] != '') {
            db::connect();
            $Jmeno = filter_input(INPUT_POST, 'Jmeno');
            $Prijmeni = filter_input(INPUT_POST, 'Prijmeni');
            $DatumNarozeni = filter_input(INPUT_POST, 'DatumNarozeni');
            if ($_POST['Obor'] != '') {
                $Obor = filter_input(INPUT_POST, 'Obor');
            } else {
                $Obor = '';
            }
            db::novy($Jmeno, $Prijmeni, $DatumNarozeni, $Obor);
        }
        }
        
            db::connect();
            db::dotaz();
            db::vypis();
        
        ?>
    </body>
</html>