<?php

// app/Http/Controllers/SubmenuController.php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Submenu;
use Illuminate\Http\Request;

class SubmenuController extends Controller
{
    public function index()
    {
        $menu = Menu::all();
    $submenu = Submenu::with('children')->whereNull('parent_id')->get();
    return view('admin.menu.index', compact('submenu', 'menu'));
    }

    public function create()
    {
        $menu = Menu::all();
        $submenu = Submenu::all();
        return view('admin.submenu.create', compact('menu', 'submenu'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'menu_id' => 'required|exists:menu,id',
            'parent_id' => 'nullable|exists:submenu,id',
            'nama_submenu' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
        ]);

        Submenu::create($validatedData);

        return redirect()->route('submenu.index')->with('success', 'Submenu created successfully.');
    }

    public function edit(Submenu $submenu)
    {
        $menu = Menu::all();
        $submenu = Submenu::all();
        return view('admin.submenu.edit', compact('submenu', 'menu'));
    }

    public function update(Request $request, Submenu $submenu)
    {
        $validatedData = $request->validate([
            'menu_id' => 'required|exists:menu,id',
            'parent_id' => 'nullable|exists:submenu,id',
            'nama_submenu' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
        ]);

        $submenu->update($validatedData);

        return redirect()->route('submenu.index')->with('success', 'Submenu updated successfully.');
    }

    public function destroy(Submenu $submenu)
    {
        $submenu->delete();
        return redirect()->route('submenu.index')->with('success', 'Submenu deleted successfully.');
    }
}
