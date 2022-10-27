@extends('index')
@section('content_header')
   <h4> Reporte de Llantas </h4> 
@stop
@section('contenido')



<div class="form-group">
    <div class="col-md-12"> 
<form method="POST" action="{{  route('guardarcambiodato') }}" class="form-horizontal m-t-30" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="a">identificador de la llanta</label>
      <input type="text" class="form-control" name="id_llanta" value="{{ $consulta->id_llanta }}" readonly>
    </div>
    <div class="form-group">
      <label for="a">Nombre </label>
      <input  name="nombre" type="text" name="nombre" class="form-control" value="{{ $consulta->nombre }}" readonly>
      <small id="" class="form-text text-muted">Ingresa el dato correcto.</small>
    </div>
    <br>
    <div class="row">
     <div class="col">
        <label class="control-label"> Ancho de la llanta</label>
       <input type="text" class="form-control" name="ancho_llanta" value="{{ $consulta->ancho_llanta }}" >
     </div>
     <P> - </P>
     <div class="col">
        <label class="control-label"> Diametro de rin </label>
       <input type="text" class="form-control"  name="diametro_rin" value="{{ $consulta->diametro_rin }}" >
     </div>
    </div>
   <br>
   <div class="form-group">
     <label for="">Presión Máxima</label>
     <input type="text" class="form-control" name="presion_max" id="date" value="{{ $consulta->presion_max }}" aria-describedby="datehelp">
   </div>   
   <div class="form-group">
     <label for="">Fabricante</label>
     <input type="text" class="form-control" name="fabricante" id="date" value="{{ $consulta->fabricante }}">
   </div>
   <div class="form-group">
    <label for="">Stock</label>
    <input type="text" class="form-control" name="stock" id="date" value="{{ $consulta->stock }}">
  </div>
    <div class="">
     
      <button type="submit" class="btn btn-outline-success">Guardar</button>
    </div> 
  </form>
</div>
</div>
@stop