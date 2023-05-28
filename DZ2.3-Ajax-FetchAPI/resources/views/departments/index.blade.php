@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Departments</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('departments.create') }}"> Create New Department</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="form-group">
        <input type="text" class="form-control" id="search" placeholder="Search">
    </div>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Manager ID</th>
            <th>Location ID</th>
            <th width="280px">Action</th>
        </tr>
        <tbody id="department-table-body">
            @foreach ($departments as $department)
                <tr>
                    <td>#{{ $department->department_id }}</td>
                    <td>{{ $department->department_name }}</td>
                    <td>{{ $department->manager_id }}</td>
                    <td>{{ $department->location_id }}</td>
                    <td>
                        <form action="{{ route('departments.destroy', $department->department_id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('departments.show', $department->department_id) }}">Show</a>

                            <a class="btn btn-primary" href="{{ route('departments.edit', $department->department_id) }}">Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    <script>
        const searchInput = document.getElementById('search');
        const departmentTableBody = document.getElementById('department-table-body');

        searchInput.addEventListener('keyup', function (event) {
            const searchTerm = event.target.value;

            fetch(`{{ route('departments.search') }}?term=${searchTerm}`)
                .then(response => response.text())
                .then(data => {
                    departmentTableBody.innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
@endsection
