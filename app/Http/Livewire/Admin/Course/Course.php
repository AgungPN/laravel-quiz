<?php

namespace App\Http\Livewire\Admin\Course;

use App\Models\Course as ModelsCourse;
use Livewire\Component;
use Livewire\WithPagination;

class Course extends Component
{
    use WithPagination;

    protected $listeners = ["updateCourse" => "render"];

    public function render()
    {
        return view('livewire.admin.course.course', ['courses' => ModelsCourse::latest()->paginate(7),]);
    }

    public function deleteConfirm(ModelsCourse $course): void
    {
        $this->dispatchBrowserEvent("confirm:delete", ["id" => $course->id, "course" => $course->course]);
    }

    public function destroy($id): void
    {
        ModelsCourse::destroy($id);
    }
}
