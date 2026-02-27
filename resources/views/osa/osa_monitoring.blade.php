@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid ml-3 mr-3">
            <div class="row mb-2">
                <div class="col-sm-6 mt-2">
                    <h1 class="m-0"><i class="fa-solid fa-chart-line mr-2"></i>Monitoring</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>



    <section class="content">
        <div class="container_fluid ml-3 mr-3">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <th>School Year</th>
                            <th>View Reports</th>
                        </thead>
                        <tbody>
                            @foreach ($acadYears as $year)
                                <tr>
                                    <td>
                                        {{ $year->description }}
                                    </td>
                                    <td>
                                        <a href="{{ route('osaOrgActivitiesReport', $year->id) }}"><button
                                                class="btn btn-success btn-sm" title="Activities Report"><i class="fas fa-chart-line"></i></button></a>
                                        <a href="{{ route('osaOrgOfficersReport', $year->id) }}"><button
                                                class="btn btn-success btn-sm" title="Officers Report"><i class="fas fa-users"></i></button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>
@endsection
