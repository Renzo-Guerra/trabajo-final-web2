<div class="properties-container">
  {foreach from=$properties item=$property}
    <div class="property-container">
      <div class="property-container__left"> {* left part *}
        <h4>{$property->operacion}</h4>
        <div>
          {**REMINDER: Learn how to upload images to the DB and then show them *}
          <img src="assets/img/propiedades/casa1.jpg" alt="Propiedad en venta">
        </div>
      </div>
      <div class="property-container__right"> {* right part *}
        <h3>{$property->titulo}</h3>
        <p>{$property->descripcion}</p>
        <p>$USD: {$property->precio}</p>
        <div class="characteristics">
          <div><p>Mts²: {$property->metros_cuadrados}</p></div>
          <div><p>Ambientes: {$property->ambientes}</p></div>
          <div><p>Baños: {$property->banios}</p></div>
          <div><p>Mts²: {$property->metros_cuadrados}</p></div>
          {if $property->permite_mascotas}
            <div><p>Permite mascotas</p></div>
          {/if}
        </div>
      </div>
    </div>
  {foreachelse}
    <div>
      <p>Tabla vacia</p>
    </div>
  {/foreach}
</div>