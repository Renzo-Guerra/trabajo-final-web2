<form action="editarUsuarioDB" class="container-sm">
  <div class="container-sm p-4 bg-success d-grid gap-4">
    <h3 class="my-3 text-center">{$form_headign}</h3>
    <input type="hidden" name="dni" value="{$user->dni}">
    <div class="d-flex justify-content-between">
      <label for="owner_name">Nombre: </label>
      <input type="text" id="owner_name" name="name" value="{$user->nombre}" required>
    </div>
    <div class="d-flex justify-content-between">
      <label for="owner_surname">Apellido: </label>
      <input type="text" id="owner_surname" name="surname" value="{$user->apellido}" required>
    </div>
    <div class="d-flex justify-content-between">
      <label for="owner_phone">Celular: </label>
      <input type="number" id="owner_phone" name="phone" value="{$user->telefono}" required>
    </div>
    <div class="d-flex justify-content-between">
      <label for="owner_mail">Mail: </label>
      <input type="mail" id="owner_mail" name="mail" value="{$user->mail}" required>
    </div>
    <button class="btn btn-primary">{$confirm_button}</button>
  </div>
</form>