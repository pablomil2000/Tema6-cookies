<?php

include("funciones.php");

if (isset($_GET['limpiar'])) {
    limpiar();
} elseif (isset($_GET['ejer1'])) {
    include("../formulario/ejer1.html");
    ejer1();
} elseif (isset($_GET['ejer2'])) {
    include("../formulario/ejer2.html");
    ejer2();
} elseif (isset($_GET['ejer4'])) {
    include("../formulario/ejer4.html");
    ejer4();
} elseif (isset($_GET['ejer5'])) {
    include("../formulario/ejer5.html");
    ejer5();
} elseif (isset($_GET['ejer6'])) {
    include("../formulario/ejer6.html");
    ejer6();
}elseif (isset($_GET['ejer7'])){
    include("../formulario/ejer7.html");
    ejer7();
}
