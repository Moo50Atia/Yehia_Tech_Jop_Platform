<div class="container">
<h2>job_vacansies List</h2>
<a href="{{ route('job_vacansies.create') }}" class="btn btn-primary mb-3">Create job_vacansies</a>
<table class="table">
    <thead>
        <tr><th>title</th><th>description</th><th>location</th><th>type</th><th>salary</th><th>company_id</th><th>job_category_id</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($job_vacansies as $item)
                <tr>
                    <td>{{$item->title}}</td>
<td>{{$item->description}}</td>
<td>{{$item->location}}</td>
<td>{{$item->type}}</td>
<td>{{$item->salary}}</td>
<td>{{$item->company_id}}</td>
<td>{{$item->job_category_id}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('job_vacansies.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('job_vacansies.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>