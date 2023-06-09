@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Countries</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('countries.create') }}"> Create New Country</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" id="search" name="search" class="form-control" placeholder="Search by name">
            </div>
        </div>
    </div>

    <div id="search-results">
        <!-- Search results will be loaded dynamically here -->

        @include('countries.search')
    </div>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Region ID</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($countries as $country)
            <tr>
                <td>#{{ $country->country_id }}</td>
                <td>{{ $country->country_name }}</td>
                <td>{{ $country->region_id }}</td>
                <td>
                    <form action="{{ route('countries.destroy', $country->country_id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('countries.show', $country->country_id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('countries.edit', $country->country_id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Live search country
            $('#search').on('keyup', function() {
                var query = $(this).val();

                if (query.length >= 2) {
                    $.ajax({
                        url: '{{ route("countries.livesearch") }}',
                        type: 'GET',
                        data: { query: query },
                        success: function(response) {
                            $('#search-results').html(response);
                        },
                        error: function(xhr) {
                            alert('Error: ' + xhr.responseText);
                        }
                    });
                } else {
                    $('#search-results').empty();
                }
            });
        });
    </script>
@endsection
