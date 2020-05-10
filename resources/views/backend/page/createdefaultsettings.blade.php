@extends('backend.master')
@section('content')
    <div class="app-main" id="main">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            <!-- begin row -->
            <div class="row">
                <div class="col-md-12 m-b-30">
                    <!-- begin page title -->
                    <div class="d-block d-sm-flex flex-nowrap align-items-center">
                        <div class="page-title mb-2 mb-sm-0">
                            <h1>Page Settings</h1>
                        </div>
                        <div class="ml-auto d-flex align-items-center">
                            <nav>
                                <ol class="breadcrumb p-0 m-b-0">
                                    <li class="breadcrumb-item">
                                        <a href="index-2.html"><i class="ti ti-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        Forms
                                    </li>
                                    <li class="breadcrumb-item active text-primary" aria-current="page">Form Layouts
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- end page title -->
                </div>
            </div>
            <!-- end row -->
            <!-- begin row -->
            <div class="row justify-content-center">
                <div class="col-md-12 mt-3">
                    <div class="card card-statistics p-3">
                        <div class="card-header">
                            <div class="card-heading">
                                <h4 class="card-title">Default Settings Create</h4>
                            </div>
                        </div>
                        <div class="card-body">
                           <div class="row">
                               <div class="col-md-6">
                                  <div>
                                      <h5>Logo Update</h5>
                                      <form action="{{route('settings.logo.store')}}" method="POST" enctype="multipart/form-data">
                                          @csrf
                                          <div class="form-group">
                                              <label>Product Image</label>
                                              <div class="custom-file">
                                                  <input type="file" class="custom-file-input" name="logo" id="product_img">
                                                  <label class="custom-file-label" id="product_img_label" for="">Choose logo</label>
                                              </div>
                                              @if($errors->has('logo'))
                                                  <div class="error invalid-feedback d-block">{{$errors->first('logo')}}</div>
                                              @endif
                                          </div>

                                          <button type="submit" class="btn btn-primary">Submit</button>
                                      </form>
                                  </div>
                                   <hr>
                                   <div>
                                       <h5>Hero Image section</h5>
                                       <form action="{{route('settings.hero.store')}}" method="POST" enctype="multipart/form-data">
                                           @csrf
                                           <div class="form-group">
                                               <label>Title Text</label>
                                               <input type="text" class="form-control" name="title" placeholder="Hero Title" value="{{$settings->where('section_id',2)->where('name','title')->pluck('value')->first()}}">
                                               @if($errors->has('title'))
                                                   <div class="error invalid-feedback d-block">{{$errors->first('title')}}</div>
                                               @endif
                                           </div>
                                           <div class="form-group">
                                               <label>Hero Image</label>
                                               <div class="custom-file">
                                                   <input type="file" class="custom-file-input" name="hero" id="hero">
                                                   <label class="custom-file-label" id="hero_label" for="">Choose Hero Image</label>
                                               </div>
                                               @if($errors->has('hero'))
                                                   <div class="error invalid-feedback d-block">{{$errors->first('hero')}}</div>
                                               @endif
                                           </div>
                                           <div class="form-group">
                                               <label>Hero Description</label>
                                               <textarea type="text" class="form-control" name="description" rows="5" placeholder="Hero description">
                                                  {{$settings->where('section_id',2)->where('name','description')->pluck('value')->first()}}
                                               </textarea>
                                               @if($errors->has('description'))
                                                   <div class="error invalid-feedback d-block">{{$errors->first('description')}}</div>
                                               @endif
                                           </div>
                                           <button type="submit" class="btn btn-primary">Submit</button>
                                       </form>
                                   </div>
                                   <hr>
                                   <div>
                                       <h5>About Company section</h5>
                                       <form action="{{route('settings.company.store')}}" method="POST" enctype="multipart/form-data">
                                           @csrf
                                           <div class="form-group">
                                               <label>Hero Image</label>
                                               <div class="custom-file">
                                                   <input type="file" class="custom-file-input" name="image" id="company">
                                                   <label class="custom-file-label" id="company_label" for="">Choose About Company Photo</label>
                                               </div>
                                               @if($errors->has('image'))
                                                   <div class="error invalid-feedback d-block">{{$errors->first('image')}}</div>
                                               @endif
                                           </div>
                                           <div class="form-group">
                                               <label>Description</label>
                                               <textarea type="text" class="form-control" name="description" rows="7" placeholder="About Company description">
                                                    {{$settings->where('section_id',3)->where('name','description')->pluck('value')->first()}}
                                               </textarea>
                                               @if($errors->has('description'))
                                                   <div class="error invalid-feedback d-block">{{$errors->first('description')->first()}}</div>
                                               @endif
                                           </div>
                                           <div class="form-group">
                                               <label>Mission</label>
                                               <textarea type="text" class="form-control" name="mission" rows="3" placeholder="Mission">
                                                    {{$settings->where('section_id',3)->where('name','mission')->pluck('value')->first()}}
                                               </textarea>
                                               @if($errors->has('mission'))
                                                   <div class="error invalid-feedback d-block">{{$errors->first('mission')}}</div>
                                               @endif
                                           </div>
                                           <div class="form-group">
                                               <label>Vision</label>
                                               <textarea type="text" class="form-control" name="vision" rows="3" placeholder="Vision">
                                                    {{$settings->where('section_id',3)->where('name','vision')->pluck('value')->first()}}
                                               </textarea>
                                               @if($errors->has('vision'))
                                                   <div class="error invalid-feedback d-block">{{$errors->first('vision')}}</div>
                                               @endif
                                           </div>
                                           <button type="submit" class="btn btn-primary">Submit</button>
                                       </form>
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div>
                                       <h5>Our Projects</h5>
                                       <form action="{{route('settings.projects.store')}}" method="POST">
                                           @csrf
                                           <div class="form-group">
                                               <label>Description</label>
                                               <textarea type="text" class="form-control" name="description" rows="4" placeholder="description">
                                                    {{$settings->where('section_id',4)->where('name','description')->pluck('value')->first()}}
                                               </textarea>
                                               @if($errors->has('description'))
                                                   <div class="error invalid-feedback d-block">{{$errors->first('description')}}</div>
                                               @endif
                                           </div>
                                           <button type="submit" class="btn btn-primary">Submit</button>
                                       </form>
                                   </div>
                                   <hr>
                                   <div>
                                       <h5>Services</h5>
                                       <form action="{{route('settings.services.store')}}" method="POST">
                                           @csrf
                                           <div class="form-group">
                                               <label>Description</label>
                                               <textarea type="text" class="form-control" name="description" rows="4" placeholder="description">
                                                    {{$settings->where('section_id',5)->where('name','description')->pluck('value')->first()}}
                                               </textarea>
                                               @if($errors->has('description'))
                                                   <div class="error invalid-feedback d-block">{{$errors->first('description')}}</div>
                                               @endif
                                           </div>
                                           <button type="submit" class="btn btn-primary">Submit</button>
                                       </form>
                                   </div>
                                   <hr>
                                   <div>
                                       <h5>Meet Team</h5>
                                       <form action="{{route('settings.team.store')}}" method="POST">
                                           @csrf
                                           <div class="form-group">
                                               <label>Description</label>
                                               <textarea type="text" class="form-control" name="description" rows="4" placeholder="description">
                                                    {{$settings->where('section_id',6)->where('name','description')->pluck('value')->first()}}
                                               </textarea>
                                               @if($errors->has('description'))
                                                   <div class="error invalid-feedback d-block">{{$errors->first('description')}}</div>
                                               @endif
                                           </div>
                                           <button type="submit" class="btn btn-primary">Submit</button>
                                       </form>
                                   </div>
                                   <hr>
                                   <div>
                                       <h5>Reviews section</h5>
                                       <form action="{{route('settings.reviews.store')}}" method="POST" enctype="multipart/form-data">
                                           @csrf
                                           <div class="form-group">
                                               <label>Reviews Background Photo</label>
                                               <div class="custom-file">
                                                   <input type="file" class="custom-file-input" name="image" id="review">
                                                   <label class="custom-file-label" id="review_label" for="">Choose Reviews Background Photo</label>
                                               </div>
                                               @if($errors->has('image'))
                                                   <div class="error invalid-feedback d-block">{{$errors->first('image')}}</div>
                                               @endif
                                           </div>
                                           <button type="submit" class="btn btn-primary">Submit</button>
                                       </form>
                                   </div>
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
    <script>
        window.onload = function () {
            $('#product_img').change(function (e) {
                var fileName = e.target.files[0].name;
                $('#product_img_label').html(fileName);
            });

            $('#hero').change(function (e) {
                var fileName = e.target.files[0].name;
                $('#hero_label').html(fileName);
            });

            $('#company').change(function (e) {
                var fileName = e.target.files[0].name;
                $('#company_label').html(fileName);
            });

            $('#review').change(function (e) {
                var fileName = e.target.files[0].name;
                $('#review_label').html(fileName);
            });
        }
    </script>
@endsection
