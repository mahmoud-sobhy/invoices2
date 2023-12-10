@extends('layouts.master')
@section('title', 'الأقسام')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> الأقسام </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                    الأقسام </span>
            </div>
        </div>
    </div>
    {{--  Added success message --}}
    @if (session()->has('add'))
        <div class="alert alert-success" role="alert">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>عمل رائع !</strong> {{ session('add') }}
        </div>
    @endif
    {{-- end success message --}}

    {{--  Deleted success message --}}
    @if (session()->has('deleted'))
        <div class="alert alert-danger" role="alert">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
            <span style='font-size:30px;'>&#128543;</span> {{ session('deleted') }}
        </div>
    @endif
    {{-- end success message --}}


    {{-- validations errors #1# --}}
    {{-- @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}

    {{-- validations errors #2# --}}
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-solid-danger mg-b-0" role="alert">
                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                    <span aria-hidden="true">&times;</span></button>
                <strong>{{ $error }}</strong>
            </div>
        @endforeach
    @endif
    {{-- end validations errors --}}



    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-xl-12">
            <div class="card mg-b-20">

                {{-- Add section --}}
                {{-- modal button --}}
                <div class="row row-sm p-3">
                    <div class="col-sm-6 col-md-4 col-xl-3">
                        <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                            data-toggle="modal" href="#modaldemo8"> إضافة قسم </a>
                    </div>
                    {{-- end modal button --}}
                    <!-- Modal effects -->
                    <div class="modal" id="modaldemo8">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title"> إضافة قسم </h6><button aria-label="Close" class="close"
                                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('sections.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="section_name" class="form-label">اسم القسم</label>
                                            <input class="form-control" name="section_name"
                                                value="{{ old('section_name') }}" id="section_name"
                                                placeholder="أدخل اسم القسم" type="text">
                                        </div>
                                        <div class="mb-3">
                                            <label for="section_notes"> ملاحظات </label>
                                            <textarea class="form-control" name="description" id="section_notes" placeholder="ملاحظات" rows="3">{{ old('description') }}</textarea>
                                        </div>
                                        <button class="btn ripple btn-primary" type="submit">تأكيد</button>
                                        <button class="btn ripple btn-secondary" data-dismiss="modal"
                                            type="button">إغلاق</button>
                                    </form>
                                </div>



                            </div>
                        </div>
                    </div>
                    <!-- End Modal effects-->


                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table key-buttons text-md-nowrap">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">#</th>
                                        <th class="border-bottom-0"> اسم القسم </th>
                                        <th class="border-bottom-0"> الوصف </th>
                                        <th class="border-bottom-0"> العمليات </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sections as $section)
                                        <tr>
                                            <td> {{ $loop->iteration }} </td>
                                            <td> {{ $section->section_name }} </td>
                                            <td> {{ $section->description }} </td>
                                            <td>
                                                <div class="row row-xs wd-xl-80p">
                                                    <div class="mg-t-10">
                                                        {{-- start modal button delete --}}
                                                        <a class="btn btn-danger btn-sm modal-effect"
                                                            data-effect="effect-scale" id=""
                                                            data-toggle="modal"
                                                            href="#modaldelete"> حذف </a>
                                                            {{-- End modal button delete --}}
                                                            {{-- Start modal effects delete --}}
                                                        <div class="modal" id="modaldelete">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content modal-content-demo">
                                                                    <div class="modal-header">
                                                                        <h6 class="modal-title"> حذف القسم </h6><button aria-label="Close" class="close"
                                                                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                            <p class="mb-4"> هل أنت متأكد من حذف القسم </p>
                                                                            <form action="{{ route('sections.destroy', $section->id) }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('delete')
                                                                                <button type="submit" class="btn btn-danger"> نعم .. أحذف الآن
                                                                                </button>
                                                                                <button class="btn ripple btn-secondary" data-dismiss="modal"
                                                                                type="button">إغلاق</button>
                                                                            </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- End modal effects delete --}}

                                        

                                                    </div>
                                                    <div class="mg-t-10">
                                                        {{-- Start modal button edit --}}
                                                        <a class="btn btn-dark btn-sm modal-effect"
                                                            data-effect="effect-scale" id="modal-link"
                                                            data-toggle="modal"
                                                            href="#modaledit"
                                                            data-id="{{ $section->id }}"
                                                            data-section_name="{{ $section->section_name }}"
                                                            data-description="{{ $section->description }}"
                                                            > تعديل القسم
                                                        </a>
                                                        {{-- End modal button edit --}}
                                                    </div>
                                                    
                                                    <div class="row row-sm p-3">
                                                        <!-- Start modal effects edit -->
                                                        <div class="modal" id="modaledit">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content modal-content-demo">
                                                                    <div class="modal-header">
                                                                        <h6 class="modal-title"> تعديل القسم </h6><button aria-label="Close" class="close"
                                                                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="{{ route('sections.update', $section->id) }}" method="POST">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div class="mb-3">
                                                                                <label for="section_name" class="form-label">اسم القسم</label>
                                                                                <input class="form-control" type="text" name="section_name"
                                                                                    value="" id="input_section_name">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="section_notes"> ملاحظات </label>
                                                                                <textarea class="form-control" name="description" id="input_section_description" rows="3"></textarea>
                                                                            </div>
                                                                            <button class="btn ripple btn-primary" type="submit">تعديل</button>
                                                                            <button class="btn ripple btn-secondary" data-dismiss="modal"
                                                                                type="button">إغلاق</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End modal effects edit -->
                                                    </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('js')
        <!-- Internal Data tables -->
        <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
        <!--Internal  Datatable js -->
        <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
        <!-- Internal Modal js-->
        <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
        {{-- Jquery --}}

        <script>
            $(document).on('click', '#modal-link', function (e){
                let id = $(this).data('section_name');
                let name = $(this).data('section_name');
                let description = $(this).data('description');

                // console.log(name)

                $('#input_section_name').val(name);
                $('#input_section_description').val(description);
            })
        </script>
    @endsection
