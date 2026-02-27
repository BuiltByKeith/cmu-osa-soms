@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 mt-2">
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
                    <table class="table table-bordered" id="orgOfficersReportTable">
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
                            <th style="background-color:#A4C2F4">No.1</th>
                            <th style="background-color:#A4C2F4">Registration No.</th>
                            <th style="background-color:#A4C2F4">Date Registered</th>
                            <th style="background-color:#A4C2F4">Name of Organizations</th>
                            <th style="background-color:#A4C2F4">Acronym</th>
                            <th style="background-color: #A4C2F4">Adviser(s)</th>
                            <th style="background-color:#A4C2F4">Officers</th>
                            <th style="background-color:#A4C2F4">Position</th>
                            <th style="background-color: #A4C2F4">Course</th>

                        </thead>
                        <tbody>
                            <th colspan="9" class="text-center" style="background-color: #CD03B0">University Wide</th>
                            @foreach ($studentOrganizations->where('type_of_org_id', 1) as $organization)
                                @if (
                                    $organization->studentOrgMembers->where('acad_year_id', $acadYear->id)->isEmpty() &&
                                        $organization->studentOrgAdvisers->where('acad_year_id', $acadYear->id)->isEmpty())
                                    <tr>
                                        <td>{{ $organization->id }}</td>
                                        <td>{{ $organization->accreditation_no }}</td>
                                        <td>{{ $organization->updated_at->format('F d, Y') }}</td>
                                        <td>{{ $organization->organization_name }}</td>
                                        <td>{{ $organization->acronym }}</td>
                                        <td colspan="4"></td> <!-- Adjust colspan to cover the advisers column -->
                                    </tr>
                                @else
                                    @foreach ($organization->studentOrgMembers->where('position', '!=', 'Member') as $index => $member)
                                        <tr>
                                            @if ($loop->first)
                                                <td
                                                    rowspan="{{ count($organization->studentOrgMembers->where('position', '!=', 'Member')) }}">
                                                    {{ $organization->id }}
                                                </td>
                                                <td
                                                    rowspan="{{ count($organization->studentOrgMembers->where('position', '!=', 'Member')) }}">
                                                    {{ $organization->accreditation_no }}
                                                </td>
                                                <td
                                                    rowspan="{{ count($organization->studentOrgMembers->where('position', '!=', 'Member')) }}">
                                                    {{ $organization->updated_at->format('F d, Y') }}
                                                </td>
                                                <td
                                                    rowspan="{{ count($organization->studentOrgMembers->where('position', '!=', 'Member')) }}">
                                                    {{ $organization->organization_name }}
                                                </td>
                                                <td
                                                    rowspan="{{ count($organization->studentOrgMembers->where('position', '!=', 'Member')) }}">
                                                    {{ $organization->acronym }}
                                                </td>
                                                <td
                                                    rowspan="{{ count($organization->studentOrgMembers->where('position', '!=', 'Member')) }}">
                                                    <!-- Displaying adviser(s) in this column -->
                                                    @foreach ($organization->studentOrgAdvisers as $adviser)
                                                        {{ $adviser->employee->firstname }}
                                                        {{ substr($adviser->employee->middlename, 0, 1) }}
                                                        {{ $adviser->employee->lastname }},
                                                        <br>
                                                    @endforeach
                                                </td>
                                            @endif

                                            <td>{{ $member->position }}</td>
                                            <td>{{ $member->student->firstname }}
                                                {{ substr($member->student->middlename, 0, 1) }}
                                                {{ $member->student->lastname }}
                                            </td>
                                            <td>{{ $member->student->program->program_name }}</td>



                                        </tr>
                                    @endforeach
                                @endif
                            @endforeach



                            <th colspan="9" class="text-center" style="background-color: #CD03B0">College Council</th>
                            @foreach ($studentOrganizations->where('type_of_org_id', 2) as $organization)
                                @if (
                                    $organization->studentOrgMembers->where('acad_year_id', $acadYear->id)->isEmpty() &&
                                        $organization->studentOrgAdvisers->where('acad_year_id', $acadYear->id)->isEmpty())
                                    <tr>
                                        <td>{{ $organization->id }}</td>
                                        <td>{{ $organization->accreditation_no }}</td>
                                        <td>{{ $organization->updated_at->format('F d, Y') }}</td>
                                        <td>{{ $organization->organization_name }}</td>
                                        <td>{{ $organization->acronym }}</td>
                                        <td colspan="4"></td> <!-- Adjust colspan to cover the advisers column -->
                                    </tr>
                                @else
                                    @foreach ($organization->studentOrgMembers->where('position', '!=', 'Member') as $index => $member)
                                        <tr>
                                            @if ($loop->first)
                                                <td
                                                    rowspan="{{ count($organization->studentOrgMembers->where('position', '!=', 'Member')) }}">
                                                    {{ $organization->id }}
                                                </td>
                                                <td
                                                    rowspan="{{ count($organization->studentOrgMembers->where('position', '!=', 'Member')) }}">
                                                    {{ $organization->accreditation_no }}
                                                </td>
                                                <td
                                                    rowspan="{{ count($organization->studentOrgMembers->where('position', '!=', 'Member')) }}">
                                                    {{ $organization->updated_at->format('F d, Y') }}
                                                </td>
                                                <td
                                                    rowspan="{{ count($organization->studentOrgMembers->where('position', '!=', 'Member')) }}">
                                                    {{ $organization->organization_name }}
                                                </td>
                                                <td
                                                    rowspan="{{ count($organization->studentOrgMembers->where('position', '!=', 'Member')) }}">
                                                    {{ $organization->acronym }}
                                                </td>
                                            @endif
                                            <td>{{ $member->position }}</td>
                                            <td>{{ $member->student->firstname }}
                                                {{ substr($member->student->middlename, 0, 1) }}
                                                {{ $member->student->lastname }}
                                            </td>
                                            <td>{{ $member->student->program->program_name }}</td>
                                            @if ($index === 0)
                                                <td
                                                    rowspan="{{ count($organization->studentOrgMembers->where('position', '!=', 'Member')) }}">
                                                    <!-- Displaying adviser(s) in this column -->
                                                    @foreach ($organization->studentOrgAdvisers as $adviser)
                                                        {{ $adviser->employee->firstname }}
                                                        {{ substr($adviser->employee->middlename, 0, 1) }}
                                                        {{ $adviser->employee->lastname }},
                                                        <br>
                                                    @endforeach
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @endif
                            @endforeach
                            <th colspan="9" class="text-center" style="background-color: #CD03B0">Class</th>
                            @foreach ($studentOrganizations->where('type_of_org_id', 3) as $organization)
                                @if (
                                    $organization->studentOrgMembers->where('acad_year_id', $acadYear->id)->isEmpty() &&
                                        $organization->studentOrgAdvisers->where('acad_year_id', $acadYear->id)->isEmpty())
                                    <tr>
                                        <td>{{ $organization->id }}</td>
                                        <td>{{ $organization->accreditation_no }}</td>
                                        <td>{{ $organization->updated_at->format('F d, Y') }}</td>
                                        <td>{{ $organization->organization_name }}</td>
                                        <td>{{ $organization->acronym }}</td>
                                        <td colspan="4"></td> <!-- Adjust colspan to cover the advisers column -->
                                    </tr>
                                @else
                                    @foreach ($organization->studentOrgMembers->where('position', '!=', 'Member') as $index => $member)
                                        <tr>
                                            @if ($loop->first)
                                                <td
                                                    rowspan="{{ count($organization->studentOrgMembers->where('position', '!=', 'Member')) }}">
                                                    {{ $organization->id }}
                                                </td>
                                                <td
                                                    rowspan="{{ count($organization->studentOrgMembers->where('position', '!=', 'Member')) }}">
                                                    {{ $organization->accreditation_no }}
                                                </td>
                                                <td
                                                    rowspan="{{ count($organization->studentOrgMembers->where('position', '!=', 'Member')) }}">
                                                    {{ $organization->updated_at->format('F d, Y') }}
                                                </td>
                                                <td
                                                    rowspan="{{ count($organization->studentOrgMembers->where('position', '!=', 'Member')) }}">
                                                    {{ $organization->organization_name }}
                                                </td>
                                                <td
                                                    rowspan="{{ count($organization->studentOrgMembers->where('position', '!=', 'Member')) }}">
                                                    {{ $organization->acronym }}
                                                </td>
                                            @endif
                                            <td>{{ $member->position }}</td>
                                            <td>{{ $member->student->firstname }}
                                                {{ substr($member->student->middlename, 0, 1) }}
                                                {{ $member->student->lastname }}
                                            </td>
                                            <td>{{ $member->student->program->program_name }}</td>
                                            @if ($index === 0)
                                                <td
                                                    rowspan="{{ count($organization->studentOrgMembers->where('position', '!=', 'Member')) }}">
                                                    <!-- Displaying adviser(s) in this column -->
                                                    @foreach ($organization->studentOrgAdvisers as $adviser)
                                                        {{ $adviser->employee->firstname }}
                                                        {{ substr($adviser->employee->middlename, 0, 1) }}
                                                        {{ $adviser->employee->lastname }},
                                                        <br>
                                                    @endforeach
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @endif
                            @endforeach
                            <th colspan="9" class="text-center" style="background-color: #CD03B0">Non-Class</th>
                            @foreach ($studentOrganizations->where('type_of_org_id', 4) as $organization)
                                @if (
                                    $organization->studentOrgMembers->where('acad_year_id', $acadYear->id)->isEmpty() &&
                                        $organization->studentOrgAdvisers->where('acad_year_id', $acadYear->id)->isEmpty())
                                    <tr>
                                        <td>{{ $organization->id }}</td>
                                        <td>{{ $organization->accreditation_no }}</td>
                                        <td>{{ $organization->updated_at->format('F d, Y') }}</td>
                                        <td>{{ $organization->organization_name }}</td>
                                        <td>{{ $organization->acronym }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                    </tr>
                                @else
                                    @foreach ($organization->studentOrgMembers->where('position', '!=', 'Member') as $index => $member)
                                        <tr>
                                            @if ($loop->first)
                                                <td
                                                    rowspan="{{ count($organization->studentOrgMembers->where('position', '!=', 'Member')) }}">
                                                    {{ $organization->id }}
                                                </td>
                                                <td
                                                    rowspan="{{ count($organization->studentOrgMembers->where('position', '!=', 'Member')) }}">
                                                    {{ $organization->accreditation_no }}
                                                </td>
                                                <td
                                                    rowspan="{{ count($organization->studentOrgMembers->where('position', '!=', 'Member')) }}">
                                                    {{ $organization->updated_at->format('F d, Y') }}
                                                </td>
                                                <td
                                                    rowspan="{{ count($organization->studentOrgMembers->where('position', '!=', 'Member')) }}">
                                                    {{ $organization->organization_name }}
                                                </td>
                                                <td
                                                    rowspan="{{ count($organization->studentOrgMembers->where('position', '!=', 'Member')) }}">
                                                    {{ $organization->acronym }}
                                                </td>
                                            @endif
                                            <td>{{ $member->position }}</td>
                                            <td>{{ $member->student->firstname }}
                                                {{ substr($member->student->middlename, 0, 1) }}
                                                {{ $member->student->lastname }}</td>
                                            <td>{{ $member->student->program->program_name }}</td>
                                            @if ($index === 0)
                                                <td
                                                    rowspan="{{ count($organization->studentOrgMembers->where('position', '!=', 'Member')) }}">
                                                    <!-- Displaying adviser(s) in this column -->
                                                    @foreach ($organization->studentOrgAdvisers as $adviser)
                                                        {{ $adviser->employee->firstname }}
                                                        {{ substr($adviser->employee->middlename, 0, 1) }}
                                                        {{ $adviser->employee->lastname }},
                                                        <br>
                                                    @endforeach
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @endif
                            @endforeach
                            <th colspan="9" class="text-center" style="background-color: #CD03B0">Greek</th>
                            @foreach ($studentOrganizations->where('type_of_org_id', 5) as $organization)
                                @if (
                                    $organization->studentOrgMembers->where('acad_year_id', $acadYear->id)->isEmpty() &&
                                        $organization->studentOrgAdvisers->where('acad_year_id', $acadYear->id)->isEmpty())
                                    <tr>
                                        <td>{{ $organization->id }}</td>
                                        <td>{{ $organization->accreditation_no }}</td>
                                        <td>{{ $organization->updated_at->format('F d, Y') }}</td>
                                        <td>{{ $organization->organization_name }}</td>
                                        <td>{{ $organization->acronym }}</td>
                                        <td colspan="4"></td> <!-- Adjust colspan to cover the advisers column -->
                                    </tr>
                                @else
                                    @foreach ($organization->studentOrgMembers->where('position', '!=', 'Member') as $index => $member)
                                        <tr>
                                            @if ($loop->first)
                                                <td
                                                    rowspan="{{ count($organization->studentOrgMembers->where('position', '!=', 'Member')) }}">
                                                    {{ $organization->id }}
                                                </td>
                                                <td
                                                    rowspan="{{ count($organization->studentOrgMembers->where('position', '!=', 'Member')) }}">
                                                    {{ $organization->accreditation_no }}
                                                </td>
                                                <td
                                                    rowspan="{{ count($organization->studentOrgMembers->where('position', '!=', 'Member')) }}">
                                                    {{ $organization->updated_at->format('F d, Y') }}
                                                </td>
                                                <td
                                                    rowspan="{{ count($organization->studentOrgMembers->where('position', '!=', 'Member')) }}">
                                                    {{ $organization->organization_name }}
                                                </td>
                                                <td
                                                    rowspan="{{ count($organization->studentOrgMembers->where('position', '!=', 'Member')) }}">
                                                    {{ $organization->acronym }}
                                                </td>
                                            @endif
                                            <td>{{ $member->position }}</td>
                                            <td>{{ $member->student->firstname }}
                                                {{ substr($member->student->middlename, 0, 1) }}
                                                {{ $member->student->lastname }}
                                            </td>
                                            <td>{{ $member->student->program->program_name }}</td>
                                            @if ($index === 0)
                                                <td
                                                    rowspan="{{ count($organization->studentOrgMembers->where('position', '!=', 'Member')) }}">
                                                    <!-- Displaying adviser(s) in this column -->
                                                    @foreach ($organization->studentOrgAdvisers as $adviser)
                                                        {{ $adviser->employee->firstname }}
                                                        {{ substr($adviser->employee->middlename, 0, 1) }}
                                                        {{ $adviser->employee->lastname }},
                                                        <br>
                                                    @endforeach
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>

    <script>
        function exportToExcel(acadYear) {
            /* Convert table to Excel workbook */
            var table = document.querySelector('#orgOfficersReportTable');
            var wb = XLSX.utils.table_to_book(table);


            /* Trigger download */
            XLSX.writeFile(wb, 'Officers_Report_' + acadYear + '.xlsx');
        }

        function printScreen() {

            window.print();
        }
    </script>
@endsection
