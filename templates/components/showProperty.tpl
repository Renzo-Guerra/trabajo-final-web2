<div>
  <ul>
    <li>Titulo: {$property_and_user->titulo}</li>
    <li>Tipo: {$property_and_user->tipo}</li>
    <li>Operacion: {$property_and_user->operacion}</li>
    <li>Descripcion: {$property_and_user->descripcion}</li>
    <li>Precio: {$property_and_user->precio}</li>
    <li>Mts²: {$property_and_user->metros_cuadrados}</li>
    <li>Ambientes: {$property_and_user->ambientes}</li>
    <li>Banios: {$property_and_user->banios}</li>
    <li>Permite mascotas: {if $property_and_user->permite_mascotas}Si{else}No{/if}</li>
    <li>Propietario (dni): {$property_and_user->propietario}</li>
  </ul>
  <ul>
    <li>Dni: {$property_and_user->dni}</li>
    <li>Nombre: {$property_and_user->nombre}</li>
    <li>Apellido: {$property_and_user->apellido}</li>
    <li>Telefono: {$property_and_user->telefono}</li>
    <li>Mail: {$property_and_user->mail}</li>
  </ul>
</div>