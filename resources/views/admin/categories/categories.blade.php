@extends('admin.layouts.main')

@section('admin')

    <div class="container my-5">
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">All Categories</h2>
                <a href="{{route('cat.add')}}" class="btn btn-link  link-dark fw-semibold col-auto me-3">➕Add new category</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover display" id="_table">
                    <thead>
                        <tr>
                            <th scope="col">Created At</th>
                            <th scope="col">Category</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($cats as $cat)
                        <tr>
                            <th scope="row">{{ \Carbon\Carbon::parse($cat->created_at)->format('d M Y') }}</th>
                            <td>{{ $cat->catName }}</td>
                            <td class="text-center"><a class="text-decoration-none text-dark" href="{{route('cat.edit', $cat['id'])}}"><img src="{{asset('admin/assests/images/edit-svgrepo-com.svg')}}"></a></td>
                            <td class="text-center">
                        <form action="{{ route('cat.delete', $cat->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: none; border: none; padding: 0;">
                        <img src="{{ asset('admin/assests/images/trash-can-svgrepo-com.svg') }}" alt="Delete">
                        </button>
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
