<th colspan="11" class="text-center" style="background-color: #CD03B0">Univesity Wide</th>
@foreach ($studentOrganizations->where('type_of_org_id', 1) as $organization)
    @if ($organization->activities->isEmpty())
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
        @foreach ($organization->activities->where('ay_semester_id', 2) as $activity)
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
                <td>{{ $activity->budget_allocation }}</td>

                <td></td>
                <td>
                    @foreach ($activity->actAttachments as $attachment)
                        @if ($attachment->document_category_id == 2 && $attachment->document_name == 'Activity Report')
                            {{ \Carbon\Carbon::parse($attachment->status_approved_date)->format('F j, Y - h:i A') }}
                        @else
                            {{ '' }}
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($activity->actAttachments as $attachment)
                        @if ($attachment->document_category_id == 2 && $attachment->document_name == 'Narrative Report')
                            {{ $attachment->status_approved_date }}
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

<th colspan="11" class="text-center" style="background-color: #CD03B0">College Council</th>
@foreach ($studentOrganizations->where('type_of_org_id', 2) as $organization)
    @if ($organization->activities->isEmpty())
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
                <td>{{ $activity->budget_allocation }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
    @endif
@endforeach

<th colspan="11" class="text-center" style="background-color: #CD03B0">Class</th>
@foreach ($studentOrganizations->where('type_of_org_id', 3) as $organization)
    @if ($organization->activities->isEmpty())
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
                <td>{{ $activity->budget_allocation }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
    @endif
@endforeach

<th colspan="11" class="text-center" style="background-color: #CD03B0">Non-Class</th>
@foreach ($studentOrganizations->where('type_of_org_id', 4) as $organization)
    @if ($organization->activities->isEmpty())
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
                <td>{{ $activity->budget_allocation }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
    @endif
@endforeach

<th colspan="11" class="text-center" style="background-color: #CD03B0">Greek</th>
@foreach ($studentOrganizations->where('type_of_org_id', 5) as $organization)
    @if ($organization->activities->isEmpty())
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
                <td>{{ $activity->budget_allocation }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
    @endif
@endforeach
