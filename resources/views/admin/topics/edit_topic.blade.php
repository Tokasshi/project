@extends('admin.layouts.main')

@section('admin')

  
  <div class="container my-5">
    <div class="mx-2">
      <h2 class="fw-bold fs-2 mb-5 pb-2">Edit Topic</h2>
      <form action="{{ route('topic.update', ['id' => $topic->id]) }}" method="POST" class="px-md-5"  enctype="multipart/form-data">
      @csrf
      @method('put')
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Topic Title:</label>
          <div class="col-md-10">
            <input type="text" placeholder="e.g. Design Patterns" class="form-control py-2" name="topicTitle"
            value="{{ old('topicTitle', $topic->topicTitle) }}"/>
            @error('topicTitle')
                        <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
          </div>
        </div>
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Category:</label>
          <div class="col-md-10">
            <select id="select-option1" class="form-control py-1" name="catId">
            <option value="">Select Category</option>
            @foreach ($cats as $cat)
                <option value="{{ $cat->id }}" 
                        @selected($cat->id == $topic->catId)>
                    {{ $cat->catName }}
                </option>
            @endforeach
            </select>
          </div>
        </div>
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Content:</label>
          <div class="col-md-10">
            <textarea name="content" id="" rows="5" class="form-control">{{ old('content', $topic->content) }}</textarea>
          </div>
        </div>
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Trending:</label>
          <div class="col-md-10">
            <input type="checkbox" class="form-check-input" style="padding: 0.7rem;"  name="trending"
            {{ old('trending', $topic->trending) ? 'checked' : '' }} />
          </div>
        </div>
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Published:</label>
          <div class="col-md-10">
            <input type="checkbox" class="form-check-input" style="padding: 0.7rem;" name="published" 
            {{ old('published', $topic->published) ? 'checked' : '' }} />
          </div>
        </div>
        <hr>
        <div class="form-group mb-3 row">
                    <label for="" class="form-label col-md-2 fw-bold text-md-end">Current Image:</label>
                    <div class="col-md-10">
                        @if($topic->image)
                        <img src="{{ asset('assets/images/topics/' . $topic->image) }}" alt="Current Image" style="max-width: 200px;">
                        @else
                            <p>No image uploaded</p>
                        @endif
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label class="form-label col-md-2 fw-bold text-md-end" for="image">Upload New Image:</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control" id="image" name="image" value="{{ old('image', $topic->image) }}">
                    </div>
                </div>
        <div class="text-md-end">
          <button class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
            Edit Topic
          </button>
        </div>
      </form>
    </div>
  </div>
  @endsection
