@extends('layouts.campustree_layout')
@section('title', 'Friends')
@section('content')
    <div data-router-wrapper>
        <div data-router-view="people">
            <section class="section section-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h1 class="h-1">My friends</h1>
                            </div>
                            <div class="section-description">

                                <p>We found students</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="tabs tabs-md tabs-inline">
                                <a data-router-disabled href="{{ route('allUsers') }}" class="tabs-item"
                                   data-transition="pagination">User List</a>
                                <a data-router-disabled href="{{ route('allFriends') }}" class="tabs-item is-active"
                                   data-transition="pagination">My friends</a>
                                <a data-router-disabled href="{{ route('friendsRequest') }}" class="tabs-item"
                                   data-transition="pagination">Friend’s requests</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="filters-panel">
                                <div class="filters-panel-item">
                                    <label class="input-container">
                                        <input type="text" value="@if(request()->get('name')){{request()->get('name')}}@endif" name="name" class="user-name input input-transparent" placeholder="Friends Search">
                                        <span class="input-container-icon">
											<svg class="svg svg__24">
												<use xlink:href="/campustree/images/sprite/sprite.svg#search"></use>
											</svg>
										</span>
                                    </label>
                                </div>
                                <div class="filters-panel-item">
                                    <div class="filters">
                                        <div class="filters-item d-xl-none">
                                            <button class="link toggle-filters" data-filter-id="#people-filter">
												<span class="link-icon">
													<svg class="svg svg__24">
														<use xlink:href="/campustree/images/sprite/sprite.svg#filter"></use>
													</svg>
												</span>
                                                <span class="link-title">Filters</span>
                                            </button>
                                        </div>
                                        <div class="filters-item d-none d-md-block">
                                            <div class="view-switcher">
                                                <p class="view-switcher-title">View</p>
                                                <div class="view-switcher-item">
                                                    <div class="view-mode view-mode-box" data-view-trigger="default">
                                                        <svg viewBox="0 0 16 16" fill="none">
                                                            <rect width="7.11111" height="7.11111" rx="2"/>
                                                            <rect y="8.88867" width="7.11111" height="7.11111" rx="2"/>
                                                            <rect x="8.88892" width="7.11111" height="7.11111" rx="2"/>
                                                            <rect x="8.88892" y="8.88867" width="7.11111" height="7.11111" rx="2"/>
                                                        </svg>
                                                    </div>
                                                    <div class="view-mode view-mode-list" data-view-trigger="list">
                                                        <svg viewBox="0 0 15 15" fill="none">
                                                            <rect y="6" width="15" height="3" rx="1.5"/>
                                                            <rect width="15" height="3" rx="1.5"/>
                                                            <rect y="12" width="15" height="3" rx="1.5"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="filters-item">
                                            <div class="dropdown">
                                                <p class="dropdown-trigger-label">Sort by</p>
                                                <p class="dropdown-trigger dropdown-trigger-title" data-fieldset-label="filter-sort" data-label="@if(request()->get('sort')) {{ request()->get('sort') }} @else Id @endif">@if(request()->get('sort')) {{ request()->get('sort') }} @else Id @endif</p>
                                                <div class="dropdown-body">
                                                    <div class="dropdown-body-item">
                                                        <fieldset class="fieldset" data-fieldset-list="filter-sort">
                                                            <label class="input-container">
                                                                <input type="radio" name="sort" value="id" class="input input-checkbox" @if(request()->get('sort') == 'id') checked @else checked @endif>
                                                                <span class="input-checkbox-icon">
																	<svg class="svg svg__16">
																		<use xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
																	</svg>
																</span>
                                                                <span class="input-checkbox-title">Id</span>
                                                            </label>
                                                            <label class="input-container">
                                                                <input type="radio" name="sort" value="name" class="input input-checkbox" @if(request()->get('sort') == 'name') checked @endif>
                                                                <span class="input-checkbox-icon">
																	<svg class="svg svg__16">
																		<use xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
																	</svg>
																</span>
                                                                <span class="input-checkbox-title">Name</span>
                                                            </label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="people-filter">
                                <div class="box box-bg" id="people-filter">
                                    <div class="box-header pb-3">
                                        <div class="box-header-row">
                                            <h3 class="h-3 color-primary">Filter</h3>
                                            <div class="box-header-action">
                                                <button class="btn btn-md reset-btn" data-reset-box="#people-filter">
                                                    <span class="btn-title">Reset filters</span>
                                                </button>
                                                <div class="link ml-3 d-xl-none toggle-filters" data-filter-id="#people-filter">
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
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="paragraph paragraph-medium">Sex</p>
                                                <fieldset class="fieldset" data-fieldset-list="people-sex">
                                                    @foreach($sexes as $sex)
                                                        <label class="input-container">
                                                            <input type="radio" name="sex" @if(request()->get('sex') == $sex->id) checked @endif value="{{ $sex->id }}" class="input input-radio">
                                                            <span class="input-radio-icon"></span>
                                                            <span class="input-radio-title">{{ $sex->title }}</span>
                                                        </label>
                                                    @endforeach
                                                </fieldset>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="paragraph paragraph-medium">Years</p>
                                                <fieldset class="fieldset" data-fieldset-list="people-time">
                                                    <input class="facs" type="hidden" data-checked>
                                                    @foreach($faculties as $fac)
                                                        <label class="input-container">
                                                            <input type="checkbox" value="{{ $fac->id }}" class="input input-checkbox" @if(str_contains(request()->get('faculties'), $fac->id)) checked @endif>
                                                            <span class="input-checkbox-icon">
																	<svg class="svg svg__16">
																		<use xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
																	</svg>
																</span>
                                                            <span class="input-checkbox-title">{{ $fac->title }}</span>
                                                        </label>
                                                    @endforeach
                                                </fieldset>
                                                <p class="paragraph paragraph-medium">Tags</p>
                                                <fieldset class="fieldset" data-fieldset-list="people-branches">
                                                    <input class="cats" type="hidden" data-checked>
                                                    @foreach($cats as $cat)
                                                        <label class="input-container">
                                                            <input type="checkbox" value="{{ $cat->id }}" class="input input-checkbox" @if(str_contains(request()->get('branches'), $cat->id)) checked @endif>
                                                            <span class="input-checkbox-icon">
																	<svg class="svg svg__16">
																		<use xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
																	</svg>
																</span>
                                                            <span class="input-checkbox-title @php echo str_replace('tag', 'color', $cat->color) @endphp">{{ $cat->title }}</span>
                                                        </label>
                                                    @endforeach
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-8">
                            {{--                            <div class="tags">--}}
                            {{--                                <div class="tags-list">--}}
                            {{--                                    <div class="tags-item tag tag-greek-life enable-remove">--}}
                            {{--                                        Greek Life--}}
                            {{--                                        <svg viewBox="0 0 8 8" fill="none">--}}
                            {{--                                            <path d="M6 2L2 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>--}}
                            {{--                                            <path d="M2 2L6 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>--}}
                            {{--                                        </svg>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="tags-item tag tag-alumni enable-remove">--}}
                            {{--                                        Alumni--}}
                            {{--                                        <svg viewBox="0 0 8 8" fill="none">--}}
                            {{--                                            <path d="M6 2L2 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>--}}
                            {{--                                            <path d="M2 2L6 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>--}}
                            {{--                                        </svg>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="tags-item tag tag-local enable-remove">--}}
                            {{--                                        Local--}}
                            {{--                                        <svg viewBox="0 0 8 8" fill="none">--}}
                            {{--                                            <path d="M6 2L2 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>--}}
                            {{--                                            <path d="M2 2L6 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>--}}
                            {{--                                        </svg>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="tags-item tag enable-remove">--}}
                            {{--                                        Joey--}}
                            {{--                                        <svg viewBox="0 0 8 8" fill="none">--}}
                            {{--                                            <path d="M6 2L2 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>--}}
                            {{--                                            <path d="M2 2L6 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>--}}
                            {{--                                        </svg>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="tags-item tag clear-tags">--}}
                            {{--                                    <svg viewBox="0 0 8 8" fill="none">--}}
                            {{--                                        <path d="M6 2L2 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>--}}
                            {{--                                        <path d="M2 2L6 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>--}}
                            {{--                                    </svg>--}}
                            {{--                                    Clear tags--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <div class="tree">
                                <div class="tree-links">
                                    <a href="/" data-transition="pagination" id="pagination-link"></a>
                                </div>
                                <div class="people" data-empty-label="You search was not successful!"
                                     data-view-mode="list">
                                    @foreach($friends as $friend)
                                        @if(in_array($friend->id, $resultIds))
                                            <div class="people-row">
                                                <div class="people-row-item">
                                                    <div class="person-header">
                                                        <div class="person-thumb person-toggle-modal"
                                                             data-thumb-title="{{ $friend->name }}"
                                                             data-popup-trigger="#{{ str_replace(' ', '-', strtolower($friend->name)) }}{{ str_replace(' ', '-', strtolower($friend->id)) }}">
                                                            <img
                                                                src="{{ $friend->user_img }}"
                                                                alt="{{ $friend->name }}">
                                                        </div>
                                                        <p class="person-description-title paragraph-medium person-toggle-modal"
                                                           data-popup-trigger="#{{ str_replace(' ', '-', strtolower($friend->name)) }}{{ str_replace(' ', '-', strtolower($friend->id)) }}">{{ $friend->name }}</p>
                                                    </div>
                                                </div>
                                                <div class="people-row-item">
                                                    <p class="person-description-item paragraph-md">Silent discos are
                                                        popular at music festivals as they allow dancing to continue
                                                        past noise curfews. Similar events are "mobile clubbing"</p>
                                                </div>
                                                <div class="people-row-item">
                                                    <div class="person-action" data-user-id="{{ $friend->id }}">

                                                            <form
                                                                action="{{ route('deleteFriends', $friend->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="hidden" value="{{ $friend->id }}"
                                                                       name="friend_id">
                                                                <button
                                                                    class="link color-alumni-hover delete-from-friends">
                                                                <span class="link-icon">
                                                                    <svg class="svg svg__24 color-alumni">
                                                                        <use
                                                                            xlink:href="/campustree/images/sprite/sprite.svg#remove-circle"></use>
                                                                    </svg>
                                                                </span>
                                                                    <span class="link-title">Delete from friends</span>
                                                                </button>
                                                            </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mt-5 d-flex justify-content-between align-items-center">
                                {{ $friends->appends(request()->query())->links('pagination.index') }}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('popup-user')
    @php
        $friends_all = App\Models\User::all();
     @endphp
    @foreach($friends_all as $friend)
        @if(in_array($friend->id, $resultIds))
            <div class="popup" id="{{ str_replace(' ', '-', strtolower($friend->name)) }}{{ str_replace(' ', '-', strtolower($friend->id)) }}">
                <div class="popup-bg"></div>
                <div class="popup-box">
                    <div class="popup-box-close" data-popup-close></div>
                    <div class="popup-box-item">
                        <div class="box box-bg">
                            <div class="box-header">
                                <div class="box-header-row">
                                    <div class="person-header">
                                        <div class="person-thumb __80" data-thumb-title="{{ $friend->name }}">
                                            <img
                                                src="{{ $friend->user_img }}"
                                                alt="{{ $friend->name }}">
                                        </div>
                                        <p class="person-description-title paragraph-medium">{{ $friend->name }}</p>
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
                                    <p class="person-description-item paragraph-md">{{ $friend->user_bio }}</p>
                                </div>
                                <div class="mb-3">
                                    <p class="paragraph paragraph-medium">Birth Date</p>
                                    <p class="paragraph paragraph-md">{{ $friend->user_birth }}</p>
                                </div>
                                {{--                                <div class="mb-3">--}}
                                {{--                                    <p class="paragraph paragraph-medium">Faculty</p>--}}
                                {{--                                    <p class="paragraph paragraph-md">Philology</p>--}}
                                {{--                                </div>--}}
                                {{--                                <p class="paragraph paragraph-medium">Tags</p>--}}
                                {{--                                <div class="tags">--}}
                                {{--                                    <div class="tags-list">--}}
                                {{--                                        <div class="tags-item tag tag-events">Events</div>--}}
                                {{--                                        <div class="tags-item tag tag-majors">Majors</div>--}}
                                {{--                                        <div class="tags-item tag tag-clubs">Clubs</div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                <div class="person-action" data-user-id="{{ $friend->id }}">
                                    <form action="{{ route('deleteFriends', $friend->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" value="{{ $friend->id }}" name="friend_id">
                                        <button class="link color-alumni-hover delete-from-friends">
                                                            <span class="link-icon">
                                                                <svg class="svg svg__24 color-alumni">
                                                                    <use
                                                                        xlink:href="/campustree/images/sprite/sprite.svg#remove-circle"></use>
                                                                </svg>
                                                            </span>
                                            <span class="link-title">Delete from friends</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endsection

@section('custom-js')
    <!-- Submit last step -->
    <script>

        $(document).ready(function(){
            $(document).on('click', '.reset-btn', function (){
                history.pushState(null, null, "?" + '');
                window.location.reload();
            });

            $(document).on('change', '.user-name', function () {
                let query = $(this).val();
                console.log(query);
                const urlParams = new URLSearchParams(window.location.search);
                urlParams.set('name', query);
                history.pushState(null, null, "?" + urlParams.toString());
                window.location.reload();
            });

            $(document).on('change', '[data-fieldset-list="people-sex"] input[name="sex"]', function () {
                let query = $(this).val();
                console.log(query);
                const urlParams = new URLSearchParams(window.location.search);
                urlParams.set('sex', query);
                history.pushState(null, null, "?" + urlParams.toString());
                window.location.reload();
            });

            $(document).on('change', '[name="sort"]', function () {
                let query = $(this).val();
                console.log(query);
                const urlParams = new URLSearchParams(window.location.search);
                urlParams.set('sort', query);
                history.pushState(null, null, "?" + urlParams.toString());
                window.location.reload();
            });

            let arr = [];
            $(document).on('change', '[data-fieldset-list="people-time"] input', function () {
                let thisVal = $(this).val();
                if ($(this).prop('checked')) {
                    arr.push(thisVal);
                } else {
                    arr = arr.filter(function (elem) {
                        return elem != thisVal;
                    });
                }
                $('input.facs').closest().attr('value', arr.join(','));
                const urlParams = new URLSearchParams(window.location.search);
                urlParams.set('faculties', arr.join(','));
                history.pushState(null, null, "?" + urlParams.toString());
                window.location.reload();
            });

            let arr1 = [];
            $(document).on('change', '[data-fieldset-list="people-branches"] input', function () {
                let thisVal = $(this).val();
                if ($(this).prop('checked')) {
                    arr1.push(thisVal);
                } else {
                    arr1 = arr1.filter(function (elem) {
                        return elem != thisVal;
                    });
                }
                const urlParams = new URLSearchParams(window.location.search);
                urlParams.set('branches', arr1.join(','));
                history.pushState(null, null, "?" + urlParams.toString());
                $('input.cats').closest().attr('value', arr1.join(','));
                window.location.reload();
            });



        });
    </script>
@endsection
