@extends('admin.header')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Ingredients List</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('admin.createIngredient')}}"><input type="button" value="Insert new ingredient" class="btn btn-success mt-4 mb-4"></a>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($ingredients as $ingredient)
                                        <tr>
                                            <th scope="row">{{$ingredient->id}}</th>
                                            <td>{{$ingredient->ingredient}}</td>
                                            <td>
                                                <div>
                                                    <a href="{{route('admin.modifyIngredient', [$ingredient->id])}}"><input type="button" class="btn btn-sm btn-warning" value="Modify"></a>
                                                    <input type="button" class="btn btn-sm btn-danger" value="Delete" onclick="deleteAlert({{$ingredient->id}}, '{{trim(preg_replace('/\s\s+/', ' ', $ingredient->ingredient))}}')">
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

    <div class="modal fade" id="modalDeleteIngredient" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Ingredient Alert</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        Are you sure you want to delete the ingredient
                    </p>
                    <p>
                        <b><span id="ingredientName"></span></b>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="#" id="ingredientId"><button type="button" class="btn btn-danger">Delete</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptPage')
    <script>
        function deleteAlert(idIngredient, nameIngredient){
            $('#ingredientName').text(nameIngredient);
            $('#ingredientId').attr("href", "{{route('admin.deleteIngredient')}}/"+idIngredient);
            new bootstrap.Modal(document.getElementById('modalDeleteIngredient')).show();
        }
    </script>
@endsection
