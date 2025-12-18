<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        $persons = Person::all();
        return view('persons.index', compact('persons'));
    }

    public function create()
    {
        return view('persons.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required'
        ]);

        Person::create($request->all());

        return redirect()->route('persons.index')->with('success', 'Data person berhasil ditambahkan!');
    }

    public function show(Person $person)
    {
        return view('persons.show', compact('person'));
    }

    public function edit(Person $person)
    {
        return view('persons.edit', compact('person'));
    }

    public function update(Request $request, Person $person)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required'
        ]);

        $person->update($request->all());

        return redirect()->route('persons.index')->with('success', 'Data person berhasil diperbarui!');
    }

    public function destroy(Person $person)
    {
        $person->delete();

        return redirect()->route('persons.index')->with('success', 'Data person berhasil dihapus!');
    }
}
