@extends('index')

@section('content_header')
   <h4> Reporte De Llantas  </h4> 
@stop

@section('contenido')
@if(Session::has('mensaje'))
<div class="alert alert-success">{{Session::get('mensaje')}}</div>
@endif

<div class="content">
   <div class="row">
     <div class="col-md-12">
       <div class="card">
         <div class="card-header">
           <div class="form-group row float-right">
             <div class="col-md-auto"> 
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
           Nuevo Articulo
         </button>
           </div>
       </div>
     </div>
     <!-- Tabla de reporte horarios fijos-->
     <table class="table table-hover table-responsive-xl" style="text-align:center;">
       <thead>
           <tr>
             <th scope="col" style="text-align: center"> # </th>
               <th scope="col" style="text-align: center">Nombre del producto</th>
               <th scope="col" style="text-align: center">Fabricante</th>
               <th scope="col" style="text-align: center">Acciones</th>
           </tr>
       </thead>
       <tbody>
         @foreach($consulta as $aar)
           <tr>
             <td style="text-align: center">{{ $aar-> id_llanta }}</td>
               <td style="text-align: center" class="tor">{{ $aar-> nombre }}</td>
               <td style="text-align: center"class="tor2">{{ $aar-> fabricante }}</td>
               <td style="text-align: center">    
                   <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                    <a href="{{route('modificardato',['id_llanta' => $aar->id_llanta])}}">  
                      <button  type="button" class="btn btn-outline-primary ti-pencil" title="Editar " style="margin-right 10px"></button>   
                       </a>
                      @if($aar->deleted_at) 
                      <a href="{{route('activardato',['id_llanta' => $aar->id_llanta])}}">
                        <button class="btn btn-outline-info me-md-4 ti-unlock" title="Activar dato" type="button" style="margin-right 10px">
                        </button>
                        </a>
                        <a href="{{route('eliminardato',['id_llanta'=>$aar->id_llanta])}}">
                        <button class="btn btn-outline-danger me-md-4 ti-close" title="Eliminar dato" type="button"></button>
                        </a>
                        @else 
                        <a href="{{route('desactivardato',['id_llanta'=>$aar->id_llanta])}}">
                        <button class="btn btn-outline-warning me-md-4 ti-lock" title="Desactivar dato" type="button" style="margin-right 10px"></button>
                        </a>
                        @endif
                   </div> 
               </td>
           </tr>
     @endforeach
       </tbody>
       </thead>
     </table>
     <!-- Fin de tabla-->
       </div>
       
   <!-- Modal Crear -->
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear articulo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{  route('guardardato') }}" class="form-horizontal m-t-30" enctype="multipart/form-data">
            {{ csrf_field() }} 
            <div class="form-group">
              <label for="a">Nombre del producto</label>
              <input type="text" class="form-control" onkeyup="validarNombre()" id="validacion" name="nombre" placeholder="Ejemplo: LXNV" required>
              <font color="red">  
                <small style="visibility:hidden;" text-color="red" id="advertencia"> <b>El nombre del producto no puede repetirse </b></small>
                </font> 
            </div>
            <div class="form-group">
               <label for="a">Ancho de llanta</label>
               <input type="text" class="form-control"  name="ancho_llanta" placeholder="Ejemplo: 37">
               <small id="" class="form-text text-muted">Ingresa un dato valido.</small>
             </div>
           <div class="form-group">
            <label for="a">Diametro de rin</label>
            <input type="text" class="form-control"  name="diametro_rin" placeholder="Ejemplo: 17">
            <small id="" class="form-text text-muted">Ingresa un dato valido.</small>
          </div>
          <div class="form-group">
            <label for="a">Presión Máxima</label>
            <input type="text" class="form-control"  name="presion_max" placeholder="Ejemplo: 40">
            <small id="" class="form-text text-muted">Ingresa un dato valido.</small>
          </div>
          <div class="form-group">
            <label for="a">Fabricante</label>
            <input type="text" class="form-control" onkeyup="validarNombre2()" id="validacion2" name="fabricante" placeholder="Ejemplo: firestone">
            <font color="red">  
              <small style="visibility:hidden;" text-color="red" id="advertencia2"> <b>El nombre del fabricante no puede repetirse </b></small>
              </font> 
          </div>
          <div class="form-group">
            <label for="a">Stock</label>
            <input type="text" class="form-control"  name="stock" placeholder="Ejemplo: 80">
            <small id="" class="form-text text-muted">Ingresa un dato valido.</small>
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-success">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
   </div>
 </div>
</div>
 
<script>
  function validarNombre(){
      var valida = document.getElementById('validacion').value;
        console.log(valida)
        var torLength = document.getElementsByClassName('tor').length;
        for(var i = 0; i < torLength; i++){
              var tor = document.getElementsByClassName('tor')[i].innerText;
              console.log(tor)
              if( valida == tor){
                console.log('Se encontro un repetido')
                document.getElementById('advertencia').style = "visibility:visible"
            }else{
              document.getElementById('advertencia').style = "visibility:hidden"
            }
            }
    }
  </script>

<script>
  function validarNombre2(){
      var valida2 = document.getElementById('validacion2').value;
        console.log(valida2)
        var tor2Length = document.getElementsByClassName('tor2').length;
        for(var i = 0; i < tor2Length; i++){
              var tor2 = document.getElementsByClassName('tor2')[i].innerText;
              console.log(tor2)
              if( valida2 == tor2){
                console.log('Se encontro un repetido')
                document.getElementById('advertencia2').style = "visibility:visible"
            }else{
              document.getElementById('advertencia2').style = "visibility:hidden"
            }
            }
    }
  </script>
@stop