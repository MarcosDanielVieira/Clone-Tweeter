<div class="divUsuarios mb-2">

  <form 
    id="form_seguir" 
    action="seguir"
    action="seguir" 
    method="POST"
    name="form_seguir">

    {{ csrf_field() }}

    <input 
      type="hidden" 
      value="{{$usuario->id}}"
      required
      minlength="1"
      name="id_seguido" 
      class="listaUsuarios"
     >

    <input 
      type="submit" 
      value="Seguir"
      class="submit-button w-button rounded seguirUsuario">

  </form>
  
  <span class="h6 ">
    {{$usuario->nome}}
  </span>

  <p>
    <span class="">
      {{$usuario->email}}
    </span>
  </p>

</div>
<hr/>