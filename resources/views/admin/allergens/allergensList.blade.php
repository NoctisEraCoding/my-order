@extends('admin.header')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Allergens List</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('admin.createAllergen')}}"><input type="button" value="Insert new allergen" class="btn btn-success mt-4 mb-4"></a>
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
                                    @foreach($allergens as $allergen)
                                        <tr>
                                            <th scope="row">{{$allergen->id}}</th>
                                            <td>{{$allergen->allergen}}</td>
                                            <td>
                                                <div>
                                                    <a href="{{route('admin.modifyAllergen', [$allergen->id])}}"><input type="button" class="btn btn-sm btn-warning" value="Modify"></a>
                                                    <input type="button" class="btn btn-sm btn-danger" value="Delete" onclick="deleteAlert({{$allergen->id}}, '{{trim(preg_replace('/\s\s+/', ' ', $allergen->allergen))}}')">
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

    <div class="modal fade" id="modalDeleteAllergen" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Allergen Alert</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        Are you sure you want to delete the allergen
                    </p>
                    <p>
                        <b><span id="allergenName"></span></b>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="#" id="allergenId"><button type="button" class="btn btn-danger">Delete</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptPage')
    <script>
        function deleteAlert(idAllergen, nameAllergen){
            $('#allergenName').text(nameAllergen);
            $('#allergenId').attr("href", "{{route('admin.deleteAllergen')}}/"+idAllergen);
            new bootstrap.Modal(document.getElementById('modalDeleteAllergen')).show();
        }
    </script>
@endsection
