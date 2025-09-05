<?php

$temperatura = 25;
if ($temperatura < 0) {
    echo "Está muito frio!";
} elseif ($temperatura >= 0 && $temperatura <= 20) {
    echo "Está frio!";
} elseif ($temperatura > 20 && $temperatura <= 30) {
    echo "Está agradável!";
} else {
    echo "Está quente!";
}

?>