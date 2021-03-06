@extends('backend.layout.main')

@section('content')


    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-content collpase collapse show" style="">
                        <div class="card-body">

                            <form method="post" action="{{ route('users.store') }}"  class="form form-horizontal">
                                <div class="form-body">
                                    <h4 class="form-section"><i class="ft-user"></i>{{$title}}</h4>
                                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} row">
                                        <label class="col-md-3 label-control" for="projectinput1">Name</label>
                                        <div class="col-md-9">
                                            <input type="text" id="projectinput1" value="{{ Request::old('name') ?: '' }}" class="form-control" placeholder="Name" name="name">
                                            @if ($errors->has('name'))
                                                <span class="help-block">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} row">
                                        <label class="col-md-3 label-control" for="projectinput2">Email</label>
                                        <div class="col-md-9">
                                            <input type="email" id="projectinput2" value="{{ Request::old('email') ?: '' }}" class="form-control" placeholder="Email" name="email">
                                            @if ($errors->has('email'))
                                                <span class="help-block">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} row">
                                        <label class="col-md-3 label-control" for="projectinput2">Password</label>
                                        <div class="col-md-9">
                                            <input type="password" value="{{ Request::old('password') ?: '' }}" id="projectinput2" class="form-control" placeholder="password" name="password">
                                            @if ($errors->has('password'))
                                                <span class="help-block">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->has('confirm_password') ? ' has-error' : '' }} row">
                                        <label class="col-md-3 label-control" for="projectinput3">Confirm Password</label>
                                        <div class="col-md-9">
                                            <input type="password" value="{{ Request::old('confirm_password') ?: '' }}" id="projectinput3" class="form-control" placeholder="Confirm Password" name="confirm_password">
                                            @if ($errors->has('confirm_password'))
                                                <span class="help-block">{{ $errors->first('confirm_password') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('role_id') ? ' has-error' : '' }} row">
                                        <label class="col-md-3 label-control" for="projectinput7">Role</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="projectinput7" name="role_id">
                                                @if(count($roles)) @foreach($roles as $row)
                                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach @endif
                                            </select>
                                            @if ($errors->has('role_id'))
                                                <span class="help-block">{{ $errors->first('role_id') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="form-actions">
                                    <button type="button" href="{{route('users.index')}}" class="btn btn-warning mr-1">
                                        <i class="ft-x"></i> Cancel
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-check-square-o"></i> Save
                                    </button>
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

