<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1,maximum-scale=1,minimum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Campus Tree | @yield('title')</title>

    <link rel="apple-touch-icon" sizes="180x180" href="/campustree/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/campustree/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/campustree/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="/campustree/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="/campustree/images/favicon/safari-pinned-tab.svg" color="#92c155">

    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="theme-color" content="#008037">
    <meta name="msapplication-navbutton-color" content="#008037">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="#008037">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:image" content="/campustree/images/OpenGraph.png">

    <link rel="preload" href="/campustree/fonts/ModernaSans-Regular.woff" as="font" type="font/woff"
          crossorigin="anonymous">
    <link rel="preload" href="/campustree/fonts/ModernaSans-Regular.woff2" as="font" type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload" href="/campustree/fonts/ModernaSans-Bold.woff" as="font" type="font/woff"
          crossorigin="anonymous">
    <link rel="preload" href="/campustree/fonts/ModernaSans-Bold.woff2" as="font" type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload" href="/campustree/fonts/ModernaSans-RegularIt.woff" as="font" type="font/woff"
          crossorigin="anonymous">
    <link rel="preload" href="/campustree/fonts/ModernaSans-RegularIt.woff2" as="font" type="font/woff2"
          crossorigin="anonymous">

    <script defer="defer" src="/campustree/bundle.js"></script>
    <link href="/campustree/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/dist/css/colorbox.css') }}">
