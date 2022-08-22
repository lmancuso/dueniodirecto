@extends('layouts.app')

@section('content')

<main>

    <section class="py-5 text-center container">
      
      <form method="POST" action="{{ route('login') }}">
        Zona
        <input type="text" name="search_container" id="search_container" />
        Tipo
        <select name="search_type">
          <option value="1" selected>Departamento</option>
          <option value="2">Casa</option>
          <option value="3">PH</option>
          <option value="4">Terreno</option>
          <option value="5">Emprendimiento</option>
        </select>
        Operación
        <select name="search_operation">
          <option value="1" selected>Alquiler</option>
          <option value="2">Venta</option>
          <option value="3">Emprendimiento</option>
        </select>          
        <input type="submit" value="Enviar" />
      </form>

      <div class="input-group">
        <div class="form-outline">
          <input type="search" id="form1" class="form-control" />
          <label class="form-label" for="form1"></label>
        </div>
        <button type="button" class="btn btn-primary">
          <i class="fas fa-search"></i>
        </button>
      </div>

    </section>
  
    <div class="album py-5 bg-light">
      <div class="container">
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
      </div>
    </div>
  
  </main>

@endsection