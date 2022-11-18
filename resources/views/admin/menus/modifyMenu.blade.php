@extends('admin.header')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Modify your menu</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$menu->name}}</h5>
                            <!-- General Form Elements -->
                            <form method="POST" enctype="multipart/form-data" action="{{route('admin.saveModifyMenu', [$menu->id])}}">
                                @csrf
                                <div class="row mt-4 mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="name" required value="{{$menu->name}}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="description" id="description" style="height: 100px" required>{{$menu->description}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="prize" class="col-sm-2 col-form-label">Prize</label>
                                    <div class="col-sm-5">
                                        <input type="number" step=".01" class="form-control" name="prize" id="prize" required value="{{$menu->prize}}">
                                    </div>
                                    <label for="prize" class="col-sm-2 offset-sm-1 col-form-label">Suggested Products Prize</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="totalPrize" value="0" readonly>
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
                                    <label for="ingredients" class="col-sm-2 col-form-label">Products</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" multiple aria-label="multiple select example" id="products" name="products[]" onchange="UpdatePrize()">
                                            @foreach($products as $product)
                                                @if(in_array($product->id,$menu->productsOnMenu))
                                                    <option value="{{$product->id}}" selected>{{$product->name}}</option>
                                                @else
                                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">From</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" min="{{date('Y-m-d')}}" name="from" id="from" value="{{$menu->from}}">
                                    </div>
                                    <label for="inputDate" class="col-sm-1 offset-sm-1 col-form-label">To</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" min="{{date('Y-m-d')}}" name="to" id="to" value="{{$menu->to}}">
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

@section('scriptPage')
    <script>
        let prizes = {!! json_encode($prizes) !!};
        let totalPrize = 0;
        function UpdatePrize() {
            totalPrize = 0;
            let productsSelected = $('#products').val();
            productsSelected.forEach(function(item){
                totalPrize = totalPrize + prizes[item];
            });
            $('#totalPrize').val(totalPrize);
        }

        UpdatePrize();
    </script>
@endsection
