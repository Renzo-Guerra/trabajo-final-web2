<div class="container d-grid">
  {foreach from=$properties item=$property}
    <div class="properties__property">
      <h4>{$property->titulo}</h4>
      <ol>
        <li>{$property->tipo}</li>
        <li>{$property->operacion}</li>
        <li>{$property->descripcion}</li>
        <li>{$property->precio}</li>
        <li>{$property->metros_cuadrados}</li>
        <li>{$property->ambientes}</li>
        {* Por lo visto sql no se banca la 'ñ' (antes tenia en la db el campo 'baños' pero no me dejaba leerlo aca) *}
        <li>{$property->banios}</li> 
        <li>{$property->permite_mascotas}</li>
        <li>{$property->propietario}</li>
      </ol>
    </div>
  {foreachelse}
    <div>
      <p>Tabla vacia</p>
    </div>
  {/foreach}
</div>