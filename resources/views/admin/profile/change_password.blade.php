@extends('admin.admin_master')
@section('main_content')

<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Change Password</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form  method="POST" action="{{ route('profile.update_password') }}">
                        @csrf
                        <div class="row">
                            
                            <div class="col-md-12 mb-4">
                                <h5>Old Password <span class="text-danger">*</span></h5>
                                <input type="password" name="old_password" class="form-control">
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-4">
                                <h5>New Password <span class="text-danger">*</span></h5>
                                <input type="password" name="password" class="form-control">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-4">
                                <h5>Confirm Password <span class="text-danger">*</span></h5>
                                <input type="password" name="password_confirmation" class="form-control">
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info" value="Change">
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