@extends('admin.header')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Add new allergen</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- General Form Elements -->
                            <form method="POST" enctype="multipart/form-data" action="{{route('admin.saveCreateAllergen')}}">
                                @csrf
                                <div class="row mt-4 mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">
                                        Allergens
                                        <p><small>(Enter multiple allergens separating them with commas)</small></p>
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="allergen" id="allergen" required>
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
