<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Person;
use App\Models\Program;
use App\Models\Classification;
use App\Models\SocialMedia;
use App\Models\Format;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    // LIST DATA
    public function index()
    {
        $contents = Content::with(['program','klasifikasi','medsos','format','persons'])->get();
        return view('contents.index', compact('contents'));
    }

    // FORM CREATE
    public function create()
    {
        return view('contents.create', [
            'programs' => Program::all(),
            'klasifikasi' => Classification::all(),
            'medsos' => SocialMedia::all(),
            'formats' => Format::all(),
            'persons' => Person::all()
        ]);
    }

    // STORE DATA
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'judul' => 'required',
            'program_id' => 'nullable|integer',
            'klasifikasi_id' => 'nullable|integer',
            'medsos_id' => 'nullable|integer',
            'format_id' => 'nullable|integer',
            'link' => 'nullable|string',
            'roles' => 'array',
            'roles.*.person_id' => 'required|integer',
            'roles.*.role' => 'required|string'
        ]);

        $content = Content::create($request->only([
            'tanggal','judul','program_id','klasifikasi_id','medsos_id','format_id','link'
        ]));

        if ($request->roles) {
            foreach ($request->roles as $role) {
                $content->persons()->attach($role['person_id'], [
                    'role' => $role['role']
                ]);
            }
        }

        return redirect()->route('contents.index')->with('success', 'Konten berhasil ditambahkan!');
    }

    // SHOW DETAIL
    public function show(Content $content)
    {
        $content->load(['program','klasifikasi','medsos','format','persons']);
        return view('contents.show', compact('content'));
    }

    // FORM EDIT
    public function edit(Content $content)
    {
        return view('contents.edit', [
            'content' => $content->load('persons'),
            'programs' => Program::all(),
            'klasifikasi' => Classification::all(),
            'medsos' => SocialMedia::all(),
            'formats' => Format::all(),
            'persons' => Person::all()
        ]);
    }

    // UPDATE DATA
    public function update(Request $request, Content $content)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'judul' => 'required',
        ]);

        $content->update($request->only([
            'tanggal','judul','program_id','klasifikasi_id','medsos_id','format_id','link'
        ]));

        // reset roles
        $content->persons()->detach();

        if ($request->roles) {
            foreach ($request->roles as $role) {
                $content->persons()->attach($role['person_id'], [
                    'role' => $role['role']
                ]);
            }
        }

        return redirect()->route('contents.index')->with('success', 'Konten berhasil diperbarui!');
    }

    // DELETE DATA
    public function destroy(Content $content)
    {
        $content->delete();
        return redirect()->route('contents.index')->with('success', 'Konten berhasil dihapus!');
    }
}
