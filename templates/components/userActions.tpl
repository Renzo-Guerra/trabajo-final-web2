<div class="actions">
  {** The id is passed from the view *}
  <a href="eliminarUsuario/{$user->dni}"><button class="btn btn-danger">Eliminar</button></a> <!--When a user is deleted, deletes all his properties-->
  <a href="editarUsuario/{$user->dni}"><button class="btn btn-secondary">Editar</button></a>
</div>