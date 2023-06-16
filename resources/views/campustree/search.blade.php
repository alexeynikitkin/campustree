@extends('layouts.campustree_layout')
@section('title', 'Search')
@section('content')

<div data-router-wrapper>
    <div data-router-view="searchResult">
        <section class="section section-inner">
            <div class="container">
                <div class="section-bg">
                    <img data-src="/campustree/images/abstract/tree.svg" alt="Campus Tree">
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
                                <div class="filters-item">
                                    <div class="dropdown __left-sm">
                                        <p class="dropdown-trigger-label">Sort by</p>
                                        <p class="dropdown-trigger dropdown-trigger-title" data-fieldset-label="filter-sort" data-label="Popular">Popular</p>
                                        <div class="dropdown-body">
                                            <div class="dropdown-body-item">
                                                <fieldset class="fieldset" data-fieldset-list="filter-sort">
                                                    <label class="input-container">
                                                        <input type="radio" name="sort" value="name" class="input input-checkbox">
                                                        <span class="input-checkbox-icon">
																<svg class="svg svg__16">
																	<use xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
																</svg>
															</span>
                                                        <span class="input-checkbox-title">Name</span>
                                                    </label>
                                                    <label class="input-container">
                                                        <input type="radio" name="sort" value="date" class="input input-checkbox">
                                                        <span class="input-checkbox-icon">
																<svg class="svg svg__16">
																	<use xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
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
                                @php
                                    $count = 1;
                                    @endphp
                                @foreach($leaves as $leaf)
                                    <div class="tree-events-item tree-modal-toggle" data-event-id="{{ $count }}">
                                        <span class="leaf-title">{{$leaf->title}}</span>
                                        <a href="{{ route('showLeaf', $leaf->id ) }}" class="leaf-link"></a>
                                        <div class="tree-modal">
                                            <div class="box">
                                                <div class="box-thumb">
                                                    <img src="{{ $leaf->img }}" alt="Event Name">
                                                </div>
                                                <div class="box-body">
                                                    <div class="event-description">
                                                        <div>
                                                            <p class="event-description-title h-3">{{$leaf->title}}</p>
                                                            <div class="event-description-categories">
                                                                <p class="tag tag-events">{{ $leaf->category->title }}</p>
                                                            </div>
                                                        </div>
                                                        <p class="event-description-item paragraph-md">{{ strip_tags($leaf->text) }}</p>
                                                        <div class="event-description-date date">
                                                            <div class="date-icon">
                                                                <svg class="svg svg__16">
                                                                    <use xlink:href="/campustree/images/sprite/sprite.svg#calendar"></use>
                                                                </svg>
                                                            </div>
                                                            <div class="date-label">{{ $leaf->created_at }}</div>
                                                        </div>
{{--                                                        <div class="event-description-location location">--}}
{{--                                                            <div class="location-icon">--}}
{{--                                                                <svg class="svg svg__16">--}}
{{--                                                                    <use xlink:href="/campustree/images/sprite/sprite.svg#location"></use>--}}
{{--                                                                </svg>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="location-label">Instytuts'ka St, 11, Khmelnytskyi, KNU</div>--}}
{{--                                                        </div>--}}
                                                    </div>
                                                </div>
                                                <div class="box-action">
                                                    <a href="{{ route('showLeaf', $leaf->id ) }}" class="btn btn-outline fullwidth">
												<span class="btn-icon">
													<svg class="svg svg__32">
														<use xlink:href="/campustree/images/sprite/sprite.svg#leaf"></use>
													</svg>
												</span>
                                                        <span class="btn-title">Visit event</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                    $count++;
                                    @endphp
                                @endforeach

                        </div>
                        <div class="row">
                            {{ $leaves->appends(request()->query())->links('pagination.index') }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection
