@extends('layouts.backend.master')
@section('title', 'Create Career')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Career</li>
                    </ol>
                </nav>
                <h1 class="m-0">Career</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Add Career Info</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.career.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <b>Title:</b>
                                        <input type="text" name="title" class=" form-control"
                                            placeholder="Enter Job Title" value="{{ old('title') }}">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <b>Job Type:</b>
                                        <input type="text" name="job_type" class="form-control"
                                            placeholder="Enter Job Type" value="{{ old('job_type') }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-6">
                                        <b>Salary:</b>
                                        <input type="text" name="salary" class="form-control" placeholder="Enter Salary"
                                            value="{{ old('salary') }}">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <b>Job Location:</b>
                                        <input type="text" name="location" class="form-control"
                                            placeholder="Enter Job Location" value="{{ old('location') }}">
                                    </div>
                                </div>
                                <div class="row mt-3">

                                    <div class="form-group col-lg-6">
                                        <b>Job Deadline:</b>
                                        <input type="date" name="deadline" class="form-control"
                                            placeholder="Enter Job Location" value="{{ old('deadline') }}">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <b>Alter Text:</b>
                                        <input type="text" name="alt_text" class=" form-control"
                                            placeholder="Enter Alter Text" value="{{ old('alt_text') }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-4">
                                        <b>Bradcamp Photo(704x432):</b>
                                        <input type="file" name="bradcamp" class="form-control" id="photoInput">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <b>Photo(704x432):</b>
                                        <input type="file" name="photo" class="form-control" id="photoInput">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <b>Meta Photo(767x942):</b>
                                        <input type="file" name="meta_photo" class="form-control" id="photoInput">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                </div>

                                <div class=" form-group mt-3">
                                    <b>Description:</b>
                                    <textarea name="description" class="form-control" id="editor" rows="7" placeholder="Enter Description">{{ old('description') }}</textarea>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-6">
                                        <b>Meta Title:</b>
                                        <input type="text" name="m_title" class="form-control"
                                            placeholder="Enter Meta Title" value="{{ old('m_title') }}">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <b>Meta Keyword:</b>
                                        <input type="text" name="m_keyword" class="form-control"
                                            placeholder="Enter Meta Keyword" value="{{ old('m_keyword') }}">
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <b>Meta Description:</b>
                                    <textarea name="m_description" class="form-control" id="meta_editor" rows="7"
                                        placeholder="Enter Mtea Description">{{ old('m_description') }}</textarea>
                                </div>

                                <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        CKEDITOR.replace('editor');
    </script>
    <script>
        CKEDITOR.replace('meta_editor');
    </script>
@endsection
