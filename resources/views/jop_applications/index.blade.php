<div class="container">
<h2>jop_applications List</h2>
<a href="{{ route('jop_applications.create') }}" class="btn btn-primary mb-3">Create jop_applications</a>
<table class="table">
    <thead>
        <tr><th>user_id</th><th>job_vacansy_id</th><th>resume_id</th><th>company_id</th><th>status</th><th>aiGeneratedScore</th><th>aiGeneratedFeedback</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($jop_applications as $item)
                <tr>
                    <td>{{$item->user_id}}</td>
<td>{{$item->job_vacansy_id}}</td>
<td>{{$item->resume_id}}</td>
<td>{{$item->company_id}}</td>
<td>{{$item->status}}</td>
<td>{{$item->aiGeneratedScore}}</td>
<td>{{$item->aiGeneratedFeedback}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('jop_applications.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('jop_applications.destroy', $item->id) }}" method="POST" style="display:inline;">
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