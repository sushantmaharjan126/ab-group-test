@extends('layout.master')

    @section('content')

         <!-- Bordered Table -->
         <div class="card">
           
            <div class="title-section d-flex mt-3 align-items-center">
                <h5 class="text-uppercase mb-0 pr-2">Document Type List</h5>
                <a href="{{ route('home') }}" class="btn btn-primary text-uppercase" style="margin-left:30px;">Home</a>
                <a href="{{ route('document.type.create') }}" class="btn btn-primary text-uppercase" style="margin-left:30px;">Add Document Type</a>
     
              </div>
              @include('layout.alert')
            <div class="card-body">
              <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>S.N</th>
                      <th>Type</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $z = 0; ?>
                    @foreach($types as $type)
                        <tr>
                            <td>{{((($types->currentPage()-1) * $types->perPage() )+1) + $z}}</td>
                        
                        <td>{{ ucwords($type->document_type) }}</td>
                        <td>
                          
                            
                            <a onclick="return confirm('Are you sure you want to delete?')" href="{{ url('document-types/destory/'.$type->id) }}" title="Delete"><i class="bx bx-trash me-1"></i></a>
                        </td>
                        </tr>
                        <?php $z++; ?>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="d-block text-center card-footer">
                {{ $types->links() }}
            </div>
            </div>
          </div>
          <!--/ Bordered Table -->

    @endsection