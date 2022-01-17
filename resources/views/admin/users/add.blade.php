@extends('admin.admin_master')
@section('main_content')

<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add User</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form  method="POST" action="{{ route('user.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <h5>User Name <span class="text-danger">*</span></h5>
                                <input type="text" name="username" class="form-control">
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <h5>Email <span class="text-danger">*</span></h5>
                                <input type="email" name="email" class="form-control"> 
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <h5>Password <span class="text-danger">*</span></h5>
                                <input type="password" name="password" class="form-control">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <h5>Confirm Password <span class="text-danger">*</span></h5>
                                <input type="password" name="password_confirmation" class="form-control">
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-4">
                                <h5>User Type <span class="text-danger">*</span></h5>
                                <select name="user_type" class="form-control">
                                    <option value="" >Select Your User Type</option>
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                </select>
                                @error('user_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info" value="Add">
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