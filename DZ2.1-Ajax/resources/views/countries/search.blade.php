@if ($countries->count() > 0)
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
@else
    <p>No countries found.</p>
@endif
