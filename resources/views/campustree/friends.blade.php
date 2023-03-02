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
                                <p>We found {{ $users->count() }} students</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="tabs tabs-md tabs-inline">
                                <a data-router-disabled href="{{ route('allUsers') }}" class="tabs-item" data-transition="pagination">User List</a>
                                <a data-router-disabled href="{{ route('allFriends') }}" class="tabs-item is-active" data-transition="pagination">My friends</a>
                                <a data-router-disabled href="friends-requests.html" class="tabs-item" data-transition="pagination">Friend’s requests</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="filters-panel">
                                <div class="filters-panel-item">
                                    <label class="input-container">
                                        <input type="text" class="input input-transparent" placeholder="Events Search">
                                        <span class="input-container-icon">
											<svg class="svg svg__24">
												<use xlink:href="../images/sprite/sprite.svg#search"></use>
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
														<use xlink:href="../images/sprite/sprite.svg#filter"></use>
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
                                                            <use xlink:href="../images/sprite/sprite.svg#close"></use>
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
                                                    <label class="input-container">
                                                        <input type="radio" name="sex" value="male" class="input input-radio">
                                                        <span class="input-radio-icon"></span>
                                                        <span class="input-radio-title">Male</span>
                                                    </label>
                                                    <label class="input-container">
                                                        <input type="radio" name="sex" value="female" class="input input-radio">
                                                        <span class="input-radio-icon"></span>
                                                        <span class="input-radio-title">Female</span>
                                                    </label>
                                                    <label class="input-container">
                                                        <input type="radio" name="sex" value="Non-binary" class="input input-radio">
                                                        <span class="input-radio-icon"></span>
                                                        <span class="input-radio-title">Non-binary</span>
                                                    </label>
                                                    <label class="input-container">
                                                        <input type="radio" name="sex" value="Prefer not to say" class="input input-radio">
                                                        <span class="input-radio-icon"></span>
                                                        <span class="input-radio-title">Prefer not to say</span>
                                                    </label>
                                                    <label class="input-container">
                                                        <input type="radio" name="sex" value="Other" class="input input-radio">
                                                        <span class="input-radio-icon"></span>
                                                        <span class="input-radio-title">Other</span>
                                                    </label>
                                                </fieldset>
                                                <p class="paragraph paragraph-medium">Faculty</p>
                                                <fieldset class="fieldset" data-fieldset-list="people-faculty">
                                                    <label class="input-container">
                                                        <input type="checkbox" value="all" class="input input-checkbox">
                                                        <span class="input-checkbox-icon">
																<svg class="svg svg__16">
																	<use xlink:href="../images/sprite/sprite.svg#check"></use>
																</svg>
															</span>
                                                        <span class="input-checkbox-title">All</span>
                                                    </label>
                                                    <label class="input-container">
                                                        <input type="checkbox" value="Chemistry" class="input input-checkbox">
                                                        <span class="input-checkbox-icon">
																<svg class="svg svg__16">
																	<use xlink:href="../images/sprite/sprite.svg#check"></use>
																</svg>
															</span>
                                                        <span class="input-checkbox-title">Chemistry</span>
                                                    </label>
                                                    <label class="input-container">
                                                        <input type="checkbox" value="Computer Science and Cybernetics" class="input input-checkbox">
                                                        <span class="input-checkbox-icon">
																<svg class="svg svg__16">
																	<use xlink:href="../images/sprite/sprite.svg#check"></use>
																</svg>
															</span>
                                                        <span class="input-checkbox-title">Computer Science and Cybernetics</span>
                                                    </label>
                                                    <label class="input-container">
                                                        <input type="checkbox" value="Economics" class="input input-checkbox">
                                                        <span class="input-checkbox-icon">
																<svg class="svg svg__16">
																	<use xlink:href="../images/sprite/sprite.svg#check"></use>
																</svg>
															</span>
                                                        <span class="input-checkbox-title">Economics</span>
                                                    </label>
                                                    <label class="input-container">
                                                        <input type="checkbox" value="Geography" class="input input-checkbox">
                                                        <span class="input-checkbox-icon">
																<svg class="svg svg__16">
																	<use xlink:href="../images/sprite/sprite.svg#check"></use>
																</svg>
															</span>
                                                        <span class="input-checkbox-title">Geography</span>
                                                    </label>
                                                    <label class="input-container">
                                                        <input type="checkbox" value="History" class="input input-checkbox">
                                                        <span class="input-checkbox-icon">
																<svg class="svg svg__16">
																	<use xlink:href="../images/sprite/sprite.svg#check"></use>
																</svg>
															</span>
                                                        <span class="input-checkbox-title">History</span>
                                                    </label>
                                                    <label class="input-container">
                                                        <input type="checkbox" value="Law" class="input input-checkbox">
                                                        <span class="input-checkbox-icon">
																<svg class="svg svg__16">
																	<use xlink:href="../images/sprite/sprite.svg#check"></use>
																</svg>
															</span>
                                                        <span class="input-checkbox-title">Law</span>
                                                    </label>
                                                    <label class="input-container">
                                                        <input type="checkbox" value="Mechanics and Mathematics" class="input input-checkbox">
                                                        <span class="input-checkbox-icon">
																<svg class="svg svg__16">
																	<use xlink:href="../images/sprite/sprite.svg#check"></use>
																</svg>
															</span>
                                                        <span class="input-checkbox-title">Mechanics and Mathematics</span>
                                                    </label>
                                                    <label class="input-container">
                                                        <input type="checkbox" value="Philosophy" class="input input-checkbox">
                                                        <span class="input-checkbox-icon">
																<svg class="svg svg__16">
																	<use xlink:href="../images/sprite/sprite.svg#check"></use>
																</svg>
															</span>
                                                        <span class="input-checkbox-title">Philosophy</span>
                                                    </label>
                                                    <label class="input-container">
                                                        <input type="checkbox" value="Physics" class="input input-checkbox">
                                                        <span class="input-checkbox-icon">
																<svg class="svg svg__16">
																	<use xlink:href="../images/sprite/sprite.svg#check"></use>
																</svg>
															</span>
                                                        <span class="input-checkbox-title">Physics</span>
                                                    </label>
                                                </fieldset>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="paragraph paragraph-medium">Years</p>
                                                <fieldset class="fieldset" data-fieldset-list="people-time">
                                                    <label class="input-container">
                                                        <input type="checkbox" value="all" class="input input-checkbox">
                                                        <span class="input-checkbox-icon">
																	<svg class="svg svg__16">
																		<use xlink:href="../images/sprite/sprite.svg#check"></use>
																	</svg>
																</span>
                                                        <span class="input-checkbox-title">All</span>
                                                    </label>
                                                    <label class="input-container">
                                                        <input type="checkbox" value="Freshmen" class="input input-checkbox">
                                                        <span class="input-checkbox-icon">
																	<svg class="svg svg__16">
																		<use xlink:href="../images/sprite/sprite.svg#check"></use>
																	</svg>
																</span>
                                                        <span class="input-checkbox-title">Freshmen</span>
                                                    </label>
                                                    <label class="input-container">
                                                        <input type="checkbox" value="2d course" class="input input-checkbox">
                                                        <span class="input-checkbox-icon">
																	<svg class="svg svg__16">
																		<use xlink:href="../images/sprite/sprite.svg#check"></use>
																	</svg>
																</span>
                                                        <span class="input-checkbox-title">2d course</span>
                                                    </label>
                                                    <label class="input-container">
                                                        <input type="checkbox" value="3d course" class="input input-checkbox">
                                                        <span class="input-checkbox-icon">
																	<svg class="svg svg__16">
																		<use xlink:href="../images/sprite/sprite.svg#check"></use>
																	</svg>
																</span>
                                                        <span class="input-checkbox-title">3d course</span>
                                                    </label>
                                                    <label class="input-container">
                                                        <input type="checkbox" value="Bachelors" class="input input-checkbox">
                                                        <span class="input-checkbox-icon">
																	<svg class="svg svg__16">
																		<use xlink:href="../images/sprite/sprite.svg#check"></use>
																	</svg>
																</span>
                                                        <span class="input-checkbox-title">Bachelors</span>
                                                    </label>
                                                    <label class="input-container">
                                                        <input type="checkbox" value="Masters" class="input input-checkbox">
                                                        <span class="input-checkbox-icon">
																	<svg class="svg svg__16">
																		<use xlink:href="../images/sprite/sprite.svg#check"></use>
																	</svg>
																</span>
                                                        <span class="input-checkbox-title">Masters</span>
                                                    </label>
                                                </fieldset>
                                                <p class="paragraph paragraph-medium">Tags</p>
                                                <fieldset class="fieldset" data-fieldset-list="people-branches">
                                                    <label class="input-container">
                                                        <input type="checkbox" value="all" class="input input-checkbox">
                                                        <span class="input-checkbox-icon">
															<svg class="svg svg__16">
																<use xlink:href="../images/sprite/sprite.svg#check"></use>
															</svg>
														</span>
                                                        <span class="input-checkbox-title">All</span>
                                                    </label>
                                                    <label class="input-container">
                                                        <input type="checkbox" value="Greek Life" class="input input-checkbox">
                                                        <span class="input-checkbox-icon">
																	<svg class="svg svg__16">
																		<use xlink:href="../images/sprite/sprite.svg#check"></use>
																	</svg>
																</span>
                                                        <span class="input-checkbox-title color-greek-life-dark">Greek Life</span>
                                                    </label>
                                                    <label class="input-container">
                                                        <input type="checkbox" value="Alumni" class="input input-checkbox">
                                                        <span class="input-checkbox-icon">
																	<svg class="svg svg__16">
																		<use xlink:href="../images/sprite/sprite.svg#check"></use>
																	</svg>
																</span>
                                                        <span class="input-checkbox-title color-alumni">Alumni</span>
                                                    </label>
                                                    <label class="input-container">
                                                        <input type="checkbox" value="Local" class="input input-checkbox">
                                                        <span class="input-checkbox-icon">
																	<svg class="svg svg__16">
																		<use xlink:href="../images/sprite/sprite.svg#check"></use>
																	</svg>
																</span>
                                                        <span class="input-checkbox-title color-local">Local</span>
                                                    </label>
                                                    <label class="input-container">
                                                        <input type="checkbox" value="Events" class="input input-checkbox">
                                                        <span class="input-checkbox-icon">
																	<svg class="svg svg__16">
																		<use xlink:href="../images/sprite/sprite.svg#check"></use>
																	</svg>
																</span>
                                                        <span class="input-checkbox-title color-events">Events</span>
                                                    </label>
                                                    <label class="input-container">
                                                        <input type="checkbox" value="Majors" class="input input-checkbox">
                                                        <span class="input-checkbox-icon">
																	<svg class="svg svg__16">
																		<use xlink:href="../images/sprite/sprite.svg#check"></use>
																	</svg>
																</span>
                                                        <span class="input-checkbox-title color-majors">Majors</span>
                                                    </label>
                                                    <label class="input-container">
                                                        <input type="checkbox" value="Clubs" class="input input-checkbox">
                                                        <span class="input-checkbox-icon">
																	<svg class="svg svg__16">
																		<use xlink:href="../images/sprite/sprite.svg#check"></use>
																	</svg>
																</span>
                                                        <span class="input-checkbox-title color-clubs">Clubs</span>
                                                    </label>
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
                            <div class="tags">
                                <div class="tags-list">
                                    <div class="tags-item tag tag-greek-life enable-remove">
                                        Greek Life
                                        <svg viewBox="0 0 8 8" fill="none">
                                            <path d="M6 2L2 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M2 2L6 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="tags-item tag tag-alumni enable-remove">
                                        Alumni
                                        <svg viewBox="0 0 8 8" fill="none">
                                            <path d="M6 2L2 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M2 2L6 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="tags-item tag tag-local enable-remove">
                                        Local
                                        <svg viewBox="0 0 8 8" fill="none">
                                            <path d="M6 2L2 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M2 2L6 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="tags-item tag enable-remove">
                                        Joey
                                        <svg viewBox="0 0 8 8" fill="none">
                                            <path d="M6 2L2 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M2 2L6 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="tags-item tag clear-tags">
                                    <svg viewBox="0 0 8 8" fill="none">
                                        <path d="M6 2L2 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M2 2L6 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    Clear tags
                                </div>
                            </div>
                            <div class="tree">
                                <div class="tree-links">
                                    <a href="index.html" data-transition="pagination" id="pagination-link"></a>
                                </div>
                                <div class="people" data-empty-label="You search was not successful!" data-view-mode="list">
                                    @foreach($users as $user)
{{--                                        @if($user->id != Auth::user()->id)--}}
                                            <div class="people-row">
                                                <div class="people-row-item">
                                                    <div class="person-header">
                                                        <div class="person-thumb person-toggle-modal" data-thumb-title="{{ $user->name }}" data-popup-trigger="#{{ str_replace(' ', '-', strtolower($user->name)) }}">
                                                            <img src="https://cdn.stocksnap.io/img-thumbs/280h/urban-female_COOWAKH2W5.jpg" alt="{{ $user->name }}">
                                                        </div>
                                                        <p class="person-description-title paragraph-medium person-toggle-modal" data-popup-trigger="#{{ str_replace(' ', '-', strtolower($user->name)) }}">{{ $user->name }}</p>
                                                    </div>
                                                </div>
                                                <div class="people-row-item">
                                                    <p class="person-description-item paragraph-md">Silent discos are popular at music festivals as they allow dancing to continue past noise curfews. Similar events are "mobile clubbing"</p>
                                                </div>
                                                <div class="people-row-item">
                                                    <div class="person-action" data-user-id="{{ $user->id }}">
                                                        @if(isset(\App\Models\Friend::where('friend_id', $user->id)->first()->friend_id))
                                                            @if( \App\Models\Friend::where('friend_id', $user->id)->first()->friend_id == $user->id )
                                                                <form action="{{ route('deleteFriends', $user->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input type="hidden" value="{{ $user->id }}" name="friend_id">
                                                                    <button class="link color-alumni-hover delete-from-friends">
                                                                <span class="link-icon">
                                                                    <svg class="svg svg__24 color-alumni">
                                                                        <use xlink:href="/campustree/images/sprite/sprite.svg#remove-circle"></use>
                                                                    </svg>
                                                                </span>
                                                                        <span class="link-title">Delete from friends</span>
                                                                    </button>
                                                                </form>
                                                            @endif
                                                        @else
                                                            <form action="{{ route('addFriends', $user->id) }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" value="{{ $user->id }}" name="friend_id">
                                                                <button class="link add-to-friends">
                                                                <span class="link-icon">
                                                                    <svg class="svg svg__24">
                                                                        <use
                                                                            xlink:href="/campustree/images/sprite/sprite.svg#plus-circle"></use>
                                                                    </svg>
                                                                </span>
                                                                    <span class="link-title">Add to friends</span>
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
{{--                                        @endif--}}
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mt-5 d-flex justify-content-between align-items-center">
                                <div class="pagination" data-total-count="35" data-visible-count="8">
                                    <div class="pagination-list">
                                        <a href="#" class="pagination-list-item pagination-arrow" data-transition="pagination"></a>
                                        <div class="pagination-list-numbers"></div>
                                        <a href="#" class="pagination-list-item pagination-arrow" data-transition="pagination"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('popup-user')
    @foreach($users as $user)
            <div class="popup" id="{{ str_replace(' ', '-', strtolower($user->name)) }}">
                <div class="popup-bg"></div>
                <div class="popup-box">
                    <div class="popup-box-close" data-popup-close></div>
                    <div class="popup-box-item">
                        <div class="box box-bg">
                            <div class="box-header">
                                <div class="box-header-row">
                                    <div class="person-header">
                                        <div class="person-thumb __80" data-thumb-title="{{ $user->name }}">
                                            <img src="https://cdn.stocksnap.io/img-thumbs/280h/urban-female_COOWAKH2W5.jpg"
                                                 alt="Charmaine Delarosa">
                                        </div>
                                        <p class="person-description-title paragraph-medium">{{ $user->name }}</p>
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
                                    <p class="person-description-item paragraph-md">{{ $user->user_bio }}</p>
                                </div>
                                <div class="mb-3">
                                    <p class="paragraph paragraph-medium">Birth Date</p>
                                    <p class="paragraph paragraph-md">{{ $user->user_birth }}</p>
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
                                <div class="person-action" data-user-id="{{ $user->id }}">
                                    @if(isset(\App\Models\Friend::where('friend_id', $user->id)->first()->friend_id))
                                        @if( \App\Models\Friend::where('friend_id', $user->id)->first()->friend_id == $user->id )
                                            <form action="{{ route('deleteFriends', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" value="{{ $user->id }}" name="friend_id">
                                                <button class="link color-alumni-hover delete-from-friends">
                                                                <span class="link-icon">
                                                                    <svg class="svg svg__24 color-alumni">
                                                                        <use xlink:href="/campustree/images/sprite/sprite.svg#remove-circle"></use>
                                                                    </svg>
                                                                </span>
                                                    <span class="link-title">Delete from friends</span>
                                                </button>
                                            </form>
                                        @endif
                                    @else
                                        <form action="{{ route('addFriends', $user->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $user->id }}" name="friend_id">
                                            <button class="link add-to-friends">
                                                                <span class="link-icon">
                                                                    <svg class="svg svg__24">
                                                                        <use
                                                                            xlink:href="/campustree/images/sprite/sprite.svg#plus-circle"></use>
                                                                    </svg>
                                                                </span>
                                                <span class="link-title">Add to friends</span>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
