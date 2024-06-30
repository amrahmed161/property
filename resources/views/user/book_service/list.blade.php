@extends('user.layout_user.app_user')
@section('content')

<div class="pagetitle">
    <h1>Book Service</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Book Service List</li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ url('user/book_service/add') }}" class="btn btn-primary">Add New AMC</a>
                    </h5>
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Service ID</th>
                                <th>Date of Service Request</th>
                                <th>Type of Service</th>
                                <th>Service Category</th>
                                <th>Service Assigned To</th>
                                <th>AMC free Service</th>
                                <th>Service Completion Date</th>
                                <th>Expert Comments</th>
                                <th>payment Details</th>
                                <th>Customer Feedback</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($getrecord as $value )
                        <tr>
                            <td>{{$value->id}}</td>
                            <td>{{date('d-m-y',strtotime($value->available_date))}}</td>
                            <td>{{!empty($value->get_service_type_name->name) ? $value->get_service_type_name->name :''}}</td>
                            <td>{{!empty($value->get_category_name->name) ? $value->get_category_name->name : ''}}</td>
                            <td>{{!empty($value->get_sub_category_name->name) ?  $value->get_sub_category_name->name : ''}}</td>
                            <td>{{!empty($value->)}}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="100%">Record not found.</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                    </div>
                    {{ $getrecord->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

  @endsection
  @section('script')
  <script type="text/javascript">
  </script>
@endsection
