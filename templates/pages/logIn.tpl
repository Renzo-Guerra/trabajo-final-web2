{include file="../components/header.tpl"}
<form action="comprobarLogueoAdmin" method="post">
  <div>
    <label for="username">Nombre de usuario: </label>
    <input type="text" id="username" name="username" autocomplete="off" required>
  </div>
  <div>
    <label for="password">Contraseña</label>
    <input type="password" id="password" name="password" required>
  </div>
  <button type="submit">Confirmar</button>
  {if $error}
    <p>{$error}</p>
  {/if}
</form>
{include file="../components/footer.tpl"}