<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQ;

class FAQController extends Controller
{
    public function index(){
        $faqs = FAQ::all();
        return view('admin.faq.index', compact('faqs'));
    }
    public function create()
    {
        return view('admin.faq.create');
    }

    // Menyimpan FAQ baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required',
            'jawaban' => 'required',
        ]);

        FAQ::create($request->all());
        return redirect()->route('faq.index')->with('success', 'FAQ created successfully.');
    }

    // Menampilkan FAQ tertentu
    public function show(FAQ $faq)
    {
        return view('faq.show', compact('faq'));
    }

    // Menampilkan formulir untuk mengedit FAQ
    public function edit($id)
    {
        $faq = FAQ::findOrFail($id);
        return view('admin.faq.edit', compact('faq'));
    }

    // Memperbarui FAQ dalam database
    public function update(Request $request, $id)
{
    $request->validate([
        'pertanyaan' => 'required',
        'jawaban' => 'required',
    ]);

    $faq = FAQ::findOrFail($id);
    $faq->update($request->all());

    return redirect()->route('faq.index')->with('success', 'FAQ updated successfully.');
}


    // Menghapus FAQ dari database
    public function destroy($id)
    {
        $faq = FAQ::findOrFail($id); // Temukan FAQ berdasarkan ID, akan menghasilkan 404 jika tidak ditemukan
        $faq->delete(); // Hapus FAQ dari database\

        return redirect()->route('faq.index')->with('success', 'FAQ deleted successfully.');
    }
}

