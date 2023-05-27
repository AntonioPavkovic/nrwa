@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Jobs</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('jobs.create') }}"> Create New Job</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <strong>Search:</strong>
                <input type="text" name="search" id="search" class="form-control" placeholder="Search jobs">
            </div>
        </div>
    </div>

    <div id="jobList">
        @include('jobs.job_list')
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        let searchInput = document.getElementById('search');

        searchInput.addEventListener('keyup', function () {
            let query = this.value;

            axios.get("{{ route('jobs.search') }}", { params: { query: query } })
                .then(function (response) {
                    document.getElementById('jobList').innerHTML = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
    </script>
@endsection
