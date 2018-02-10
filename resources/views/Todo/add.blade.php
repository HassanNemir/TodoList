@extends('layouts.app')

@section('content')
<?php use Illuminate\Http\Request;
?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New Task</div>

                    <div class="panel-body">
                        @if (isset($title))
                      {{$title}}
                        @endif

                        <form class="form-horizontal" method="POST" action="/add">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Task Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <input id="password" type="text" class="form-control" name="desc" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Deadline</label>

                                <div class="col-md-6">
                                    <input id="password" type="date" class="form-control" name="dead" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-4 control-label">Captcha</label>
                                <div class="col-md-6">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <p> {{print_r(captcha_img())}}    </p>
                                    <p><input type="text" name="captcha" class="form-control"></p>

                                    @if ($errors->has('captcha'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('captcha') }}</strong>
                                    </span>
                                    @endif



                                </div>


                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button name = "submit" type="submit" class="btn btn-primary">
                                            Submit
                                        </button>


                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
