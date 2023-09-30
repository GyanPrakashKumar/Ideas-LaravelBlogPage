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
            @include('shared.idea_form')
            <hr>
            @foreach ($ideas as $idea)
                <div class="mt-3">
                    @include('shared.idea_card')
                </div>
            @endforeach
            <div class="mt-3">
                {{-- Pagination --}}
                {{ $ideas->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('shared.searchBar')
            @include('shared.followBox')
        </div>
    </div>
@endsection
