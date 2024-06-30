@extends('admin.layout_admin.app_admin')
@section('content')

    <div class="pagetitle">
      <h1>User List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">User</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ url('admin/user/add') }}" class="btn btn-primary">Add New User</a>
                        </h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Profile</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($getrecord as $value )
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->last_name}}</td>
                                    <td>{{$value->email}}</td>
                                    <td>{{$value->mobile}}</td>
                                    <td>
                                        @if (!empty($value->profile))

                                        <img src="{{ $value->getImage()}}" style="height: 50px; width:50px;">
                                        @endif

                                    </td>
                                    <td><a href="{{ url('admin/user/edit/'.$value->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                        <a onclick="return confirm ('Are you sure you want to delete')" href="{{ url('admin/user/delete/'.$value->id) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <tr colspan="100%">Record not found.</tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

