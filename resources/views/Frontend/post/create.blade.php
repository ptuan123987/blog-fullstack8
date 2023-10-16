@extends('Frontend.layouts.base')
@section('title', 'Tạo Bài Viết')

@section('body')
    <section class="create-post" style="margin-top: 120px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data" action="{{ route('post.store') }}">
                                @csrf
                                <div class="position-relative row form-group">
                                    <label for="image" class="col-md-3 text-md-right col-form-label">Hình ảnh</label>
                                    <div class="col-md-9 col-xl-8">
                                        <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg" />
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="position-relative row form-group">
                                    <label for="category_id" class="col-md-3 text-md-right col-form-label">Danh mục</label>
                                    <div class="col-md-9 col-xl-8">
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="">-- Chọn danh mục --</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="position-relative row form-group">
                                    <label for="title" class="col-md-3 text-md-right col-form-label">Tiêu đề</label>
                                    <div class="col-md-9 col-xl-8">
                                        <input name="title" id="title" placeholder="Tiêu đề" type="text" class="form-control"
                                            value="{{ old('title') }}">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="position-relative row form-group">
                                    <label for="content" class="col-md-3 text-md-right col-form-label">Nội dung</label>
                                    <div class="col-md-9 col-xl-8">
                                        <textarea name="content" id="content" placeholder="Nội dung" class="form-control">{{ old('content') }}</textarea>
                                        @error('content')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="position-relative row form-group">
                                    <label for="user_id" class="col-md-3 text-md-right col-form-label">Tác giả</label>
                                    <div class="col-md-9 col-xl-8">
                                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    </div>
                                </div>
                                <div class="position-relative row form-group mb-1">
                                    <div class="col-md-9 col-xl-8 offset-md-2">
                                        <a href="{{ route('posts.index') }}" class="border-0 btn btn-outline-danger mr-1">
                                            <span class="btn-icon-wrapper pr-1 opacity-8">
                                                <i class="fa fa-times fa-w-20"></i>
                                            </span>
                                            <span>Hủy</span>
                                        </a>
                                        <button type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
                                            <span class="btn-icon-wrapper pr-2 opacity-8">
                                                <i class="fa fa-download fa-w-20"></i>
                                            </span>
                                            <span>Lưu</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
