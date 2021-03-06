@extends('backend.layout.main')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/app-assets/css/vendors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/app-assets/vendors/css/extensions/toastr.css')}}">
    @endsection

@section('content')
    {{--@if(Session::has('success'))--}}
        {{--{{ Session::get('success') }}--}}


        {{--toastr.success("{{ Session::get('message') }}");--}}


    {{--@endif--}}

                <!-- Zero configuration table -->
                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="card-title">{{$title}}</h4>
                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-sm btn-primary pull-right" href="{{route('users.create')}}">Add New User</a>
                                        </div>
                                    </div>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    {{--<div class="heading-elements">--}}
                                        {{--<ul class="list-inline mb-0">--}}
                                            {{--<li><a data-action="collapse"><i class="ft-minus"></i></a></li>--}}
                                            {{--<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>--}}
                                            {{--<li><a data-action="expand"><i class="ft-maximize"></i></a></li>--}}
                                            {{--<li><a data-action="close"><i class="ft-x"></i></a></li>--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        {{--<p class="card-text">DataTables has most features enabled by default, so all you need--}}
                                            {{--to do to use it with your own ables is to call the construction--}}
                                            {{--function: $().DataTable();.</p>--}}
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($users as $user)
                                            <tr>

                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>
                                                    @foreach($user->roles as $r)
                                                        {{$r->display_name}}
                                                        @endforeach
                                                </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-primary" href="{{ route('users.edit', ['id' => $user->id]) }}"><i class="fas fa-pencil-alt" title="role"></i> </a>
                                                    {{--<a class="btn btn-danger" href="{{ route('users.show', ['id' => $user->id]) }}"><i class="far fa-trash-alt"></i></a>--}}
                                                    <form method="POST" action="{{ route('users.destroy', ['id' => $user->id]) }}">
                                                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th></th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

    @endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('/backend/app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
    <script type="text/javascript" src="{{asset('/backend/app-assets/vendors/js/charts/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('/backend/app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('/backend/app-assets/js/scripts/ui/breadcrumbs-with-stats.js')}}"></script>
    <script src="{{asset('/backend/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}" type="text/javascript"></script>
    <script src="{{asset('/backend/app-assets/vendors/js/extensions/toastr.min.js')}}" type="text/javascript"></script>
    <script>
        @if(Session::has('success'))


        toastr.success("{{ Session::get('success') }}");


        @endif
    </script>
@endsection