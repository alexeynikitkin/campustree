@extends('layouts.campustree_layout')
@section('title', 'Create Leaf')
@section('content')
    <div data-router-wrapper>
        <div data-router-view="leaf">
            <section class="section section-inner section-event">
                <div class="container">
    {{--                    <!--		BOX ONLY FOR ADMIN			-->--}}
    {{--                    <div class="row">--}}
    {{--                        <div class="col-12">--}}
    {{--                            <form>--}}
    {{--                                <div class="box create-row" id="event-creation">--}}
    {{--                                    <div class="create-row-item">--}}
    {{--                                        <div class="dropdown dropdown-select dropdown-select-lg">--}}
    {{--                                            <p class="dropdown-trigger dropdown-trigger-title" data-fieldset-label="event-create" data-label="Change status">Change status</p>--}}
    {{--                                            <div class="dropdown-body">--}}
    {{--                                                <div class="dropdown-body-item">--}}
    {{--                                                    <fieldset class="fieldset" data-fieldset-list="event-create">--}}
    {{--                                                        <label class="input-container">--}}
    {{--                                                            <input type="radio" name="event-0-status" value="Edit" class="input input-checkbox">--}}
    {{--                                                            <span class="paragraph paragraph-status">Edit</span>--}}
    {{--                                                        </label>--}}
    {{--                                                        <label class="input-container">--}}
    {{--                                                            <input type="radio" name="event-0-status" value="Declive" class="input input-checkbox">--}}
    {{--                                                            <span class="paragraph paragraph-status alumni">Declive</span>--}}
    {{--                                                        </label>--}}
    {{--                                                        <label class="input-container">--}}
    {{--                                                            <input type="radio" name="event-0-status" value="Aprowe" class="input input-checkbox">--}}
    {{--                                                            <span class="paragraph paragraph-status primary">Aprowe</span>--}}
    {{--                                                        </label>--}}
    {{--                                                        <label class="input-container">--}}
    {{--                                                            <input type="radio" name="event-0-status" value="Request to edit" class="input input-checkbox">--}}
    {{--                                                            <span class="paragraph paragraph-status clubs">Request to edit</span>--}}
    {{--                                                        </label>--}}
    {{--                                                    </fieldset>--}}
    {{--                                                </div>--}}
    {{--                                            </div>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="create-row-item __full">--}}
    {{--                                        <label class="input-container">--}}
    {{--                                            <input type="text" class="input" placeholder="Message to a leaf creator (optional)">--}}
    {{--                                        </label>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="create-row-item">--}}
    {{--                                        <div class="group-buttons">--}}
    {{--                                            <button class="btn"><span class="btn-title">Submit</span></button>--}}
    {{--                                            <button class="btn btn-outline reset-btn" data-reset-box="#event-creation"><span class="btn-title">Cancel</span></button>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </form>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <!--		END BOX ONLY FOR ADMIN			-->--}}
                    <form id="leaf-creation-form" action="{{ route('storeLeaf') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="box-banner box-banner-drop">
                                    <label class="input-container input-container-file">
                                        <input type="file" name="banner" class="input" hidden required/>
                                        <span class="person-thumb-upload">
											<svg class="svg svg__16">
												<use xlink:href="/campustree/images/sprite/sprite.svg#upload"></use>
											</svg>
										</span>
                                        <span class="paragraph paragraph-medium paragraph-lg">For the best results on all devices, use an image that’s at least 2048 x 1152 pixels and 6MB or less.</span>
                                        <span class="input-message __error">This field is required!</span>
                                        <img src="https://images.unsplash.com/photo-1651150538959-004f6ccecdb5?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2670&q=80" alt="">
                                    </label>
                                    <div class="btn btn-md mt-2" id="change-banner">
                                        <span class="btn-title">Change banner</span>
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                        <div class="row">--}}
{{--                            <div class="col-12">--}}
{{--                                <div class="attention">--}}
{{--                                    <div class="attention-icon">--}}
{{--                                        <svg class="svg svg__24">--}}
{{--                                            <use xlink:href="/campustree/images/sprite/sprite.svg#attention"></use>--}}
{{--                                        </svg>--}}
{{--                                    </div>--}}
{{--                                    <p class="attention-description">Your event was not approved because...</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="box">
{{--                            <div class="row">--}}
{{--                                <div class="col-12">--}}
{{--                                    <p class="paragraph paragraph-status primary">Approved</p>--}}
{{--                                    <!--									<p class="paragraph paragraph-status __not-approved">Not approved</p>-->--}}
{{--                                    <h1 class="h-1 mt-2 mb-4">Leaf creation</h1>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="input-container input-container-group">
                                        <input name="title" type="text" class="input" placeholder="Leaf Title" required>
                                        <span class="input-message __error">This field is required!</span>
                                    </label>
                                    <label class="input-container input-container-group input-container-select">
                                        <select name="cat_id" class="select" required>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                        <span class="input-message __error">This field is required!</span>
                                    </label>
                                    <label class="input-container input-container-group">
                                        <textarea name="text" placeholder="About leaf" class="textarea"></textarea>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
{{--                                        <div class="col-lg-6">--}}
{{--                                            <label class="input-container input-container-group input-container-datepicker __top __right">--}}
{{--                                                <input  type="text" name="date" class="input input-datepicker" placeholder="Date" readonly="readonly" required>--}}
{{--                                                <span class="input-container-icon __16 __right">--}}
{{--													<svg class="svg svg__16">--}}
{{--														<use xlink:href="/campustree/images/sprite/sprite.svg#calendar-xs"></use>--}}
{{--													</svg>--}}
{{--												</span>--}}
{{--                                                <span class="input-message __error">This field is required!</span>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-6">--}}
{{--                                            <label class="input-container input-container-group">--}}
{{--                                                <input type="text" name="date" class="input input-timepicker" placeholder="Time" readonly="readonly" required>--}}
{{--                                                <span class="input-container-icon __16 __right">--}}
{{--													<svg class="svg svg__16">--}}
{{--														<use xlink:href="/campustree/images/sprite/sprite.svg#clock"></use>--}}
{{--													</svg>--}}
{{--												</span>--}}
{{--                                                <span class="input-message __error">This field is required!</span>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-6">--}}
{{--                                            <label class="input-container input-container-group">--}}
{{--                                                <input type="text" class="input" placeholder="Location" required>--}}
{{--                                                <span class="input-message __error">This field is required!</span>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-6">--}}
{{--                                            <div class="input-container input-container-group">--}}
{{--                                                <input type="text" class="input" placeholder="Google map link" required>--}}
{{--                                                <span class="input-message __error">This field is required!</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-12">--}}
{{--                                            <div class="input-tags input-container">--}}
{{--                                                <ul class="input-tags-results"></ul>--}}
{{--                                                <input class="input-tags-text" type="text" name="fruit" id="objects" placeholder="Text">--}}
{{--                                                <div class="input-tags-suggestions">--}}
{{--                                                    <ul class="input-tags-body">--}}
{{--                                                        <li>potato</li>--}}
{{--                                                        <li>tomato</li>--}}
{{--                                                        <li>orange</li>--}}
{{--                                                        <li>apple</li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="col-12">
                                            <div class="upload-container">
                                                <label class="input-container input-container-file">
                                                    <span class="upload-file">
                                                        <input name="img" type="file" class="input" hidden required>
                                                        <span class="person-thumb __event">
                                                            <img src="https://images.unsplash.com/photo-1651158600074-27309fd0d793?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNXx8fGVufDB8fHx8&auto=format&fit=crop&w=500&q=60" alt="Joey Tribbiani">
                                                            <span class="person-thumb-upload">
                                                                <svg class="svg svg__16">
                                                                        <use xlink:href="/campustree/images/sprite/sprite.svg#upload"></use>
                                                                </svg>
                                                            </span>
                                                        </span>
                                                    </span>

                                                    <span class="upload-text h-4">Upload a photo</span>
                                                    <span class="input-message __error">This field is required!</span>
                                                </label>
                                                <div class="form-group">
                                                    <label for="feature_image">Leaf Image</label>
                                                    <img src="" alt="" class="img-uploaded" width="100px" height="100px" style="display: block; margin-bottom: 10px"/>
                                                    <input class="form-control"  type="text" id="feature_image" name="img" value="" readonly>
                                                    <a href="" class="popup_selector btn btn-primary mt-2" data-inputid="feature_image">Select Image</a>
                                                </div>
{{--                                                <label class="input-container input-container-checkbox">--}}
{{--                                                    <input type="checkbox" name="ongoing" class="input input-checkbox">--}}
{{--                                                    <span class="input-checkbox-switcher"></span>--}}
{{--                                                    <span class="input-checkbox-title">Ongoing</span>--}}
{{--                                                </label>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="group group-buttons">
                                        <button class="btn">
                                            <span class="btn-title">Save and send for review</span>
                                        </button>
                                        <a href="{{ route('campus.home') }}" class="btn btn-outline">
                                            <span class="btn-title">Cancel</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection

