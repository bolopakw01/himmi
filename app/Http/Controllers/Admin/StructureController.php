<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StructureController extends Controller
{
    public function index()
    {
        $strukturItems = Media::where('type', 'struktur')->latest('id')->get();
        return view('admin.structures.index', compact('strukturItems'));
    }

    public function create()
    {
        return view('admin.structures.create');
    }

    public function store(Request $request)
    {
        // Validasi sudah ada di sini, @error akan otomatis menangani pesan gagal
        $data = $request->validate([
            'image'    => 'required|image|max:2048',
            'type'     => 'required|string|in:struktur',
            'name'     => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'nim'      => 'required|string|max:255',
            'division' => 'required|string|max:255',
            'link_url' => 'nullable|url|max:255',
        ]);

        $data['path'] = $request->file('image')->store('media', 'public');
        Media::create($data);

        return redirect()->route('admin.structures.index')->with('success', 'Anggota baru berhasil ditambahkan.');
    }

    public function edit(Media $structure)
    {
        return view('admin.structures.edit', compact('structure'));
    }

    public function update(Request $request, Media $structure)
    {
        $data = $request->validate([
            'image'    => 'nullable|image|max:2048',
            'name'     => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'nim'      => 'required|string|max:255',
            'division' => 'required|string|max:255',
            'link_url' => 'nullable|url|max:255',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($structure->path);
            $data['path'] = $request->file('image')->store('media', 'public');
        }

        $structure->update($data);

        return redirect()->route('admin.structures.index')->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function destroy(Media $structure)
    {
        Storage::disk('public')->delete($structure->path);
        $structure->delete();
        return redirect()->route('admin.structures.index')->with('success', 'Anggota berhasil dihapus.');
    }

    public function toggleStatus(Media $medium)
    {
        $medium->is_active = ! $medium->is_active;
        $medium->save();
        $status = $medium->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return redirect()->back()->with('success', "Status anggota berhasil {$status}.");
    }
}
