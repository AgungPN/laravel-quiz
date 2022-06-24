<?php

namespace App\Http\Livewire\Admin;

use App\Models\Course as ModelsCourse;
use Livewire\Component;

class Course extends Component
{
    public $course;

    protected $rules = [
        "course"=>"required|string|unique:courses,course"
    ];
    public function render()
    {
        return view('livewire.admin.course', [
            'courses'=> ModelsCourse::all(),
        ]);
    }

    public function store()
    {
        $validateData = $this->validate();
        ModelsCourse::create($validateData);
        $this->course = '';
    }
}
