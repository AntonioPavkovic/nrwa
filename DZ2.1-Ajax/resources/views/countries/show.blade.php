@extends('layouts.app')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Country</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('countries.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ID:</strong>
                {{ $country->country_id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $country->country_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Region ID:</strong>
                {{ $country->region_id }}
            </div>
        </div>
    </div>
@endsection

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
