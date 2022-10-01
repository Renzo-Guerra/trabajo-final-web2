<form action="addNewUser" class="container-sm">
  <div class="container-sm p-4 bg-success d-grid gap-4">
    <h3 class="my-3 text-center">Crear nuevo usuario</h3>
    <div class="d-flex justify-content-between">
      <label for="owner_name">Nombre: </label>
      <input type="text" id="owner_name" name="name" required>
    </div>
    <div class="d-flex justify-content-between">
      <label for="owner_surname">Apellido: </label>
      <input type="text" id="owner_surname" name="surname" required>
    </div>
    <div class="d-flex justify-content-between">
      <label for="owner_dni">Dni: </label>
      <input type="number" id="owner_dni" name="dni" required>
    </div>
    <div class="d-flex justify-content-between">
      <label for="owner_phone">Celular: </label>
      <input type="number" id="owner_phone" name="phone" required>
    </div>
    <div class="d-flex justify-content-between">
      <label for="owner_mail">Mail: </label>
      <input type="mail" id="owner_mail" name="mail" required>
    </div>
    <button class="btn btn-primary">Registrar</button>
  </div>
</form>