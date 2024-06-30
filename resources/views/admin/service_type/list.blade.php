hello
@extends('admin.layout_admin.app_admin')
@section('content')

    <div class="pagetitle">
      <h1>Service Type</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Service Type</li>
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
                            <a href="{{ url('admin/service_type/add') }}" class="btn btn-primary">Add New Service Type</a>
                        </h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Service Type Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($get as $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>
                                        <a href="{{ url('admin/service_type/edit/'.$value->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                        <a onclick="return confirm ('Are you sure you want to delete')" href="{{ url('admin/service_type/delete/'.$value->id) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="100%">Record not found. </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $get->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

