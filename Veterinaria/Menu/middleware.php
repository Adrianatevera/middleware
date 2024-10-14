<?php
// Verifica si la sesión no ha sido iniciada antes de llamar a session_start()
if (session_status() == PHP_SESSION_NONE) {
    session_start();  // Solo se llama si no hay ninguna sesión activa
}

function registrarActividad() {
    if (isset($_SESSION['username'])) {
        $usuario = $_SESSION['username'];
        $pagina = $_SERVER['REQUEST_URI']; // Página que visitó
        $fecha = date('Y-m-d H:i:s'); // Fecha y hora de la visita
        
        // Guardar en un archivo de log
        $log = "Usuario: $usuario, Página: $pagina, Fecha: $fecha\n";
        file_put_contents('actividad.txt', $log, FILE_APPEND);
    }
}
?>
