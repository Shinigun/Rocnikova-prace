<?php

class db {
    
    private static $pripojeni;
    
    
   /**
    * @param recognize $host umístìní databáze
    * @param string $name vložení uživatele pro pøipojení
    * @param string $heslo vložení hesla pro pøipojení
    * @param string $databaze pøipojení k databázy
    */ 
   public static function connect (){
       $host = 'localhost';
       $name = 'root';
       $heslo = '';
       $databaze = 'rocnikovka';
       self::$pripojeni = mysqli_connect($host, $name, $heslo, $databaze);
       mysqli_set_charset(self::$pripojeni, "utf8");
   }
   
   /**
    * $param $dotaz zapsání dotazu
    * @param $vysledek 
    * @return @vysledek vrácení výsledku dotazu
    */
   public static function dotaz(){
       $dotaz = mysqli_query(self::$pripojeni, "SELECT s.id, Jmeno, Prijmeni, DatumNarozeni, Nazev FROM studenti AS s LEFT JOIN obory AS o ON s.Obor = o.id");
       $vysledek = mysqli_fetch_all($dotaz, MYSQLI_ASSOC); 
       return $vysledek;
   }
   
   /**
    * @param $i
    * @param $v
    */
   public static function vypis(){
       echo ("<table border='1'><tr><th>Id</th><th>Jméno</th><th>Pøíjmení</th><th>Datum narození</th><th>Obor</th><th><form action=form.php method='POST'><input type='image' src='icons/new.png' style='width: 30px; height: 30px'></form></th></tr>");
       $i = 0;
       foreach (self::dotaz() as $v){
           echo ('<tr id=$i><td>'.$v['id'].'</td>');
           echo ('<td>'.$v['Jmeno'].'</td>');
           echo ('<td>'.$v['Prijmeni'].'</td>');
           echo ('<td>'.$v['DatumNarozeni'].'</td>');
           echo ('<td>'.$v['Nazev'].'</td>');
           echo ('<td><form action="update.php?radek='.$i.'" method="POST">'.'<input type="image" src="icons/change.png" style="width: 30px; height: 30px">'.'</td></tr></form>');
           $i ++;
       }
       echo ('<table>');
   }
   
   
   public static function novy($Jmeno, $Prijmeni, $DatumNarozeni, $Obor){
       if ($Obor != ''){
          $dotaz = mysqli_query(self::$pripojeni, "INSERT INTO studenti (Jmeno, Prijmeni, DatumNarozeni, Obor) VALUES ('".$Jmeno."', '".$Prijmeni."', '".$DatumNarozeni."', '".$Obor."')"); 
       }
       else {
          $dotaz = mysqli_query(self::$pripojeni, "INSERT INTO studenti (Jmeno, Prijmeni, DatumNarozeni) VALUES ('".$Jmeno."', '".$Prijmeni."', '".$DatumNarozeni."'"); 
       }
       
   }
   public static function update($id, $Jmeno, $Prijmeni, $DatumNarozeni, $Obor){
       $dotaz = mysqli_query(self::$pripojeni, "UPDATE studenti SET Jmeno ='".$Jmeno."', Prijmeni ='".$Prijmeni."', DatumNarozeni ='".$DatumNarozeni."', Obor ='".$Obor."' WHERE id=".$id."");
   }
   public static function napln(){
       $radek = filter_input(INPUT_GET, 'radek');
       $id = self::dotaz()[$radek]['id'];
       $dotaz = mysqli_query(self::$pripojeni, "SELECT * FROM studenti WHERE id='".$id."'");
       $napln = $vysledek = mysqli_fetch_all($dotaz, MYSQLI_ASSOC);
       return $napln;
   }
   
}

