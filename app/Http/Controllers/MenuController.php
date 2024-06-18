<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Submenu;

class MenuController extends Controller
{
    public function index()
    {
        // Mengambil semua menu beserta submenus dan children submenus-nya
        $menus = Menu::all();
        $submenus = Submenu::all();
        return view('admin.menu.index', compact('menus','submenus'));
    }

    public function create()
    {
        return view('admin.menu.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_menu' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
        ]);

        Menu::create($validatedData);

        return redirect()->route('menu.index')->with('success', 'Menu created successfully.');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.menu.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_menu' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
        ]);

        $menu = Menu::findOrFail($id);
        $menu->update($validatedData);

        return redirect()->route('menu.index')->with('success', 'Menu updated successfully.');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu deleted successfully.');
    }

}
