@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <a href="{{ route('add.team') }}" class="btn btn-outline-primary px-5 radius-30">
                        Add Booking
                    </a>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">All Booking</h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>B No</th>
                            <th>B Date</th>
                            <th>Customer</th>
                            <th>Room</th>
                            <th>Check IN/OUT</th>
                            <th>Total Room</th>
                            <th>Guest</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allData as  $key => $item)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td><a href="{{ route('edit_booking', $item->id) }}">{{ $item->code }}</a></td>
                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->room->type->name }}</td>
                    <td>
                        <span class="badge bg-primary">{{ $item->check_in }} </span>
                        / 
                        <span class="badge bg-warning">{{ $item->check_out }} </span>
                    </td>
                    <td>{{ $item->number_of_rooms }}</td>
                    <td>{{ $item->persion }}</td>
                    <td>
                        @if($item->payment_status == "1")
                            <span class="text-success">Complete</span>
                        @else
                            <span class="text-danger">Pending</span>
                        @endif
                    </td>
                    <td>
                        @if($item->status == "1")
                            <span class="text-success">Active</span>
                        @else
                            <span class="text-danger">Pending</span>
                        @endif
                    </td>
                    <td></td>
                    <td>
                        <a href="{{ route('edit.team', $item->id) }}" class="btn btn-warning px-3 radius-30">Edit</a>
                        <a href="{{ route('delete.team', $item->id) }}" class="btn btn-danger px-3 radius-30" id="delete">Delete</a>
                    </td>
                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection