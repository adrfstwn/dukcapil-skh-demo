<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Submenu;
use Illuminate\Http\Request;

class SubmenuController extends Controller
{
    public function index()
    {
         $submenus = Submenu::all();
        $menus = Menu::all();
        return view('admin.menu.index', compact('submenus', 'menus'));
    }

    public function create()
    {
        $menus = Menu::all();
        $submenus = Submenu::all();
        return view('admin.submenu.create', compact('menus', 'submenus'));
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'menu_id' => 'required|exists:menu,id',
        'nama_submenu' => 'required|string|max:255',
        'url' => 'nullable|string|max:255',
    ]);

    Submenu::create($validatedData);

    return redirect()->route('submenu.index')->with('success', 'Submenu created successfully.');
}

    public function edit($id)
    {
        $submenu = Submenu::findOrFail($id);
        $menus = Menu::all();
        $submenus = Submenu::all();
        return view('admin.submenu.edit', compact('submenu', 'menus', 'submenus'));
    }

    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'menu_id' => 'required|exists:menu,id',
        'nama_submenu' => 'required|string|max:255',
        'url' => 'nullable|string|max:255',
    ]);

    $submenu = Submenu::findOrFail($id);
    $submenu->update($validatedData);

    return redirect()->route('submenu.index')->with('success', 'Submenu updated successfully.');
}


    public function destroy($id)
    {
        $submenu = Submenu::findOrFail($id);
        $submenu->delete();
        return redirect()->route('submenu.index')->with('success', 'Submenu deleted successfully.');
    }
}
