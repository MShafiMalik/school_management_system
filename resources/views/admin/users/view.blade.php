@extends('admin.admin_master')
@section('main_content')

<div class="content-wrapper">
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <!-- /.box -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">View Users</h3>
                            <a href="{{ route('user.add') }}" class="btn btn-rounded btn-success mb-5 float-right">Add User</a>
                        </div>
              
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            {{-- <th>Image</th> --}}
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                {{-- <td>
                                                    @if ($user->profile_photo_path)
                                                    <img src="{{ asset('storage/'.$user->profile_photo_path) }}" style="height: 50px; width: auto; margin: 0 auto; display: block;">
                                                    @endif
                                                </td> --}}
                                                <th>{{ $user->usertype }}</th>
                                                <td>
                                                    <a href="{{ url('User/Edit/'. $user->id) }}" class="btn btn-info mb-5">Edit</a>
                                                    <a href="{{ url('User/Delete/'. $user->id) }}" class="btn btn-danger mb-5" id="delete">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            {{-- <th>Image</th> --}}
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</div>

@endsection