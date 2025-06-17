<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Redactar Correo</title>
    <link rel="stylesheet" href="estilos.css" />
  </head>
<body>
    <h2>Redactar Correo</h2>
  <div class="redactar">
    <form action="javascript:enviar()" method="post" id="formulario">
      <label for="correo">Correo</label>
      <input type="email" name="correo" id="correo" required />
</div>
<br>
<div class="redactar">
      <label for="asunto">Asunto</label>
      <input type="text" name="asunto" id="asunto" required />
</div>
<br>
<div class="redactar">
      <label for="mensaje">Mensaje</label>
      <textarea name="mensaje" id="mensaje" cols="30" rows="10" required></textarea>

      <input type="hidden" name="tipo"/>
      <button type="submit">Enviar Correo</button>
</form>
  </div>
</body>
</html>