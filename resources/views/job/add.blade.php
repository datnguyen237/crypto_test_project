@extends('common.index')
@section('content')
    <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
        <div class="card">
            <div class="card-body px-0 pb-4 px-3">
                <form action="{{ route('job.store') }}" role="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="ms-md-auto pe-md-3 align-items-center mb-3">
                        <label>Title</label>
                        <div class="input-group input-group-outline">
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Title">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="ms-md-auto pe-md-3 align-items-center mb-3">
                        <label>Description</label>
                        <div class="input-group input-group-outline">
                            <textarea type="text" name="description" class="form-control" placeholder="Description">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="ms-md-auto pe-md-3 align-items-center mb-3">
                        <label>Logo</label>
                        <div class="">
                            <label class="btn btn-primary" for="logo-image">Choose File</label><br/>
                            <input type="file" id="logo-image" name="logo" class="form-control d-none" onchange="loadFile(event)" accept="image/*">
                            <img id="output-image" class="w-50" alt="Logo" src="{{ old('logo') }}" style="display: none" />
                            @error('logo')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        const loadFile = function(event) {
            const output = document.getElementById('output-image');
            output.style.display = 'block';
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endsection
