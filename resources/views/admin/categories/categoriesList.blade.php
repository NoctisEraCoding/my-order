@extends('admin.header')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Categories List</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('admin.createCategory')}}"><input type="button" value="Insert new category" class="btn btn-success mt-4 mb-4"></a>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Show Homepage</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <th scope="row">{{$category->id}}</th>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->showHomepage}}</td>
                                            <td>
                                                <div>
                                                    <a href="{{route('admin.modifyCategory', [$category->id])}}"><input type="button" class="btn btn-sm btn-warning" value="Modify"></a>
                                                </div>
                                                <div class="pt-2">
                                                    <input type="button" class="btn btn-sm btn-danger" value="Delete" onclick="deleteAlert({{$category->id}}, '{{trim(preg_replace('/\s\s+/', ' ', $category->name))}}')">
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

    <div class="modal fade" id="modalDeleteCategory" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Category Alert</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        Are you sure you want to delete the category
                    </p>
                    <p>
                        <b><span id="categoryName"></span></b>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="#" id="categoryId"><button type="button" class="btn btn-danger">Delete</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptPage')
    <script>
        function deleteAlert(idCategory, nameCategory){
            $('#categoryName').text(nameCategory);
            $('#categoryId').attr("href", "{{route('admin.deleteCategory')}}/"+idCategory);
            new bootstrap.Modal(document.getElementById('modalDeleteCategory')).show();
        }
    </script>
@endsection
