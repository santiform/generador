<?php
function generarHashBcrypt($contraseña) {
    // PASSWORD_BCRYPT automáticamente genera un salt aleatorio
    return password_hash($contraseña, PASSWORD_BCRYPT);
}
?>
