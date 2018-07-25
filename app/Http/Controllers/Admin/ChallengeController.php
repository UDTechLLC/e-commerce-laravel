<?php

namespace App\Http\Controllers\Admin;

use App\Models\Challenge;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChallengeController extends Controller
{
    public function index()
    {
        return view('admin.challenges.index', [
            'challenges' => Challenge::all()
        ]);
    }

    public function edit(Challenge $challenge)
    {
        $challenge->preview = $challenge->getFirstMediaUrl('preview');

        return view('admin.challenges.edit', [
            'challenge' => $challenge
        ]);
    }

    public function update(Request $request, Challenge $challenge)
    {
        $challenge->update([
            'title'     => $request->get('title'),
            'published' => $request->get('published'),
            'open'      => $request->get('open')
        ]);

        if ($request->has('image') && $this->checkImage($request->get('image'))) {
            $challenge->updateImageBase64($request->get('image'), 'preview');
        }
    }

    /**
     * @param $value
     *
     * @return bool
     */
    private function checkImage($value): bool
    {
        return substr($value, 0, 1) == 'd';
    }
}
