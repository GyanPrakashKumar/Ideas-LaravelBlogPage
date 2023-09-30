@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            <div class="card overflow-hidden">
                <div class="card-body pt-3">
                    @include('shared.side_nav')
                </div>
                <div class="card-footer text-center py-2">
                    <a class="btn btn-link btn-sm" href="#">View Profile </a>
                </div>
            </div>
        </div>
        <div class="col-6">
            @include('shared.success_msg')
            <div class="mt-3">
                @include('shared.idea_card')
            </div>
        </div>
        <div class="col-3">
            @include('shared.searchBar')
            @include('shared.followBox')
        </div>
    </div>
@endsection
