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
    <div class="col-sm-2 col-md-2" style="padding-right:0px;">
      <div style="min-height: calc(100vh - 62px);max-height: calc(100vh - 62px);overflow-y: scroll;">
        @include('template.v-navbar')
     </div>
    </div>
    <div class="col-sm-10 col-md-10">
      <div class="container pt-5">
        <div class="row justify-content-center pl-0">
          <div class="col-6">
            <h3 class="title-header mb-0">
              @yield('title-content')
            </h3>
          </div>
          @yield('search-content')
        </div>
        <div class="row justify-content-center">
          <div class="col-12">
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
