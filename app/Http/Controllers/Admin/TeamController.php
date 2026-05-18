<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $members = TeamMember::orderBy('sort_order')->get();

        return view('admin.team.index', compact('members'));
    }

    public function create()
    {
        return view('admin.team.form', ['member' => new TeamMember]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'       => ['required', 'string', 'max:255'],
            'position'   => ['required', 'string', 'max:255'],
            'bio'        => ['nullable', 'string'],
            'photo'      => ['required', 'image', 'mimes:jpeg,png,gif,webp', 'max:2048'],
            'twitter'    => ['nullable', 'url'],
            'facebook'   => ['nullable', 'url'],
            'github'     => ['nullable', 'url'],
            'googleplus' => ['nullable', 'url'],
            'email'      => ['nullable', 'email'],
            'sort_order'  => ['nullable', 'integer', 'min:0'],
            'is_active'   => ['boolean'],
            'is_featured' => ['boolean'],
        ]);

        $data['photo']       = $this->uploadImage($request->file('photo'), 'team', 400, 400);
        $data['is_active']   = $request->boolean('is_active', true);
        $data['is_featured'] = $request->boolean('is_featured', false);

        TeamMember::create($data);

        return redirect()->route('admin.team.index')->with('success', 'Team member added.');
    }

    public function edit(TeamMember $team)
    {
        return view('admin.team.form', ['member' => $team]);
    }

    public function update(Request $request, TeamMember $team)
    {
        $data = $request->validate([
            'name'       => ['required', 'string', 'max:255'],
            'position'   => ['required', 'string', 'max:255'],
            'bio'        => ['nullable', 'string'],
            'photo'      => ['nullable', 'image', 'mimes:jpeg,png,gif,webp', 'max:2048'],
            'twitter'    => ['nullable', 'url'],
            'facebook'   => ['nullable', 'url'],
            'github'     => ['nullable', 'url'],
            'googleplus' => ['nullable', 'url'],
            'email'      => ['nullable', 'email'],
            'sort_order'  => ['nullable', 'integer', 'min:0'],
            'is_active'   => ['boolean'],
            'is_featured' => ['boolean'],
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $this->uploadImage($request->file('photo'), 'team', 400, 400, $team->photo);
        } else {
            unset($data['photo']);
        }

        $data['is_active']   = $request->boolean('is_active');
        $data['is_featured'] = $request->boolean('is_featured');

        $team->update($data);

        return redirect()->route('admin.team.index')->with('success', 'Team member updated.');
    }

    public function destroy(TeamMember $team)
    {
        $this->deleteImage($team->photo);
        $team->delete();

        return redirect()->route('admin.team.index')->with('success', 'Team member deleted.');
    }
}
