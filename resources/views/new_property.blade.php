@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('new_property') }}"" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                            <div class="col-md-6">

                                <select class="form-control" id="type" @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}" required autocomplete="type" autofocus>
                                  <option value="1">Departamento</option>
                                  <option value="2">Casa</option>
                                  <option value="3">PH</option>
                                  <option value="4">Terreno</option>
                                  <option value="5">Emprendimiento</option>
                                </select>

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="operation" class="col-md-4 col-form-label text-md-right">{{ __('Operation') }}</label>

                            <div class="col-md-6">

                                <select class="form-control" id="operation" @error('operation') is-invalid @enderror" name="operation" value="{{ old('operation') }}" required autocomplete="operation" autofocus>
                                  <option value="1">Alquiler</option>
                                  <option value="2">Venta</option>
                                  <option value="3">Emprendimiento</option>
                                </select>

                                @error('operation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea row="3" id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="current-description">Inserte Descripcion
                                </textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" id="price" name="price" aria-describedby="priceHelp">

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <input type="file" name="images[]" multiple class="form-control" accept="image/*">

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enviar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
