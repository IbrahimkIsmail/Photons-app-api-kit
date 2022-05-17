@extends('admin.layout.master')
@section('pageTitle')
    {{admin('Orders Management')}}
@endsection
@section('styles')
    <link href="{{asset('/adminAssets/plugins/custom/datatables/datatables.bundle.'.direction('.').'css')}}"
          rel="stylesheet" type="text/css"/>
@endsection
@section('content')

    <div class="container-fluid">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-body">
                <div class="d-flex">
                    <!--begin: Pic-->
                    <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                        <div class="symbol symbol-40 symbol-lg-40">
                            <img alt="Pic" src="https://al3dal.com/uploads/placeholder/user_avatar.png">
                        </div>
                        <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
                            <span class="font-size-h3 symbol-label font-weight-boldest"></span>
                        </div>
                    </div>
                    <!--end: Pic-->
                    <!--begin: Info-->
                    <div class="flex-grow-0">
                        <!--begin: Title-->
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <div class="mr-3">
                                <!--begin::Name-->
                                <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{ $data->name }}
                                </a>
                                <!--end::Name-->
                            </div>
                        </div>
                        <!--end: Title-->

                    </div>
                    <!--end: Info-->

                </div>
                <div class="separator separator-solid my-7"></div>
                <!--begin: Items-->
                <div class="d-flex align-items-center flex-wrap">
                    <!--begin: Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-1 col-lg-3">
												<span class="mr-4">
													<i class="flaticon-technology icon-2x text-muted font-weight-bold"></i>
												</span>
                        <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm">{{ admin('Message') }}</span>
                            <span class="font-weight-bolder font-size-h5">
								<span class="text-dark-50 font-weight-bold">{{ $data->content }}
                                </span>

                            </span>

                        </div>
                        @if($data->image)
                            <a href="#"  id="pop">
                                <img src="{{asset($data->image)}}" width="50px" height="50px" class="img-fluid img"   alt="">
                            </a>
                        @endif
                    </div>

                </div>
                <!--begin: Items-->


                <!--begin: Items-->
                <div class="separator separator-solid my-7"></div>
                <!--begin: Items-->
                <div class="d-flex align-items-center flex-wrap">
                @if($data->reply)
                    <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1 col-lg-3">
												<span class="mr-4">
													<i class="flaticon-technology icon-2x text-muted font-weight-bold"></i>
												</span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">الرد</span>
                                <span class="font-weight-bolder font-size-h5">
													<span class="text-dark-50 font-weight-bold">{{ $data->reply }}
                                </span></span></div>
                        </div>
                        <!--end: Item-->
                    @else
                        <form action="{{route('admin.adminContacts.reply',$data->id)}}" method="post">
                            @csrf

                            <div class="col-lg-6">
                                <label class="">{{admin('Reply')}}</label>
                                <span style="color: red;"> * </span>
                                <div class="input-group">
                                                <textarea class="form-control summernote" name="reply" rows="8"
                                                          cols="150"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger m-5">{{admin('send reply')}}</button>
                        </form>
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1 col-lg-3">

                        </div>


                    @endif
                </div>
                <!--begin: Items-->
            </div>
        </div>
        <!--end::Card-->
        <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close float-lef" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">{{admin('Close')}}</span></button>
                        <h4 class="modal-title" id="myModalLabel">{{admin('Image preview')}}</h4>
                    </div>
                    <div class="modal-body">
                        <img src="" id="imagepreview" width="100%" height="100%" class="img-fluid" >
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{admin('Close')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="/adminAssets/plugins/custom/datatables/datatables.bundle.js" type="text/javascript"></script>


    <script>
        $("#pop").on("click", function() {
            $('#imagepreview').attr('src', $(this).children('img').first().attr('src')); // here asign the image to the modal when the user click the enlarge link
            $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
        });
    </script>
@endsection
