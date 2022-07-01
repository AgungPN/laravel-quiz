<?php

namespace App\Http\Livewire\Admin\Course;

use App\Models\Course as ModelsCourse;
use Livewire\Component;

class Form extends Component
{

    public $course;

    protected $rules = ["course" => "required|string|unique:courses,course",];

    public function render()
    {
        return view('livewire.admin.course.form');
    }

    public function store()
    {
        $validateData = $this->validate();
        ModelsCourse::create($validateData);
        $this->emit("updateCourse", $this->course);
        $this->course = '';
    }
}
