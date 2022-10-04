<div class="props-container">
  {if count($properties) > 0}
    {foreach from=$properties item=$property}
      <div class="property-container">
        <div class="property-container__left"> {* left part *}
          <h4>{$property->operacion}</h4> {* This line will be deleted (only to show that the filter works) *}
          <div>
            {**REMINDER: Learn how to upload images to the DB and then show them *}
            <img src="assets/img/propiedades/casa1.jpg" alt="Propiedad en venta">
          </div>
        </div>
        <div class="property-container__right"> {* right part *}
          <div class="property-container__important">
            <div>
              <h3>{$property->titulo}</h3>
              <p>{$property->descripcion}</p>
            </div>
            <p>$USD: {$property->precio}</p>
          </div>
          <div class="property-container__characteristics">
            <span><i class="fa-solid fa-maximize"></i> Mts²: {$property->metros_cuadrados}</span>
            <span><i class="fa-solid fa-bed"></i> {$property->ambientes}</span>
            <span><i class="fa-solid fa-bath"></i> {$property->banios}</span>
            {if $property->permite_mascotas}
              <span><i class="fa-solid fa-paw"></i> mascotas</span>
            {/if}
          </div>
          <div>
            <a href="propiedad/{$property->id}"><button>Ver más</button></a>
          </div>
        </div>
        {** If session is running... *}
        {include file="./actions.tpl"}
      </div>    
    {/foreach}
  {else} {*! Else doesn't working... *}
    <div>
      <p>Tabla vacia</p>
    </div>
  {/if}
  

  
</div>