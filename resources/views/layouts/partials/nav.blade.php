<div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">{!! trans('navigation.toggle_navigation') !!}</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand"
           href="{!! action('HomeController@getIndex') !!}">{!! trans('navigation.app_title') !!}</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li class="active">
                <a href="{!! action('HomeController@getIndex') !!}">{!! trans('navigation.home') !!}</a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            @if(Auth::check())
                <li>
                    <a href="{!! action('Auth\AuthController@getLogout') !!}">{!! trans('navigation.logout') !!}</a>
                </li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                    <ul id="login-dp" class="dropdown-menu">
                        <li>
                            <div class="row">
                                <div class="col-md-12">

                                    Login via

                                    <div class="social-buttons">
                                        <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                                        <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
                                    </div>

                                    or

                                    {!! Former::open(action('Auth\AuthController@postLogin'))->class('') !!}

                                    <div class="form-group">
                                        {!! Form::label('email', 'Email address', ['class' => 'sr-only']) !!}
                                        {!! Form::text('email', Input::old('email', ''), [
                                                'placeholder' => 'Email address',
                                                'class' => 'form-control',
                                                'required' => 'required',
                                                'type' => 'email']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('password', 'Password', ['class' => 'sr-only']) !!}
                                        {!! Form::password('password', [
                                                'placeholder' => 'Password',
                                                'class' => 'form-control',
                                                'required' => 'required',
                                                'type' => 'email']) !!}
                                    </div>

                                    <div class="form-group">
                                        <div class="help-block text-right"><a href="#">Forget the password ?</a></div>
                                    </div>

                                    <div class="form-group">
                                        {!! Former::primary_block_submit('Sign in') !!}
                                    </div>

                                    <div class="checkbox">
                                        <label>
                                            {!! Form::checkbox('remember', 1, Input::old('remember', false)) !!} keep me logged-in
                                        </label>
                                    </div>

                                    {!! Former::close() !!}

                                </div>

                                <div class="bottom text-center">
                                    New here ? <a href="{!! action('Auth\AuthController@getRegister') !!}"><b>Join
                                            Us</b></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            @endif
            <li class="dropdown">
                <a href="#"
                   class="dropdown-toggle"
                   data-toggle="dropdown"
                   role="button">{!! trans('navigation.language') !!} <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    @foreach(LaravelLocalization::getSupportedLocales() as $locale_key => $properties)
                        <li class="@if($locale_key == App::getLocale()) active @endif">
                            <a href="{!! LaravelLocalization::getLocalizedURL($locale_key) !!}"
                               title="{!! $properties['native'] !!}"
                               hreflang="{!! $locale_key !!}">
                                {!! mb_strtoupper($locale_key) !!}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>
    <!--/.nav-collapse -->
</div>