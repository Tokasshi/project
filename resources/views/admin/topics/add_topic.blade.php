@extends('admin.layouts.main')

@section('admin')

  <div class="container my-5">
    <div class="mx-2">
      <h2 class="fw-bold fs-2 mb-5 pb-2">Add Topic</h2>
      <form action="{{route('topic.store')}}" method="POST" class="px-md-5"  enctype="multipart/form-data">
      @csrf
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Topic Title:</label>
          <div class="col-md-10">
            <input type="text" placeholder="e.g. Design Patterns" class="form-control py-2" name="topicTitle"
            value="{{old('topicTitle')}}" />
              @error('topicTitle')
              <div class="alert alert-warning">{{($message)}}</div>
              @enderror 
          </div>
        </div>
        <div class="form-group mb-3 row">
    <label for="" class="form-label col-md-2 fw-bold text-md-end">Category:</label>
    <div class="col-md-10">
        <select name="catId" id="" class="form-control py-1">
            <option value="">Select Category</option>
            @foreach ($cats as $cat)
                <option value="{{ $cat->id }}" {{ old('catId') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->catName }}
                </option>
            @endforeach
        </select>
        @error('catId')
            <div class="alert alert-warning">{{ $message }}</div>
        @enderror 
    </div>
</div>

        </div>
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Content:</label>
          <div class="col-md-10">
            <textarea id="" rows="5" class="form-control" name="content">{{old('content')}}</textarea>
            @error('content')
              <div class="alert alert-warning">{{($message)}}</div>
              @enderror
          </div>
        </div>
        <div class="form-group mb-3 row">
    <label for="" class="form-label col-md-2 fw-bold text-md-end">Trending:</label>
    <div class="col-md-10 d-flex align-items-center">
        <input type="checkbox" class="form-check-input" style="padding: 0.7rem;" name="trending" value="1" @checked(old('trending'))/>
        <label class="form-check-label ms-2" for="trending">Trending</label>
    </div>
</div>
<div class="form-group mb-3 row">
    <label for="" class="form-label col-md-2 fw-bold text-md-end">Published:</label>
    <div class="col-md-10 d-flex align-items-center">
        <input type="checkbox" class="form-check-input" style="padding: 0.7rem;" name="published" value="1" @checked(old('published'))/>
        <label class="form-check-label ms-2" for="published">Published</label>
    </div>
</div>

        <hr>
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Image:</label>
          <div class="col-md-10">
            <input type="file" class="form-control" style="padding: 0.7rem;" id="image" name="image" />
            @error('image')
              <div class="alert alert-warning">{{($message)}}</div>
              @enderror
          </div>
        </div>
        <div class="text-md-end">
          <button class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
            Add Topic
          </button>
        </div>
      </form>
    </div>
  </div>
  @endsection