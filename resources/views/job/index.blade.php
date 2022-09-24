@extends('common.index')
@section('content')
    <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h6>Jobs</h6>
                    </div>
                    <div class="col-lg-6 col-5 my-auto text-end">
                        <div class="dropdown float-lg-end pe-4">
                            <a class="cursor-pointer" href="{{ route('job.create') }}">
                                <button type="button" class="btn btn-success">Add Job</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr class="col-12">
                                <th class="col-3">
                                    Title</th>
                                <th class="col-3">
                                    Description</th>
                                <th class="col-4">
                                    Logo</th>
                                <th class="col-2">
                                    Time Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($jobs as $job)
                                <tr class="col-12">
                                    <td class="col-3">{{ $job->title }}</td>
                                    <td class="col-3">{{ $job->description }}</td>
                                    <td class="col-4"><img class="w-15" src="{{ url('storage/images/'.$job->logo) }}" alt="Logo"></td>
                                    <td class="col-2">{{ date('Y-m-d H:i:s', strtotime($job->created_at)) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="16">No Data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
