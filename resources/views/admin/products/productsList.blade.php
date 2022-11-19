@extends('admin.header')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Products List</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('admin.createProduct')}}"><input type="button" value="Insert new Product" class="btn btn-success mt-4 mb-4"></a>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Prize</th>
                                    <th scope="col">Cover</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Hidden</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <th scope="row">{{$product->id}}</th>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->description}}</td>
                                            <td>{{$product->prize}}</td>
                                            <td><img src="{{asset($product->cover)}}" width="75" height="75"></td>
                                            <td>@if(isset($product->category->name)) {{$product->category->name}} @endif</td>
                                            <td>{{$product->hidden?"true":"false"}}</td>
                                            <td>
                                                <div>
                                                    <a href="{{route('admin.modifyProduct', [$product->id])}}"><input type="button" class="btn btn-sm btn-warning" value="Modify"></a>
                                                </div>
                                                <div class="pt-2">
                                                    <input type="button" class="btn btn-sm btn-danger" value="Delete" onclick="deleteAlert({{$product->id}}, '{{$product->name}}')">
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>

    <div class="modal fade" id="modalDeleteProduct" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Product Alert</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        Are you sure you want to delete the product
                    </p>
                    <p>
                        <b><span id="productName"></span></b>
                    </p>
                    <p>
                        <b><small style="color:red">Deleting a product can lead to errors with orders. If you want users to no longer be able to buy it, it is better to hide it from the menu</small></b>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="#" id="productId"><button type="button" class="btn btn-danger">Delete</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptPage')
    <script>
        function deleteAlert(idProduct, nameProduct){
            $('#productName').text(nameProduct);
            $('#productId').attr("href", "{{route('admin.deleteProduct')}}/"+idProduct);
            new bootstrap.Modal(document.getElementById('modalDeleteProduct')).show();
        }
    </script>
@endsection
