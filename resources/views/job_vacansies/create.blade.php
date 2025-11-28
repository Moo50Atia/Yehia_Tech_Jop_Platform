<div class="container">
    <h2>Create job_vacansies</h2>
    <form action="{{ route('job_vacansies.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" class="form-control" name="title" value="{{old("title")}}">
            @error("title")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="description" class="form-label">description</label>
            <input type="text" class="form-control" name="description" value="{{old("description")}}">
            @error("description")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="location" class="form-label">location</label>
            <input type="text" class="form-control" name="location" value="{{old("location")}}">
            @error("location")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="type" class="form-label">type</label>
            <input type="text" class="form-control" name="type" value="{{old("type")}}">
            @error("type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="salary" class="form-label">salary</label>
            <input type="text" class="form-control" name="salary" value="{{old("salary")}}">
            @error("salary")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="company_id" class="form-label">company_id</label>
            <input type="text" class="form-control" name="company_id" value="{{old("company_id")}}">
            @error("company_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="job_category_id" class="form-label">job_category_id</label>
            <input type="text" class="form-control" name="job_category_id" value="{{old("job_category_id")}}">
            @error("job_category_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_at" class="form-label">deleted_at</label>
            <input type="text" class="form-control" name="deleted_at" value="{{old("deleted_at")}}">
            @error("deleted_at")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>