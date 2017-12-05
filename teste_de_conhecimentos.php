<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 01/12/2017
 * Time: 20:27
 */

for ($i = 1; $i <= 100; $i++) {
    if ($i % 3 == 0) {
        print("Três ");
    }if ($i % 5 == 0){
        print("Cinco ");
    }
    elseif ($i % 3 != 0 & $i % 3 != 0){
        print("$i");
    }
    print("<br>");

}



?>