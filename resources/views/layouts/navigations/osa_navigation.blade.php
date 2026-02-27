<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="{{ route('osaDashboard') }}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('osaStudentOrgsList') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>

                    <p>
                        Student Organizations
                    </p>
                </a>
            </li>


            <li class="nav-item">
                @php
                    $pendings = '';
                    if ($actAttachmentsPending->count() > 0) {
                        $pendings = $actAttachmentsPending->count();
                    } else {
                        $pendings = 0;
                    }
                    $inProcess = '';
                    if ($actAttachmentsInProgress->count() > 0) {
                        $inProcess = $actAttachmentsInProgress->count();
                    } else {
                        $inProcess = 0;
                    }
                @endphp

                <a href="#" class="nav-link">
                    <i class="nav-icon fa-solid fa-folder-open"></i>
                    <p>
                        Documents
                        <i class="fas fa-angle-left right"></i>
                        @if ($pendings + $inProcess == 0)
                            <span class="badge badge-info right bg-danger"></span>
                        @else
                            <span class="badge badge-info right bg-danger">{{ $pendings + $inProcess }}</span>
                        @endif

                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ route('osaPendingDocuments') }}" class="nav-link">
                            <i class="nav-icon fa fa-clipboard-list ml-3"></i>
                            <p>Pending</p>
                            @if ($pendings == 0)
                                <span class="badge badge-info right bg-danger"></span>
                            @else
                                <span class="badge badge-info right bg-danger">{{ $pendings }}</span>
                            @endif

                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('osaInProcessDocuments') }}" class="nav-link">
                            <i class="nav-icon fa fa-spinner ml-3"></i>
                            <p>In Process</p>
                            @if ($inProcess == 0)
                                <span class="badge badge-info right bg-danger"></span>
                            @else
                                <span class="badge badge-info right bg-danger">{{ $inProcess }}</span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('osaApprovedDocuments') }}" class="nav-link">
                            <i class="nav-icon fa-solid fa-square-check ml-3"></i>
                            <p>Approved</p>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('osaDocumentTemplates') }}" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>
                        Document Templates
                    </p>

                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('osaAnnouncementsPage') }}" class="nav-link">
                    <i class="nav-icon fas fa-envelope"></i>
                    <p>
                        Announcements
                    </p>

                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('osaMonitoring') }}" class="nav-link">
                    <i class="nav-icon fa-solid fa-chart-line"></i>
                    <p>
                        Monitoring
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
