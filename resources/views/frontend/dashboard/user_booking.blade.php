@extends('frontend.main_master')
@section('main')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Inner Banner -->
<div class="inner-banner inner-bg6">
    <div class="container">
        <div class="inner-title">
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>User Booking List </li>
            </ul>
            <h3>User Booking List</h3>
        </div>
    </div>
</div>
<!-- Inner Banner End -->

<!-- Service Details Area -->
<div class="service-details-area pt-100 pb-70">
    <div class="container">
        <div class="row">
             <div class="col-lg-3">
                @include('frontend.dashboard.user_menu')
            </div>


            <div class="col-lg-9">
                <div class="service-article">
                    

    <section class="checkout-area pb-70">
    <div class="container">
        <form action="{{ route('password.change.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="billing-details">
                        <h3 class="title">User Booking List</h3>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>B No</th>
                                    <th>B Date</th>
                                    <th>Customer</th>
                                    <th>Room</th>
                                    <th>Check In/Out</th>
                                    <th>Total Room</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allData as $item )
                                    <tr>
                                        <td><a href="{{ route('user.invoice', $item->id) }}">{{ $item->code }}</a></td>
                                        <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->room->type->name }}</td>
                                        <td>
                                            <span class="badge bg-primary">
                                                {{ $item->check_in }}
                                            </span>
                                            <span class="badge bg-warning text-dark">
                                                {{ $item->check_out }}
                                            </span>
                                        </td>
                                        <td>{{ $item->number_of_rooms }}</td>
                                        <td>
                                            @if($item->status == 1)
                                                <span class="badge bg-success">Complete</span>
                                            @else
                                                <span class="badge bg-info text-dark">Pending</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
</div>
</div>
</div>
</form>      
        
    </div>
</section>
                    
                </div>
            </div>

           
        </div>
    </div>
</div>
<!-- Service Details Area End -->

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result)
            }
            reader.readAsDataURL(e.target.files['0'])
        })
    })
</script>

@endsection