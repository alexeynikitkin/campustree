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
                        <input type="text" class="input input-transparent input-search">
                        <span class="input-container-icon">
								<svg class="svg svg__24">
									<use xlink:href="/campustree/images/sprite/sprite.svg#search"></use>
								</svg>
							</span>
                        <span class="dropdown-body">
								<span class="dropdown-body-item">
									<span class="list">
                                     @forelse($searchLeaves as $leaf)
                                        <a href="{{ route('showLeaf', $leaf->id ) }}" class="list-item">{{ $leaf->title }}</a>
                                    @empty
                                        <li class="list-group-item list-group-item-danger">{{ $request }}</li>
                                    @endforelse
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
                {{--                    <a href="editor.html" class="link">--}}
                {{--						<span class="link-icon">--}}
                {{--							<svg class="svg svg__24">--}}
                {{--								<use xlink:href="/campustree/images/sprite/sprite.svg#shield"></use>--}}
                {{--							</svg>--}}
                {{--						</span>--}}
                {{--                        <span class="link-title">Privacy Policy</span>--}}
                {{--                    </a>--}}
                {{--                    <a href="faq.html" class="link">--}}
                {{--						<span class="link-icon">--}}
                {{--							<svg class="svg svg__24">--}}
                {{--								<use xlink:href="/campustree/images/sprite/sprite.svg#faq"></use>--}}
                {{--							</svg>--}}
                {{--						</span>--}}
                {{--                        <span class="link-title">FAQ</span>--}}
                {{--                    </a>--}}
                {{--                    <button class="link" data-popup-trigger="#support">--}}
                {{--						<span class="link-icon">--}}
                {{--							<svg class="svg svg__24">--}}
                {{--								<use xlink:href="/campustree/images/sprite/sprite.svg#support"></use>--}}
                {{--							</svg>--}}
                {{--						</span>--}}
                {{--                        <span class="link-title">Support</span>--}}
                {{--                    </button>--}}
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


