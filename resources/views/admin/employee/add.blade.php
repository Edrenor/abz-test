@extends('admin.admin')

@section('content')
    <div class="card card-primary col-6">
        <div class="card-header">
            <h2 class="card-title">Add employee</h2>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form role="form" method="post" action="{{route('employees-create')}}" enctype="multipart/form-data">
            @csrf
            <div class="cart-body">
                {{--      PHOTO      --}}
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="photo" type="file" class="custom-file-input" id="photo">
                            <label class="custom-file-label" for="photo">Choose file</label>
                        </div>
                    </div>
                </div>
                {{--      NAME      --}}
                <div class="form-group">
                    <label for="full_name">Name</label>
                    <input name="full_name" type="text" class="form-control" id="full_name"
                           placeholder="Enter full name">
                </div>
                {{--      PHONE      --}}
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input name="phone" type="text" class="form-control" id="phone" placeholder="Enter phone">
                </div>
                {{--      EMAIL      --}}
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="Enter email">
                </div>
                {{--      POSITION      --}}
                <div class="form-group">
                    <label for="position">Position</label>
                    <select name="position" id="position" class="form-control select2 select2-hidden-accessible"
                            style="width: 100%;"
                            data-select2-id="1" tabindex="-1" aria-hidden="true">
                        @foreach($positions as $position)
                            <option value="{{ $position->id }}" id="{{ $position->id }}">{{ $position->name }}</option>
                        @endforeach
                    </select>
                </div>
                {{--      SALARY      --}}
                <div class="form-group">
                    <label for="salary">Salary</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input name="salary" type="number" id="salary" class="form-control">
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>

                </div>
                {{--      HEAD      --}}
                <div class="form-group">
                    <label for="head">Head</label>
                    <select name="head " id="head" class="form-control select2 select2-hidden-accessible"
                            style="width: 100%;"
                            data-select2-id="1" tabindex="-1" aria-hidden="true">
                        @foreach($heads as $head)
                            <option value="{{ $head->id }}" id="{{ $head->id }}">{{ $head->full_name }}</option>
                        @endforeach
                    </select>
                </div>

                {{--      DATE OF EMPLOYMENT      --}}
                <div class="form-group">
                    <label for="datepicker">Date of employment:</label>

                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input name="date_of_employment" type="date" class="form-control pull-right" id="datepicker">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

    </div>
@endsection
