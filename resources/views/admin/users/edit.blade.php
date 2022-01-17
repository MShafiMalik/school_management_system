@extends('admin.admin_master')
@section('main_content')

<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit User</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form  method="POST" action="{{ route('user.update',$user->id) }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <h5>User Name <span class="text-danger">*</span></h5>
                                <input type="text" name="username" class="form-control" value="{{ $user->name }}">
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <h5>Email <span class="text-danger">*</span></h5>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-4">
                                <h5>User Type <span class="text-danger">*</span></h5>
                                <select name="user_type" class="form-control" value="{{ $user->usertype }}">
                                    <option value="" >Select Your User Type</option>
                                    <option value="Admin">Admin</option>
                                    <option value="User" {{ ($user->usertype == 'User') ? 'selected' : '' }}>User</option>
                                </select>
                                @error('user_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info" value="Update">
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