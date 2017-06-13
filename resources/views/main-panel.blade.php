@extends('template.layout')

@include('template.h-navbar')

@section('main')

<div class="contaner-fluid">
  <div class="row">
    <div class="col-xs-12 col-md-4">

    </div>
    <div class="col-xs-12 col-md-4"></div>
    <div class="col-xs-12 col-md-4">
      <h2>Siguiendo</h2>
      @foreach($usuario->seguidos as $seguido)
        {{ Form::open(['method' => 'DELETE', 'route' => ['seguidos.destroy', $seguido->id]]) }}
        @if($seguido->seguido->url_foto)
          <img src="{{url('/')}}/imagenes/perfiles/{{$seguido->seguido->url_foto}}" alt="" width="50" height="50">
        @else
          <img src="{{url('/')}}/imagenes/perfiles/soh_profile_default.png" alt="" width="50" height="50">
        @endif
        {{$seguido->seguido->nombres}} id: {{$seguido->id}}
        {!!Form::submit('Sejar de seguir', ['class'=>'btn btn-warning'])!!}
        {{ Form::close() }}
      @endforeach
    </div>
  </div>
</div>

  <div class="container">
    <div class="row justify-content-center">
      {{-- <div class="col"> --}}

      @foreach($publicaciones as $publicacion)
        <div class="col-xs-12 col-sm-10 col-md-6 col-lg-4">
          <div class="tarjeta">
            <h4 class="cabezera">
              <a href="{{route('publicaciones.show', [$publicacion->id])}}">{{$publicacion->titulo}}</a>
              <small class="text-muted">
                <a href="{{route('instructores.show', [$publicacion->user_id])}}">
                  {{$publicacion->user->nombres}} {{$publicacion->user->apellidos}}
                </a>
              </small>

              <div class="imagen">
                <img src="{{url('/')}}/imagenes/perfiles/{{$publicacion->user->url_foto}}" class="rounded-circle" width="60" height="60">
              </div>
            </h4>


            <div class="contenido">
              <p>{{substr($publicacion->contenido, 0, 140)}} ... </p>
            </div>

          </div>
        </div>
      @endforeach

    </div>
    <div class="row mt-3">
      <div class="col">
        <div class="text-center">{{ $publicaciones->links('vendor.pagination.custom') }}</div>
      </div>
    </div>

  </div>
@endsection
