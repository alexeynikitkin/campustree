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
                                <h1 class="h-1">Friend’s requests</h1>
                            </div>
                            <div class="section-description">

                                <p>We found  students</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="tabs tabs-md tabs-inline">
                                <a data-router-disabled href="{{ route('allUsers') }}" class="tabs-item" data-transition="pagination">User List</a>
                                <a data-router-disabled href="{{ route('allFriends') }}" class="tabs-item " data-transition="pagination">My friends</a>
                                <a data-router-disabled href="{{ route('friendsRequest') }}" class="tabs-item is-active" data-transition="pagination">Friend’s requests</a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="filters-panel filters-panel-default">
                                <div class="filters-panel-item"></div>
                                <div class="filters-panel-item">
                                    <div class="filters">
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
                                            <div class="dropdown __left-sm">
                                                <p class="dropdown-trigger-label">Sort by</p>
                                                <p class="dropdown-trigger dropdown-trigger-title" data-fieldset-label="filter-sort" data-label="Popular">New friends</p>
                                                <div class="dropdown-body">
                                                    <div class="dropdown-body-item">
                                                        <fieldset class="fieldset" data-fieldset-list="filter-sort">
                                                            <label class="input-container">
                                                                <input type="radio" name="sort" value="New friends" class="input input-checkbox" checked="checked">
                                                                <span class="input-checkbox-icon">
																	<svg class="svg svg__16">
																		<use xlink:href="../images/sprite/sprite.svg#check"></use>
																	</svg>
																</span>
                                                                <span class="input-checkbox-title">New friends</span>
                                                            </label>
                                                            <label class="input-container">
                                                                <input type="radio" name="sort" value="New friends 2" class="input input-checkbox">
                                                                <span class="input-checkbox-icon">
																	<svg class="svg svg__16">
																		<use xlink:href="../images/sprite/sprite.svg#check"></use>
																	</svg>
																</span>
                                                                <span class="input-checkbox-title">New friends 2</span>
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
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="tree">
                                <div class="tree-links">
                                    <a href="index.html" data-transition="pagination" id="pagination-link"></a>
                                </div>
                                <div class="people people-fullwidth" data-empty-label="You search was not successful!" data-view-mode="list">
                                    @foreach($friends as $friend)
                                        @if(in_array($friend->id, $resultIds))
                                            <div class="people-row">
                                                <div class="people-row-item">
                                                    <div class="person-header">
                                                        <div class="person-thumb person-toggle-modal" data-thumb-title="{{ $friend->name }}" data-popup-trigger="#{{ str_replace(' ', '-', strtolower($friend->name)) }}">
                                                            <img src="https://cdn.stocksnap.io/img-thumbs/280h/urban-female_COOWAKH2W5.jpg" alt="{{ $friend->name }}">
                                                        </div>
                                                        <p class="person-description-title paragraph-medium person-toggle-modal" data-popup-trigger="#{{ str_replace(' ', '-', strtolower($friend->name)) }}">{{ $friend->name }}</p>
                                                    </div>
                                                </div>
                                                <div class="people-row-item">
                                                    <p class="person-description-item paragraph-md">{{ $friend->user_bio }}</p>
                                                </div>
                                                <div class="people-row-item">
                                                    <div class="person-action">
                                                        <form action="{{ route('acceptFriend', $friend->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" value="{{ $friend->id }}" name="user_id">
                                                            <button class="link">
                                                                <span class="link-icon">
                                                                    <svg class="svg svg__24">
                                                                        <use xlink:href="/campustree/images/sprite/sprite.svg#plus-circle"></use>
                                                                    </svg>
                                                                </span>
                                                                <span class="link-title">Accept request</span>
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('declineFriend', $friend->id) }}" method="POST">
                                                            @csrf
                                                            @method("DELETE")
                                                            <input type="hidden" value="{{ $friend->id }}" name="user_id">
                                                            <button class="link color-alumni-hover">
                                                                <span class="link-icon">
                                                                    <svg class="svg svg__24 color-alumni">
                                                                        <use xlink:href="/campustree/images/sprite/sprite.svg#remove-circle"></use>
                                                                    </svg>
													            </span>
                                                                <span class="link-title">Reject request</span>
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
{{--                    <div class="row">--}}
{{--                        <div class="col-12">--}}
{{--                            <div class="mt-5 d-flex justify-content-between align-items-center">--}}
{{--                                <div class="pagination" data-total-count="35" data-visible-count="12">--}}
{{--                                    <div class="pagination-list">--}}
{{--                                        <a href="#" class="pagination-list-item pagination-arrow" data-transition="pagination"></a>--}}
{{--                                        <div class="pagination-list-numbers"></div>--}}
{{--                                        <a href="#" class="pagination-list-item pagination-arrow" data-transition="pagination"></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </section>
        </div>
    </div>
@endsection

@section('popup-user')
    @foreach($friends as $friend)
        @if(in_array($friend->id, $resultIds))
            <div class="popup" id="{{ str_replace(' ', '-', strtolower($friend->name)) }}">
                <div class="popup-bg"></div>
                <div class="popup-box">
                    <div class="popup-box-close" data-popup-close></div>
                    <div class="popup-box-item">
                        <div class="box box-bg">
                            <div class="box-header">
                                <div class="box-header-row">
                                    <div class="person-header">
                                        <div class="person-thumb __80" data-thumb-title="{{ $friend->name }}">
                                            <img src="https://cdn.stocksnap.io/img-thumbs/280h/urban-female_COOWAKH2W5.jpg"
                                                 alt="Charmaine Delarosa">
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

    {{--    <script>--}}
    {{--        $('.add-to-friends').on('click', () => {--}}
    {{--            let thisId = $(this).parent().data('user-id');--}}
    {{--            console.log(thisId);--}}
    {{--        });--}}
    {{--    </script>--}}

@endsection
