
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex align-items-center justify-content-between mb-5">
            <h1 class="fs-4">Submissions</h1>
            <a href="{{ route('submission.create') }}" class="btn btn-success">&plus; Create</a>
        </div>

        @if ($submissions->isEmpty())
            <p class="text-center">No submissions yet. Create to get started.</p>
        @else
            <ul class="list-group list-group-flush">
                @foreach ($submissions as $submission)
                    <li class="list-group-item">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h2 class="fs-6 m-0">{{ $submission->assignment_title }}</h2>
                                <p class="m-0">Submitted by: {{ $submission->student_name }}</p>
                            </div>
                            <div class="d-flex align-items-center gap-4">
                                <?php $statusStyle = match ($submission->submission_status) {
                                    'pending' => 'text-warning',   // ← Orange for Pending
                                    'submitted' => 'text-success', // ← Green for Submitted
                                }; ?>
                                <span
                                    class="badge rounded-pill {{ $statusStyle }}">{{ ucfirst($submission->submission_status) }}</span>
                                <a href="{{ route('submission.edit', $submission) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('submission.destroy', $submission) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif

    </div>
@endsection
