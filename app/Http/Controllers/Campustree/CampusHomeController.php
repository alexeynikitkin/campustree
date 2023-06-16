<?php

namespace App\Http\Controllers\Campustree;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Friend;
use App\Models\Participation;
use App\Models\Post;
use App\Models\Sex;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CampusHomeController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $currentuser = User::find($userId);
        $leaves = Post::all();
        $branches = Category::paginate(6);
        return view('campustree.home', [
            'leaves' => $leaves,
            'branches' => $branches,
            'user' => $currentuser
        ]);
    }

    public function showLeaf($id)
    {
        if(auth()->user()) {
            $friends = Auth::user()->friends()->get();
            $participation = Participation::where([
                'leaf_id' => $id,
                'user_id' => Auth::user()->id
            ])->first();
//            $participation = Auth::user()->participations()->where('leaf_id', $id)->get();
            $comments = Comment::where('leaf_id', $id)->get();
            $leaf = Post::where('id', $id)->firstOrFail();
            return view('campustree.leaf', [
                'leaf' => $leaf,
                'comments' => $comments,
                'friends' => $friends,
                'participation' => $participation
            ]);
        }
        else {
            $comments = Comment::where('leaf_id', $id)->get();
            $leaf = Post::where('id', $id)->firstOrFail();
            return view('campustree.leaf', [
                'leaf' => $leaf,
                'comments' => $comments,
                'participation' => []
            ]);
        }


    }

    public function showBranch($id, Request $request)
    {
        $query = $request->get('query');
        $arr = [];

        if ($request->ajax()) {
            parse_str( parse_url( $query, PHP_URL_QUERY), $arr );
//            $data = DB::table('posts');
//            if($arr['title']) {
//                $data->where('title', 'LIKE', '%' . $arr['title'] . '%')
//                    ->where('cat_id', $id)
//                    ->limit(13)
//                    ->get();
//            }
            if(!empty($arr)) {
                $data = Post::where('cat_id', $id)
                    ->where(function ($query) use ($arr) {
                        if(!empty($arr['title'])) {
                            $query->where('title', 'LIKE', '%' . $arr['title'] . '%');
                        }
                        if(!empty($arr['event_date'])) {
                            $query->where('event_date', '>', date("Y-m-d", strtotime("-" . $arr['event_date'] )));
                        }
                    })
                    ->get();
            } else {
                $data = Post::where('cat_id', $id)->get();
                dd(1);
            }




            $output = '';
            if (count($data) > 0) {
            $count = 1;
                foreach ($data as $post) {
                    $output .= '<div class="tree-events-item tree-modal-toggle" data-event-id="'.$count.'">
                                            <span class="leaf-title">'.$post->title .'</span>
                                            <a href="'.route('showLeaf', $post->id).'" class="leaf-link"></a>
                                            <div class="tree-modal">
                                                <div class="box">
                                                    <div class="box-thumb">
                                                        <img src="\\'.$post->img.'" alt="'.$post->title.'">
                                                    </div>
                                                    <div class="box-body">
                                                        <div class="event-description">
                                                            <div>
                                                                <p class="event-description-title h-3">'.$post->title .'</p>
                                                                <div class="event-description-categories">
                                                                    <p class="tag tag-events">'.$post->category->title .'</p>
                                                                </div>
                                                            </div>
                                                            <p class="event-description-item paragraph-md">'.strip_tags($post->text) .'</p>
                                                            <div class="event-description-date date">
                                                                <div class="date-icon">
                                                                    <svg class="svg svg__16">
                                                                        <use xlink:href="/campustree/images/sprite/sprite.svg#calendar"></use>
                                                                    </svg>
                                                                </div>
                                                                <div class="date-label">'.$post->created_at .'</div>
                                                            </div>
                                                         </div>
                                                    </div>
                                                    <div class="box-action">
                                                        <a href="'.route('showLeaf', $post->id).'" class="btn btn-outline fullwidth">
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
                                        </div>';
                                        $count++;
                }
            }
            return $output;
        }
        $branch = Category::where('id', $id)->firstOrFail();
        $thisBranchPost = Post::where('cat_id', $id)->paginate(13);
        return view('campustree.branch', [
            'branch' => $branch,
            'posts' => $thisBranchPost
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
        $post->status = 0;
        $post->save();
        return redirect()->back()->withSuccess('Post was successfully added');
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
//        dd($branches1);
        $branches = Category::paginate(6);
        return view('campustree.personal_page' , [
            'user' => $currentuser,
            'leaves' => $postsArr,
            'branches' => $branches1
        ]);
    }

    public function addLeafToUser($id, Request $request){
        DB::table('participations')->insert([
            'user_id' => $request->user_id,
            'leaf_id' => $id
        ]);
        return redirect()->back();
    }

    public function deleteLeafFromUser($id, Request $request) {
        DB::table('participations')->where([
            'user_id' => $request->user_id,
            'leaf_id' => $id
        ])->delete();
        return redirect()->back();
    }

    public function allUsers(){
        $user_friend = Auth::user()->friends;
        $friend_user = Auth::user()->friendsReceiver;
        $users = User::all();
        $cats = Category::all();
        $sexes = Sex::all();
        return view('campustree.users', [
            'users' => $users,
            'sexes' => $sexes,
            'cats' => $cats,
            'user_friend' => $user_friend,
            'friend_user' => $friend_user
        ]);
    }

    public function allFriends(){
        $friends1 = Friend::where('accepted', 1)
            ->where(function ($query){
                $query->where('user_id', User::find(Auth::user()->id)->id )
                    ->orWhere('friend_id', User::find(Auth::user()->id)->id );
            })->get();
        $resultIds = [];
        foreach($friends1 as $friend) {
            $resultId = $friend->user_id;
            if($friend->user_id == Auth::user()->id) {
                $resultId = $friend->friend_id;
            }
            array_push($resultIds, $resultId);
        }
        $friends = User::all();
        return view('campustree.friends', [
            'resultIds' => $resultIds,
            'friends' => $friends
        ]);
    }

    public function friendsRequest(){
        $user_id = Friend::where('friend_id', Auth::user()->id)->first();
//        dd($user_id);
        $friends1 = [];
        if(Auth::user() != $user_id) {
            $friends1 = Friend::where('accepted', 0)
                ->where(function ($query){
                    $query->where('friend_id', User::find(Auth::user()->id)->id );
                })->get();
        }
        $resultIds = [];
        foreach($friends1 as $friend) {
            $resultId = $friend->user_id;
            if($friend->user_id == Auth::user()->id) {
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

    public function saveData(Request $request) {
        $user = new User;
        $user->name = $request->fname. ' ' .$request->lname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_bio = $request->description;
        $user->user_birth = $request->birthday;
//        $user->user_img = $request->user_img;
//        $user->cat_id = $request->cat_id;
//        $user->faculty_id = $request->cat_id;
        $user->sex_id = $request->sex;
        $user->save();
        $user->assignRole('user');
    }

    public function search(){
        return view('campustree.search', [
            'leaves' => Post::latest()->filter(request(['search']))->paginate(6)
        ]);
    }

    public function orderby(){
        return view('campustree.search', [
            'leaves' => Post::latest()->filter(request(['orderby']))->get()
        ]);
    }
}
