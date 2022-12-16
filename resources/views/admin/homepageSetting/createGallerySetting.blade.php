@extends('admin.header')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Add new photo</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- General Form Elements -->
                            <form method="POST" enctype="multipart/form-data" action="{{route('admin.saveCreateGallerySetting')}}">
                                @csrf
                                <div class="row mt-4 mb-3">
                                    <label for="image" class="col-sm-2 col-form-label">
                                        Image
                                        <small>(leave blank if you won't change image)</small>
                                    </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="image" name="image" accept="image/*" required>
                                    </div>
                                </div>
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Show</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="show" id="show1" value="true" required>
                                            <label class="form-check-label" for="gridRadios1">
                                                True
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="show" id="show2" value="false" checked required>
                                            <label class="form-check-label" for="gridRadios2">
                                                False
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">End</label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Submit Form</button>
                                    </div>
                                </div>

                            </form><!-- End General Form Elements -->
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