</head>
<body>
<main id="wrapper">
    <header class="header">
        <div class="container">
            <div class="header-panel">
                <div class="header-panel-logo">
                    <a href="{{ route('campus.home') }}" class="logo">
                        <img src="/campustree/images/Logo.svg" alt="Campus Tree">
                    </a>
                </div>
                <div class="header-panel-search">
                    <div class="search">
                        <label class="input-container dropdown">
                            <input type="text" class="input input-transparent">
                            <span class="input-container-icon">
								<svg class="svg svg__24">
									<use xlink:href="/campustree/images/sprite/sprite.svg#search"></use>
								</svg>
							</span>
                            <span class="dropdown-body">
								<span class="dropdown-body-item">
									<span class="list">
										<a href="search-result.html" class="list-item">Mathpapa</a>
										<a href="search-result.html" class="list-item">Mathway</a>
										<a href="search-result.html" class="list-item">Mathematica</a>
										<a href="search-result.html" class="list-item">Math games</a>
									</span>
								</span>
							</span>
                        </label>
                    </div>
                </div>
                <div class="header-panel-nav">
                    @if(Auth::user())
                    <a data-router-disabled href="{{ route('allUsers') }}" class="link">
						<span class="link-icon">
							<svg class="svg svg__24">
								<use xlink:href="/campustree/images/sprite/sprite.svg#friends"></use>
							</svg>
						</span>
                        <span class="link-title">My friends</span>
                    </a>
                    @endif
                </div>
                <div class="header-panel-action">
                    @if(Auth::user())
                        <a data-router-disabled href="{{ route('personal', Auth::user()->id) }}" class="link personal-tree d-none d-xl-inline-flex">
						<span class="link-icon">
							<svg class="svg svg__64">
								<use xlink:href="/campustree/images/sprite/sprite.svg#tree"></use>
							</svg>
						</span>
                            <span class="link-title">My personal tree</span>
                        </a>
                        <div class="dropdown dropdown-lg">
                            @php
                                $notifications = \App\Models\Notification::where('friend_id', Auth::id())->get();
                            @endphp
                            <button class="link notification @if($notifications->count() != 0) is-active @endif dropdown-trigger">
							<span class="link-icon">
								<svg class="svg svg__24">
									<use xlink:href="/campustree/images/sprite/sprite.svg#notification"></use>
								</svg>
							</span>
                            </button>
                            <div class="dropdown-body">
                                <div class="dropdown-body-item">
                                    <div class="dropdown-btn dropdown-btn-close">
                                        <svg class="svg svg__16">
                                            <use xlink:href="/campustree/images/sprite/sprite.svg#close"></use>
                                        </svg>
                                    </div>
                                    <div class="notification-title">
                                        <p class="h-3 notification-title-item">Notification</p>
                                        <p class="notification-title-count">{{ $notifications->count() }}</p>
                                    </div>
                                    <div class="notification-list">
                                        <div class="scroll-wrap">
                                            @foreach($notifications as $item)
                                                <div class="notification-list-item">
                                                    <div class="notification-avatar">
                                                        <img src="https://images.pexels.com/photos/1117256/pexels-photo-1117256.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=1&amp;w=500" alt="Avatar">
                                                        <div class="notification-avatar-label">
                                                            <svg class="svg svg__16">
                                                                <use xlink:href="/campustree/images/sprite/sprite.svg#graduation"></use>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <div class="notification-description">
                                                        <p><a href="/personal/{{ $item->user_id }}">{{ \App\Models\User::where('id', $item->user_id)->first()->name }}</a> add you as friend</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif


                    @if(Auth::user())
                        <a data-router-disabled class="link d-none d-xl-inline-flex" href="javascript:void(0);"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form1').submit();">
                            <span class="link-icon">
                                <svg class="svg svg__24">
                                    <use xlink:href="/campustree/images/sprite/sprite.svg#sign-out"></use>
                                </svg>
                            </span>
                            <span class="link-title">Log Out</span>
                        </a>

                        <form id="logout-form1" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                            @method('POST')
                        </form>
                        @else
                        <a data-router-disabled href="{{ route('login') }}" class="link d-none d-xl-inline-flex">
						<span class="link-icon">
							<svg class="svg svg__24">
								<use xlink:href="/campustree/images/sprite/sprite.svg#sign-out"></use>
							</svg>
						</span>
                            <span class="link-title">Log In</span>
                        </a>
                    @endif
                        @if(Auth::user())
                            @if( Auth::user()->hasRole('admin') )
                                <a data-router-disabled href="{{ route('createLeaf') }}" class="btn d-none d-md-inline-flex">
                            <span class="btn-icon">
                                <svg class="svg svg__32">
                                    <use xlink:href="/campustree/images/sprite/sprite.svg#leaf"></use>
                                </svg>
                            </span>
                                    <span class="btn-title">Create a leaf</span>
                                </a>
                            @endif
                        @endif

                    <div class="burger">
                        <div class="burger-box">
                            <div class="burger-box-arrow"></div>
                            <div class="burger-box-arrow"></div>
                            <div class="burger-box-arrow"></div>
                        </div>
                    </div>
                </div>
                <div class="header-panel-filters">
                    <div class="filters">
                        <div class="filters-item">
                            <div class="link" id="toggle-header-mobile-filters">
                                <div class="link-icon">
                                    <svg class="svg svg__24">
                                        <use xlink:href="/campustree/images/sprite/sprite.svg#filter"></use>
                                    </svg>
                                </div>
                                <div class="link-title">Filters</div>
                            </div>
                        </div>
                        <div class="filters-item d-none d-xl-flex">
                            <div class="dropdown">
                                <input type="text" data-fieldset-trigger="filter-branches" name="filter-branches"
                                       hidden>
                                <p class="dropdown-trigger-label">Branches</p>
                                <p class="dropdown-trigger dropdown-trigger-title" data-fieldset-label="filter-branches"
                                   data-label="Select branch">Select branch</p>
                                <div class="dropdown-body">
                                    <div class="dropdown-body-item">
                                        <fieldset class="fieldset" data-fieldset-list="filter-branches">
                                            <label class="input-container">
                                                <input type="checkbox" value="all" class="input input-checkbox">
                                                <span class="input-checkbox-icon">
													<svg class="svg svg__16">
														<use
                                                            xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
													</svg>
												</span>
                                                <span class="input-checkbox-title">All</span>
                                            </label>
                                            <label class="input-container">
                                                <input type="checkbox" value="1" data-value="Greek Life"
                                                       class="input input-checkbox">
                                                <span class="input-checkbox-icon">
													<svg class="svg svg__16">
														<use
                                                            xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
													</svg>
												</span>
                                                <span class="input-checkbox-title">Greek Life</span>
                                            </label>
                                            <label class="input-container">
                                                <input type="checkbox" value="1" data-value="Alumni"
                                                       class="input input-checkbox">
                                                <span class="input-checkbox-icon">
													<svg class="svg svg__16">
														<use
                                                            xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
													</svg>
												</span>
                                                <span class="input-checkbox-title">Alumni</span>
                                            </label>
                                            <label class="input-container">
                                                <input type="checkbox" value="2" data-value="Local"
                                                       class="input input-checkbox">
                                                <span class="input-checkbox-icon">
													<svg class="svg svg__16">
														<use
                                                            xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
													</svg>
												</span>
                                                <span class="input-checkbox-title">Local</span>
                                            </label>
                                            <label class="input-container">
                                                <input type="checkbox" value="3" data-value="Events"
                                                       class="input input-checkbox">
                                                <span class="input-checkbox-icon">
													<svg class="svg svg__16">
														<use
                                                            xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
													</svg>
												</span>
                                                <span class="input-checkbox-title">Events</span>
                                            </label>
                                            <label class="input-container">
                                                <input type="checkbox" value="4" data-value="Majors"
                                                       class="input input-checkbox">
                                                <span class="input-checkbox-icon">
													<svg class="svg svg__16">
														<use
                                                            xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
													</svg>
												</span>
                                                <span class="input-checkbox-title">Majors</span>
                                            </label>
                                            <label class="input-container">
                                                <input type="checkbox" value="5" data-value="Clubs"
                                                       class="input input-checkbox">
                                                <span class="input-checkbox-icon">
													<svg class="svg svg__16">
														<use
                                                            xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
													</svg>
												</span>
                                                <span class="input-checkbox-title">Clubs</span>
                                            </label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="filters-item d-none d-xl-flex">
                            <div class="dropdown">
                                <input type="text" data-fieldset-trigger="filter-interests" name="filter-branches"
                                       hidden>
                                <p class="dropdown-trigger-label">Interests</p>
                                <p class="dropdown-trigger dropdown-trigger-title"
                                   data-fieldset-label="filter-interests" data-label="Select interest">Select
                                    interest</p>
                                <div class="dropdown-body">
                                    <div class="dropdown-body-item">
                                        <fieldset class="fieldset" data-fieldset-list="filter-interests">
                                            <label class="input-container">
                                                <input type="checkbox" value="all" class="input input-checkbox">
                                                <span class="input-checkbox-icon">
													<svg class="svg svg__16">
														<use
                                                            xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
													</svg>
												</span>
                                                <span class="input-checkbox-title">All</span>
                                            </label>
                                            <label class="input-container">
                                                <input type="checkbox" value="Greek Life" class="input input-checkbox">
                                                <span class="input-checkbox-icon">
													<svg class="svg svg__16">
														<use
                                                            xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
													</svg>
												</span>
                                                <span class="input-checkbox-title">Greek Life</span>
                                            </label>
                                            <label class="input-container">
                                                <input type="checkbox" value="Alumni" class="input input-checkbox">
                                                <span class="input-checkbox-icon">
													<svg class="svg svg__16">
														<use
                                                            xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
													</svg>
												</span>
                                                <span class="input-checkbox-title">Alumni</span>
                                            </label>
                                            <label class="input-container">
                                                <input type="checkbox" value="Local" class="input input-checkbox">
                                                <span class="input-checkbox-icon">
													<svg class="svg svg__16">
														<use
                                                            xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
													</svg>
												</span>
                                                <span class="input-checkbox-title">Local</span>
                                            </label>
                                            <label class="input-container">
                                                <input type="checkbox" value="Events" class="input input-checkbox">
                                                <span class="input-checkbox-icon">
													<svg class="svg svg__16">
														<use
                                                            xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
													</svg>
												</span>
                                                <span class="input-checkbox-title">Events</span>
                                            </label>
                                            <label class="input-container">
                                                <input type="checkbox" value="Majors" class="input input-checkbox">
                                                <span class="input-checkbox-icon">
													<svg class="svg svg__16">
														<use
                                                            xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
													</svg>
												</span>
                                                <span class="input-checkbox-title">Majors</span>
                                            </label>
                                            <label class="input-container">
                                                <input type="checkbox" value="Clubs" class="input input-checkbox">
                                                <span class="input-checkbox-icon">
													<svg class="svg svg__16">
														<use
                                                            xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
													</svg>
												</span>
                                                <span class="input-checkbox-title">Clubs</span>
                                            </label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="filters-item d-none d-xl-flex">
                            <label class="input-container">
                                <input type="checkbox" class="input input-checkbox input-checkbox-sm">
                                <span class="input-checkbox-icon">
									<svg class="svg svg__16">
										<use xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
									</svg>
								</span>
                                <span class="input-checkbox-title">Only with my friends</span>
                            </label>
                        </div>
                        <div class="filters-item">
                            <div class="link close-filters">
                                <div class="link-icon">
                                    <svg class="svg svg__16">
                                        <use xlink:href="/campustree/images/sprite/sprite.svg#close"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-panel-filters __mobile" id="header-mobile-filters">
                    <div class="row pb-4">
                        <div class="col-6 d-flex align-items-center">
                            <label class="input-container">
                                <input type="checkbox" class="input input-checkbox input-checkbox-sm">
                                <span class="input-checkbox-icon">
									<svg class="svg svg__16">
										<use xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
									</svg>
								</span>
                                <span class="input-checkbox-title">Only with my friends</span>
                            </label>
                        </div>
                        <div class="col-6">
                            <div class="d-flex justify-content-end">
                                <button class="btn reset-btn" data-reset-box="#header-mobile-filters">
                                    <span class="btn-title">Reset filter</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="border"></div>
                    <div class="row pt-4">
                        <div class="col-12 d-flex">
                            <div class="dropdown dropdown-static">
                                <p class="dropdown-trigger-label">Branches</p>
                                <p class="dropdown-trigger dropdown-trigger-title"
                                   data-fieldset-label="filter-branches-mobile" data-label="Select branch">Select
                                    branch</p>
                                <div class="dropdown-body">
                                    <div class="dropdown-body-item">
                                        <fieldset class="fieldset" data-fieldset-list="filter-branches-mobile">
                                            <label class="input-container">
                                                <input type="checkbox" value="all" class="input input-checkbox">
                                                <span class="input-checkbox-icon">
													<svg class="svg svg__16">
														<use
                                                            xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
													</svg>
												</span>
                                                <span class="input-checkbox-title">All</span>
                                            </label>
                                            <label class="input-container">
                                                <input type="checkbox" value="Greek Life" class="input input-checkbox">
                                                <span class="input-checkbox-icon">
													<svg class="svg svg__16">
														<use
                                                            xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
													</svg>
												</span>
                                                <span class="input-checkbox-title">Greek Life</span>
                                            </label>
                                            <label class="input-container">
                                                <input type="checkbox" value="Alumni" class="input input-checkbox">
                                                <span class="input-checkbox-icon">
													<svg class="svg svg__16">
														<use
                                                            xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
													</svg>
												</span>
                                                <span class="input-checkbox-title">Alumni</span>
                                            </label>
                                            <label class="input-container">
                                                <input type="checkbox" value="Local" class="input input-checkbox">
                                                <span class="input-checkbox-icon">
													<svg class="svg svg__16">
														<use
                                                            xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
													</svg>
												</span>
                                                <span class="input-checkbox-title">Local</span>
                                            </label>
                                            <label class="input-container">
                                                <input type="checkbox" value="Events" class="input input-checkbox">
                                                <span class="input-checkbox-icon">
													<svg class="svg svg__16">
														<use
                                                            xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
													</svg>
												</span>
                                                <span class="input-checkbox-title">Events</span>
                                            </label>
                                            <label class="input-container">
                                                <input type="checkbox" value="Majors" class="input input-checkbox">
                                                <span class="input-checkbox-icon">
													<svg class="svg svg__16">
														<use
                                                            xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
													</svg>
												</span>
                                                <span class="input-checkbox-title">Majors</span>
                                            </label>
                                            <label class="input-container">
                                                <input type="checkbox" value="Clubs" class="input input-checkbox">
                                                <span class="input-checkbox-icon">
													<svg class="svg svg__16">
														<use
                                                            xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
													</svg>
												</span>
                                                <span class="input-checkbox-title">Clubs</span>
                                            </label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown dropdown-static">
                                <p class="dropdown-trigger-label">Interests</p>
                                <p class="dropdown-trigger dropdown-trigger-title"
                                   data-fieldset-label="filter-interests-mobile" data-label="Select interest">Select
                                    interest</p>
                                <div class="dropdown-body">
                                    <div class="dropdown-body-item">
                                        <fieldset class="fieldset" data-fieldset-list="filter-interests-mobile">
                                            <label class="input-container">
                                                <input type="checkbox" value="all" class="input input-checkbox">
                                                <span class="input-checkbox-icon">
													<svg class="svg svg__16">
														<use
                                                            xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
													</svg>
												</span>
                                                <span class="input-checkbox-title">All</span>
                                            </label>
                                            <label class="input-container">
                                                <input type="checkbox" value="Greek Life" class="input input-checkbox">
                                                <span class="input-checkbox-icon">
													<svg class="svg svg__16">
														<use
                                                            xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
													</svg>
												</span>
                                                <span class="input-checkbox-title">Greek Life</span>
                                            </label>
                                            <label class="input-container">
                                                <input type="checkbox" value="Alumni" class="input input-checkbox">
                                                <span class="input-checkbox-icon">
													<svg class="svg svg__16">
														<use
                                                            xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
													</svg>
												</span>
                                                <span class="input-checkbox-title">Alumni</span>
                                            </label>
                                            <label class="input-container">
                                                <input type="checkbox" value="Local" class="input input-checkbox">
                                                <span class="input-checkbox-icon">
													<svg class="svg svg__16">
														<use
                                                            xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
													</svg>
												</span>
                                                <span class="input-checkbox-title">Local</span>
                                            </label>
                                            <label class="input-container">
                                                <input type="checkbox" value="Events" class="input input-checkbox">
                                                <span class="input-checkbox-icon">
													<svg class="svg svg__16">
														<use
                                                            xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
													</svg>
												</span>
                                                <span class="input-checkbox-title">Events</span>
                                            </label>
                                            <label class="input-container">
                                                <input type="checkbox" value="Majors" class="input input-checkbox">
                                                <span class="input-checkbox-icon">
													<svg class="svg svg__16">
														<use
                                                            xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
													</svg>
												</span>
                                                <span class="input-checkbox-title">Majors</span>
                                            </label>
                                            <label class="input-container">
                                                <input type="checkbox" value="Clubs" class="input input-checkbox">
                                                <span class="input-checkbox-icon">
													<svg class="svg svg__16">
														<use
                                                            xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
													</svg>
												</span>
                                                <span class="input-checkbox-title">Clubs</span>
                                            </label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border"></div>
        </div>
        <!--	Tablet, phone nav menu	-->
        <div class="header-nav">
            <div class="border"></div>
            <div class="header-nav-tablet">
                <a href="friends.html" class="link">
						<span class="link-icon">
							<svg class="svg svg__24">
								<use xlink:href="/campustree/images/sprite/sprite.svg#friends"></use>
							</svg>
						</span>
                    <span class="link-title">My friends</span>
                </a>
                <!--				<a href="people.html" class="link">-->
                <!--						<span class="link-icon">-->
                <!--							<svg class="svg svg__24">-->
                <!--								<use xlink:href="/campustree/images/sprite/sprite.svg#people"></use>-->
                <!--							</svg>-->
                <!--						</span>-->
                <!--					<span class="link-title">people catalog</span>-->
                <!--				</a>-->
                <div class="border border-vertical"></div>
                <a href="personal-tree.html" class="link personal-tree">
						<span class="link-icon">
							<svg class="svg svg__64">
								<use xlink:href="/campustree/images/sprite/sprite.svg#tree"></use>
							</svg>
						</span>
                    <span class="link-title">My personal tree</span>
                </a>
                <button class="link">
						<span class="link-icon">
							<svg class="svg svg__24">
								<use xlink:href="/campustree/images/sprite/sprite.svg#sign-out"></use>
							</svg>
						</span>
                    <span class="link-title">Sign out</span>
                </button>
            </div>
            <div class="scroll-wrap">
                <div class="header-nav-phone">
                    <a href="leaf-creation.html" class="link">
						<span class="link-icon">
							<svg class="svg svg__24">
								<use xlink:href="/campustree/images/sprite/sprite.svg#leaf"></use>
							</svg>
						</span>
                        <span class="link-title">Create a leaf</span>
                    </a>
                    <a href="editor.html" class="link">
						<span class="link-icon">
							<svg class="svg svg__24">
								<use xlink:href="/campustree/images/sprite/sprite.svg#shield"></use>
							</svg>
						</span>
                        <span class="link-title">Privacy Policy</span>
                    </a>
                    <a href="faq.html" class="link">
						<span class="link-icon">
							<svg class="svg svg__24">
								<use xlink:href="/campustree/images/sprite/sprite.svg#faq"></use>
							</svg>
						</span>
                        <span class="link-title">FAQ</span>
                    </a>
                    <button class="link" data-popup-trigger="#support">
						<span class="link-icon">
							<svg class="svg svg__24">
								<use xlink:href="/campustree/images/sprite/sprite.svg#support"></use>
							</svg>
						</span>
                        <span class="link-title">Support</span>
                    </button>
                    <button class="link link-absolute">
						<span class="link-icon">
							<svg class="svg svg__24">
								<use xlink:href="/campustree/images/sprite/sprite.svg#sign-out"></use>
							</svg>
						</span>
                        <span class="link-title">Sign out</span>
                    </button>
                    <div class="header-copyright">
                        <p>&copy; Campus Tree 2022</p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @yield('content')

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="footer-copyright">
                        <p class="paragraph">&copy; Campus Tree 2022</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="footer-nav">
                        <a href="faq.html" class="link link-sm">
							<span class="link-icon">
								<svg class="svg svg__16">
									<use xlink:href="/campustree/images/sprite/sprite.svg#faq"></use>
								</svg>
							</span>
                            <span class="link-title">FAQ</span>
                        </a>
                        <button class="link link-sm" data-popup-trigger="#support">
							<span class="link-icon">
								<svg class="svg svg__16">
									<use xlink:href="/campustree/images/sprite/sprite.svg#support"></use>
								</svg>
							</span>
                            <span class="link-title">Support</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="footer-panel">
                    <a href="index.html" class="link link-column">
						<span class="link-icon">
							<svg class="svg svg__24">
								<use xlink:href="/campustree/images/sprite/sprite.svg#leaf"></use>
							</svg>
						</span>
                        <span class="link-title">Home tree</span>
                    </a>
                    <a href="people.html" class="link link-column">
						<span class="link-icon">
							<svg class="svg svg__24">
								<use xlink:href="/campustree/images/sprite/sprite.svg#people"></use>
							</svg>
						</span>
                        <span class="link-title">User list</span>
                    </a>
                    <a href="#" class="link link-column">
						<span class="link-icon">
							<svg class="svg svg__24">
								<use xlink:href="/campustree/images/sprite/sprite.svg#tree"></use>
							</svg>
						</span>
                        <span class="link-title">Personal tree</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <div class="alert">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="alert-panel __start">
                        <div class="tooltip tooltip-hover" data-default-label="Select All"
                             data-active-label="Deselect All">
                            <label class="input-container">
                                <input type="checkbox" class="input input-checkbox"
                                       data-alert-checkbox="friends-already-going">
                                <span class="input-checkbox-icon">
										<svg class="svg svg__16">
											<use xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
										</svg>
									</span>
                                <span class="input-checkbox-title">friend selected</span>
                            </label>
                            <div class="tooltip-body">
                                <p class="tooltip-body-item">Select All</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="alert-panel __end">
                        <button class="btn" id="invite">
                            <span class="btn-title">Invite selected friends</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tooltip tooltip-fixed __bottom" data-tooltip-id="success">
        <div class="tooltip-body">
            <div class="tooltip-body-item">
                <svg class="svg svg__16">
                    <use xlink:href="/campustree/images/sprite/sprite.svg#check-circle"></use>
                </svg>
                Invitations successfully sended to your friends
            </div>
            <div class="tooltip-body-close">
                <svg class="svg svg__16">
                    <use xlink:href="/campustree/images/sprite/sprite.svg#close"></use>
                </svg>
            </div>
        </div>
    </div>
    <div class="tooltip tooltip-fixed __bottom" data-tooltip-id="create-success">
        <div class="tooltip-body">
            <div class="tooltip-body-item">
                <svg class="svg svg__16">
                    <use xlink:href="/campustree/images/sprite/sprite.svg#check-circle"></use>
                </svg>
                Thank you! Your event succsesfuly sent to rewiev!
            </div>
            <div class="tooltip-body-close">
                <svg class="svg svg__16">
                    <use xlink:href="/campustree/images/sprite/sprite.svg#close"></use>
                </svg>
            </div>
        </div>
    </div>
    <!-- Popup display with class "is-active"	-->
    <div class="popup" id="support">
        <div class="popup-bg"></div>
        <div class="popup-box">
            <div class="popup-box-close" data-popup-close></div>
            <div class="popup-box-item">
                <div class="box box-bg">
                    <div class="box-header mb-2">
                        <div class="box-header-row">
                            <div>
                                <p class="h-3 color-primary">Need support?</p>
                                <p class="paragraph paragraph-md">Contact us if you need futher assistance</p>
                            </div>
                            <div class="box-header-action">
                                <div class="link ml-3" data-popup-close>
                                    <div class="link-icon">
                                        <svg class="svg svg__16">
                                            <use xlink:href="/campustree/images/sprite/sprite.svg#close"></use>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="hr">
                    <div class="box-body">
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="input-container">
                                        <input type="text" class="input" placeholder="Name">
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="input-container">
                                        <input type="email" class="input" placeholder="Email">
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="input-container">
                                        <textarea name="question" class="textarea"
                                                  placeholder="Your question"></textarea>
                                    </label>
                                </div>
                                <div class="col-12">
                                    <div class="box-action">
                                        <button class="btn"><span class="btn-title">Send request</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup" id="support-success">
        <div class="popup-bg"></div>
        <div class="popup-box">
            <div class="popup-box-close" data-popup-close></div>
            <div class="popup-box-item">
                <div class="box box-bg">
                    <div class="box-header">
                        <div class="box-header-row">
                            <div>
                                <p class="h-3 color-primary mb-2">Thank you! We have received your request</p>
                                <p class="paragraph paragraph-md">We will try our best to resolve your issue as soon as
                                    possible</p>
                            </div>
                            <div class="box-header-action">
                                <div class="link ml-3" data-popup-close>
                                    <div class="link-icon">
                                        <svg class="svg svg__16">
                                            <use xlink:href="/campustree/images/sprite/sprite.svg#close"></use>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup" id="sign-out-confirm">
        <div class="popup-bg"></div>
        <div class="popup-box">
            <div class="popup-box-close" data-popup-close></div>
            <div class="popup-box-item">
                <div class="box box-bg">
                    <div class="box-header">
                        <div class="box-header-row">
                            <div>
                                <p class="h-3 color-primary mb-2">Are you sure you want to Sign out?</p>
                            </div>
                            <div class="box-header-action">
                                <div class="link ml-3" data-popup-close>
                                    <div class="link-icon">
                                        <svg class="svg svg__16">
                                            <use xlink:href="/campustree/images/sprite/sprite.svg#close"></use>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="group-buttons">
                                <button class="btn" data-popup-trigger="#sign-out-confirm">
                                    <span class="btn-title">No, stay logged in</span>
                                </button>
                                <button class="btn btn-outline">
                                    <span class="btn-title">Yes, sign out</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup" id="leave-message">
        <div class="popup-bg"></div>
        <div class="popup-box">
            <div class="popup-box-close" data-popup-close></div>
            <div class="popup-box-item">
                <div class="box box-bg">
                    <div class="box-header mb-2">
                        <div class="box-header-row">
                            <div>
                                <p class="h-3 color-primary">Leave a message to the leaf creator</p>
                                <p class="paragraph paragraph-md">Optional</p>
                            </div>
                            <div class="box-header-action">
                                <div class="link ml-3" data-popup-close>
                                    <div class="link-icon">
                                        <svg class="svg svg__16">
                                            <use xlink:href="/campustree/images/sprite/sprite.svg#close"></use>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="hr">
                    <div class="box-body">
                        <form>
                            <div class="row">
                                <div class="col-12">
                                    <label class="input-container">
                                        <textarea name="question" class="textarea"
                                                  placeholder="Your message"></textarea>
                                    </label>
                                </div>
                                <div class="col-12">
                                    <div class="box-action">
                                        <div class="group-buttons">
                                            <button class="btn"><span class="btn-title">Submit</span></button>
                                            <button class="btn btn-outline" data-popup-trigger="#leave-message">
                                                <span class="btn-title">Cancel</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('popup-user')
    <div class="popup" id="friend">
        <div class="popup-bg"></div>
        <div class="popup-box">
            <div class="popup-box-close" data-popup-close></div>
            <div class="popup-box-item">
                <div class="box box-bg">
                    <div class="box-header">
                        <div class="box-header-row">
                            <div class="person-header">
                                <div class="person-thumb __80" data-thumb-title="Charmaine Delarosa">
                                    <img src="https://cdn.stocksnap.io/img-thumbs/280h/urban-female_COOWAKH2W5.jpg"
                                         alt="Charmaine Delarosa">
                                </div>
                                <p class="person-description-title paragraph-medium">Charmaine Delarosa</p>
                            </div>
                            <div class="link person-toggle-modal __close" data-popup-close>
                                <div class="link-icon">
                                    <svg class="svg svg__16">
                                        <use xlink:href="/campustree/images/sprite/sprite.svg#close"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="hr">
                    <div class="box-body">
                        <div class="mb-3">
                            <p class="person-description-item paragraph-md">Silent discos are popular at music festivals
                                as they allow dancing to continue past noise curfews. Similar events are "mobile
                                clubbing" at music festivals as they allow dancing to continue past</p>
                        </div>
                        <div class="mb-3">
                            <p class="paragraph paragraph-medium">Birth Date</p>
                            <p class="paragraph paragraph-md">20 Septebmer 2001</p>
                        </div>
                        <div class="mb-3">
                            <p class="paragraph paragraph-medium">Faculty</p>
                            <p class="paragraph paragraph-md">Philology</p>
                        </div>
                        <p class="paragraph paragraph-medium">Tags</p>
                        <div class="tags">
                            <div class="tags-list">
                                <div class="tags-item tag tag-events">Events</div>
                                <div class="tags-item tag tag-majors">Majors</div>
                                <div class="tags-item tag tag-clubs">Clubs</div>
                            </div>
                        </div>
                        <div class="person-action">
                            <a href="personal-tree.html" class="link">
								<span class="link-icon">
									<svg class="svg svg__24">
										<use xlink:href="/campustree/images/sprite/sprite.svg#leaf"></use>
									</svg>
								</span>
                                <span class="link-title">Go to personal tree</span>
                            </a>
                            <button class="link color-alumni-hover">
															<span class="link-icon">
																<svg class="svg svg__24 color-alumni">
																	<use
                                                                        xlink:href="/campustree/images/sprite/sprite.svg#remove-circle"></use>
																</svg>
															</span>
                                <span class="link-title">Delete from friends</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup" id="friend-request">
        <div class="popup-bg"></div>
        <div class="popup-box">
            <div class="popup-box-close" data-popup-close></div>
            <div class="popup-box-item">
                <div class="box box-bg">
                    <div class="box-header">
                        <div class="box-header-row">
                            <div class="person-header">
                                <div class="person-thumb __80" data-thumb-title="Charmaine Delarosa">
                                    <img src="https://cdn.stocksnap.io/img-thumbs/280h/urban-female_COOWAKH2W5.jpg"
                                         alt="Charmaine Delarosa">
                                </div>
                                <p class="person-description-title paragraph-medium">Charmaine Delarosa</p>
                            </div>
                            <div class="link person-toggle-modal __close" data-popup-close>
                                <div class="link-icon">
                                    <svg class="svg svg__16">
                                        <use xlink:href="/campustree/images/sprite/sprite.svg#close"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="hr">
                    <div class="box-body">
                        <div class="mb-3">
                            <p class="person-description-item paragraph-md">Silent discos are popular at music festivals
                                as they allow dancing to continue past noise curfews. Similar events are "mobile
                                clubbing" at music festivals as they allow dancing to continue past</p>
                        </div>
                        <div class="mb-3">
                            <p class="paragraph paragraph-medium">Birth Date</p>
                            <p class="paragraph paragraph-md">20 Septebmer 2001</p>
                        </div>
                        <div class="mb-3">
                            <p class="paragraph paragraph-medium">Faculty</p>
                            <p class="paragraph paragraph-md">Philology</p>
                        </div>
                        <p class="paragraph paragraph-medium">Tags</p>
                        <div class="tags">
                            <div class="tags-list">
                                <div class="tags-item tag tag-events">Events</div>
                                <div class="tags-item tag tag-majors">Majors</div>
                                <div class="tags-item tag tag-clubs">Clubs</div>
                            </div>
                        </div>
                        <div class="person-action">
                            <button class="link">
													<span class="link-icon">
														<svg class="svg svg__24">
															<use
                                                                xlink:href="/campustree/images/sprite/sprite.svg#plus-circle"></use>
														</svg>
													</span>
                                <span class="link-title">Accept request</span>
                            </button>
                            <button class="link color-alumni-hover">
													<span class="link-icon">
														<svg class="svg svg__24 color-alumni">
															<use
                                                                xlink:href="/campustree/images/sprite/sprite.svg#remove-circle"></use>
														</svg>
													</span>
                                <span class="link-title">Reject request</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script>
    {{--$(document).ready(function (){--}}
    {{--    $('#accept').on('click', function (){--}}
    {{--        $('.accept-event').removeClass('is-active');--}}
    {{--        $('.accept-event-success').addClass('is-active');--}}
    {{--        $.ajax({--}}
    {{--            url: '{{ route('addLeafToUser', $leaf->id) }}',--}}
    {{--            type: "POST",--}}
    {{--            data: {--}}
    {{--                leaf: {{$leaf->id}}--}}
    {{--            },--}}
    {{--            headers: {--}}
    {{--                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
    {{--            },--}}
    {{--            success: (data) => {--}}
    {{--            },--}}
    {{--        });--}}
    {{--    });--}}
    {{--    $('.accept-event-success button').on('click', function (){--}}
    {{--        $('.accept-event').addClass('is-active');--}}
    {{--        $('.accept-event-success').removeClass('is-active');--}}
    {{--        $.ajax({--}}
    {{--            url: '{{ route('addLeafToUser', $leaf->id) }}',--}}
    {{--            type: "POST",--}}
    {{--            data: {--}}
    {{--                leaf: null--}}
    {{--            },--}}
    {{--            headers: {--}}
    {{--                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
    {{--            },--}}
    {{--            success: (data) => {--}}
    {{--            },--}}
    {{--        });--}}
    {{--    });--}}

    {{--});--}}
</script>
<script src="/campustree/pristine.min.js"></script>
<script src="/campustree/validation.js"></script>
<script src="{{ asset('admin/dist/js/jquery.colorbox-min.js') }}"></script>
<script type="text/javascript" src="/packages/barryvdh/elfinder/js/standalonepopup.js"></script>
@yield('custom-js')
<script src="https://cdn.tiny.cloud/1/s2wox67b49yyyur1t1ibqrqc1zrjb0lniiry5tb3bkcdmg58/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</body>
</html>
