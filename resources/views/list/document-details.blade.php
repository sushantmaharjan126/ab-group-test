@extends('layout.master')

    @section('content')

         <!-- Bordered Table -->
         <div class="card">
           
            <div class="title-section d-flex mt-3 align-items-center">
                <h5 class="text-uppercase mb-0 pr-2">Artist List</h5>
                <a href="{{ route('home') }}" class="btn btn-primary text-uppercase" style="margin-left:30px;">Home</a>
                <a href="{{ route('document.detail.create') }}" class="btn btn-primary text-uppercase" style="margin-left:30px;">Add Document Detail</a>
                

              </div>
              @include('layout.alert')
            <div class="card-body">
              <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>S.N</th>
                      <th>User Name</th>
                      <th>Type</th>
                      <th>Image 1</th>
                      <th>Image 2</th>
                      <th>Image 3</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $z = 0; ?>
                    @foreach($details as $document)
                        <tr>
                            <td>{{((($details->currentPage()-1) * $details->perPage() )+1) + $z}}</td>
                        <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ ucwords($document->name) }}</strong>
                        </td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ ucwords($document->type) }}</strong></td>
                        <td>
                          <img src="{{ url('uploads/documents/'.$document->document_image1) }}" alt="">
                        </td>
                        <td>
                          <img src="{{ url('uploads/documents/'.$document->document_image2) }}" alt="">
                        </td>
                        <td>
                          <img src="{{ url('uploads/documents/'.$document->document_image3) }}" alt="">
                        </td>
                        <td>
                          <a onclick="return confirm('Are you sure you want to delete?')" href="{{ url('document-detail/destory/'.$document->id) }}" title="Delete"><i class="bx bx-trash me-1"></i></a>
                        </td>
                        </tr>
                        <?php $z++; ?>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="d-block text-center card-footer">
                {{ $details->links() }}
            </div>
            </div>
          </div>
          <!--/ Bordered Table -->

    @endsection
