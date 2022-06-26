<?php

namespace App\Http\Livewire\Admin;

use App\Models\Course as ModelsCourse;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class Course extends Component
{
    use WithPagination;

    protected $rules = [
        "course" => "required|string|unique:courses,course"
    ];

    public function render()
    {
        return view('livewire.admin.course', ['courses' => ModelsCourse::latest()->paginate(7),]);
    }

    public function storeCourse($course)
    {
        dd($course);
        $validateData = $this->validate();
        ModelsCourse::create($validateData);
        $this->course = '';
    }

    public function destroy(ModelsCourse $course)
    {
        ModelsCourse::destroy($course->id);
    }
}
