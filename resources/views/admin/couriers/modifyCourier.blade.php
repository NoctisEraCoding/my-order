@extends('admin.header')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Modify your courier</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$courier->name}}</h5>
                            <!-- General Form Elements -->
                            <form method="POST" enctype="multipart/form-data" action="{{route('admin.saveModifyCourier', [$courier->id])}}">
                                @csrf
                                <div class="row mt-4 mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="name" required value="{{$courier->name}}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="description" class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="number" step="1" class="form-control" name="phone" id="phone" required value="{{$courier->phone}}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="avatar" class="col-sm-2 col-form-label">
                                        Avatar
                                        <small>(leave blank if you won't change avatar image)</small>
                                    </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="avatar" name="avatar" accept="image/*">
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
