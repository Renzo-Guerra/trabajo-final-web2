<form action="{$formAction}" class="container-sm">
  <div class="container-sm p-4 bg-success d-grid gap-4">
    <h3 class="my-3 text-center">{$formHeader}</h3>
    {if !is_null($property)}
      <input type="hidden" name="id" value="{$property->id}">
    {/if}
    <div class="d-flex justify-content-between">
      <label for="title">Titulo: </label>
      <input type="text" id="title" name="titulo" {if !is_null($property)}value="{$property->titulo}"{/if} placeholder="Titulo">
    </div>
    <div class="d-flex justify-content-between">
      <label for="type_property">Tipo de propiedad: </label>
      <select name="tipo" id="type_property">
        <option value="casa" name="tipo" {if !is_null($property) && $property->tipo == 'casa'}selected{/if}>Casa</option>
        <option value="departamento" name="tipo" {if !is_null($property) && $property->tipo == 'departamento'}selected{/if}>Departamento</option>
        <option value="ph" name="tipo" {if !is_null($property) && $property->tipo == 'ph'}selected{/if}>PH</option>
        <option value="fondo de comercio" name="tipo" {if !is_null($property) && $property->tipo == 'fondo de comercio'}selected{/if}>Fondo de comercio</option>
        <option value="terreno baldio" name="tipo" {if !is_null($property) && $property->tipo == 'terreno baldio'}selected{/if}>Terreno baldio</option>
      </select>
    </div>
    <div class="d-flex justify-content-between">
      <label for="operation">Operación: </label>
      <select name="operacion" id="operation">
        <option value="alquiler" name="operacion" {if !is_null($property) && $property->operacion == 'alquiler'}selected{/if}>Alquiler</option>
        <option value="venta" name="operacion" {if !is_null($property) && $property->operacion == 'venta'}selected{/if}>Venta</option>
      </select>
    </div>
    <div class="d-flex justify-content-between">
      <label for="description">Descripción: </label>
      <input type="text" id="description" name="descripcion" {if !is_null($property)}value="{$property->descripcion}"{/if} required placeholder="Descripcion">
    </div>
    <div class="d-flex justify-content-between">
      <label for="prize">$USD: </label>
      <input type="number" id="prize" name="precio" {if !is_null($property)}value="{$property->precio}"{/if} required placeholder="Precio">
    </div>
    <div class="d-flex justify-content-between">
      <label for="square_meter">Mts²: </label>
      <input type="number" id="square_meter" name="metros_cuadrados" {if !is_null($property)}value="{$property->metros_cuadrados}"{/if} required placeholder="Mts²">
    </div>
    <div class="d-flex justify-content-between">
      <label for="rooms">Ambientes: </label>
      <input type="number" id="rooms" name="ambientes" {if !is_null($property)}value="{$property->ambientes}"{/if} required placeholder="Ambientes">
    </div>
    <div class="d-flex justify-content-between">
      <label for="bathrooms">Baños: </label>
      <input type="number" id="bathrooms" name="banios" {if !is_null($property)}value="{$property->banios}"{/if} required placeholder="Banios">
    </div>
    <div class="d-flex justify-content-end gap-3">
      <p>Mascotas: </p>
      <div>
        <label for="allow">Permite</label>
        <input type="radio" name="permite_mascotas" value="true" id="allow" checked>
      </div>
      <div>
        <label for="does_not_allow">No permite</label>
        <input type="radio" name="permite_mascotas" value="false" id="does_not_allow" {if !is_null($property) && $property->permite_mascotas == 0}checked{/if}>
      </div>
    </div>
    <div class="d-flex justify-content-between">
      <label for="owner">Propietario: </label>
      <select name="propietario" id="owner">
        {foreach from=$users item=$user}
          {* Displays every user, and 'checks' the owner of the property by defaut *}
          <option value="{$user->dni}" name="propietario" {if !is_null($property) && $user->dni == $property->propietario}selected{/if}>{$user->nombre} {$user->apellido}</option>
        {/foreach}
      </select>
    </div>
    <div class="d-flex gap-4 justify-content-end">
      <button type="submit" class="btn btn-primary">{$buttonMessage}</button>
    </div>
  </div>
</form>