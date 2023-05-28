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
