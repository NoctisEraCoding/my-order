@extends('admin.header')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Create your products</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- General Form Elements -->
                            <form method="POST" enctype="multipart/form-data" action="{{route('admin.saveCreateProduct')}}">
                                @csrf
                                <div class="row mt-4 mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="name" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="description" id="description" style="height: 100px" required></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="prize" class="col-sm-2 col-form-label">Prize</label>
                                    <div class="col-sm-10">
                                        <input type="number" step=".01" class="form-control" name="prize" id="prize" required value="0">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="cover" class="col-sm-2 col-form-label">
                                        Cover
                                    </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="cover" name="cover" accept="image/*" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="images" class="col-sm-2 col-form-label">
                                        Images
                                    </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" multiple type="file" id="images" name="images[]" accept="image/*" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="ingredients" class="col-sm-2 col-form-label">Ingredients</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" multiple aria-label="multiple select example" id="ingredients" name="ingredients[]">
                                            @foreach($ingredients as $ingredient)
                                                <option value="{{$ingredient->id}}">{{$ingredient->ingredient}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="allergens" class="col-sm-2 col-form-label">Allergens</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" multiple aria-label="multiple select example" id="allergens" name="allergens[]">
                                            @foreach($allergens as $allergen)
                                                <option value="{{$allergen->id}}">{{$allergen->allergen}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="allergens" class="col-sm-2 col-form-label">Category</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="select example" id="category" name="category">
                                            <option value="0">--</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Hidden</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="hidden" id="hidden1" value="true" required>
                                            <label class="form-check-label" for="gridRadios1">
                                                True
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="hidden" id="hidden2" value="false" checked required>
                                            <label class="form-check-label" for="gridRadios2">
                                                False
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Submit Button</label>
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
    </main
@endsection
