<?php

namespace App\Http\Controllers\Campustree;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Friend;
use App\Models\Post;
use App\Models\Sex;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        if(Auth::user()) {
            $friends = Auth::user()->friends()->get();
            $participation = Auth::user()->participations()->where('leaf_id', $id)->first();
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
            ]);
        }


    }

    public function showBranch($id)
    {
        $branch = Category::where('id', $id)->firstOrFail();
        $thisBranchPost = Post::where('cat_id', $id)->get();
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
        $post->save();
        return redirect()->back()->withSuccess('Post was successfully added');
    }

    public function personal($id)
    {
        $userId = Auth::id();
        $currentuser = User::find($userId);
        return view('campustree.personal_page' , [
            'user' => $currentuser
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
        $users = User::paginate(4);
        $cats = Category::all();
        $sexes = Sex::all();
        return view('campustree.users', [
            'users' => $users,
            'sexes' => $sexes,
            'cats' => $cats
        ]);
    }

    public function allFriends(){
        $users = Auth::user()->friends()->get();
        return view('campustree.friends', [
            'users' => $users,
        ]);
    }


}
