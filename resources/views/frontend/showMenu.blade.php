@extends('frontend.header')

@section('title')
    Menu {{$menu->name}} - My Order
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
                                <img src="{{asset($menu->cover)}}" class="d-block w-100" alt="...">
                            </div>
                            @foreach($menu->menuProducts as $p)
                                <div class="carousel-item">
                                    <img src="{{asset($p->product->cover)}}" class="d-block w-100" alt="...">
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
                        <h3 class="pb-3"><strong>{{$menu->name}}</strong></h3>
                        <strong>
                            {!! nl2br(e($menu->description)) !!}
                        </strong>

                        <div class="pt-3">
                            @foreach($menu->menuProducts as $p)
                                <p>
                                    <a href="{{route('frontend.showProduct', [$p->product->id])}}">{{$p->product->name}}</a>
                                </p>
                            @endforeach
                        </div>

                        <div class="pt-3">
                            <b>Price:</b>
                            <strong>{{$menu->prize}}€</strong>
                        </div>

                        <div class="pt-5">
                            <button class="btn book-a-table-btn" onclick="addToCart()"><i class="bi bi-cart-plus"></i> Add to order</button>
                        </div>
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

@section('scriptPage')
    <script>
        function addToCart(){
            $.post('{{route("frontend.addToCart")}}',
            {
                menu: {{$menu->id}},
                _token: "{{csrf_token()}}"
            })
            .done(function() {
                $('#alertSuccess').addClass('show');
                setTimeout(function () {
                    $('#alertSuccess').removeClass('show');
                }, 2000);
            })
            .fail(function(error) {
                let errorMessage = 'An error occurred, please retry';
                if(error.status === 401){
                    errorMessage = 'You need to login before you can add products to your cart';
                }
                $('#alertError').addClass('show');
                $('#errorMessage').text(errorMessage);
                setTimeout(function () {
                    $('#alertError').removeClass('show');
                }, 2000);
            });
        }
    </script>
@endsection
