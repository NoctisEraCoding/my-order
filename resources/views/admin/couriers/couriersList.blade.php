@extends('admin.header')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Menus List</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('admin.createCourier')}}"><input type="button" value="Add new courier" class="btn btn-success mt-4 mb-4"></a>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Avatar</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($couriers as $courier)
                                        <tr>
                                            <th scope="row">{{$courier->id}}</th>
                                            <td>{{$courier->name}}</td>
                                            <td><img src="{{asset($courier->avatar)}}" width="75" height="75"></td>
                                            <td>{{$courier->phone}}</td>
                                            <td>
                                                <div>
                                                    <a href="{{route('admin.modifyCourier', [$courier->id])}}"><input type="button" class="btn btn-sm btn-warning" value="Modify"></a>
                                                </div>
                                                <div class="pt-2">
                                                    <input type="button" class="btn btn-sm btn-danger" value="Delete" onclick="deleteAlert({{$courier->id}}, '{{trim(preg_replace('/\s\s+/', ' ', $courier->name))}}')">
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

    <div class="modal fade" id="modalDeleteCourier" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Courier Alert</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        Are you sure you want to delete the courier
                    </p>
                    <p>
                        <b><span id="courierName"></span></b>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="#" id="courierId"><button type="button" class="btn btn-danger">Delete</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptPage')
    <script>
        function deleteAlert(idMenu, nameCourier){
            $('#courierName').text(nameCourier);
            $('#courierId').attr("href", "{{route('admin.deleteCourier')}}/"+idMenu);
            new bootstrap.Modal(document.getElementById('modalDeleteCourier')).show();
        }
    </script>
@endsection
