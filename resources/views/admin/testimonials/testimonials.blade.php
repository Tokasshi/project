<!DOCTYPE html>
<html lang="en">

@include('admin.includes.head')


<body>
@include('admin.includes.header')

    <div class="container my-5">
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">All Testimonials</h2>
                <a href="{{route('testim.add')}}" class="btn btn-link  link-dark fw-semibold col-auto me-3">➕Add new testimonial</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover display" id="_table">
                    <thead>
                        <tr>
                            <th scope="col">Created At</th>
                            <th scope="col">Name</th>
                            <th scope="col">Content</th>
                            <th scope="col">Published</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($testims as $testim)
                        <tr>
                            <th scope="row">{{ \Carbon\Carbon::parse($testim->created_at)->format('d M Y') }}</th>
                            <td>{{ $testim->name }}</td>
                            <td>{{Str::limit($testim['content'], 20)}}</td>
                            <td>{{($testim['published']==1) ? "Yes" : "No"}}</td>
                            <td class="text-center"><a class="text-decoration-none text-dark" href="{{route('testim.edit', $testim['id'])}}"><img src="{{asset('admin/assests/images/edit-svgrepo-com.svg')}}"></a></td>
                            
                            <td class="text-center">
                            <a class="text-decoration-none text-dark" href="{{ route('testim.delete', $testim->id) }}" 
                            onclick="event.preventDefault(); if(confirm('Are you sure you want to delete?')) { document.getElementById('delete-form-{{ $testim->id }}').submit(); }" >
                            <img src="{{ asset('admin/assests/images/trash-can-svgrepo-com.svg') }}" alt="Delete">
                            </a>
                            <form id="delete-form-{{ $testim->id }}" action="{{ route('testim.delete', $testim->id) }}" method="POST" style="display: none;">
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
    @include('admin.includes.footerjs')

</body>

</html>