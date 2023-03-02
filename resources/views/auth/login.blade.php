@extends('layouts.app')

@section('content')
    <div data-router-wrapper>
        <div data-router-view="authorization">
            <header class="header-s">
                <div class="container">
                    <div class="header-s-panel">
                        <div class="header-s-panel-logo">
                            <img src="/campustree/images/sign-in/logo-b.svg" alt="Campus Tree">
                        </div>
                        <div class="header-s-panel-link">
                            <p class="h-4">
                                Don’t have an account?
                                <a data-router-disabled href="/register">Sign Up Now!</a>
                            </p>
                        </div>
                    </div>
                </div>
            </header>
            <section class="section sign-in sign-in-mobile">
                <div class="container">
                    <div class="sign-in-wrapper">
                        <div class="sign-in-left-side">
                            <div class="sign-in-content">
                                <div class="sign-in-img">
                                    <img src="/campustree/images/sign-in/bg-people.svg" alt="people">
                                </div>
                                <div class="section-title">
                                    <h2 class="h-2">Welcome to Campus Tree</h2>
                                </div>
                            </div>
                            <div class="sign-in-green-bg"></div>
                        </div>
                        <div class="sign-in-right-side">
                            <div class="sign-form">
                                <div class="sign-form-cover">
                                    <div class="section-title">
                                        <h1 class="h-1">Sign in</h1>
                                    </div>
                                    <form class="sign-form-content" id="sign-in-form" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <label class="input-container">
                                            <input name="email" placeholder="E-mail" type="text" class="input" value="{{ old('email') }}" required>
                                            <span class="input-message __error">This field is required!</span>
                                        </label>
                                        <label class="input-container">
                                            <input placeholder="Password" type="password" class="input" name="password" required autocomplete="current-password">
                                            <span class="input-container-icon __right __16 __click-trigger">
                                              <svg class="svg svg__16">
                                                <use xlink:href="/campustree/images/sprite/sprite.svg#eye"></use>
                                              </svg>
                                            </span>
                                            <span class="input-message __error">This field is required!</span>
                                        </label>
                                        <div class="sign-form-buttons-group">
                                            <button type="submit" class="btn">
                                                <span>Sign In</span>
                                            </button>
                                            @if (Route::has('password.request'))
                                                <a class="sign-form-btn-forgot" href="{{ route('password.request') }}">
                                                    <span class="h-4">Forgot Password?</span>
                                                </a>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
