@extends('layouts.app')

@section('content')


<div class="container-fluid px-4 py-4">

    <div class="mb-4">
        <h2 class="fw-bold mb-1">Project Dashboard</h2>
        <p class="text-muted mb-0">
            Overview of your client projects and current progress.
        </p>
    </div>
    <div class="row g-3">

        {{-- Total Projects --}}
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 bg-primary text-white shadow-sm h-100">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div class="bg-white text-primary rounded-3 p-3"><i class="bi bi-folder-fill fs-4"></i></div>
                    <div class="text-end">
                        <p class="mb-1 fw-semibold">Total Projects</p>
                        <h3 class="mb-0 fw-bold">{{ $totalProjects }}</h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- Planning --}}
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 text-white shadow-sm h-100" style="background-color:#6f42c1;">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div class="bg-white rounded-3 p-3" style="color:#6f42c1;"><i class="bi bi-calendar2-check-fill fs-4"></i></div>
                    <div class="text-end">
                        <p class="mb-1 fw-semibold">Planning</p>
                        <h3 class="mb-0 fw-bold">{{ $planningProjects }}</h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- In Progress --}}
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 bg-info text-white shadow-sm h-100">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div class="bg-white text-info rounded-3 p-3"><i class="bi bi-arrow-repeat fs-4"></i></div>
                    <div class="text-end">
                        <p class="mb-1 fw-semibold">In Progress</p>
                        <h3 class="mb-0 fw-bold">{{ $inProgressProjects }}</h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- On Hold --}}
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 bg-warning text-dark shadow-sm h-100">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div class="bg-white text-warning rounded-3 p-3"><i class="bi bi-pause-circle-fill fs-4"></i></div>
                    <div class="text-end">
                        <p class="mb-1 fw-semibold">On Hold</p>
                        <h3 class="mb-0 fw-bold">{{ $onHoldProjects }}</h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- Completed --}}
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 bg-success text-white shadow-sm h-100">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div class="bg-white text-success rounded-3 p-3"><i class="bi bi-check-circle-fill fs-4"></i></div>
                    <div class="text-end">
                        <p class="mb-1 fw-semibold">Completed</p>
                        <h3 class="mb-0 fw-bold">{{ $completedProjects }}</h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- Low Priority --}}
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 bg-secondary text-white shadow-sm h-100">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div class="bg-white text-secondary rounded-3 p-3"><i class="bi bi-arrow-down-circle-fill fs-4"></i></div>
                    <div class="text-end">
                        <p class="mb-1 fw-semibold">Low Priority</p>
                        <h3 class="mb-0 fw-bold">{{ $lowPriorityProjects }}</h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- Medium Priority --}}
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 text-dark shadow-sm h-100" style="background-color:#ffc107;">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div class="bg-white text-warning rounded-3 p-3"><i class="bi bi-dash-circle-fill fs-4"></i></div>
                    <div class="text-end">
                        <p class="mb-1 fw-semibold">Medium Priority</p>
                        <h3 class="mb-0 fw-bold">{{ $mediumPriorityProjects }}</h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- High Priority --}}
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 bg-danger text-white shadow-sm h-100">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div class="bg-white text-danger rounded-3 p-3"><i class="bi bi-exclamation-triangle-fill fs-4"></i></div>
                    <div class="text-end">
                        <p class="mb-1 fw-semibold">High Priority</p>
                        <h3 class="mb-0 fw-bold">{{ $highPriorityProjects }}</h3>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection