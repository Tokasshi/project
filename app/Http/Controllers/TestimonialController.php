<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Traits\Common;

class TestimonialController extends Controller
{

    use Common;


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testims = Testimonial::get();
        return view('admin.testimonials.testimonials', compact('testims'));
    }

    public function home()
    {
        $testims = Testimonial::where('published', 1)->get();
        return view('testimonials', compact('testims'),['pageTitle' => ' Testimonials']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonials.add_testimonial');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'content' => 'required|string|max:500',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data['published'] = isset($request->published);
        $data['image'] = $this->uploadFile($request->image, 'assets/images/testimonials');
        Testimonial::create($data);

        return redirect()->route('testim.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    ///
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testim = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit_testimonial', compact('testim'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'content' => 'required|string|max:500',
            'image' => 'sometimes|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadFile($request->image, 'assets/images/testimonials');
        }

        $data['published'] = isset($request->published);

        Testimonial::where('id', $id)->update($data);
        return redirect()->route('testim.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Testimonial::where('id', $id)->delete();
        return redirect()->route('testim.index');
    }
}
