@extends('layouts.app')

@section('content')

    <section class="container">
      
      <form method="POST" action="{{ route('login') }}">

        <div class="row g-2">
          <div class="col-md">
            <div class="form-floating">
              <input type="text" class="form-control" name="search_container" id="search_container" />
              <label for="floatingInputGrid">{{ __('Location') }}</label>
            </div>
          </div>
          <div class="col-md">
            <div class="form-floating">
              <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                <option selected value="1">Departamento</option>
                <option value="2">Casa</option>
                <option value="3">PH</option>
                <option value="4">Terreno</option>
                <option value="5">Emprendimiento</option>
              </select>
              <label for="floatingSelectGrid">{{ __('Type_of_property') }}</label>
            </div>
          </div>
          <div class="col-md">
            <div class="form-floating">
              <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                <option selected value="1">Alquiler</option>
                <option value="2">Venta</option>
                <option value="3">Emprendimiento</option>
              </select>
              <label for="floatingSelectGrid">{{ __('Type_of_operation') }}</label>
            </div>
          </div>
          <button class="btn btn-primary"> 
            <i class="bi bi-search"></i>
          </button>
        </div>
      </form>

    </section>
  
    <section class="container">
        Ultimas Ofertas (viene con order by id DESC)
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-2">
          
          @foreach ($properties as $property) 
          <div class="col">
            <div class="card shadow-sm">

              <img src="{{ asset('storage/images/'. $property->images[0]->path) }}" alt="" title="" />

              <div class="card-body">
                <p class="card-text">{{ $property->description }}.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                    <a href="{{ route('show_property', $property ) }}">
                      Ver
                    </a>
                    </button>
                  </div>
                  <small class="text-muted">9 mins</small>
                </div>
              </div>
            </div>
          </div>
          @endforeach

        </div>
    </section>
  
@endsection