<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="{{ route('studentOrgDashboard') }}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('studentOrgCalOfActs') }}" class="nav-link">
                    <i class="nav-icon fa-solid fa-chart-line"></i>
                    <p>
                        {{ __('Activities') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('studentOrgMembersList') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('Members') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('studentOrgSubmittedDocuments') }}" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>
                        {{ __('Submitted Documents') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('studentOrgDocumentTemplates') }}" class="nav-link">
                    <i class="nav-icon fas fa-folder-open"></i>
                    <p>
                        {{ __('Document Templates') }}
                    </p>
                </a>
            </li>



        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
