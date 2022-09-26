@foreach ($usuariosArray as $usuario)
      <div class="col-md">
        <ul class="list-group">
          <li class="list-group-item active">{{ $usuario['name'] }}</li>
          <li class="list-group-item"></li>
        </ul>
      </div>
    @endforeach