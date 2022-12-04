@extends('admin.header')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Homepage Slider List</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
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
        </section>

    </main>
@endsection
