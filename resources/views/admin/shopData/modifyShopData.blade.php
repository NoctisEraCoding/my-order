@extends('admin.header')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Modify your data</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <!-- General Form Elements -->
                            <form method="POST" enctype="multipart/form-data" action="{{route('admin.saveModifyShopData')}}">
                                @csrf
                                <div class="row mt-4 mb-3">
                                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="phone" id="phone" required value="{{$shopData->phone}}">
                                    </div>
                                </div>

                                <div class="row mt-4 mb-3">
                                    <label for="workDay" class="col-sm-2 col-form-label">Work Day</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="workDay" id="workDay" required value="{{$shopData->workDay}}">
                                    </div>
                                </div>

                                <div class="row mt-4 mb-3">
                                    <label for="workHour" class="col-sm-2 col-form-label">Work Hour</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="workHour" id="workHour" required value="{{$shopData->workHour}}">
                                    </div>
                                </div>

                                <div class="row mt-4 mb-3">
                                    <label for="closedDay" class="col-sm-2 col-form-label">Closed Day</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="closedDay" id="closedDay" required value="{{$shopData->closedDay}}">
                                    </div>
                                </div>

                                <div class="row mt-4 mb-3">
                                    <label for="location" class="col-sm-2 col-form-label">Location</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="location" id="location" rows="5" required>{{$shopData->location}}</textarea>
                                    </div>
                                </div>

                                <div class="row mt-4 mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email" id="email" required value="{{$shopData->email}}">
                                    </div>
                                </div>

                                <div class="row mt-4 mb-3">
                                    <label for="googleMap" class="col-sm-2 col-form-label">Google Map</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="googleMap" id="googleMap" rows="5" required>{{$shopData->googleMap}}</textarea>
                                    </div>
                                </div>

                                <div class="row mt-4 mb-3">
                                    <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
                                    <div class="col-sm-10">
                                        <input type="url" class="form-control" name="twitter" id="twitter" required value="{{$shopData->twitter}}">
                                    </div>
                                </div>

                                <div class="row mt-4 mb-3">
                                    <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                                    <div class="col-sm-10">
                                        <input type="url" class="form-control" name="facebook" id="facebook" required value="{{$shopData->facebook}}">
                                    </div>
                                </div>

                                <div class="row mt-4 mb-3">
                                    <label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
                                    <div class="col-sm-10">
                                        <input type="url" class="form-control" name="instagram" id="instagram" required value="{{$shopData->instagram}}">
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
