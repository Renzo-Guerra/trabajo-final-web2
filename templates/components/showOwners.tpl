<div class="container d-grid">
  {foreach from=$owners item=$owner}
    <div class="properties__property">
      <h4>Nombre: {$owner->nombre}, Apellido: {$owner->apellido}</h4>
      <ol>
        <li>Dni: {$owner->dni}</li>
        <li>Telefono: {$owner->telefono}</li>
        <li>Mail: {$owner->mail}</li>
      </ol>
    </div>
  {foreachelse}
    <div>
      <p>Tabla vacia</p>
    </div>
  {/foreach}
</div>