{{--
Dev Omar Shaheen
Devomar095@gmail.com
WhatsApp +972592554320
 --}}
@extends('admin.layouts.master')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
											<span class="card-icon">
												<i class="fa fa-flag"></i>
											</span>
                            <h3 class="card-label">{{ admin('Text Translations') }}</h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="kt-portlet kt-portlet--height-fluid">
                                    <div class="kt-portlet__head">
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title">

                                            </h3>
                                        </div>
                                    </div>
                                    <div class="kt-portlet__body">
                                        <input type="text" class="form-control mb-2" id="searchInput" onkeyup="searchDiv()" placeholder="{{admin('search')}}">
                                        <ul class="nav nav-tabs nav-fill" role="tablist">
                                            @foreach($folders as $key => $folder)
                                                <li class="nav-item">
                                                    <a class="nav-link @if($loop->first) active @endif" data-toggle="tab" href="#kt_tabs_{{$key}}">{{$key}}</a>
                                                </li>
                                            @endforeach
                                        </ul>

                                        <div class="tab-content" id="tabContent">
                                            @foreach($folders as $l_key => $folder)
                                                <div class="tab-pane @if($loop->first) active @endif" id="kt_tabs_{{$l_key}}" role="tabpanel">
                                                    <ul class="nav nav-tabs nav-fill" role="tablist">
                                                        @foreach($folder['files'] as $n_key => $file)
                                                            @if(str_replace('.php', '', basename($file)) !== 'validation')
                                                                <li class="nav-item">
                                                                    <a class="nav-link @if($loop->first) active @endif" data-toggle="tab" href="#kt_tabs_{{$l_key}}_{{$n_key}}">{{basename($file)}}</a>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                    <div class="tab-content">
                                                        @foreach($folder['files'] as $n_key => $file)
                                                            @if(str_replace('.php', '', basename($file)) !== 'validation')
                                                                @php
                                                                    $translations = \Illuminate\Support\Facades\File::getRequire($file);
                                                                @endphp
                                                                <div class="tab-pane @if($loop->first) active @endif" id="kt_tabs_{{$l_key}}_{{$n_key}}" role="tabpanel">
                                                                    <form class="kt-form kt-form--label-right" action="{{route('admin.text_translation.update', [$l_key, basename($file)])}}" method="post">
                                                                        @csrf
                                                                        <div class="kt-portlet__body">
                                                                            <div class="form-group row">
                                                                                @if(is_array($translations))
                                                                                    @foreach($translations as $t_key => $v_key)
                                                                                        <div class="col-lg-4 mt-4 trans-div">
                                                                                            <label>{{$t_key}}:</label>
                                                                                            <textarea name="{{$t_key}}" class="form-control">{{$v_key}}</textarea>
                                                                                        </div>
                                                                                    @endforeach
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        <div class="kt-portlet__foot">
                                                                            <div class="kt-form__actions">
                                                                                <div class="row">
                                                                                    <div class="col-lg-12">
                                                                                        <button type="submit" class="btn btn-primary">{{admin('Submit')}}</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>


@endsection

@section('scripts')
    <script>
        function searchDiv() {
            var input, filter, tabs, transDivs, transDiv, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value;
            tabs = document.getElementById("tabContent");
            transDivs = tabs.getElementsByClassName("trans-div");
            for (i = 0; i < transDivs.length; i++) {
                transDiv = transDivs[i].getElementsByTagName("textarea")[0];
                if (transDiv) {
                    txtValue = transDiv.textContent || transDiv.innerText;
                    if (txtValue.indexOf(filter) > -1) {
                        transDivs[i].style.display = "";
                    } else {
                        transDivs[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endsection
