@extends('admin.header')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Homepage Customize</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                <h4 class="mx-2 mt-4 pb-2">Slider</h4>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Cover</th>
                                    <th scope="col">Show</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($settings as $setting)
                                        <tr>
                                            <th scope="row">{{$setting->id}}</th>
                                            <td>{{$setting->title}}</td>
                                            <td>{{substr($setting->description, 0, 100)}}</td>
                                            <td><img src="{{asset($setting->image)}}" width="75" height="75"></td>
                                            <td>{{$setting->show?"true":"false"}}</td>
                                            <td>
                                                <div>
                                                    <a href="{{route('admin.modifyHomepageSetting', [$setting->id])}}"><input type="button" class="btn btn-sm btn-warning" value="Modify"></a>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                <h4 class="mx-2 mt-4 pb-2">About section</h4>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Video</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">{{$about->id}}</th>
                                        <td>{{$about->title}}</td>
                                        <td>{{substr($about->description, 0, 40)}}</td>
                                        <td><img src="{{asset($about->image)}}" width="75" height="75"></td>
                                        <td><a href="{{$about->video}}">{{$about->video}}</a></td>
                                        <td>
                                            <div>
                                                <a href="{{route('admin.modifyAboutpageSetting')}}"><input type="button" class="btn btn-sm btn-warning" value="Modify"></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('admin.createGallerySetting')}}"><input type="button" value="Insert new photo" class="btn btn-success mt-4 mb-4"></a>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                <h4 class="mx-2 pb-2">Gallery</h4>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Show</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($gallery as $photo)
                                    <tr>
                                        <th scope="row">{{$photo->id}}</th>
                                        <td><img src="{{asset($photo->image)}}" width="75" height="75"></td>
                                        <td>{{$photo->show?"true":"false"}}</td>
                                        <td>
                                            <div>
                                                <a href="{{route('admin.modifyGallerySetting', [$photo->id])}}"><input type="button" class="btn btn-sm btn-warning" value="Modify"></a>
                                            </div>
                                            <div class="pt-2">
                                                <input type="button" class="btn btn-sm btn-danger" value="Delete" onclick="deleteAlert({{$photo->id}})">
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

    <div class="modal fade" id="modalDeletePhoto" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete photo Alert</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        Are you sure you want to delete the photo?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="#" id="photoId"><button type="button" class="btn btn-danger">Delete</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptPage')
    <script>
        function deleteAlert(idPhoto){
            $('#photoId').attr("href", "{{route('admin.deleteGallerySetting')}}/"+idPhoto);
            new bootstrap.Modal(document.getElementById('modalDeletePhoto')).show();
        }
    </script>
@endsection
