@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin=""></script>
    <script src='https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-omnivore/v0.3.1/leaflet-omnivore.min.js'></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

    <div class="container-fluid content-inner mt-n5 py-0" >
        <div>
            <div class="row" >
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title"><span class="badge bg-warning p-3">PROJECTS LIST</span></h4>
                            </div>
                            <!-- ADD PROJECT BUTTON -->
                            <a class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#addProjectModal">
                                <i class="bi bi-plus-circle me-1"></i>
                                Add Project
                            </a>
                        </div>
                        <div class="card-body " >
                            <form method="GET" action="{{ route('projects.index') }}" class="mb-3">
                                <div class="row g-2 align-items-end">
                                    <div class="col-md-4">
                                        <label class="form-label">Search</label>
                                        <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Search client, project, or description">
                                    </div>

                                    <div class="col-md-2">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-select">
                                            <option value="">All Status</option>
                                            <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Planning</option>
                                            <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>In Progress</option>
                                            <option value="2" {{ request('status') === '2' ? 'selected' : '' }}>On Hold</option>
                                            <option value="3" {{ request('status') === '3' ? 'selected' : '' }}>Completed</option>
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <label class="form-label">Priority</label>
                                        <select name="priority" class="form-select">
                                            <option value="">All Priority</option>
                                            <option value="0" {{ request('priority') === '0' ? 'selected' : '' }}>Low</option>
                                            <option value="1" {{ request('priority') === '1' ? 'selected' : '' }}>Medium</option>
                                            <option value="2" {{ request('priority') === '2' ? 'selected' : '' }}>High</option>
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <label class="form-label">Sort By</label>
                                        <select name="sort_by" class="form-select">
                                            <option value="id" {{ request('sort_by') == 'id' ? 'selected' : '' }}>Latest</option>
                                            <option value="client_name" {{ request('sort_by') == 'client_name' ? 'selected' : '' }}>Client Name</option>
                                            <option value="project_name" {{ request('sort_by') == 'project_name' ? 'selected' : '' }}>Project Name</option>
                                            <option value="status" {{ request('sort_by') == 'status' ? 'selected' : '' }}>Status</option>
                                            <option value="priority" {{ request('sort_by') == 'priority' ? 'selected' : '' }}>Priority</option>
                                            <option value="start_date" {{ request('sort_by') == 'start_date' ? 'selected' : '' }}>Start Date</option>
                                            <option value="due_date" {{ request('sort_by') == 'due_date' ? 'selected' : '' }}>Due Date</option>
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <label class="form-label">Order</label>
                                        <select name="sort_direction" class="form-select">
                                            <option value="desc" {{ request('sort_direction') == 'desc' ? 'selected' : '' }}>Descending</option>
                                            <option value="asc" {{ request('sort_direction') == 'asc' ? 'selected' : '' }}>Ascending</option>
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-search me-1"></i>Apply</button>
                                        <a href="{{ route('projects.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-clockwise me-1"></i>Reset</a>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table id="documentsTable"  class="table table-striped" role="grid"
                                    data-bs-toggle="data-table">
                                    <thead>
                                        <tr class="light">
                                            {{-- <th class="text-wrap">ID</th> --}}
                                            <th class="text-wrap">Client Name</th>
                                            <th class="text-wrap">Project Name</th>
                                            <th class="text-wrap">Description</th>
                                            <th class="text-wrap">Status</th>
                                            <th class="text-wrap">Priority</th>
                                            <th class="text-wrap">Start Date</th>
                                            <th class="text-wrap">Due Date</th>
                                            <th style="text-wrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($projects as $project)
                                            <tr>
                                                {{-- <td class="text-wrap">{{ $project->id }}</td> --}}
                                                <td class="text-wrap">{{ $project->client_name }}</td>
                                                <td class="text-wrap">{{ $project->project_name }}</td>
                                                <td class="text-wrap">{{ $project->description ?? '' }}</td>
                                                <td class="text-wrap">
                                                    @if ($project->status == '0')
                                                        <span class="badge bg-secondary px-3 py-2">
                                                            Planning
                                                        </span>
                                                    @elseif($project->status == '1')
                                                        <span class="badge bg-info text-dark px-3 py-2">
                                                            In Progress
                                                        </span>
                                                    @elseif($project->status == '2')
                                                        <span class="badge bg-warning text-dark px-3 py-2">
                                                            On Hold
                                                        </span>
                                                    @elseif($project->status == '3')
                                                        <span class="badge bg-success px-3 py-2">
                                                            Completed
                                                        </span>
                                                    @else
                                                        <span class="badge bg-secondary px-3 py-2">
                                                            {{ $project->status }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="text-wrap">
                                                    @if ($project->priority == '0')
                                                        <span class="badge bg-success px-3 py-2">
                                                            Low
                                                        </span>
                                                    @elseif($project->priority == '1')
                                                        <span class="badge bg-warning text-dark px-3 py-2">
                                                            Medium
                                                        </span>
                                                    @elseif($project->priority == '2')
                                                        <span class="badge bg-danger px-3 py-2">
                                                            High
                                                        </span>
                                                    @else
                                                        <span class="badge bg-secondary px-3 py-2">
                                                            {{ $project->priority }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="text-wrap">
                                                    {{ \Carbon\Carbon::parse($project->start_date)->format('F j, Y') }}
                                                </td>
                                                <td class="text-wrap">
                                                    {{ \Carbon\Carbon::parse($project->due_date)->format('F j, Y') }}
                                                </td>
                                                <td class="text-wrap">
                                                    <div class="d-flex align-items-center list-user-action">
                                                        <a style="margin-left:2mm" class="btn btn-sm btn-icon btn-primary viewProjectBtn" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#viewProjectModal" data-id="{{ $project->id }}" title="View" aria-label="View"><span class="btn-inner"><svg class="icon-20" width="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22.4541 11.3918C22.7819 11.7385 22.7819 12.2615 22.4541 12.6082C21.0124 14.1335 16.8768 18 12 18C7.12317 18 2.98759 14.1335 1.54586 12.6082C1.21811 12.2615 1.21811 11.7385 1.54586 11.3918C2.98759 9.86647 7.12317 6 12 6C16.8768 6 21.0124 9.86647 22.4541 11.3918Z" fill="currentColor"></path><circle cx="12" cy="12" r="5" fill="#918F98"></circle>                                <circle cx="12" cy="12" r="3" fill="#130F26"></circle>                                <mask mask-type="alpha" maskUnits="userSpaceOnUse" x="9" y="9" width="6" height="6">                                <circle cx="12" cy="12" r="3" fill="#130F26"></circle>                                </mask>                                <circle opacity="0.89" cx="13.5" cy="10.5" r="1.5" fill="white" fill-opacity="0.6"></circle></svg>                                                              
                                                        </span></a>
                                                        <a style="margin-left:2mm" class="btn btn-sm btn-icon btn-warning editProjectBtn"
                                                            href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#editProjectModal"
                                                            data-id="{{ $project->id }}" title="Edit"
                                                            aria-label="Edit">
                                                            <span class="btn-inner">
                                                                <svg class="icon-20" width="20" viewBox="0 0 24 24"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341"
                                                                        stroke="currentColor" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                    </path>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z"
                                                                        stroke="currentColor" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                    </path>
                                                                    <path d="M15.1655 4.60254L19.7315 9.16854"
                                                                        stroke="currentColor" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                    </path>
                                                                </svg>
                                                            </span>
                                                        </a>
                                                        <form action="{{ route('projects.delete', $project->id) }}"
                                                            method="POST" class="delete-form d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-icon btn-danger delete-button"
                                                                style="margin-left:2mm" title="Delete">
                                                                <span class="btn-inner">
                                                                    <svg class="icon-20" width="20"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        stroke="currentColor">
                                                                        <path
                                                                            d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                        <path d="M20.708 6.23975H3.75"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                        <path
                                                                            d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="card-body">
                                    <div class="d-flex ">
                                        {{ $projects->links('pagination::bootstrap-5') }}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- view projects  --}}
    <div class="modal fade" id="viewProjectModal" tabindex="-1" aria-labelledby="viewProjectModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="viewProjectModalLabel"><i class="bi bi-folder2-open me-2"></i>Project Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6"><label class="text-muted small mb-1">Client Name</label><div class="fw-semibold" id="view_client_name">-</div></div>
                        <div class="col-md-6"><label class="text-muted small mb-1">Project Name</label><div class="fw-semibold" id="view_project_name">-</div></div>
                        <div class="col-12"><label class="text-muted small mb-1">Description</label><div class="text-wrap" id="view_description">-</div></div>
                        <div class="col-md-6"><label class="text-muted small mb-1">Status</label><div><span id="view_status" class="badge"></span></div></div>
                        <div class="col-md-6"><label class="text-muted small mb-1">Priority</label><div><span id="view_priority" class="badge"></span></div></div>
                        <div class="col-md-6"><label class="text-muted small mb-1">Start Date</label><div class="fw-semibold" id="view_start_date">-</div></div>
                        <div class="col-md-6"><label class="text-muted small mb-1">Due Date</label><div class="fw-semibold" id="view_due_date">-</div></div>
                    </div>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle me-1"></i>Close</button></div>
            </div>
        </div>
    </div>
     {{-- ADD PROJECT MODAl --}}
    <div class="modal fade" id="addProjectModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="addProjectModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('projects.store') }}" method="POST" class="needs-validation"
                    id="addProjectForm" novalidate>
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="addProjectModalLabel">
                            <i class="bi bi-folder-plus me-2"></i>
                            Add New Project
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6 position-relative">
                                <label for="client_name" class="form-label">
                                    Client Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="client_name"
                                    name="client_name" placeholder="Enter client name"
                                    value="{{ old('client_name') }}" required>
                                <div class="invalid-tooltip">
                                    Client Name is required.
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-6 position-relative">
                                <label for="project_name" class="form-label">
                                    Project Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="project_name"
                                    name="project_name" placeholder="Enter project name"
                                    value="{{ old('project_name') }}" required>
                                <div class="invalid-tooltip">
                                    Project Name is required.
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="description" class="form-label">
                                    Description
                                </label>
                                <textarea class="form-control" id="description" name="description" rows="4"
                                    placeholder="Enter project description">{{ old('description') }}</textarea>
                            </div>
                            <div class="col-md-6 position-relative">
                                <label for="status" class="form-label">
                                    Status
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="" disabled
                                        {{ old('status') === null ? 'selected' : '' }}>
                                        Select status
                                    </option>
                                    <option value="0"
                                        {{ old('status') == '0' ? 'selected' : '' }}>
                                        Planning
                                    </option>
                                    <option value="1"
                                        {{ old('status') == '1' ? 'selected' : '' }}>
                                        In Progress
                                    </option>
                                    <option value="2"
                                        {{ old('status') == '2' ? 'selected' : '' }}>
                                        On Hold
                                    </option>
                                    <option value="3"
                                        {{ old('status') == '3' ? 'selected' : '' }}>
                                        Completed
                                    </option>
                                </select>
                                <div class="invalid-tooltip">
                                    Please select a valid status.
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-6 position-relative">
                                <label for="priority" class="form-label">
                                    Priority
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-select" id="priority" name="priority" required>
                                    <option value="" disabled
                                        {{ old('priority') === null ? 'selected' : '' }}>
                                        Select priority
                                    </option>
                                    <option value="0"
                                        {{ old('priority') == '0' ? 'selected' : '' }}>
                                        Low
                                    </option>
                                    <option value="1"
                                        {{ old('priority') == '1' ? 'selected' : '' }}>
                                        Medium
                                    </option>
                                    <option value="2"
                                        {{ old('priority') == '2' ? 'selected' : '' }}>
                                        High
                                    </option>
                                </select>
                                <div class="invalid-tooltip">
                                    Please select a valid priority.
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-6 position-relative">
                                <label for="start_date" class="form-label">
                                    Start Date
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="date" class="form-control" id="start_date"
                                    name="start_date" value="{{ old('start_date') }}" required>
                                <div class="invalid-tooltip">
                                    Start Date is required.
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-6 position-relative">
                                <label for="due_date" class="form-label">
                                    Due Date
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="date" class="form-control" id="due_date"
                                    name="due_date" value="{{ old('due_date') }}" required>
                                <div class="invalid-tooltip" id="dueDateError">
                                    Due Date is required.
                                </div>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-1"></i>
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle me-1"></i>
                            Save Project
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- edit modal --}}
    <div class="modal fade" id="editProjectModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="editProjectModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form id="editProjectForm" method="POST" class="needs-validation" novalidate>

                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="editProjectModalLabel">
                            <i class="bi bi-pencil-square me-2"></i>
                            Edit Project
                        </h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>

                    <div class="modal-body">

                        <input type="hidden" id="edit_project_id" name="project_id">

                        <div class="row g-3">

                            <!-- CLIENT NAME -->
                            <div class="col-md-6 position-relative">

                                <label for="edit_client_name" class="form-label">
                                    Client Name
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="text" class="form-control" id="edit_client_name" name="client_name"
                                    placeholder="Enter client name" required>

                                <div class="invalid-tooltip">
                                    Client Name is required.
                                </div>

                                <div class="valid-tooltip">
                                    Looks good!
                                </div>

                            </div>


                            <!-- PROJECT NAME -->
                            <div class="col-md-6 position-relative">

                                <label for="edit_project_name" class="form-label">
                                    Project Name
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="text" class="form-control" id="edit_project_name" name="project_name"
                                    placeholder="Enter project name" required>

                                <div class="invalid-tooltip">
                                    Project Name is required.
                                </div>

                                <div class="valid-tooltip">
                                    Looks good!
                                </div>

                            </div>


                            <!-- DESCRIPTION -->
                            <div class="col-12">

                                <label for="edit_description" class="form-label">
                                    Description
                                </label>

                                <textarea class="form-control" id="edit_description" name="description" rows="4"
                                    placeholder="Enter project description"></textarea>

                            </div>


                            <!-- STATUS -->
                            <div class="col-md-6 position-relative">

                                <label for="edit_status" class="form-label">
                                    Status
                                    <span class="text-danger">*</span>
                                </label>

                                <select class="form-select" id="edit_status" name="status" required>

                                    <option value="">
                                        Select Status
                                    </option>

                                    <option value="0">
                                        Planning
                                    </option>

                                    <option value="1">
                                        In Progress
                                    </option>

                                    <option value="2">
                                        On Hold
                                    </option>

                                    <option value="3">
                                        Completed
                                    </option>

                                </select>

                                <div class="invalid-tooltip">
                                    Please select a valid status.
                                </div>

                                <div class="valid-tooltip">
                                    Looks good!
                                </div>

                            </div>


                            <!-- PRIORITY -->
                            <div class="col-md-6 position-relative">

                                <label for="edit_priority" class="form-label">
                                    Priority
                                    <span class="text-danger">*</span>
                                </label>

                                <select class="form-select" id="edit_priority" name="priority" required>

                                    <option value="">
                                        Select Priority
                                    </option>

                                    <option value="0">
                                        Low
                                    </option>

                                    <option value="1">
                                        Medium
                                    </option>

                                    <option value="2">
                                        High
                                    </option>

                                </select>

                                <div class="invalid-tooltip">
                                    Please select a valid priority.
                                </div>

                                <div class="valid-tooltip">
                                    Looks good!
                                </div>

                            </div>


                            <!-- START DATE -->
                            <div class="col-md-6 position-relative">

                                <label for="edit_start_date" class="form-label">
                                    Start Date
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="date" class="form-control" id="edit_start_date" name="start_date"
                                    required>

                                <div class="invalid-tooltip">
                                    Start Date is required.
                                </div>

                                <div class="valid-tooltip">
                                    Looks good!
                                </div>

                            </div>


                            <!-- DUE DATE -->
                            <div class="col-md-6 position-relative">

                                <label for="edit_due_date" class="form-label">
                                    Due Date
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="date" class="form-control" id="edit_due_date" name="due_date" required>

                                <div class="invalid-tooltip" id="editDueDateError">
                                    Due Date is required.
                                </div>

                                <div class="valid-tooltip">
                                    Looks good!
                                </div>

                            </div>

                        </div>

                    </div>


                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">

                            <i class="bi bi-x-circle me-1"></i>
                            Cancel

                        </button>

                        <button type="submit" class="btn btn-warning">

                            <i class="bi bi-check-circle me-1"></i>
                            Update Project

                        </button>

                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
             $('.viewProjectBtn').click(function() {
                var projectId = $(this).data('id');
                $.ajax({
                    url: '/projects/' + projectId + '/edit',
                    type: 'GET',
                    success: function(project) {
                        $('#view_client_name').text(project.client_name);
                        $('#view_project_name').text(project.project_name);
                        $('#view_description').text(project.description ? project.description : 'No description');

                        $('#view_status').removeClass('bg-secondary bg-info bg-warning bg-success text-dark');
                        if (project.status == 0) $('#view_status').text('Planning').addClass('bg-secondary');
                        else if (project.status == 1) $('#view_status').text('In Progress').addClass('bg-info text-dark');
                        else if (project.status == 2) $('#view_status').text('On Hold').addClass('bg-warning text-dark');
                        else if (project.status == 3) $('#view_status').text('Completed').addClass('bg-success');
                        else $('#view_status').text('Unknown').addClass('bg-secondary');

                        $('#view_priority').removeClass('bg-success bg-warning bg-danger bg-secondary text-dark');
                        if (project.priority == 0) $('#view_priority').text('Low').addClass('bg-success');
                        else if (project.priority == 1) $('#view_priority').text('Medium').addClass('bg-warning text-dark');
                        else if (project.priority == 2) $('#view_priority').text('High').addClass('bg-danger');
                        else $('#view_priority').text('Unknown').addClass('bg-secondary');

                        $('#view_start_date').text(formatProjectDate(project.start_date));
                        $('#view_due_date').text(formatProjectDate(project.due_date));
                    },
                    error: function() {
                        Swal.fire({ title: 'Error', text: 'No Project Found', icon: 'error' });
                    }
                });
            });
             function formatProjectDate(dateValue) {
                if (!dateValue) return '-';
                var parts = dateValue.split('-');
                var date = new Date(parts[0], parts[1] - 1, parts[2]);
                return date.toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' });
            }
            $('.editProjectBtn').click(function() {
                var projectId = $(this).data('id');
                $.ajax({
                    url: '/projects/' + projectId + '/edit',
                    type: 'GET',

                    success: function(project) {
                        $('#edit_project_id').val(project.id);
                        $('#edit_client_name').val(project.client_name);
                        $('#edit_project_name').val(project.project_name);
                        $('#edit_description').val(project.description);
                        $('#edit_status').val(project.status);
                        $('#edit_priority').val(project.priority);
                        $('#edit_start_date').val(project.start_date);
                        $('#edit_due_date').val(project.due_date);

                        $('#editProjectForm').attr(
                            'action',
                            '/projects/' + project.id
                        );
                    },

                    error: function() {

                        Swal.fire({
                            title: 'Error',
                            text: 'No Project Found',
                            icon: 'error'
                        });

                    }
                });

            });

            function validateDueDate(startDateId, dueDateId, errorId) {
                var startDate = $('#' + startDateId).val();
                var dueDate = $('#' + dueDateId).val();
                var dueDateInput = document.getElementById(dueDateId);
                if (!dueDate) {
                    dueDateInput.setCustomValidity('');
                    $('#' + errorId).text(
                        'Due Date is required.'
                    );
                    return;
                }
                if (startDate && dueDate < startDate) {
                    dueDateInput.setCustomValidity(
                        'Due Date cannot be earlier than Start Date.'
                    );
                    $('#' + errorId).text(
                        'Due Date cannot be earlier than Start Date.'
                    );
                } else {
                    dueDateInput.setCustomValidity('');
                    $('#' + errorId).text(
                        'Due Date is required.'
                    );
                }

            }
            //Add project - date
            $('#start_date, #due_date').on('change input', function() {
                validateDueDate(
                    'start_date',
                    'due_date',
                    'dueDateError'
                );
            });
            // Edit project - date
            $('#edit_start_date, #edit_due_date').on('change input', function() {
                validateDueDate(
                    'edit_start_date',
                    'edit_due_date',
                    'editDueDateError'
                );
            });
            $('#addProjectForm, #editProjectForm').on('submit', function(event) {
                if (this.id === 'addProjectForm') {

                    validateDueDate(
                        'start_date',
                        'due_date',
                        'dueDateError'
                    );
                }
                // EDIT PROJECT
                if (this.id === 'editProjectForm') {
                    validateDueDate(
                        'edit_start_date',
                        'edit_due_date',
                        'editDueDateError'
                    );
                }
                // Bootstrap validation
                if (!this.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                $(this).addClass('was-validated');
            });
            //Reset validation in add modal
            $('#addProjectModal').on('hidden.bs.modal', function() {
                var form = document.getElementById('addProjectForm');
                form.classList.remove('was-validated');
                document
                    .getElementById('due_date')
                    .setCustomValidity('');
                $('#dueDateError').text(
                    'Due Date is required.'
                );
            });
            //Reset validation in Edit modal
            $('#editProjectModal').on('hidden.bs.modal', function() {
                var form = document.getElementById('editProjectForm');
                form.classList.remove('was-validated');
                document
                    .getElementById('edit_due_date')
                    .setCustomValidity('');
                $('#editDueDateError').text(
                    'Due Date is required.'
                );
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.delete-button').forEach(function(button) {
                button.addEventListener('click', function(e) {
                    e.preventDefault();

                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'You will not be able to recover this data!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!',
                        reverseButtons: true,
                        buttonsStyling: false,
                        customClass: {
                            confirmButton: 'btn btn-primary mx-2',
                            cancelButton: 'btn btn-danger mx-2'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            button.closest('.delete-form').submit();
                        }
                    });
                });
            });
        });
    </script>
    </div>
@endsection
