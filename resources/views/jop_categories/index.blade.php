<div class="container">
    <h2>jop_categories List</h2>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">Create jop_categories</a>
    <table class="table">
        <thead>
            <tr>
                <th>name</th>
                <th>deleted_at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jop_categories as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->deleted_at}}</td>
                <td>
                    <a href="{{ route('admin.categories.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.categories.destroy', $item->id) }}" method="POST" style="display:inline;">
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