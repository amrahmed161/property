@extends('admin.layout_admin.app_admin')
@section('content')

    <div class="pagetitle">
      <h1> Sub Category</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Sub Category</li>
        </ol>
      </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Sub Category</h5>
                        <form action="{{  url('admin/sub_category/edit/'. $getrecord->id)  }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Category Name <span style="color: red;">*</span></label>
                                <div class="col-sm-9">
                                    <select class= 'form-control' name = 'category_id' required >
                                        <option value="">Select Category Name</option>
                                        @foreach ($getCategory as $value )
                                        <option {{ ($getrecord->category_id == $value->id) ? 'selected' : '' }} value="{{$value->id}}" >{{$value->name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Sub Category Name <span style="color: red;">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name ="name" class="form-control" required value="{{ $getrecord->name }}"/>
                                    <span style="color: red">{{ $errors->first('name') }}</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
