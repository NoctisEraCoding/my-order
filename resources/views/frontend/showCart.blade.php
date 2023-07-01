@extends('frontend.header')

@section('title')
    Your Order - My Order
@endsection

@section('content')
    <section id="menu" class="about mt-5">
        <div class="container-fluid mt-5">

            <div class="row mt-5">
                <div class="col-lg-8">
                    <div class="row">
                    @foreach($menus as $menu)
                        <div class="col-lg-4 pt-4">
                            <div class="content text-center">
                                <h4 class="pb-3">
                                    <strong>{{$menu->name}}</strong>
                                    <p>
                                        <b>Price:</b>
                                        <strong>{{$menu->prize}}€</strong>
                                    </p>
                                </h4>

                                <div>
                                    <button class="btn book-a-table-btn btn-sm" onclick="removeFromCart()"><i class="bi bi-cart-x"></i> Remove</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @foreach($products as $product)
                        <div class="col-lg-4 pt-4">
                            <div class="content text-center">
                                <h4 class="pb-3">
                                    <strong>{{$product->name}}</strong>
                                    <p>
                                        <b>Price:</b>
                                        <strong>{{$product->prize}}€</strong>
                                    </p>
                                </h4>

                                <div>
                                    <button class="btn book-a-table-btn" onclick="removeFromCart()"><i class="bi bi-cart-x"></i> Remove</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End About Section -->

    <div id="alertSuccess" class="col-lg-2 alert alert-success d-flex align-items-center alert-dismissible fade position-absolute bottom-0 end-0" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
            Menu added to cart
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div id="alertError" class="alert alert-danger d-flex align-items-center alert-dismissible fade position-absolute bottom-0 end-0" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div id="errorMessage">
            An error occurred, please retry
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endsection


