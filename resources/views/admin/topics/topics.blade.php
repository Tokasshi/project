@extends('admin.layouts.main')

@section('admin')

    <div class="container my-5">
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">All Topics</h2>
                <a href="{{ route('topic.add') }}" class="btn btn-link  link-dark fw-semibold col-auto me-3">➕Add new topic</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover display" id="_table">
                    <thead>
                        <tr>
                            <th scope="col">Created At</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Content</th>
                            <th scope="col">Published</th>
                            <th scope="col">Trending</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($topics as $topic)
                        <tr>
                            <th scope="row">{{ \Carbon\Carbon::parse($topic->created_at)->format('d M Y') }}</th>
                            <td><a class="text-decoration-none text-dark" href="{{route('topic.details', $topic['id'])}}">{{$topic->topicTitle}}</a>
                            </td>
                            <td>{{$topic->category->catName}}</td>
                            <td>{{Str::limit($topic['content'], 20)}}</td>
                            <td>{{($topic['published']==1) ? "Yes" : "No"}}</td>
                            <td>{{($topic['trending']==1) ? "Yes" : "No"}}</td>
                            <td class="text-center"><a class="text-decoration-none text-dark" href="{{route('topic.edit', $topic['id'])}}"><img src="{{asset('admin/assests/images/edit-svgrepo-com.svg')}}"></a></td>
                            
                            <td class="text-center">
                            <a class="text-decoration-none text-dark" href="{{ route('topic.delete', $topic->id) }}" 
                            onclick="event.preventDefault(); if(confirm('Are you sure you want to delete?')) { document.getElementById('delete-form-{{ $topic->id }}').submit(); }" >
                            <img src="{{ asset('admin/assests/images/trash-can-svgrepo-com.svg') }}" alt="Delete">
                            </a>
                            <form id="delete-form-{{ $topic->id }}" action="{{ route('topic.delete', $topic->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
