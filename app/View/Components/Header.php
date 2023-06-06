<?php

namespace App\View\Components;

use Illuminate\Http\Request;
use Illuminate\View\Component;
use App\Models\Post;

class Header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if (request('search')) {
            $leaves = Post::where('title', 'like', '%' . request('search') . '%')->get();
        } else {
            $leaves = Post::all();
        }
        return view('components.header')->with([
            'searchLeaves' => $leaves,
            'request' => request('search')
        ]);
    }
}
