@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 mt-2">
                    <h1 class="m-0">{{ __('Dashboard') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>



    <section class="content">
        <div class="container_fluid ml-3 mr-3">
            @if ($studentOrgStatus->registration_status == 0)
                <div class="alert alert-danger  ">

                    <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                    Your account is currently disabled since your organization is unregistered. Please proceed to the Office
                    of Student Affairs and Services and settle your accountabilities. Thank you!
                </div>
            @endif

            <div class="row">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $activities->count() }}</h3>

                            <p>Activities</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-chart-line"></i>
                        </div>
                        <a href="{{ route('studentOrgCalOfActs') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $members->count() }}</h3>

                            <p>Members</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-users"></i>
                        </div>
                        <a href="{{ route('studentOrgMembersList') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ count($documents) }}</h3>

                            <p>Documents</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-folder-open"></i>
                        </div>
                        <a href="{{ route('studentOrgSubmittedDocuments') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3></h3>

                            <p>Registration Documents</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-folder-open"></i>
                        </div>
                        <a href="{{ route('studentOrgRegistrationDocuments') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
