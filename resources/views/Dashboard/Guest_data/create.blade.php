@extends('dashboard.layouts.main')
@section('container')

    <div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="Event_detail-tab" data-bs-toggle="tab" data-bs-target="#Event_detail"
                    type="button" role="tab" aria-controls="Event_detail" aria-selected="true">Upload CSV</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="Guests-tab" data-bs-toggle="tab" data-bs-target="#Guests" type="button"
                    role="tab" aria-controls="Guests" aria-selected="false">Tambah Tamu</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="Event_detail" role="tabpanel" aria-labelledby="Event_detail-tab">

            </div>

            <div class="tab-pane fade" id="Guests" role="tabpanel" aria-labelledby="Guests-tab">

            </div>
        </div>
    @endsection
