@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    <div class="col">
                      <div class="card shadow-sm">
          
                        @foreach ( $property->images as $image )
                          <img src="{{ asset('storage/images/'. $image->path) }}" alt="" title="" />
                        @endforeach
          
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
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
