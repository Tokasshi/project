<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Testimonial;
use App\Models\Topic;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories= Category::with(['topics'=>function($query){

            $query->where('published', 1)->take(3)->latest();
        }]) ->limit(4)->latest()->get();
        $topics= Topic::where('published', 1)->limit(2)->latest()->get();
        $testimonials = Testimonial::where('published', 1)->limit(3)->latest()->get();
        $topic1 = Topic::where('published', 1)->where('trending', 1)->inRandomOrder()->first(); // Get one random topic
        $topic2 = Topic::where('published', 1)->where('trending', 1)->inRandomOrder()->first(); // Get another random topic
        return view('index', compact('categories','testimonials', 'topics', 'topic1', 'topic2'));
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
