@extends('auth.layout.app')
@section('title')User | Register @endsection


    @section('content')

      <!-- Content -->

      <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
          <div class="authentication-inner">
            <!-- Register Card -->
            <div class="card">
              <div class="card-body">
                <!-- Logo -->
                <div class="app-brand justify-content-center">
                  
                </div>
                <!-- /Logo -->
                

                <form id="formAuthentication" class="mb-3" action="{{ url('register/submit') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label for="full_name" class="form-label">Full Name *</label>
                    <input
                      type="text"
                      class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }}"
                      id="full_name"
                      name="full_name"
                      value="{{ old('full_name') }}"
                      placeholder="Enter your full name"
                      autofocus
                    />
                    @error('full_name')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="username" class="form-label">User Name</label>
                    <input type="text" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" id="username" name="username" value="{{ old('username') }}" placeholder="Enter your username" />
                    @error('username')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  
                  <div class="mb-3">
                    <label for="email" class="form-label">Email *</label>
                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" />
                    @error('email')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-3 form-password-toggle">
                    <label class="form-label {{ $errors->has('password') ? 'is-invalid' : '' }}" for="password">Password *</label>
                    <div class="input-group input-group-merge">
                      <input
                        type="password"
                        id="password"
                        class="form-control"
                        name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password"
                      />
                      <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    @error('password')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3 form-password-toggle">
                    <label class="form-label {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" for="password_confirmation"> Confirm Password *</label>
                    <div class="input-group input-group-merge">
                      <input
                        type="password"
                        id="password_confirmation"
                        class="form-control"
                        name="password_confirmation"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password"
                      />
                      <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    @error('password_confirmation')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" id="age" name="age" value="{{ old('age') }}" placeholder="Enter your age" min="1" max="110"/>
                    @error('age')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="gender" class="form-label {{ $errors->has('gender') ? 'is-invalid' : '' }}">Gender</label>
                    <select name="gender" id="gender" class="form-label">
                      <option value="M">Male</option>
                      <option value="F">Female</option>
                      <option value="O">Other</option>
                    </select>
                    @error('age')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  
                  {{-- <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <input type="number" class="form-control" id="status" name="status" value="{{ old('status') }}" placeholder="Enter your status" min="0" max="1"/>
                  </div> --}}

                  <div class="mb-3">
                    <label for="profile_image" class="form-label">Profile Image</label>
                    <input type="file" class="form-control {{ $errors->has('profile_image') ? 'is-invalid' : '' }}" id="profile_image" name="profile_image"/>
                    @error('profile_image')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-primary d-grid w-100">Sign up</button>


                  <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
                </form>

                
              </div>
            </div>
            <!-- Register Card -->
          </div>
        </div>
      </div>

      <!-- / Content -->
    @endsection

    