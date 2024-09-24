@extends('admin.layouts.main')

@section('admin')


    <div class="container my-5">
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">Unread Messages</h2>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-borderless display" id="_table">
                    <thead>
                        <tr>
                            <th scope="col">Created At</th>
                            <th scope="col">Message</th>
                            <th scope="col">Sender</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($msgs as $msg)

                        <tr>
                            <th scope="row">{{ \Carbon\Carbon::parse($msg->created_at)->format('d M Y') }}</th>
                            <td><a href="{{route('msg.details', $msg['id'])}}" class="text-decoration-none text-dark">{{Str::limit($msg['message'], 20)}}</a></td>
                            <td>{{ $msg->name }}</td>

                            <td class="text-center">
                            <a class="text-decoration-none text-dark" href="{{ route('msg.delete', $msg->id) }}" 
                            onclick="event.preventDefault(); if(confirm('Are you sure you want to delete?')) { document.getElementById('delete-form-{{ $msg->id }}').submit(); }" >
                            <img src="{{asset('admin/assests/images/trash-can-svgrepo-com.svg')}}" alt="Delete">
                            </a>
                            <form id="delete-form-{{ $msg->id }}" action="{{ route('msg.delete', $msg->id) }}" method="POST" style="display: none;">
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