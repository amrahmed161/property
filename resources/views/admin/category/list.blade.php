@extends('admin.layout_admin.app_admin')
@section('content')

    <div class="pagetitle">
      <h1>category</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">AMC</li>
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
                            <a href="{{ url('admin/category/add') }}" class="btn btn-primary">Add New category</a>
                        </h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ( $getrecord as $value )
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td><a href="{{ url('admin/category/edit/'.$value->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                        <a onclick="return confirm ('Are you sure you want to delete')" href="{{ url('admin/category/delete/'.$value->id) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="100%">Record not found. </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $getrecord->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

