@extends('admin.layout_admin.app_admin')
@section('content')

    <div class="pagetitle">
      <h1>Free Service</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Free Service</li>
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
                            <a href="{{ url('admin/amc/add_free_service/'.$getrecord->id) }}" class="btn btn-primary">Add New Free Service</a>
                        </h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Limits</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ( $get_free_service as $value )
                                <tr>
                                <td>{{ $value->id }}</td>
                                <td> {{ $value->name }}</td>
                                <td> {{ $value->limit }} </td>
                                <td>{{ $value->price }}</td>
                                <td>
                                    <a href="{{ url('admin/amc/edit_free_service/'. $value->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                    <a onclick="return confirm ('Are you sure you want to delete')" href="{{ url('admin/amc/delete_add_ons/'.$value->id) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="100%">Record not found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $get_free_service->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
