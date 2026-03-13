
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="mb-3">
            <h1 class="fs-4 mt-3">Create Submission</h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-secondary border-3 shadow-sm">
                    <div class="card-body">
                        <form action="{{ route('submission.store') }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label for="student_name" class="form-label">Student Name</label>
                                <input type="text" name="student_name" id="student_name" class="form-control">
                                @error('student_name')
                                    <p class="fs-6 text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="assignment_title" class="form-label">Assignment Title</label>
                                <input type="text" name="assignment_title" id="assignment_title" class="form-control">
                                @error('assignment_title')
                                    <p class="fs-6 text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="submission_status" class="form-label">Submission Status</label>
                                <select name="submission_status" id="submission_status" class="form-select">
                                    <option value="pending">Pending</option>
                                    <option value="submitted">Submitted</option>
                                </select>
                                @error('submission_status')
                                    <p class="fs-6 text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                            <div>

                                <button type="submit" class="btn btn-success">&plus; Create</button>
                                <a href="{{ route('submission.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
