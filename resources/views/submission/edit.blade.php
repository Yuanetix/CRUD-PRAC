
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="mb-3">
            <h1 class="fs-4 mt-3">Edit Submission</h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-secondary border-3 shadow-sm">
                    <div class="card-body">
                        <form action="{{ route('submission.update', $submission) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="student_name" class="form-label">Student Name</label>
                                <input type="text" name="student_name" id="student_name" class="form-control"
                                    value="{{ old('student_name', $submission->student_name ?? '') }}">
                                @error('student_name')
                                    <p class="fs-6 text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="assignment_title" class="form-label">Assignment Title</label>
                                <input type="text" name="assignment_title" id="assignment_title" class="form-control"
                                    value="{{ old('assignment_title', $submission->assignment_title ?? '') }}">
                                @error('assignment_title')
                                    <p class="fs-6 text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="submission_status" class="form-label">Submission Status</label>
                                <select name="submission_status" id="submission_status" class="form-select">
                                    <?php
                                    $status = old('submission_status', $submission->submission_status ?? 'pending');
                                    ?>
                                    <option value="pending" {{ $status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="submitted" {{ $status === 'submitted' ? 'selected' : '' }}>Submitted</option>
                                </select>
                                @error('submission_status')
                                    <p class="fs-6 text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                            <div>

                                <button type="submit" class="btn btn-primary">Edit</button>
                                <a href="{{ route('submission.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection