@extends('admin.header')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Modify your about section</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <!-- General Form Elements -->
                            <form method="POST" enctype="multipart/form-data" action="{{route('admin.saveModifyAboutpageSetting')}}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="title" id="title" required value="{{$about->title}}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="description" id="description" rows="10" style="">{{$about->description}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="image" class="col-sm-2 col-form-label">
                                        Cover image
                                        <small>(leave blank if you won't change cover image)</small>
                                    </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="image" name="image" accept="image/*">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="video" class="col-sm-2 col-form-label">Video</label>
                                    <div class="col-sm-10">
                                        <input type="url" class="form-control" name="video" id="video" required value="{{$about->video}}">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">End</label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Save Modify</button>
                                    </div>
                                </div>

                            </form><!-- End General Form Elements -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main
@endsection
