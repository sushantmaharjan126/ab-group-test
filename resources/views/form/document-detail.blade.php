@extends('layout.master')

    @section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"> Add Document Detail</h4>
        <?php
          
            $action = route('document.detail.store');
        ?>
        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
          <div class="col-xl">
            <div class="card mb-4">
              @include('layout.alert')
              <div class="card-body">
                <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                  @csrf

                  <div class="mb-3">
                    <label for="register" class="form-label">Register</label>
                    <select name="register" id="register" class="form-label">
                      <option value="0">Select Register</option>
                      @foreach($registers as $row)
                        <option value="{{ $row->user_id }}">{{ $row->full_name }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select name="type" id="type" class="form-label">
                      <option value="0">Select Type</option>
                      @foreach($types as $row)
                        <option value="{{ $row->document_type_id }}">{{ $row->document_type }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="document_image1" class="form-label">Document Image 1</label>
                    <input type="file" class="form-control {{ $errors->has('document_image1') ? 'is-invalid' : '' }}" id="document_image1" name="document_image1" onchange="previewThumb(this,'featured-thumb-1')"/>
                    @error('document_image1')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                      <div class="image-thumb mt-3" style="display: none;width:150px;aspect-ratio:4/3" id="featured-thumb-1">
                        <img src="" alt="title" class="w-100 card-img">
                      </div>
                  </div>

                  <div class="mb-3">
                    <label for="document_image2" class="form-label">Document Image 2</label>
                    <input type="file" class="form-control {{ $errors->has('document_image2') ? 'is-invalid' : '' }}" id="document_image2" name="document_image2" disabled  onchange="previewThumb(this,'featured-thumb-2')"/>
                    @error('document_image2')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <div class="image-thumb mt-3" style="display: none;width:150px;aspect-ratio:4/3" id="featured-thumb-2">
                      <img src="" alt="title" class="w-100 card-img">
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="document_image3" class="form-label">Document Image 3</label>
                    <input type="file" class="form-control {{ $errors->has('document_image3') ? 'is-invalid' : '' }}" id="document_image3" name="document_image3" disabled onchange="previewThumb(this,'featured-thumb-3')"/>
                    @error('document_image3')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <div class="image-thumb mt-3" style="display: none;width:150px;aspect-ratio:4/3" id="featured-thumb-3">
                      <img src="" alt="title" class="w-100 card-img">
                    </div>
                  </div>
                  
                  <a href="{{ route('document.detail.get') }}" class="btn btn-secondary">Cancel</a>
                  <button type="submit" class="btn btn-primary"> Submit </button>
                </form>
              </div>
            </div>
          </div>
          
        </div>
    </div>
    @endsection

    @section('footer')

      <script>
        function enableImage2() {
          if( document.getElementById("document_image1").files.length != 0 ){
            console.log("files selected");

            document.getElementById("document_image2").disabled = false;
          }
        }

        function enableImage3() {
          if( document.getElementById("document_image2").files.length != 0 ){
            console.log("files selected");

            document.getElementById("document_image3").disabled = false;
          }
        }

        function previewThumb(el, _target_el) {
          const target_el = document.getElementById(_target_el);
          const img_url = URL.createObjectURL(el.files[0]);
          target_el.children[0].setAttribute("src", img_url);
          target_el.style.display = "block";

          if( document.getElementById("document_image1").files.length != 0 ){
            console.log("files selected");

            document.getElementById("document_image2").disabled = false;
          }

          if( document.getElementById("document_image2").files.length != 0 ){
            console.log("files selected");

            document.getElementById("document_image3").disabled = false;
          }
      }
      </script>

    @endsection