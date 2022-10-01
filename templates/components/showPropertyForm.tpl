<form action="addNewProperty" class="container-sm">
  <div class="container-sm p-4 bg-success d-grid gap-4">
    <h3 class="my-3 text-center">Nueva propiedad</h3>
    <div class="d-flex justify-content-between">
      <label for="title">Titulo: </label>
      <input type="text" id="title" name="titulo">
    </div>
    <div class="d-flex justify-content-between">
      <label for="type_property">Tipo de propiedad: </label>
      <select name="tipo" id="type_property">
        <option value="casa" name="tipo">Casa</option>
        <option value="departamento" name="tipo">Departamento</option>
        <option value="ph" name="tipo">PH</option>
        <option value="fondo de comercio" name="tipo">Fondo de comercio</option>
        <option value="terreno baldio" name="tipo">Terreno baldio</option>
      </select>
    </div>
    <div class="d-flex justify-content-between">
      <label for="operation">Operación: </label>
      <select name="operacion" id="operation">
        <option value="alquiler" name="operacion">Alquiler</option>
        <option value="venta" name="operacion">Venta</option>
      </select>
    </div>
    <div class="d-flex justify-content-between">
      <label for="description">Descripción: </label>
      <input type="text" id="description" name="descripcion" required>
    </div>
    <div class="d-flex justify-content-between">
      <label for="prize">$USD: </label>
      <input type="number" id="prize" name="precio" required>
    </div>
    <div class="d-flex justify-content-between">
      <label for="square_meter">Mts²: </label>
      <input type="number" id="square_meter" name="metros_cuadrados" required>
    </div>
    <div class="d-flex justify-content-between">
      <label for="rooms">Ambientes: </label>
      <input type="number" id="rooms" name="ambientes" required>
    </div>
    <div class="d-flex justify-content-between">
      <label for="bathrooms">Baños: </label>
      <input type="number" id="bathrooms" name="banios" required>
    </div>
    <div class="d-flex justify-content-end gap-3">
      <p>Mascotas: </p>
      <div>
        <label for="allow">Permite</label>
        <input type="radio" name="permite_mascotas" value="true" id="allow">
      </div>
      <div>
        <label for="does_not_allow">No permite</label>
        <input type="radio" name="permite_mascotas" value="false" id="does_not_allow" checked>
      </div>
    </div>
    <div class="d-flex justify-content-between">
      <label for="dni_owner">Dni propietario: </label>
      <input type="number" id="dni_owner" name="propietario">
    </div>
    <button class="btn btn-primary">Agregar propiedad</button>
  </div>
</form>