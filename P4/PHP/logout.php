<?php
    session_start();
    echo "Sesion cerrada correctamente :D";
    session_unset();
    session_destroy();
?>;
