@extends('admin.header')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Modify your products</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>

                            <!-- General Form Elements -->
                            <form method="POST" enctype="multipart/form-data" action="{{route('admin.saveModifyProduct', [$product->id])}}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="name" required value="{{$product->name}}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="description" id="description" style="height: 100px">{{$product->description}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="prize" class="col-sm-2 col-form-label">Prize</label>
                                    <div class="col-sm-10">
                                        <input type="number" step=".01" class="form-control" name="prize" id="prize" required value="{{$product->prize}}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="cover" class="col-sm-2 col-form-label">
                                        Cover
                                        <small>(leave blank if you won't change cover image)</small>
                                    </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="cover" name="cover" accept="image/*">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="images" class="col-sm-2 col-form-label">
                                        Images
                                        <small>(leave blank if you won't change images. If you change you must reupload all the images)</small>
                                    </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" multiple type="file" id="images" name="images[]" accept="image/*">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="ingredients" class="col-sm-2 col-form-label">Ingredients</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" multiple aria-label="multiple select example" id="ingredients" name="ingredients[]">
                                            @foreach($ingredients as $ingredient)
                                                @if(in_array($ingredient->id,$product->ingredients))
                                                    <option value="{{$ingredient->id}}" selected>{{$ingredient->ingredient}}</option>
                                                @else
                                                    <option value="{{$ingredient->id}}">{{$ingredient->ingredient}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="allergens" class="col-sm-2 col-form-label">Allergens</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" multiple aria-label="multiple select example" id="allergens" name="allergens[]">
                                            @foreach($allergens as $allergen)
                                                @if(in_array($allergen->id,$product->allergens))
                                                    <option value="{{$allergen->id}}" selected>{{$allergen->allergen}}</option>
                                                @else
                                                    <option value="{{$allergen->id}}">{{$allergen->allergen}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Hidden</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="hidden" id="hidden1" value="true" @if($product->hidden) checked @endif>
                                            <label class="form-check-label" for="gridRadios1">
                                                True
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="hidden" id="hidden2" value="false" @if(!$product->hidden) checked @endif>
                                            <label class="form-check-label" for="gridRadios2">
                                                False
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>

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
