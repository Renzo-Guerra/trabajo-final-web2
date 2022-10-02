<form action="editarPropiedad" class="container-sm">
  <div class="container-sm p-4 bg-success d-grid gap-4">
    <h3 class="my-3 text-center">Editar propiedad</h3>
    <input type="hidden" name="id" value="{$property->id}">
    <div class="d-flex justify-content-between">
      <label for="title">Titulo: </label>
      <input type="text" id="title" name="titulo" value="{$property->titulo}">
    </div>
    <div class="d-flex justify-content-between">
      <label for="type_property">Tipo de propiedad: </label>
      <select name="tipo" id="type_property">
        <option value="casa" name="tipo" {if $property->tipo == 'casa'}selected{/if}>Casa</option>
        <option value="departamento" name="tipo" {if $property->tipo == 'departamento'}selected{/if}>Departamento</option>
        <option value="ph" name="tipo" {if $property->tipo == 'ph'}selected{/if}>PH</option>
        <option value="fondo de comercio" name="tipo" {if $property->tipo == 'fondo de comercio'}selected{/if}>Fondo de comercio</option>
        <option value="terreno baldio" name="tipo" {if $property->tipo == 'terreno baldio'}selected{/if}>Terreno baldio</option>
      </select>
    </div>
    <div class="d-flex justify-content-between">
      <label for="operation">Operación: </label>
      <select name="operacion" id="operation">
        <option value="alquiler" name="operacion" {if $property->operacion == 'alquiler'}selected{/if}>Alquiler</option>
        <option value="venta" name="operacion" {if $property->operacion == 'venta'}selected{/if}>Venta</option>
      </select>
    </div>
    <div class="d-flex justify-content-between">
      <label for="description">Descripción: </label>
      <input type="text" id="description" name="descripcion" value="{$property->descripcion}" required>
    </div>
    <div class="d-flex justify-content-between">
      <label for="prize">$USD: </label>
      <input type="number" id="prize" name="precio" value="{$property->precio}" required>
    </div>
    <div class="d-flex justify-content-between">
      <label for="square_meter">Mts²: </label>
      <input type="number" id="square_meter" name="metros_cuadrados" value="{$property->metros_cuadrados}" required>
    </div>
    <div class="d-flex justify-content-between">
      <label for="rooms">Ambientes: </label>
      <input type="number" id="rooms" name="ambientes" value="{$property->ambientes}" required>
    </div>
    <div class="d-flex justify-content-between">
      <label for="bathrooms">Baños: </label>
      <input type="number" id="bathrooms" name="banios" value="{$property->banios}" required>
    </div>
    <div class="d-flex justify-content-end gap-3">
      <p>Mascotas: </p>
      <div>
        <label for="allow">Permite</label>
        <input type="radio" name="permite_mascotas" value="true" id="allow" {if $property->permite_mascotas == 1}checked{/if}>
      </div>
      <div>
        <label for="does_not_allow">No permite</label>
        <input type="radio" name="permite_mascotas" value="false" id="does_not_allow" {if $property->permite_mascotas == 0}checked{/if}>
      </div>
    </div>
    <div class="d-flex justify-content-between">
      <label for="owner">Propietario: </label>
      <select name="propietario" id="owner">
        {foreach from=$users item=$user}
          {* Displays every user, and 'checks' the owner of the property by defaut *}
          <option value="{$user->dni}" name="propietario" {if $user->dni == $property->propietario}selected{/if}>{$user->nombre} {$user->apellido}</option>
        {/foreach}
      </select>
    </div>
    <div class="d-flex gap-4 justify-content-end">
      <button type="submit" class="btn btn-primary">Confirmar</button>
    </div>
  </div>
</form>