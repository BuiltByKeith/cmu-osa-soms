@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6 mt-2">
                    <h1 class="m-0"><i class="fa-solid fa-chart-line mr-2"></i>Monitoring</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-3">
                    <ol class="breadcrumb float-sm-right">
                        <button class="btn btn-success" onclick="exportToExcel('{{ $acadYear->description }}')"><i
                                class="fa-solid fa-file-excel"></i></button>
                        <button class="btn btn-success ml-2" onclick="printScreen()"><i
                                class="fa-solid fa-print"></i></button>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>



    <section class="content">
        <div class="container_fluid ml-3 mr-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="tabledata">
                        <table class="table table-bordered" id="orgActivitiesReportTable">
                            <thead>
                                <th colspan="11" class="text-center">Student Organizations Monitoring</th>

                            </thead>
                            <thead>
                                <th colspan="11" class="text-center">{{ $acadYear->description }}</th>

                            </thead>
                            <thead>
                                <th colspan="11"></th>
                            </thead>
                            <thead>
                                <th style="background-color:#DADA0C"></th>
                                <th style="background-color:#DADA0C">Name of Organizations</th>
                                <th style="background-color:#DADA0C">Title of Activities</th>
                                <th style="background-color:#DADA0C">Date of Activity</th>
                                <th style="background-color:#DADA0C">Venue</th>
                                <th style="background-color:#DADA0C">Allocated Budget</th>
                                <th style="background-color:#FBBC04">Actual Expenses</th>
                                <th style="background-color: #00B0F0">Date of Activity Report Submitted</th>
                                <th style="background-color: #00B0F0">Date of Narrative Report Submitted</th>
                                <th style="background-color: #B7E1CD">Lacking Remarks</th>
                                <th style="background-color: #B7E1CD">Unclaimed Documents</th>
                            </thead>
                            <tbody>
                                <th colspan="11" class="text-center" style="background-color: #CD03B0">Univesity Wide</th>
                                @foreach ($studentOrganizations->where('type_of_org_id', 1) as $organization)
                                    @if ($organization->activities->where('acad_year_id', $acadYear->id)->isEmpty())
                                        <tr>
                                            <td>{{ $organization->id }}</td>
                                            <td>{{ $organization->organization_name }}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @else
                                        @foreach ($organization->activities as $activity)
                                            <tr>
                                                @if ($loop->first)
                                                    <td rowspan="{{ count($organization->activities) }}">
                                                        {{ $organization->id }}
                                                    </td>
                                                    <td rowspan="{{ count($organization->activities) }}">
                                                        {{ $organization->organization_name }}</td>
                                                @endif


                                                <td>{{ $activity->activity_name }}</td>
                                                @if ($activity->date_time_start != null)
                                                    <td>{{ \Carbon\Carbon::parse($activity->date_time_start)->format('F j, Y H:i A') }}
                                                        |
                                                        {{ \Carbon\Carbon::parse($activity->date_time_end)->format('F j, Y H:i A') }}
                                                    </td>
                                                @else
                                                    <td>{{ $activity->created_at->format('F Y') }}</td>
                                                @endif

                                                <td>{{ $activity->venue }}</td>
                                                <td>{{ $activity->budget_allocation ? Number::currency($activity->budget_allocation, 'PHP') : '' }}
                                                </td>

                                                <td></td>
                                                <td>
                                                    @foreach ($activity->actAttachments as $attachment)
                                                        @if ($attachment->document_category_id == 2 && $attachment->document_name == 'Activity Report')
                                                            {{ $attachment->status_approved_date ? Carbon\Carbon::parse($attachment->status_approved_date)->format('F j, Y H:i A') : '' }}
                                                        @else
                                                            {{ '' }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($activity->actAttachments as $attachment)
                                                        @if ($attachment->document_category_id == 2 && $attachment->document_name == 'Narrative Report')
                                                            {{ $attachment->status_approved_date ? Carbon\Carbon::parse($attachment->status_approved_date)->format('F j, Y H:i A') : '' }}
                                                        @else
                                                            {{ '' }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                @endforeach

                                <th colspan="11" class="text-center" style="background-color: #CD03B0">College Council
                                </th>
                                @foreach ($studentOrganizations->where('type_of_org_id', 2) as $organization)
                                    @if ($organization->activities->where('acad_year_id', $acadYear->id)->isEmpty())
                                        <tr>
                                            <td>{{ $organization->id }}</td>
                                            <td>{{ $organization->organization_name }}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @else
                                        @foreach ($organization->activities as $activity)
                                            <tr>
                                                @if ($loop->first)
                                                    <td rowspan="{{ count($organization->activities) }}">
                                                        {{ $organization->id }}
                                                    </td>
                                                    <td rowspan="{{ count($organization->activities) }}">
                                                        {{ $organization->organization_name }}</td>
                                                @endif
                                                <td>{{ $activity->activity_name }}</td>
                                                @if ($activity->date_time_start != null)
                                                    <td>{{ \Carbon\Carbon::parse($activity->date_time_start)->format('F j, Y H:i A') }}
                                                        |
                                                        {{ \Carbon\Carbon::parse($activity->date_time_end)->format('F j, Y H:i A') }}
                                                    </td>
                                                @else
                                                    <td>{{ $activity->created_at->format('F Y') }}</td>
                                                @endif
                                                <td>{{ $activity->venue }}</td>
                                                <td>{{ $activity->budget_allocation ? Number::currency($activity->budget_allocation, 'PHP') : '' }}
                                                </td>
                                                <td></td>
                                                <td>
                                                    @foreach ($activity->actAttachments as $attachment)
                                                        @if ($attachment->document_category_id == 2 && $attachment->document_name == 'Activity Report')
                                                            {{ $attachment->status_approved_date ? Carbon\Carbon::parse($attachment->status_approved_date)->format('F j, Y H:i A') : '' }}
                                                        @else
                                                            {{ '' }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($activity->actAttachments as $attachment)
                                                        @if ($attachment->document_category_id == 2 && $attachment->document_name == 'Narrative Report')
                                                            {{ $attachment->status_approved_date ? Carbon\Carbon::parse($attachment->status_approved_date)->format('F j, Y H:i A') : '' }}
                                                        @else
                                                            {{ '' }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                @endforeach

                                <th colspan="11" class="text-center" style="background-color: #CD03B0">Class</th>
                                @foreach ($studentOrganizations->where('type_of_org_id', 3) as $organization)
                                    @if ($organization->activities->where('acad_year_id', $acadYear->id)->isEmpty())
                                        <tr>
                                            <td>{{ $organization->id }}</td>
                                            <td>{{ $organization->organization_name }}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @else
                                        @foreach ($organization->activities as $activity)
                                            <tr>
                                                @if ($loop->first)
                                                    <td rowspan="{{ count($organization->activities) }}">
                                                        {{ $organization->id }}
                                                    </td>
                                                    <td rowspan="{{ count($organization->activities) }}">
                                                        {{ $organization->organization_name }}</td>
                                                @endif
                                                <td>{{ $activity->activity_name }}</td>
                                                @if ($activity->date_time_start != null)
                                                    <td>{{ \Carbon\Carbon::parse($activity->date_time_start)->format('F j, Y H:i A') }}
                                                        |
                                                        {{ \Carbon\Carbon::parse($activity->date_time_end)->format('F j, Y H:i A') }}
                                                    </td>
                                                @else
                                                    <td>{{ $activity->created_at->format('F Y') }}</td>
                                                @endif
                                                <td>{{ $activity->venue }}</td>
                                                <td>{{ $activity->budget_allocation ? Number::currency($activity->budget_allocation, 'PHP') : '' }}
                                                </td>
                                                <td></td>
                                                <td>
                                                    @foreach ($activity->actAttachments as $attachment)
                                                        @if ($attachment->document_category_id == 2 && $attachment->document_name == 'Activity Report')
                                                            {{ $attachment->status_approved_date ? Carbon\Carbon::parse($attachment->status_approved_date)->format('F j, Y H:i A') : '' }}
                                                        @else
                                                            {{ '' }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($activity->actAttachments as $attachment)
                                                        @if ($attachment->document_category_id == 2 && $attachment->document_name == 'Narrative Report')
                                                            {{ $attachment->status_approved_date ? Carbon\Carbon::parse($attachment->status_approved_date)->format('F j, Y H:i A') : '' }}
                                                        @else
                                                            {{ '' }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                @endforeach

                                <th colspan="11" class="text-center" style="background-color: #CD03B0">Non-Class</th>
                                @foreach ($studentOrganizations->where('type_of_org_id', 4) as $organization)
                                    @if ($organization->activities->where('acad_year_id', $acadYear->id)->isEmpty())
                                        <tr>
                                            <td>{{ $organization->id }}</td>
                                            <td>{{ $organization->organization_name }}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @else
                                        @foreach ($organization->activities as $activity)
                                            <tr>
                                                @if ($loop->first)
                                                    <td rowspan="{{ count($organization->activities) }}">
                                                        {{ $organization->id }}
                                                    </td>
                                                    <td rowspan="{{ count($organization->activities) }}">
                                                        {{ $organization->organization_name }}</td>
                                                @endif
                                                <td>{{ $activity->activity_name }}</td>
                                                @if ($activity->date_time_start != null)
                                                    <td>{{ \Carbon\Carbon::parse($activity->date_time_start)->format('F j, Y H:i A') }}
                                                        |
                                                        {{ \Carbon\Carbon::parse($activity->date_time_end)->format('F j, Y H:i A') }}
                                                    </td>
                                                @else
                                                    <td>{{ $activity->created_at->format('F Y') }}</td>
                                                @endif
                                                <td>{{ $activity->venue }}</td>
                                                <td>{{ $activity->budget_allocation ? Number::currency($activity->budget_allocation, 'PHP') : '' }}
                                                </td>
                                                <td></td>
                                                <td>
                                                    @foreach ($activity->actAttachments as $attachment)
                                                        @if ($attachment->document_category_id == 2 && $attachment->document_name == 'Activity Report')
                                                            {{ $attachment->status_approved_date ? Carbon\Carbon::parse($attachment->status_approved_date)->format('F j, Y H:i A') : '' }}
                                                        @else
                                                            {{ '' }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($activity->actAttachments as $attachment)
                                                        @if ($attachment->document_category_id == 2 && $attachment->document_name == 'Narrative Report')
                                                            {{ $attachment->status_approved_date ? Carbon\Carbon::parse($attachment->status_approved_date)->format('F j, Y H:i A') : '' }}
                                                        @else
                                                            {{ '' }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                @endforeach

                                <th colspan="11" class="text-center" style="background-color: #CD03B0">Greek</th>
                                @foreach ($studentOrganizations->where('type_of_org_id', 5) as $organization)
                                    @if ($organization->activities->where('acad_year_id', $acadYear->id)->isEmpty())
                                        <tr>
                                            <td>{{ $organization->id }}</td>
                                            <td>{{ $organization->organization_name }}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @else
                                        @foreach ($organization->activities as $activity)
                                            <tr>
                                                @if ($loop->first)
                                                    <td rowspan="{{ count($organization->activities) }}">
                                                        {{ $organization->id }}
                                                    </td>
                                                    <td rowspan="{{ count($organization->activities) }}">
                                                        {{ $organization->organization_name }}</td>
                                                @endif
                                                <td>{{ $activity->activity_name }}</td>
                                                @if ($activity->date_time_start != null)
                                                    <td>{{ \Carbon\Carbon::parse($activity->date_time_start)->format('F j, Y H:i A') }}
                                                        |
                                                        {{ \Carbon\Carbon::parse($activity->date_time_end)->format('F j, Y H:i A') }}
                                                    </td>
                                                @else
                                                    <td>{{ $activity->created_at->format('F Y') }}</td>
                                                @endif
                                                <td>{{ $activity->venue }}</td>
                                                <td>{{ $activity->budget_allocation ? Number::currency($activity->budget_allocation, 'PHP') : '' }}
                                                </td>
                                                <td></td>
                                                <td>
                                                    @foreach ($activity->actAttachments as $attachment)
                                                        @if ($attachment->document_category_id == 2 && $attachment->document_name == 'Activity Report')
                                                            {{ $attachment->status_approved_date ? Carbon\Carbon::parse($attachment->status_approved_date)->format('F j, Y H:i A') : '' }}
                                                        @else
                                                            {{ '' }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($activity->actAttachments as $attachment)
                                                        @if ($attachment->document_category_id == 2 && $attachment->document_name == 'Narrative Report')
                                                            {{ $attachment->status_approved_date ? Carbon\Carbon::parse($attachment->status_approved_date)->format('F j, Y H:i A') : '' }}
                                                        @else
                                                            {{ '' }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        function exportToExcel(acadYear) {
            /* Convert table to Excel workbook */
            var table = document.querySelector('#orgActivitiesReportTable');
            var wb = XLSX.utils.table_to_book(table);


            /* Trigger download */
            XLSX.writeFile(wb, 'Activities_Report_' + acadYear + '.xlsx');
        }

        function printScreen() {

            window.print();
        }
    </script>
@endsection
