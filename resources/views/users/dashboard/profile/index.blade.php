@extends('admin_layout.layout.admin_master')

@section('content')

<div class="container d-flex">
    <div class="col-md-4">

        <!-- Profile Image -->
        <div class="card">
          <div class="card-body box-profile">
            <div class="text-center">

                @if(auth()->user()->profile->pro_image)
                <div class="img_wrp">
                    <img  id ="Img" src="{{ asset("profile_image/" . auth()->user()->profile->pro_image) }}" class="profile-image img-fluid img-rsponsive img-thumbnail rounded-circle mb-3" alt="avatar" id="img">
                    <i class="fa fa-pen icon-sm text-muted edit" id="uploadImage"></i>
                </div>
                @else
                <div class="img_wrp">
                    <img  id ="Img" src="{{ asset('images/no-pic.png') }}" class="profile-image img-fluid img-rsponsive img-thumbnail rounded-circle mb-3" alt="avatar">
                    <i class="fa fa-pen icon-sm text-muted edit" id="uploadImage"></i>
                </div>
                @endif
                <form action="{{ route('user.profile.image') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input class="form-input mt-2 mb-2" type="file" name="image" id="inputImage" onchange="loadFile(event)">
                    <button type="submit" class="btn btn-success form-control" id="update">Update</button>
                </form>
            </div>

            <div class="card text-white bg-secondary mb-3 mt-5" style="max-width: 18rem;">
              <div class="card-body text-center">
                <h5 class="no-padding">Name</h5>
                <hr>
                <p class="text-capitalize no-padding">{{ auth()->user()->name }}</p>
                <br>

                <h5 class="no-padding">Email</h5>
                <hr>
                <p class=" no-padding">{{ auth()->user()->email }}</p>
                <br>

                <h5 class="no-padding">Referral URL</h5>
                <hr>
                <p class=" no-padding">{{ auth()->user()->referral_link }}</p>
              </div>
            </div>
            
            <!-- <h3 class="profile-username text-center mb-3 mt-5 text-capitalize">{{ auth()->user()->name }}</h3>
            <h4 class="profile-username text-center mb-5">Email: {{ auth()->user()->email }}</h4>
            <h4 class="profile-username text-center mb-5">Referral url: {{ auth()->user()->referral_link }}</h4> -->

            {{-- <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Company Name:</b> 
                <a class="float-right">1,322</a>
              </li>
              <li class="list-group-item">
                <b>Mobile Number:</b> 
                <a class="float-right">543</a>
              </li>
              <li class="list-group-item">
                <b>Country:</b> 
                <a class="float-right">13,287</a>
              </li>
            </ul> --}}

            {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </div>

      <div class="col-md-8">
        <div class="card">
          <div class="card-body">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#activity" role="tab">
                  <i class="fas fa-info-circle"></i>
                  User Info
                </a>
              <li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#settings" role="tab">
                  <i class="fas fa-user-edit"></i>
                  Info Update
                </a>
              <li>
            </ul>

            <div class="tab-content mt-4">
              <div class="tab-pane active" id="activity">
                <div class="row">
                    <div class="col-md-6">
                        <label>Name:</label>
                    </div>
                    <div class="col-md-6">
                        <p class="text-capitalize">{{ auth()->user()->name }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Email:</label>
                    </div>
                    <div class="col-md-6">
                        <p>{{ auth()->user()->email }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Company Name:</label>
                    </div>
                    <div class="col-md-6">
                        <p>{{ auth()->user()->company }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Mobile Number:</label>
                    </div>
                    <div class="col-md-6">
                        <p>{{ auth()->user()->phone }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Country Name:</label>
                    </div>
                    <div class="col-md-6">
                        <p>{{ auth()->user()->country }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>City:</label>
                    </div>
                    <div class="col-md-6">
                        <p>{{ auth()->user()->profile->city }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>State:</label>
                    </div>
                    <div class="col-md-6">
                        <p>{{ auth()->user()->profile->state }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Address:</label>
                    </div>
                    <div class="col-md-6">
                        <p>{{ auth()->user()->profile->address }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Zip Code:</label>
                    </div>
                    <div class="col-md-6">
                        <p>{{ auth()->user()->profile->zip_code }}</p>
                    </div>
                </div>
              </div>

              <div class="tab-pane" id="settings">
                <form action="{{ route('user.profile.update') }}" method="POST" class="form-horizontal">
                @csrf
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name" name="name" value="{{ auth()->user()->name }}">
                    </div>
                  </div>
                  {{-- <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" value="{{ auth()->user()->email }}">
                    </div>
                  </div> --}}
                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Company Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName2" placeholder="Company Name" name="c_name"  value="{{ auth()->user()->company }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputExperience" class="col-sm-2 col-form-label">Mobile Number</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="" placeholder="Mobile Number" name="m_number" value="{{ auth()->user()->phone }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputSkills" class="col-sm-2 col-form-label">Country Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Country Name" name="country" value="{{ auth()->user()->country }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputSkills" class="col-sm-2 col-form-label">City</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="City" name="city" value="{{ auth()->user()->profile->city }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputSkills" class="col-sm-2 col-form-label">State</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="State" name="state" value="{{ auth()->user()->profile->state }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputSkills" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                      <textarea name="address" class="form-control" id="" cols="15" rows="5">{{ auth()->user()->profile->address }}</textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputSkills" class="col-sm-2 col-form-label">Zip Code</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="inputSkills" placeholder="Zip Code" name="zip" value="{{ auth()->user()->profile->zip_code }}" min="0">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
    </div>
	
@endsection

@section('script')

<script>
  document.getElementById('inputImage').style.display = 'none';
  document.getElementById('update').style.display = 'none';
  document.getElementById('uploadImage').style.cursor = 'pointer';

  document.getElementById('uploadImage').addEventListener('click', function() {
      document.getElementById('inputImage').click();
  })

  var loadFile = function(event) {
      var output = document.getElementById('Img');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory

      document.getElementById('update').style.display = 'block';
      }
  };
  
</script>

@endsection

                                                      