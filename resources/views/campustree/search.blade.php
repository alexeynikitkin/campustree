@extends('layouts.campustree_layout')
@section('title', 'Search')
@section('content')

<div data-router-wrapper>
    <div data-router-view="searchResult">
        <section class="section section-inner">
            <div class="container">
                <div class="section-bg">
                    <img data-src="../images/abstract/tree.svg" alt="Campus Tree">
                </div>
                <div class="row">
                    <div class="col-md-6 offset-xl-1">
                        <div class="section-title">
                            <div class="breadcrumbs">
                                <div class="breadcrumbs-item">
                                    <a href="/" class="breadcrumbs-item-link">Back to Campus tree</a>
                                </div>
                            </div>
                            <h1 class="h-1">Search Result</h1>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-6">
                        <div class="branch-filter">
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
                                        <p class="dropdown-trigger dropdown-trigger-title" data-fieldset-label="filter-sort" data-label="Popular">Popular</p>
                                        <div class="dropdown-body">
                                            <div class="dropdown-body-item">
                                                <fieldset class="fieldset" data-fieldset-list="filter-sort">
                                                    <label class="input-container">
                                                        <input type="radio" name="sort" value="Popular" class="input input-checkbox" checked="checked">
                                                        <span class="input-checkbox-icon">
																<svg class="svg svg__16">
																	<use xlink:href="../images/sprite/sprite.svg#check"></use>
																</svg>
															</span>
                                                        <span class="input-checkbox-title">Popular</span>
                                                    </label>
                                                    <label class="input-container">
                                                        <input type="radio" name="sort" value="Name" class="input input-checkbox">
                                                        <span class="input-checkbox-icon">
																<svg class="svg svg__16">
																	<use xlink:href="../images/sprite/sprite.svg#check"></use>
																</svg>
															</span>
                                                        <span class="input-checkbox-title">Name</span>
                                                    </label>
                                                    <label class="input-container">
                                                        <input type="radio" name="sort" value="Date" class="input input-checkbox">
                                                        <span class="input-checkbox-icon">
																<svg class="svg svg__16">
																	<use xlink:href="../images/sprite/sprite.svg#check"></use>
																</svg>
															</span>
                                                        <span class="input-checkbox-title">Date</span>
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
                <div class="row">
                    <div class="col-xl-11 offset-xl-1">
                        <div class="tree" data-view-mode="list">
                            <div class="tree-links">
                                <a href="leaf.html" id="leaf-link"></a>
                                <a href="index.html" data-transition="pagination" id="pagination-link"></a>
                            </div>
                            <div class="tree-events tree-events-default">
                                <div class="tree-events-item tree-modal-toggle" data-event-id="1">
                                    <span class="leaf-title">AEPI</span>
                                    <a href="leaf.html" class="leaf-link"></a>
                                    <div class="tree-modal">
                                        <div class="box">
                                            <div class="box-thumb">
                                                <img src="https://images.unsplash.com/photo-1648737541393-1dfb95e40982?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwzN3x8fGVufDB8fHx8&auto=format&fit=crop&w=500&q=60" alt="Event Name">
                                            </div>
                                            <div class="box-body">
                                                <div class="event-description">
                                                    <div>
                                                        <p class="event-description-title h-3">AEPI</p>
                                                        <div class="event-description-categories">
                                                            <p class="tag tag-events">Events</p>
                                                        </div>
                                                    </div>
                                                    <p class="event-description-item paragraph-md">Silent discos are popular at music festivals as they allow dancing to continue past noise curfews</p>
                                                    <div class="event-description-date date">
                                                        <div class="date-icon">
                                                            <svg class="svg svg__16">
                                                                <use xlink:href="../images/sprite/sprite.svg#calendar"></use>
                                                            </svg>
                                                        </div>
                                                        <div class="date-label">20 Feb 2022 05:30 PM</div>
                                                    </div>
                                                    <div class="event-description-location location">
                                                        <div class="location-icon">
                                                            <svg class="svg svg__16">
                                                                <use xlink:href="../images/sprite/sprite.svg#location"></use>
                                                            </svg>
                                                        </div>
                                                        <div class="location-label">Instytuts'ka St, 11, Khmelnytskyi, KNU</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-action">
                                                <a href="leaf.html" class="btn btn-outline fullwidth">
												<span class="btn-icon">
													<svg class="svg svg__32">
														<use xlink:href="../images/sprite/sprite.svg#leaf"></use>
													</svg>
												</span>
                                                    <span class="btn-title">Visit event</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tree-events-item tree-modal-toggle" data-event-id="2">
                                    <span class="leaf-title">AXA</span>
                                    <a href="leaf.html" class="leaf-link"></a>
                                    <div class="tree-modal">
                                        <div class="box">
                                            <div class="box-thumb">
                                                <img src="https://images.unsplash.com/photo-1648743779757-d1a4789790d7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxOHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=60" alt="Event Name">
                                            </div>
                                            <div class="box-body">
                                                <div class="event-description">
                                                    <div>
                                                        <p class="event-description-title h-3">AXA</p>
                                                        <div class="event-description-categories">
                                                            <p class="tag tag-events">Events</p>
                                                        </div>
                                                    </div>
                                                    <p class="event-description-item paragraph-md">Silent discos are popular at music festivals as they allow dancing to continue past noise curfews</p>
                                                    <div class="event-description-date date">
                                                        <div class="date-icon">
                                                            <svg class="svg svg__16">
                                                                <use xlink:href="../images/sprite/sprite.svg#calendar"></use>
                                                            </svg>
                                                        </div>
                                                        <div class="date-label">20 Feb 2022 05:30 PM</div>
                                                    </div>
                                                    <div class="event-description-location location">
                                                        <div class="location-icon">
                                                            <svg class="svg svg__16">
                                                                <use xlink:href="../images/sprite/sprite.svg#location"></use>
                                                            </svg>
                                                        </div>
                                                        <div class="location-label">Instytuts'ka St, 11, Khmelnytskyi, KNU</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-action">
                                                <a href="leaf.html" class="btn btn-outline fullwidth">
												<span class="btn-icon">
													<svg class="svg svg__32">
														<use xlink:href="../images/sprite/sprite.svg#leaf"></use>
													</svg>
												</span>
                                                    <span class="btn-title">Visit event</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tree-events-item tree-modal-toggle" data-event-id="3">
                                    <span class="leaf-title">BYOB</span>
                                    <a href="leaf.html" class="leaf-link"></a>
                                    <div class="tree-modal">
                                        <div class="box">
                                            <div class="box-thumb">
                                                <img src="https://images.unsplash.com/photo-1648737153811-69a6d8c528bf?ixlib=rb-1.2.1&ixid=MnwxMjA3fDF8MHxlZGl0b3JpYWwtZmVlZHwyMXx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=60" alt="Event Name">
                                            </div>
                                            <div class="box-body">
                                                <div class="event-description">
                                                    <div>
                                                        <p class="event-description-title h-3">BYOB</p>
                                                        <div class="event-description-categories">
                                                            <p class="tag tag-events">Events</p>
                                                        </div>
                                                    </div>
                                                    <p class="event-description-item paragraph-md">Silent discos are popular at music festivals as they allow dancing to continue past noise curfews</p>
                                                    <div class="event-description-date date">
                                                        <div class="date-icon">
                                                            <svg class="svg svg__16">
                                                                <use xlink:href="../images/sprite/sprite.svg#calendar"></use>
                                                            </svg>
                                                        </div>
                                                        <div class="date-label">20 Feb 2022 05:30 PM</div>
                                                    </div>
                                                    <div class="event-description-location location">
                                                        <div class="location-icon">
                                                            <svg class="svg svg__16">
                                                                <use xlink:href="../images/sprite/sprite.svg#location"></use>
                                                            </svg>
                                                        </div>
                                                        <div class="location-label">Instytuts'ka St, 11, Khmelnytskyi, KNU</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-action">
                                                <a href="leaf.html" class="btn btn-outline fullwidth">
														<span class="btn-icon">
															<svg class="svg svg__32">
																<use xlink:href="../images/sprite/sprite.svg#leaf"></use>
															</svg>
														</span>
                                                    <span class="btn-title">Visit event</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tree-events-item tree-modal-toggle" data-event-id="4">
                                    <span class="leaf-title">Taco Tuesday</span>
                                    <a href="leaf.html" class="leaf-link"></a>
                                    <div class="tree-modal">
                                        <div class="box">
                                            <div class="box-thumb">
                                                <img src="https://images.unsplash.com/photo-1648764189912-8462c7afa6bd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyNHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=60" alt="Event Name">
                                            </div>
                                            <div class="box-body">
                                                <div class="event-description">
                                                    <div>
                                                        <p class="event-description-title h-3">Taco Tuesday</p>
                                                        <div class="event-description-categories">
                                                            <p class="tag tag-events">Events</p>
                                                        </div>
                                                    </div>
                                                    <p class="event-description-item paragraph-md">Silent discos are popular at music festivals as they allow dancing to continue past noise curfews</p>
                                                    <div class="event-description-date date">
                                                        <div class="date-icon">
                                                            <svg class="svg svg__16">
                                                                <use xlink:href="../images/sprite/sprite.svg#calendar"></use>
                                                            </svg>
                                                        </div>
                                                        <div class="date-label">20 Feb 2022 05:30 PM</div>
                                                    </div>
                                                    <div class="event-description-location location">
                                                        <div class="location-icon">
                                                            <svg class="svg svg__16">
                                                                <use xlink:href="../images/sprite/sprite.svg#location"></use>
                                                            </svg>
                                                        </div>
                                                        <div class="location-label">Instytuts'ka St, 11, Khmelnytskyi, KNU</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-action">
                                                <a href="leaf.html" class="btn btn-outline fullwidth">
														<span class="btn-icon">
															<svg class="svg svg__32">
																<use xlink:href="../images/sprite/sprite.svg#leaf"></use>
															</svg>
														</span>
                                                    <span class="btn-title">Visit event</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tree-events-item tree-modal-toggle" data-event-id="5">
                                    <span class="leaf-title">Movie Theatre Showing</span>
                                    <a href="leaf.html" class="leaf-link"></a>
                                    <div class="tree-modal">
                                        <div class="box">
                                            <div class="box-thumb">
                                                <img src="https://images.unsplash.com/photo-1648638470673-b684f87682c5?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyN3x8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=60" alt="Event Name">
                                            </div>
                                            <div class="box-body">
                                                <div class="event-description">
                                                    <div>
                                                        <p class="event-description-title h-3">Movie Theatre Showing</p>
                                                        <div class="event-description-categories">
                                                            <p class="tag tag-events">Events</p>
                                                        </div>
                                                    </div>
                                                    <p class="event-description-item paragraph-md">Silent discos are popular at music festivals as they allow dancing to continue past noise curfews</p>
                                                    <div class="event-description-date date">
                                                        <div class="date-icon">
                                                            <svg class="svg svg__16">
                                                                <use xlink:href="../images/sprite/sprite.svg#calendar"></use>
                                                            </svg>
                                                        </div>
                                                        <div class="date-label">20 Feb 2022 05:30 PM</div>
                                                    </div>
                                                    <div class="event-description-location location">
                                                        <div class="location-icon">
                                                            <svg class="svg svg__16">
                                                                <use xlink:href="../images/sprite/sprite.svg#location"></use>
                                                            </svg>
                                                        </div>
                                                        <div class="location-label">Instytuts'ka St, 11, Khmelnytskyi, KNU</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-action">
                                                <a href="leaf.html" class="btn btn-outline fullwidth">
														<span class="btn-icon">
															<svg class="svg svg__32">
																<use xlink:href="../images/sprite/sprite.svg#leaf"></use>
															</svg>
														</span>
                                                    <span class="btn-title">Visit event</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tree-events-item tree-modal-toggle" data-event-id="6">
                                    <span class="leaf-title">Drive in Movie</span>
                                    <a href="leaf.html" class="leaf-link"></a>
                                    <div class="tree-modal">
                                        <div class="box">
                                            <div class="box-thumb">
                                                <img src="https://images.unsplash.com/photo-1648737154448-ccf0cafae1c2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDF8MHxlZGl0b3JpYWwtZmVlZHwzMXx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=60" alt="Event Name">
                                            </div>
                                            <div class="box-body">
                                                <div class="event-description">
                                                    <div>
                                                        <p class="event-description-title h-3">Drive in Movie</p>
                                                        <div class="event-description-categories">
                                                            <p class="tag tag-events">Events</p>
                                                        </div>
                                                    </div>
                                                    <p class="event-description-item paragraph-md">Silent discos are popular at music festivals as they allow dancing to continue past noise curfews</p>
                                                    <div class="event-description-date date">
                                                        <div class="date-icon">
                                                            <svg class="svg svg__16">
                                                                <use xlink:href="../images/sprite/sprite.svg#calendar"></use>
                                                            </svg>
                                                        </div>
                                                        <div class="date-label">20 Feb 2022 05:30 PM</div>
                                                    </div>
                                                    <div class="event-description-location location">
                                                        <div class="location-icon">
                                                            <svg class="svg svg__16">
                                                                <use xlink:href="../images/sprite/sprite.svg#location"></use>
                                                            </svg>
                                                        </div>
                                                        <div class="location-label">Instytuts'ka St, 11, Khmelnytskyi, KNU</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-action">
                                                <a href="leaf.html" class="btn btn-outline fullwidth">
														<span class="btn-icon">
															<svg class="svg svg__32">
																<use xlink:href="../images/sprite/sprite.svg#leaf"></use>
															</svg>
														</span>
                                                    <span class="btn-title">Visit event</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tree-events-item tree-modal-toggle" data-event-id="7">
                                    <span class="leaf-title">Interships</span>
                                    <a href="leaf.html" class="leaf-link"></a>
                                    <div class="tree-modal">
                                        <div class="box">
                                            <div class="box-thumb">
                                                <img src="https://images.unsplash.com/photo-1648735257013-2fb9604b15c6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwzNnx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=60" alt="Event Name">
                                            </div>
                                            <div class="box-body">
                                                <div class="event-description">
                                                    <div>
                                                        <p class="event-description-title h-3">Interships</p>
                                                        <div class="event-description-categories">
                                                            <p class="tag tag-events">Events</p>
                                                        </div>
                                                    </div>
                                                    <p class="event-description-item paragraph-md">Silent discos are popular at music festivals as they allow dancing to continue past noise curfews</p>
                                                    <div class="event-description-date date">
                                                        <div class="date-icon">
                                                            <svg class="svg svg__16">
                                                                <use xlink:href="../images/sprite/sprite.svg#calendar"></use>
                                                            </svg>
                                                        </div>
                                                        <div class="date-label">20 Feb 2022 05:30 PM</div>
                                                    </div>
                                                    <div class="event-description-location location">
                                                        <div class="location-icon">
                                                            <svg class="svg svg__16">
                                                                <use xlink:href="../images/sprite/sprite.svg#location"></use>
                                                            </svg>
                                                        </div>
                                                        <div class="location-label">Instytuts'ka St, 11, Khmelnytskyi, KNU</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-action">
                                                <a href="leaf.html" class="btn btn-outline fullwidth">
														<span class="btn-icon">
															<svg class="svg svg__32">
																<use xlink:href="../images/sprite/sprite.svg#leaf"></use>
															</svg>
														</span>
                                                    <span class="btn-title">Visit event</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tree-events-item tree-modal-toggle" data-event-id="8">
                                    <span class="leaf-title">Q&A</span>
                                    <a href="leaf.html" class="leaf-link"></a>
                                    <div class="tree-modal">
                                        <div class="box">
                                            <div class="box-thumb">
                                                <img src="https://images.unsplash.com/photo-1648737966005-f6b62f4d4394?ixlib=rb-1.2.1&ixid=MnwxMjA3fDF8MHxlZGl0b3JpYWwtZmVlZHw0Nnx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=60" alt="Event Name">
                                            </div>
                                            <div class="box-body">
                                                <div class="event-description">
                                                    <div>
                                                        <p class="event-description-title h-3">Q&A</p>
                                                        <div class="event-description-categories">
                                                            <p class="tag tag-events">Events</p>
                                                        </div>
                                                    </div>
                                                    <p class="event-description-item paragraph-md">Silent discos are popular at music festivals as they allow dancing to continue past noise curfews</p>
                                                    <div class="event-description-date date">
                                                        <div class="date-icon">
                                                            <svg class="svg svg__16">
                                                                <use xlink:href="../images/sprite/sprite.svg#calendar"></use>
                                                            </svg>
                                                        </div>
                                                        <div class="date-label">20 Feb 2022 05:30 PM</div>
                                                    </div>
                                                    <div class="event-description-location location">
                                                        <div class="location-icon">
                                                            <svg class="svg svg__16">
                                                                <use xlink:href="../images/sprite/sprite.svg#location"></use>
                                                            </svg>
                                                        </div>
                                                        <div class="location-label">Instytuts'ka St, 11, Khmelnytskyi, KNU</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-action">
                                                <a href="leaf.html" class="btn btn-outline fullwidth">
														<span class="btn-icon">
															<svg class="svg svg__32">
																<use xlink:href="../images/sprite/sprite.svg#leaf"></use>
															</svg>
														</span>
                                                    <span class="btn-title">Visit event</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="pagination" data-total-count="90" data-visible-count="8">
                                <div class="pagination-list">
                                    <a href="#" class="pagination-list-item pagination-arrow" data-transition="pagination"></a>
                                    <div class="pagination-list-numbers"></div>
                                    <a href="#" class="pagination-list-item pagination-arrow" data-transition="pagination"></a>
                                </div>
                            </div>
                            <button class="btn btn-outline d-none d-md-inline-flex">
                                <span class="btn-title">Show me more</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection
