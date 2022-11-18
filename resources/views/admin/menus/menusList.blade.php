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
                            <a href="{{route('admin.createMenu')}}"><input type="button" value="Create new Menu" class="btn btn-success mt-4 mb-4"></a>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Total Prize</th>
                                    <th scope="col">Cover</th>
                                    <th scope="col">From</th>
                                    <th scope="col">To</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($menus as $menu)
                                        <tr>
                                            <th scope="row">{{$menu->id}}</th>
                                            <td>{{$menu->name}}</td>
                                            <td>{{$menu->description}}</td>
                                            <td>{{$menu->prize}}</td>
                                            <td><img src="{{asset($menu->cover)}}" width="75" height="75"></td>
                                            <td>{{$menu->from}}</td>
                                            <td>{{$menu->to}}</td>
                                            <td>
                                                <div>
                                                    <a href="{{route('admin.modifyMenu', [$menu->id])}}"><input type="button" class="btn btn-sm btn-warning" value="Modify"></a>
                                                </div>
                                                <div class="pt-2">
                                                    <input type="button" class="btn btn-sm btn-danger" value="Delete" onclick="deleteAlert({{$menu->id}}, '{{$menu->name}}')">
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

    <div class="modal fade" id="modalDeleteMenu" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Menu Alert</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        Are you sure you want to delete the menus
                    </p>
                    <p>
                        <b><span id="menuName"></span></b>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="#" id="menuId"><button type="button" class="btn btn-danger">Delete</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptPage')
    <script>
        function deleteAlert(idMenu, nameMenu){
            $('#menuName').text(nameMenu);
            $('#menuId').attr("href", "{{route('admin.deleteMenu')}}/"+idMenu);
            new bootstrap.Modal(document.getElementById('modalDeleteMenu')).show();
        }
    </script>
@endsection
