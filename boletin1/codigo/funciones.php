<?php
function limpiar()
{
    #Ejer1
    setcookie("min");

    #Ejer2
    setcookie("min");
    setcookie("max");
    setcookie("int");
    setcookie("sum");

    #ejer2
    setcookie("intentos");
    setcookie("peso");

    #ejer4
    setcookie("intentos");
    setcookie("peso");

    #ejer5
    setcookie("acum");
    setcookie("cont");

    #ejer6
    setcookie("cont");
    setcookie("npar");    
    setcookie("suma");
    setcookie("cont1");
    setcookie("max");

    #Fin
    header("Location:../");
}

function ejer1()
{
    if (isset($_POST["temper"])) {
        $temperatura = $_POST['temper'];
        echo "La temperatura introducida es $temperatura<br>";
        if (!isset($_COOKIE['min'])) {
            setcookie("min", $temperatura, time() + 3600);
            echo "la temperatura minima es $temperatura";
        } else {
            if ($temperatura < $_COOKIE['min']) {
                setcookie("min", $temperatura, time() + 3600);
                echo "la temperatura minima es $temperatura";
            } else {
                echo "la temperatura minima es " . $_COOKIE["min"];
            }
        }
    } else {
        echo "Rellena el formulario";
    }
}

function ejer2()
{
    if (isset($_POST["nota"])) {
        $nota = $_POST["nota"];
        if (!isset($_COOKIE["Max"]) && !isset($_COOKIE["min"]) && !isset($_COOKIE["int"]) && !isset($_COOKIE["sum"])) {
            setcookie("min", $nota, time() + 3600);
            setcookie("max", $nota, time() + 3600);
            setcookie("int", 1, time() + 3600);
            setcookie("sum", 0, time() + 3600);
            $max = $nota;
            $min = $nota;
            $med = $nota;
        } else {

            #calculo max
            if ($nota > $_COOKIE["max"]) {
                $max = $nota;
                setcookie("max", $max, time() + 3600);
            } else {
                $max = $_COOKIE["max"];
            }

            #Calculo min
            if ($nota < $_COOKIE["min"]) {
                $min = $nota;
                setcookie("min", $nota, time() + 3600);
            } else {
                $min = $_COOKIE["min"];
            }

            #calculo med
            $suma = $_COOKIE["sum"] + $nota;
            setcookie("sum", $suma, time() + 3600);
            $med = $suma / $_COOKIE["int"];
            $int = $_COOKIE["int"];
            $int++;
            setcookie("int", $int, time() + 3600);
        }


        echo "El maximo es $max<br>";
        echo "El minimo es $min<br>";
        echo "la media es $med<br>";
    }
}

function  ejer4()
{
    if (isset($_POST["peso"])) {
        if (isset($_COOKIE['intentos']) && isset($_COOKIE['peso'])) {
            if ($_COOKIE['intentos'] == 9) {
                echo "No hay mas Personas<br>";
                $peso = $_POST["peso"];
                $total = $peso + $_COOKIE['peso'];
                echo "$total";
                if ($total <= 400) {
                    echo "Las persoas pueden subir al ascensor";
                } else {
                    echo "Las personas no pueden subir al ascensor";
                }
            } else {
                $intentos = $_COOKIE['intentos'];
                $intentos++;
                $peso = $_POST["peso"];
                $total = $peso + $_COOKIE['peso'];
                setcookie("intentos", $intentos, time() + 3600);
                setcookie("peso", $total, time() + 3600);
            }
        } else {
            $peso = $_POST["peso"];
            setcookie("intentos", 1, time() + 3600);
            setcookie("peso", $peso, time() + 3600);
        }
    }
}

function ejer5()
{
    if (isset($_POST["num"])) {
        $numero = $_POST["num"];
        if ($numero < 0) {
            limpiar();
        }
        if (isset($_COOKIE['acum']) && isset($_COOKIE['cont'])) {
            $acum = $_COOKIE["acum"];
            $acum = $acum + $numero;
            setcookie("acum", $acum, time() + 3600);
            $cont = $_COOKIE['cont'];
            $cont++;
            setcookie("cont", $cont, time() + 3600);
            $media = $acum / $cont;
            echo "la media de estos $cont numeros es: $media";
        } else {
            $numero = $_POST["num"];
            setcookie("acum", $numero, time() + 3600);
            setcookie("cont", 1, time() + 3600);
        }
    }
}

function ejer6(){
    if (!isset($_COOKIE['cont']) && !isset($_COOKIE['npar']) && !isset($_COOKIE['sum']) && !isset($_COOKIE['max'])) {
        $cont = 0;
        $npar = 0;
        $suma= 0;
        $cont1 = 1;
        $max=0;

        setcookie("cont", $cont, time() + 3600);
        setcookie("npar", $npar, time() + 3600);    
        setcookie("suma", $suma, time() + 3600);
        setcookie("cont1", $cont1, time() + 3600);
        setcookie("max", $max, time() + 3600);
    }
    else {
        if (isset($_POST['num'])) {
            if ($_POST['num']<0) {
                limpiar();
            }
            $cont = $_COOKIE['cont'];
            $cont++;
            setcookie("cont", $cont, time() + 3600);
            $num=$_POST['num'];

            if ($num%2==0) {
                $npar = $_COOKIE['npar'];
                $suma=$_COOKIE['suma'];
                $cont1 = $_COOKIE['cont1'];
                
                if ($num > $_COOKIE['max']) {
                    setcookie("max", $num, time() + 3600);
                    $max=$num;
                }

            }else {
                $max=$_COOKIE['max'];
                
                $cont1 = $_COOKIE['cont1'];
                $cont1++;
                setcookie("cont1", $cont1, time() + 3600);

                $suma= $_COOKIE['suma'];
                $suma=$suma+$num;
                setcookie("suma", $suma, time() + 3600);
                
                $npar = $_COOKIE['npar'];
                $npar++;
                setcookie("npar", $npar, time() + 3600);
            }
        }else {
            $cont = $_COOKIE['cont'];
            $npar = $_COOKIE['npar'];
            $suma = $_COOKIE['suma'];
            $cont1 = $_COOKIE['cont1'];
            $max = $_COOKIE['cont'];
        }
    }

    $med=$suma/$cont1;

    echo "Total numeros introducidos: $cont<br>";    
    echo "Total numeros npar: $npar<br>";
    echo "La suma de los impares es $med<br>";
    echo "El mayor de los numeros pares es: $max";
}

function ejer7(){
    if (isset($_COOKIE['total']) && isset($_COOKIE['acum'])) {
        if (isset($_POST['num'])) {
            $med=0;
            $num = $_POST['num'];
            $total=$_COOKIE['total'];
            $acum=$_COOKIE['acum'];
            $acum++;
            $todo=$total+$num;
            if ($todo>=10) {
                $med = $todo/$acum;
                echo "El total es $todo<br>";
                echo "La media es: $med<br>";
                echo "se han introducido $acum numeros";
            }else{
                $total=$total+$num;
                setcookie("total", $total, time() + 3600);
                setcookie("acum", $acum, time() + 3600);
            }
        }
    }else {
        setcookie("total", 0, time() + 3600);
        setcookie("acum", 0, time() + 3600);
    }
}
