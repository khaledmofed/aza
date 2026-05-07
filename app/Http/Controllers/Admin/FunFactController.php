<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FunFact;
use Illuminate\Http\Request;

class FunFactController extends Controller
{
    public function index()
    {
        $facts = FunFact::ordered()->get();

        return view('admin.fun-facts.index', compact('facts'));
    }

    public function create()
    {
        return view('admin.fun-facts.form', ['fact' => new FunFact]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'label'      => ['required', 'string', 'max:255'],
            'count'      => ['required', 'integer', 'min:0'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        FunFact::create($data);

        return redirect()->route('admin.fun-facts.index')->with('success', 'Stat created.');
    }

    public function edit(FunFact $funFact)
    {
        return view('admin.fun-facts.form', ['fact' => $funFact]);
    }

    public function update(Request $request, FunFact $funFact)
    {
        $data = $request->validate([
            'label'      => ['required', 'string', 'max:255'],
            'count'      => ['required', 'integer', 'min:0'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $funFact->update($data);

        return redirect()->route('admin.fun-facts.index')->with('success', 'Stat updated.');
    }

    public function destroy(FunFact $funFact)
    {
        $funFact->delete();

        return redirect()->route('admin.fun-facts.index')->with('success', 'Stat deleted.');
    }
}
