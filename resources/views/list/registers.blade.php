@extends('layout.master')

    @section('content')

         <!-- Bordered Table -->
         <div class="card">
           
            <div class="title-section d-flex mt-3 align-items-center">
                <h5 class="text-uppercase mb-0 pr-2">Registers List</h5>
                <a href="{{ route('home') }}" class="btn btn-primary text-uppercase" style="margin-left:30px;">Home</a>
     
              </div>
            <div class="card-body">
              <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>S.N</th>
                      <th>Profile Image</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Username</th>
                      <th>Gender</th>
                      <th>Age</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $z = 0; ?>
                    @foreach($registers as $register)
                        <tr>
                            <td>{{((($registers->currentPage()-1) * $registers->perPage() )+1) + $z}}</td>
                          <td>
                            <img src="{{ url('uploads/registers/'.$register->profile_image) }}" alt="">
                          </td>
                        <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $register->full_name }}</strong>
                        </td>
                        <td>{{ $register->email }}</td>
                        <td>
                            {{ $register->username }}
                        </td>
                        
                        <td>{{ $register->gender }}</td>
                        <td>{{ $register->age }}</td>
                        <td>@if($register->age == 1) Active @else Inactive @endif</td>
                        
                        <td>
                            
                            
                            <a onclick="return confirm('Are you sure you want to delete?')" href="{{ url('register/destory/'.$register->id) }}" title="Delete"><i class="bx bx-trash me-1"></i></a>
                        </td>
                        </tr>
                        <?php $z++; ?>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="d-block text-center card-footer">
                {{ $registers->links() }}
            </div>
            </div>
          </div>
          <!--/ Bordered Table -->

    @endsection