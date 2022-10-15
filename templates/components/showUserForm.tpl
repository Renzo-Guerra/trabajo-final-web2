<div class="container-sm p-4 bg-success d-grid gap-4">
  <h3 class="my-3 text-center">{$form_headign}</h3>
  {if !is_null($user)}
    <input type="hidden" name="dni" value="{$user->dni}">
  {/if}
  <div class="d-flex justify-content-between">
    <label for="owner_name">Nombre: </label>
    <input type="text" id="owner_name" name="name" placeholder="Nombre" {if !is_null($user)}value="{$user->nombre}"{/if} required>
  </div>
  <div class="d-flex justify-content-between">
    <label for="owner_surname">Apellido: </label>
    <input type="text" id="owner_surname" name="surname" placeholder="Apellido" {if !is_null($user)}value="{$user->apellido}"{/if} required>
  </div>
  <div class="d-flex justify-content-between">
    <label for="owner_dni">Dni: </label>
    <input type="number" id="owner_dni" name="dni" placeholder="Dni" {if !is_null($user)}value="{$user->dni}"{/if} required>
  </div>
  <div class="d-flex justify-content-between">
    <label for="owner_phone">Celular: </label>
    <input type="number" id="owner_phone" name="phone" placeholder="Celular" {if !is_null($user)}value="{$user->telefono}"{/if} required>
  </div>
  <div class="d-flex justify-content-between">
    <label for="owner_mail">Mail: </label>
    <input type="mail" id="owner_mail" name="mail" placeholder="Mail" {if !is_null($user)}value="{$user->mail}"{/if} required>
  </div>
  <button class="btn btn-primary">{$confirm_button}</button>
</div>