<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Category;

use Illuminate\Http\Request;
use App\Traits\Common;


class TopicController extends Controller
{
    use Common;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topics= Topic::with('category')->get();
        return view('admin.topics.topics', compact('topics'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats =Category::select('id','catName')->get();
        return view('admin.topics.add_topic', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'topicTitle' => 'required|string',
            'catId' =>'required|exists:categories,id',
            'content' => 'required|string|max:1000',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
        $data['trending'] = isset($request->trending);
        $data['published'] = isset($request->published);
        $data['image'] = $this->uploadFile($request->image, 'assets/images/topics');
        Topic::create($data);

        return redirect()->route('topic.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $topic= Topic::with('Category')->findOrFail($id);
        return view('admin.topics.topic_details', compact('topic',));
    }





    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cats =Category::select('id','catName')->get();
        $topic= Topic::findOrFail($id);
        return view('admin.topics.edit_topic', compact('topic', 'cats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'topicTitle' => 'required|string',
            'catId' =>'required|exists:categories,id',
            'content' => 'required|string|max:1000',
            'image' => 'sometimes|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadFile($request->image, 'assets/images/topics');
        }
        $data['trending'] = isset($request->trending);
        $data['published'] = isset($request->published);

        Topic::where('id', $id)->update($data);
        return redirect()->route('topic.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Topic::where('id', $id)->delete();
        return redirect()->route('topic.index');
    }

/**
 * show popular topic list and latest trending topics
 */
    public function listAndLatest()
    {
        $popularTopics = Topic::where('published', 1)->limit(3)->latest()->get();
        $trendingTopics = Topic::where('published', 1)->where('trending', 1)->latest()->take(2)->get();
    
        return view('topics-listing', compact('popularTopics', 'trendingTopics'));
    }
    
    /**
     * show a specific topic details
     */
    public function detail(string $id)
    {
        $topic= Topic::with ('category')->findOrFail($id);
        return view('topics-detail', compact('topic',));
    }

}
