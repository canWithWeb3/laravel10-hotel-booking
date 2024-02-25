@extends('admin.admin_dashboard')
@section('admin')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Update Smtp</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Update Smtp Setting</li>
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
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">

    <form action="{{ route('smtp.update') }}" method="POST">
        @csrf

        <input type="hidden" name="id" value="{{ $smtp->id }}">

        <div class="card-body">
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Mailer</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" name="mailer" class="form-control" value="{{ $smtp->mailer }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Host</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" name="host" class="form-control" value="{{ $smtp->host }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Port</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" name="port" class="form-control" value="{{ $smtp->port }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Username</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" name="username" class="form-control" value="{{ $smtp->username }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Passowrd</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" name="password" class="form-control" value="{{ $smtp->password }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Encryption</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" name="encryption" class="form-control" value="{{ $smtp->encryption }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">From Address</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" name="from_address" class="form-control" value="{{ $smtp->from_address }}" />
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-9 text-secondary">
                    <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                </div>
            </div>
        </div>
    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection