<?php

namespace App\Http\Controllers\Campustree;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Faculty;
use App\Models\Friend;
use App\Models\Notification;
use App\Models\Participation;
use App\Models\Post;
use App\Models\Sex;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CampusHomeController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $currentuser = User::find($userId);
        $leaves = Post::where('status','=','0')->get();
        $branches = Category::paginate(6);
        return view('campustree.home', [
            'leaves' => $leaves,
            'branches' => $branches,
            'user' => $currentuser
        ]);
    }

    public function showLeaf($id, Request $request)
    {
        if (auth()->user()) {
            $friends_accepted = Friend::where('accepted', 1)
                ->where(function ($query) {
                    $query->where('user_id', Auth::user()->id)
                        ->orWhere('friend_id', Auth::user()->id);
                })->get();
            $resultIds = [];
            foreach ($friends_accepted as $friend) {
                $resultId = $friend->user_id;
                if ($friend->user_id == Auth::user()->id) {
                    $resultId = $friend->friend_id;
                }
                array_push($resultIds, $resultId);
            }
            $friends = Friend::where('user_id', auth()->user()->id)->get();
            $participation = Participation::where([
                'leaf_id' => $id,
                'user_id' => Auth::user()->id
            ])->first();
//            $participation = Auth::user()->participations()->where('leaf_id', $id)->get();
            $comments = Comment::where('leaf_id', $id)->get();
            $leaf = Post::where('id', $id)->firstOrFail();

            if ($request->ajax()) {
                $output = '';
                $query = $request->get('query');
                $query1 = $request->get('query1');
                if($query != '') {
                    foreach ($resultIds as $friend) {
                        $users = User::where('name', 'LIKE', '%' . $query . '%')->where('id', $friend)->get();
                        $part = Participation::where('user_id', $friend)->where('leaf_id', $leaf->id)->get();
                        $partIds = [];
                        foreach ($part as $i) {
                            array_push($partIds, $i->user_id);
                        }
                        foreach($users as $user) {
                            if($user) {
                                if (in_array($user->id, $partIds)) {
                                    $output .= '<div class="person">
                        <div class="person-checkbox">
                            <label
                                class="input-container input-container-checkbox">
                        </span>
                            </label>
                        </div>
                        <div class="person-thumb"
                             data-thumb-title="'. $user->name .'">
                            <img
                                src="/'. $user->user_img .'"
                                alt="'. $user->name .'">
                        </div>
                        <div class="person-description">
                            <p class="person-description-title paragraph-medium">'. $user->name .'</p>
                            <p class="person-description-item paragraph-md">'. $user->user_bio .'</p>
                        </div>
                    </div>';
                                }
                            }
                        }

                    }
                }
                elseif($query1 != '') {
                    foreach ($resultIds as $friend) {
                        $users = User::where('name', 'LIKE', '%' . $query1 . '%')->where('id', $friend)->get();
                        $part = Participation::where('user_id', $friend)->where('leaf_id', $leaf->id)->get();
                        $partIds = [];
                        foreach ($part as $i) {
                            array_push($partIds, $i->user_id);
                        }
                        foreach($users as $user) {
                            if($user) {
                                if (in_array($user->id, $partIds)){
                                    $output .= '';
                                }
                                else{
                                    $output .= '<div class="person">
                                                    <div class="person-checkbox">
                                                        <label
                                                            class="input-container input-container-checkbox">
                                                            <input type="checkbox"
                                                                   class="going input input-checkbox input-checkbox-sm"
                                                                   data-value="'.$user->id.'">
                                                            <span
                                                                class="input-checkbox-icon">
                                                                <svg class="svg svg__16">
                                                                    <use
                                                                        xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
                                                                </svg>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <div class="person-thumb"
                                                         data-thumb-title="'.$user->name.'">
                                                        <img
                                                            src="/'.$user->user_img.'"
                                                            alt="'.$user->name.'">
                                                    </div>
                                                    <div class="person-description">
                                                        <p class="person-description-title paragraph-medium">
                                                            '.$user->name.'</p>
                                                        <p class="person-description-item paragraph-md">
                                                            '.$user->user_bio.'</p>
                                                    </div>
                                                </div>';
                                }
                            }
                        }
                    }
                } else {
                    foreach ($resultIds as $friend) {
                        $users = User::where('id', $friend)->get();
                        $part = Participation::where('user_id', $friend)->where('leaf_id', $leaf->id)->get();
                        $partIds = [];
                        foreach ($part as $i) {
                            array_push($partIds, $i->user_id);
                        }
                        foreach($users as $user) {
                            if($user) {
                                if (in_array($user->id, $partIds)){
                                    $output .= '';
                                }
                                else{
                                    $output .= '<div class="person">
                                                    <div class="person-checkbox">
                                                        <label
                                                            class="input-container input-container-checkbox">
                                                            <input type="checkbox"
                                                                   class="going input input-checkbox input-checkbox-sm"
                                                                   data-value="'.$user->id.'">
                                                            <span
                                                                class="input-checkbox-icon">
                                                                <svg class="svg svg__16">
                                                                    <use
                                                                        xlink:href="/campustree/images/sprite/sprite.svg#check"></use>
                                                                </svg>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <div class="person-thumb"
                                                         data-thumb-title="'.$user->name.'">
                                                        <img
                                                            src="/'.$user->user_img.'"
                                                            alt="'.$user->name.'">
                                                    </div>
                                                    <div class="person-description">
                                                        <p class="person-description-title paragraph-medium">
                                                            '.$user->name.'</p>
                                                        <p class="person-description-item paragraph-md">
                                                            '.$user->user_bio.'</p>
                                                    </div>
                                                </div>';
                                }
                            }
                        }
                    }
                }
                return $output;
            }

            return view('campustree.leaf', [
                'leaf' => $leaf,
                'comments' => $comments,
                'friends' => $friends,
                'participation' => $participation,
                'resultIds' => $resultIds
            ]);
        } else {
            $comments = Comment::where('leaf_id', $id)->get();
            $leaf = Post::where('id', $id)->firstOrFail();
            return view('campustree.leaf', [
                'leaf' => $leaf,
                'comments' => $comments,
                'participation' => []
            ]);
        }


    }

    public function showBranch($id)
    {
        $branch = Category::where('id', $id)->firstOrFail();
        return view('campustree.branch', [
            'branch' => $branch,
            'posts' => Post::filter(request(['name', 'date', 'event_date']))->where('cat_id', $id)->where('status','=','0')->paginate(13)
        ]);

    }

    public function createLeaf()
    {
        $categories = Category::all();
        return view('campustree.create_leaf', [
            'categories' => $categories
        ]);
    }

    public function storeLeaf(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->text = $request->text;
        $post->cat_id = $request->cat_id;
        $post->img = $request->img;
        $post->event_time = $request->event_time;
        $arr1 = explode('/', $request->event_date);
        $newDate = $arr1[2] . '-' . $arr1[1] . '-' . $arr1[0];
        $post->event_date = $newDate;
        $post->status = 10;
        $post->location = $request->location;
        $post->map = $request->map;
        $post->banner = $request->banner;
        $post->user_id = auth()->user()->id;
        $post->save();
        Session::flash('message','Leaf was created');
        return redirect('/');
    }

    public function editLeaf($id)
    {
        $categories = Category::all();
        return view('campustree.edit_leaf', [
            'post' => Post::find($id),
            'categories' => $categories
        ]);
    }

    public function updateLeaf(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->text = $request->text;
        $post->cat_id = $request->cat_id;
        $post->img = $request->img;
        $post->event_time = $request->event_time;
        $arr1 = explode('/', $request->event_date);
        $newDate = $arr1[2] . '-' . $arr1[1] . '-' . $arr1[0];
        $post->event_date = $newDate;
        $post->status = 0;
        $post->location = $request->location;
        $post->map = $request->map;
        $post->banner = $request->banner;
        $post->user_id = auth()->user()->id;
        $post->save();
        Session::flash('message','Leaf was updated');
        return redirect()->back();
    }

    public function personal($id)
    {
        $userId = Auth::id();
        $currentuser = User::find($id);
        $partIDs = Participation::where('user_id', $userId)->get();
        $arr = [];
        foreach ($partIDs as $id) {
            $arr[] = $id->leaf_id;
        }
        $postsArr = [];
        $branches1 = [];
        foreach ($arr as $a) {
            $postsArr[] = Post::where('id', $a)->first();
            $branches1[] = Post::where('id', $a)->first()->category;

        }
        $branches1 = array_unique($branches1);
        $branches = Category::paginate(6);
        return view('campustree.personal_page', [
            'user' => $currentuser,
            'leaves' => $postsArr,
            'branches' => $branches1,
            'arr' => $arr
        ]);
    }

    public function eventsOnReview(){
        if(Auth::user()->hasRole('admin')) {
            $posts = Post::filter(request(['sort']))->get();
        } else {
            $posts = Auth::user()->posts()->filter(request(['sort']))->get();
        }

        return view('campustree.events_on_review', [
            'posts' => $posts
        ]
        );
    }
    public function changeStatus(Request $request){
        if($request->ajax()) {
            $post = Post::find(intval($request->post));
            $post->status = $request->val;
            $post->save();
            $output = '<div class="event-description-status paragraph-status ';
            if($request->val == 0) {
                $output .= 'primary';
            } else {
                $output .= 'alumni';
            }
            $output .= '">';
            if($request->val == 0) {
                $output .= 'Approved';
            } else {
                $output .= 'Declined';
            }
            $output .='</div>';
            return $output;
        }
    }
    public function addLeafToUser($id, Request $request)
    {
        DB::table('participations')->insert([
            'user_id' => $request->user_id,
            'leaf_id' => $id
        ]);
        return redirect()->back();
    }

    public function deleteLeafFromUser($id, Request $request)
    {
        DB::table('participations')->where([
            'user_id' => $request->user_id,
            'leaf_id' => $id
        ])->delete();
        return redirect()->back();
    }

    public function allUsers()
    {
        $user_friend = Auth::user()->friends;
        $friend_user = Auth::user()->friendsReceiver;
        $cats = Category::all();
        $sexes = Sex::all();
        $faculties = Faculty::all();
        return view('campustree.users', [
            'users' => User::where('id', '!=',auth()->user()->id)->filter(request(['name', 'sex', 'faculties', 'branches', 'sort']))->paginate(10),
            'sexes' => $sexes,
            'cats' => $cats,
            'user_friend' => $user_friend,
            'friend_user' => $friend_user,
            'faculties' => $faculties
        ]);
    }

    public function allFriends()
    {
        $cats = Category::all();
        $sexes = Sex::all();
        $faculties = Faculty::all();
        $friends1 = Friend::where('accepted', 1)
            ->where(function ($query) {
                $query->where('user_id', User::find(Auth::user()->id)->id)
                    ->orWhere('friend_id', User::find(Auth::user()->id)->id);
            })->get();
        $resultIds = [];
        foreach ($friends1 as $friend) {
            $resultId = $friend->user_id;
            if ($friend->user_id == Auth::user()->id) {
                $resultId = $friend->friend_id;
            }
            array_push($resultIds, $resultId);
        }

        return view('campustree.friends', [
            'resultIds' => $resultIds,
            'friends' => User::where('id', '!=',auth()->user()->id)->filter(request(['name', 'sex', 'faculties', 'branches', 'sort']))->paginate(10),
            'sexes' => $sexes,
            'cats' => $cats,
            'faculties' => $faculties
        ]);
    }

    public function friendsRequest()
    {
        $user_id = Friend::where('friend_id', Auth::user()->id)->first();
        $friends1 = [];
        if (Auth::user() != $user_id) {
            $friends1 = Friend::where('accepted', 0)
                ->where(function ($query) {
                    $query->where('friend_id', User::find(Auth::user()->id)->id);
                })->get();
        }
        $resultIds = [];
        foreach ($friends1 as $friend) {
            $resultId = $friend->user_id;
            if ($friend->user_id == Auth::user()->id) {
                $resultId = $friend->friend_id;
            }
            array_push($resultIds, $resultId);
        }
        $friends = User::all();
        return view('campustree.friends_request', [
            'resultIds' => $resultIds,
            'friends' => $friends
        ]);
    }

    public function search()
    {
        return view('campustree.search', [
            'leaves' => Post::filter(request(['search', 'filter-branches', 'sort']))->where('status','=','0')->paginate(6),
        ]);
    }

    public function leaftofriend(Request $request)
    {
        $arr = array_unique(explode(',', $request->ongoing));
        foreach ($arr as $i) {
            $notification = new Notification;
            $notification->user_id = auth()->user()->id;
            $notification->friend_id = intval($i);
            $notification->leaf_id = intval($request->eventid);
            $notification->type = 'add-to-leaf';
            $notification->save();
        }
        return redirect()->back()->with('message', 'Friend or friends are invited');
    }

}
