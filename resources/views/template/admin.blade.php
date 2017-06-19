@extends('template.layout')

@section('title')
  @yield('title')
@endsection

@section('main')

  <div class="row">
    <div class="col">
      @include('template.h-navbar')
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2  col-md-3 col-lg-2" style="padding-right:0px;">
     <div style="min-height: calc(100vh - 62px);max-height: calc(100vh - 62px);overflow-y: scroll;">
        @include('template.v-navbar')
     </div>
    </div>
    <div class="col-sm-1  col-md-9 col-lg-10" style="padding-left: 0px">
      <div class="container pt-5">
        <div class="row justify-content-center">
          <div class="col">
            <h3 class="title-header text-center mb-0">
              @yield('title-content')
            </h3>
          </div>
          @yield('search-content')
        </div>
        <div class="row justify-content-center">
          <div class="col ">
            @yield('content')
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('modal-control')
  @yield('modal-control')
@endsection

@section('js')
  @yield('js')
@endsection
