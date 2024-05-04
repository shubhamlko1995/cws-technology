@extends('applicant_details.layout')
@section('content')
    <div class="container">
        <div class="row">
 
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Applicant Details</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/applicant/create') }}" class="btn btn-success btn-sm" title="Add New Student">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Dob</th>
                                        <th>Gender</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($applicants as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                        <td>{{ $item->mobile }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->dob }}</td>
                                        <td>{{ $item->gender }}</td>
                                        <td>
                                            <form method="POST" action="{{ url('/showApplicantData') }}" accept-charset="UTF-8" style="display:inline">
                                            {{ csrf_field() }}
                                               
                                               <input type="hidden" name="id" id="id" class="form-control" value="{{$item->id}}"></br>
                                               <button type="submit" class="btn btn-info btn-sm" title="Show Applicant"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
                                            </form>
                                            <form method="POST" action="{{ url('/editApplicantData') }}" accept-charset="UTF-8" style="display:inline">
                                               
                                               {{ csrf_field() }}
                                               <input type="hidden" name="id" id="id" class="form-control" value="{{$item->id}}"></br>
                                               <button type="submit" class="btn btn-primary btn-sm" title="Edit Applicant"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                            </form>
                                            <form method="POST" action="{{ url('/deleteApplicantData') }}" accept-charset="UTF-8" style="display:inline">
                                               
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" id="id" class="form-control" value="{{$item->id}}"></br>
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Applicant"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

    