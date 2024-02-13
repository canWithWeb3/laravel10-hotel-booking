@extends('admin.admin_dashboard')
@section('admin')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Add Room List</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item">
                        <a href="javascript:;">
                            <i class="bx bx-home-alt"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Add Room List
                    </li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary">Settings</button>
                <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="card">
                        <div class="card-body p-4">
        <form action="{{ route('store.roomlist') }}" class="row g-3" method="POST">
            @csrf
            
            <div class="col-md-4">
                <label for="roomtype_id" class="form-label">Room Type</label>
                <select name="room_id" id="room_id" class="form-select">
                    <option selected="">Select Room Type</option>
                    @foreach ($roomtype as $item)
                        <option value="{{ $item->room->id }}" {{ collect(old('roomtype_id'))->contains($item->id) ? 'selected' : '' }} >{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="input2" class="form-label">Check in</label>
                <input type="date" name="check_in" class="form-control" id="check_in" placeholder="Last Name">
            </div>
            <div class="col-md-4">
                <label for="input3" class="form-label">CheckOut</label>
                <input type="date" name="check_out" class="form-control" id="check_out" placeholder="Phone">
            </div>


            <div class="col-md-4">
                <label for="input4" class="form-label">Room</label>
                <input type="number" name="number_of_rooms" class="form-control" id="input4" placeholder="Email">
                <input type="hidden" name="available_room" id="available_room" class="form-control">
                <div class="mt-2">
                    <label for="">Availability <span class="text-success availability"></span></label>
                </div>
            </div>
            <div class="col-md-4">
                <label for="input5" class="form-label">Guest</label>
                <input type="text" name="number-of_person" class="form-control" id="input5" placeholder="Password">
            </div>
            
            <h3 class="mt-3 mb-5 text-center">Customer Information</h3>

            <div class="col-md-4">
                <label for="input5" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="input5" placeholder="Password" value="{{ old('name') }}">
            </div>

            <div class="col-md-4">
                <label for="input5" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="input5" placeholder="Password" value="{{ old('email') }}">
            </div>

            <div class="col-md-4">
                <label for="input5" class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" id="input5" placeholder="Password" value="{{ old('phone') }}">
            </div>

            <div class="col-md-4">
                <label for="input5" class="form-label">Country</label>
                <input type="text" name="country" class="form-control" id="input5" placeholder="Password" value="{{ old('country') }}">
            </div>

            <div class="col-md-4">
                <label for="input5" class="form-label">State</label>
                <input type="text" name="state" class="form-control" id="input5" placeholder="Password" value="{{ old('state') }}">
            </div>

            <div class="col-md-4">
                <label for="input5" class="form-label">Zip Code</label>
                <input type="text" name="zip_code" class="form-control" id="input5" placeholder="Password" value="{{ old('zip_code') }}">
            </div>
            
            <div class="col-md-12">
                <label for="input11" class="form-label">Address</label>
                <textarea name="address" class="form-control" id="input11" placeholder="Address ..." rows="3">{{ old('address') }}</textarea>
            </div>

            <div class="col-md-12">
                <div class="d-md-flex d-grid align-items-center gap-3">
                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                </div>
            </div>
        </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>

    $(function(){
        getAvaility()

        $("#room_id").on('change', function(){
            $('#check_in').val("")
            $('#check_out').val("")
            $('.availability').text(0)
            $('#available_room').val(0)
        });

        $('#check_out').on('change', function(){
            getAvaility()
        })
    })

    function getAvaility() {
        var check_in = $('#check_in').val()
        var check_out = $('#check_out').val()
        var room_id = $('#room_id').val()


        var startDate = new Date(check_in);
        var endDate = new Date(check_out);

        if(startDate > endDate){
            alert('Invalid Date')
            $("#check_out").val()
            return false
        }

        if(check_in != "" && check_out != "" && room_id != ""){
            $.ajax({
                url: "{{ route('check_room_availability') }}",
                data: {room_id:room_id, check_in:check_in, check_out:check_out},
                success: function(data){
                    $('.availability').text(data['available_room'])
                    $('#available_room').val(data['available_room'])
                }
            })
        }else{
            alert('Field must be not empty')
        }

    }


</script>

@endsection