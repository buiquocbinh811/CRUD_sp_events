<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(10);
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'difficulty' => 'required|in:beginner,intermediate,advanced',
            'price' => 'required|numeric|min:0',
            'start_date' => 'required|date'
        ]);
        
        Course::create($validated);
        return redirect()->route('courses.index')
            ->with('success', 'Thêm khóa học thành công');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'difficulty' => 'required|in:beginner,intermediate,advanced',
            'price' => 'required|numeric|min:0',
            'start_date' => 'required|date'
        ]);

        $course->update($validated);
        return redirect()->route('courses.index')
            ->with('success', 'Cập nhật khóa học thành công');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        try {
            $course->delete();
            return redirect()->route('courses.index')
                ->with('success', 'Xóa khóa học thành công');
        } catch (\Exception $e) {
            return redirect()->route('courses.index')
                ->with('error', 'Không thể xóa khóa học này');
        }
    }
}