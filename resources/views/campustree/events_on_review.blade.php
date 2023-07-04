@extends('layouts.campustree_layout')
@section('title', 'Events On Review')
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
                    <a data-router-disabled href="{{ route('personal', Auth::user()->id) }}" class="breadcrumbs-item-link">Back to Personal tree</a>
                  </div>
                </div>
                <h1 class="h-1">Events on review</h1>
              </div>
              <div class="section-description">
                <p class="paragraph">Found {{ count($posts) }} events</p>
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
                                        <input type="radio" name="sort" value="title" class="input input-checkbox" @if(request()->get('sort') == 'title') checked @endif>
                                        <span class="input-checkbox-icon">
																	<svg class="svg svg__16">
																		<use xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
																	</svg>
																</span>
                                        <span class="input-checkbox-title">Title</span>
                                    </label>
                                    <label class="input-container">
                                        <input type="radio" name="sort" value="status" class="input input-checkbox" @if(request()->get('sort') == 'status') checked @endif>
                                        <span class="input-checkbox-icon">
																	<svg class="svg svg__16">
																		<use xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
																	</svg>
																</span>
                                        <span class="input-checkbox-title">Status</span>
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
                    @foreach($posts as $post)
                        <div class="tree-events-item tree-modal-toggle" data-event-id="{{$count}}">

                            <a data-router-disabled href="{{ route('showLeaf', $post->id) }}" class="leaf-link"><span class="leaf-title">{{ $post->title }}</span></a>
                            <div class="tree-modal">
                                <div class="box">
                                    <div class="box-thumb">
                                        <img src="/{{ $post->img }}" alt="{{ $post->title }}">
                                    </div>
                                    <div class="box-body">
                                        <div class="event-description">
                                            <div>
                                                <a data-router-disabled href="{{ route('showLeaf', $post->id) }}"><p class="event-description-title h-3">{{ $post->title }}</p></a>
                                                <div class="event-description-categories">
                                                    <p class="tag {{ $post->category->color }}">{{ $post->category->title }}</p>
                                                </div>
                                            </div>
                                            <p class="event-description-item paragraph-md">{{ $post->text }}</p>
                                            <div class="event-description-date date">
                                                <div class="date-icon">
                                                    <svg class="svg svg__16">
                                                        <use xlink:href="/campustree/images/sprite/sprite.svg#calendar"></use>
                                                    </svg>
                                                </div>
                                                <div class="date-label">{{ $post->event_date }} {{ $post->event_time }}</div>
                                            </div>
                                            <div class="event-description-location location">
                                                <div class="location-icon">
                                                    <svg class="svg svg__16">
                                                        <use xlink:href="/campustree/images/sprite/sprite.svg#location"></use>
                                                    </svg>
                                                </div>
                                                <div class="location-label">{{ $post->location }}</div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="box-action">
                                        <div class="status">
                                            <div class="event-description-status paragraph-status @if($post->status == 10)alumni @else primary @endif">@if($post->status == 10) Declined @else Approved @endif</div>
                                        </div>
                                        @if(Auth::user()->hasRole('admin'))
                                        <div class="dropdown dropdown-select __right">
                                            <p class="dropdown-trigger dropdown-trigger-title" data-fieldset-label="event-{{$count}}" data-label="Change status">Change status</p>
                                            <div class="dropdown-body">
                                                <div class="dropdown-body-item">
                                                    <fieldset class="fieldset" data-fieldset-list="event-{{$count}}">
                                                        <form class="statusForm" action="{{ route('changeStatus') }}" method="POST">
                                                            @csrf
                                                            <input class="post_id" type="hidden" value="{{$post->id}}">
                                                            <label class="input-container">
                                                                <input type="radio" name="status" value="10" class="input input-checkbox">
                                                                <span class="paragraph paragraph-status alumni">Decline</span>
                                                            </label>
                                                            <label class="input-container">
                                                                <input type="radio" name="status" value="0" class="input input-checkbox">
                                                                <span class="paragraph paragraph-status primary">Approve</span>
                                                            </label>
                                                        </form>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="box-action">
                                        <a data-router-disabled href="{{ route('editLeaf', $post->id) }}" class="btn btn-outline fullwidth">
														<span class="btn-icon">
															<svg class="svg svg__16">
																<use xlink:href="/campustree/images/sprite/sprite.svg#edit"></use>
															</svg>
														</span>
                                            <span class="btn-title">Edit</span>
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
              </div>
{{--              <div class="d-flex justify-content-between align-items-center">--}}
{{--                  {{ $posts->appends(request()->query())->links('pagination.index') }}--}}
{{--              </div>--}}
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

@endsection
@section('custom-js')
    <script>

        $(document).ready(function(){
            $(document).on('change', '[name="sort"]', function () {
                let query = $(this).val();
                const urlParams = new URLSearchParams(window.location.search);
                urlParams.set('sort', query);
                history.pushState(null, null, "?" + urlParams.toString());
                window.location.reload();
            });

            $('[name="status"]').on('click', function () {
                let thisIt = $(this);
                let data = {
                    "val" : $(this).val(),
                    "post" : $(this).closest('form').find('.post_id').val()
                }
                // console.log(data);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "post",
                    url: "{{route('events_on_review')}}",
                    data: data,
                    success: function (data) {
                        thisIt.closest('.box-action').find('.status').html('');
                        thisIt.closest('.box-action').find('.status').append(data);
                    },
                    error: function (data) {
                        // Android.passParams(url);
                    }
                });
            });
        });
    </script>
@endsection
