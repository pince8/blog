<?php
namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all(); // Tüm projeleri çekiyoruz
        return view('admin.project.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.project.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'github_link' => 'nullable|url',
            'file' => 'nullable|file|mimes:zip,rar,pdf,docx,xlsx|max:10240', // Maksimum 10MB
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('projects', 'public');
        }

        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'github_link' => $request->github_link,
            'file_path' => $filePath,
        ]);

        return redirect()->route('project.index')->with('success', 'Project created successfully!');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);  // Projeyi ID ile buluyoruz
        return view('admin.project.edit', compact('project')); // Güncelleme formunu döndürüyoruz
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'github_link' => 'nullable|url',
            'file' => 'nullable|file|mimes:zip,rar,pdf,docx,xlsx|max:10240', // Maksimum 10MB
        ]);

        $project = Project::findOrFail($id); // Projeyi buluyoruz
        $filePath = $project->file_path; // Var olan dosya yolunu alıyoruz

        // Yeni dosya yükleme işlemi
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('projects', 'public');
        }

        // Projeyi güncelliyoruz
        $project->update([
            'title' => $request->title,
            'description' => $request->description,
            'github_link' => $request->github_link,
            'file_path' => $filePath,
        ]);

        return redirect()->route('project.index')->with('success', 'Project updated successfully!');
    }
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        // Dosya varsa, storage'dan sil
        if ($project->file_path && \Storage::disk('public')->exists($project->file_path)) {
            \Storage::disk('public')->delete($project->file_path);
        }

        $project->delete(); // Veritabanından sil

        return redirect()->route('project.index')->with('success', 'Project deleted successfully!');
    }



}

