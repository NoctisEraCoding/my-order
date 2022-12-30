@extends('frontend.header')

@section('title')
    Product {{$product->name}} - My Order
@endsection

@section('content')
    <section id="menu" class="about mt-5">
        <div class="container-fluid mt-5">

            <div class="row mt-5">
                <div class="col-lg-3 offset-lg-2">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{asset($product->cover)}}" class="d-block w-100" alt="...">
                            </div>
                            @foreach($product->images as $image)
                                <div class="carousel-item">
                                    <img src="{{asset($image)}}" class="d-block w-100" alt="...">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <div class="col-lg-5 pt-4">
                    <div class="content text-center">
                        <h3 class="pb-3"><strong>{{$product->name}}</strong></h3>
                        <strong>
                            {!! nl2br(e($product->description)) !!}
                        </strong>

                        <div class="pt-3">
                            <p>
                                <b>Ingredients:</b>
                                @foreach($ingredients as $ingredient)
                                    {{$ingredient->ingredient}}
                                @endforeach
                            </p>
                        </div>

                        <div class="pt-3">
                            <p>
                                <b>Allergens:</b>
                                @foreach($allergens as $allergen)
                                    {{$allergen->allergen}}
                                @endforeach
                            </p>
                        </div>

                        <div class="pt-3">

                                <b>Price:</b>
                                <strong>{{$product->prize}}€</strong>

                        </div>

                        <div class="pt-5">
                            <a href="#book-a-table" class="book-a-table-btn scrollto"><i class="bi bi-cart-plus"></i> Add to order</a>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section><!-- End About Section -->
@endsection
