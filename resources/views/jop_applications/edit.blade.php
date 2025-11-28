<div class="container">
    <h2>Edit jopApplication</h2>
    <form action="{{ route('jop_applications.update', $jopApplication->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="user_id" class="form-label">user_id</label>
            <input type="text" class="form-control" name="user_id" value="{{old("user_id", $jopApplication["user_id"])}}">
            @error("user_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="job_vacansy_id" class="form-label">job_vacansy_id</label>
            <input type="text" class="form-control" name="job_vacansy_id" value="{{old("job_vacansy_id", $jopApplication["job_vacansy_id"])}}">
            @error("job_vacansy_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="resume_id" class="form-label">resume_id</label>
            <input type="text" class="form-control" name="resume_id" value="{{old("resume_id", $jopApplication["resume_id"])}}">
            @error("resume_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="company_id" class="form-label">company_id</label>
            <input type="text" class="form-control" name="company_id" value="{{old("company_id", $jopApplication["company_id"])}}">
            @error("company_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="status" class="form-label">status</label>
            <input type="text" class="form-control" name="status" value="{{old("status", $jopApplication["status"])}}">
            @error("status")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="aiGeneratedScore" class="form-label">aiGeneratedScore</label>
            <input type="text" class="form-control" name="aiGeneratedScore" value="{{old("aiGeneratedScore", $jopApplication["aiGeneratedScore"])}}">
            @error("aiGeneratedScore")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="aiGeneratedFeedback" class="form-label">aiGeneratedFeedback</label>
            <input type="text" class="form-control" name="aiGeneratedFeedback" value="{{old("aiGeneratedFeedback", $jopApplication["aiGeneratedFeedback"])}}">
            @error("aiGeneratedFeedback")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_at" class="form-label">deleted_at</label>
            <input type="text" class="form-control" name="deleted_at" value="{{old("deleted_at", $jopApplication["deleted_at"])}}">
            @error("deleted_at")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>