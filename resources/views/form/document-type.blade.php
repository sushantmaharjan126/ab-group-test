@extends('layout.master')

    @section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"> Add Document Type</h4>
        <?php
          
          $action = route('document.type.store');
        ?>
        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
          <div class="col-xl">
            <div class="card mb-4">
              @include('layout.alert')
              <div class="card-body">
                <form action="{{ $action }}" method="POST">
                  @csrf

                  

                  <div class="mb-3">
                    <label class="form-label" for="document_type">Type</label>
                    <input type="text" class="form-control {{ $errors->has('document_type') ? 'is-invalid' : '' }}" id="document_type" name="document_type" value="{{ old('document_type') }}" />
                    @error('document_type')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                 
                  <a href="{{ route('document.type.get') }}" class="btn btn-secondary">Cancel</a>
                  <button type="submit" class="btn btn-primary"> Submit </button>
                </form>
              </div>
            </div>
          </div>
          
        </div>
    </div>
    @endsection