<div class="container d-grid">
  {foreach from=$users item=$user}
    <div class="properties__property">
      <h4>Nombre: {$user->nombre}, Apellido: {$user->apellido}</h4>
      <ol>
        <li>Dni: {$user->dni}</li>
        <li>Telefono: {$user->telefono}</li>
        <li>Mail: {$user->mail}</li>
      </ol>
      {include file="./userActions.tpl"}
    </div>
  {foreachelse}
    <div>
      <p>Tabla vacia</p>
    </div>
  {/foreach}
</div>