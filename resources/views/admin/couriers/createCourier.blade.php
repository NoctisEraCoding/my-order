@extends('admin.header')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Add your courier</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- General Form Elements -->
                            <form method="POST" enctype="multipart/form-data" action="{{route('admin.saveCreateCourier')}}">
                                @csrf
                                <div class="row mt-4 mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="name" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="description" class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="number" step="1" class="form-control" name="phone" id="phone" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="avatar" class="col-sm-2 col-form-label">
                                        Avatar
                                    </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="avatar" name="avatar" accept="image/*" required>
                                    </div>
                                </div>

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
