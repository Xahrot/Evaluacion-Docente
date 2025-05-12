<?php
echo "INICIAR SESIÓN";
?>
<form action="validar_login.php" method="POST">
  <input type="email" name="correo" placeholder="Correo" required>
  <input type="password" name="contraseña" placeholder="Contraseña" required>
  <button type="submit">Ingresar</button>
</form>

