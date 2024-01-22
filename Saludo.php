<?php
    function Saludo() {
        date_default_timezone_set("America/Santo_Domingo");
        $fecha = getdate();
        
        switch($fecha["hours"]) {
            case $fecha["hours"] > 18 || $fecha["hours"] === 00 || $fecha["hours"] < 5:
                return "Buenas noches";
            break;
            case $fecha["hours"] >= 5 && $fecha["hours"] <= 12:
                return "Buenos dias";
            break;
            case $fecha["hours"] > 12 && $fecha["hours"] <= 18:
                return "Buenas tardes";
            break;
        }
    }
?>
