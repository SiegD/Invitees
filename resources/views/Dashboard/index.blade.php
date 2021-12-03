@extends('Dashboard.Layouts.main')

@section('container')
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('failed'))
        <div class="alert alert-danger col-lg-8" role="alert">
            {{ session('failed') }}
        </div>
    @endif
    <main class="col-md-9">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
        </div>
    </main>
    </div>
    </div>
@endsection
