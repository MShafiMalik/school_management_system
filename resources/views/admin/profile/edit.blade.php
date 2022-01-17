@extends('admin.admin_master')
@section('main_content')

<style>
    .profile_img img {
        border-radius: 50%;
        width: 100%;
        max-width: 180px;
        margin: auto;
        display: block;
    }
    .profile_img a {
        max-width: 180px;
        margin: auto;
        display: block;
    }
</style>

<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Profile</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 profile_img mb-4">
                                <img src="{{ ( !empty($user->image) ) ? asset('uploads/user_images/'.$user->image) : asset('uploads/default.jpg') }}" id="user_image">
                                <a class="btn btn-rounded btn-info btn-block mt-3" id="change_img_btn">Change</a>
                                <input type="file" name="image" id="image" class="d-none">
                            </div>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <h5>User Name <span class="text-danger">*</span></h5>
                                        <input type="text" name="username" class="form-control" value="{{ $user->name }}">
                                        @error('username')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <h5>Email <span class="text-danger">*</span></h5>
                                        <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <h5>User Type <span class="text-danger">*</span></h5>
                                        <select name="user_type" class="form-control" value="{{ $user->usertype }}">
                                            <option value="">Select Your User Type</option>
                                            <option value="Admin" {{ ($user->usertype == 'Admin') ? 'selected' : '' }}>Admin</option>
                                            <option value="User" {{ ($user->usertype == 'User') ? 'selected' : '' }}>User</option>
                                        </select>
                                        @error('user_type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <h5>Gender</h5>
                                        <select name="gender" class="form-control" value="{{ $user->gender }}">
                                            <option value="" >Select Gender</option>
                                            <option value="Male" {{ ($user->gender == 'Male') ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ ($user->gender == 'Female') ? 'selected' : '' }}>Female</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <h5>Mobile</h5>
                                        <input type="tel" name="mobile" class="form-control" value="{{ $user->mobile }}">
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <h5>Address</h5>
                                        <input type="text" name="address" class="form-control" value="{{ $user->address }}">
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info float-right" value="Update">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
    </div>
</div>

@endsection

@section('script')

<script>
    $(document).ready(function() {
        $("#change_img_btn").on('click', function() {
            $("#image").click();
        })
        $("#image").change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#user_image").attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        })
    });
</script>
    
@endsection