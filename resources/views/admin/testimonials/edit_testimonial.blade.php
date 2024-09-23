<!DOCTYPE html>
<html lang="en">

@include('admin.includes.head')


<body>
@include('admin.includes.header')

  
  <div class="container my-5">
    <div class="mx-2">
      <h2 class="fw-bold fs-2 mb-5 pb-2">Edit Testimonial</h2>
      <form action="{{ route('testim.update', ['id' => $testim->id]) }}" method="POST" class="px-md-5"  enctype="multipart/form-data">
      @csrf
      @method('put')
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Name:</label>
          <div class="col-md-10">
            <input type="text" placeholder="e.g. Jhon Doe" class="form-control py-2" name="name" 
            value="{{ old('name', $testim->name) }}"/>
            @error('name')
                        <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
          </div>
        </div>
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Content:</label>
          <div class="col-md-10">
            <textarea name="content" id="" rows="5" class="form-control">{{ old('content', $testim->content) }}</textarea>
            @error('content')
                        <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
          </div>
        </div>
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Published:</label>
          <div class="col-md-10">
            <input type="checkbox" class="form-check-input" style="padding: 0.7rem;" name="published"
            {{ old('published', $testim->published) ? 'checked' : '' }} />
          </div>
        </div>
        <hr>

        <div class="form-group mb-3 row">
                    <label for="" class="form-label col-md-2 fw-bold text-md-end">Current Image:</label>
                    <div class="col-md-10">
                        @if($testim->image)
                        <img src="{{ asset('assets/images/testimonials/' . $testim->image) }}" alt="Current Image" style="max-width: 200px;">
                        @else
                            <p>No image uploaded</p>
                        @endif
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label class="form-label col-md-2 fw-bold text-md-end" for="image">Upload New Image:</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control" id="image" name="image" value="{{ old('image', $testim->image) }}">
                    </div>
                </div>

        <div class="text-md-end">
          <button class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
            Edit Testimonial
          </button>
        </div>
      </form>
    </div>
  </div>
  </main>
  @include('admin.includes.footerjs')

</body>

</html>