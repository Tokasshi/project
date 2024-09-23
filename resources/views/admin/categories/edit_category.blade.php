@extends('admin.layouts.main')

@section('admin')
  
  <div class="container my-5">
    <div class="mx-2">
      <h2 class="fw-bold fs-2 mb-5 pb-2">Edit Category</h2>
      <form action="{{ route('cat.update', ['id' => $cat->id]) }}" method="POST" class="px-md-5" enctype="multipart/form-data">
      @csrf
      @method('put')
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Category Name:</label>
          <div class="col-md-10">
            <input type="text"  class="form-control py-2" name="catName"
            value="{{ old('catName', $cat->catName) }}"/>
            @error('catName')
                        <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
          </div>
        </div>
        <div class="text-md-end">
          <button class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
            Edit Category
          </button>
        </div>
      </form>
    </div>
  </div>
  @endsection
