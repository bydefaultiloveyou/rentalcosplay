<?php

namespace App\Http\Controllers\Manga;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\API;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MangaController extends Controller
{
    public function __invoke(): View
    {
        $mangas = API::call('update');
        return view('manga.index', compact('mangas'));
    }

    public function show(string $slug): View
    {
        $manga = API::call('manga/' . $slug);
        return view('manga.show', compact('manga', 'slug'));
    }

    public function read(string $slug, string $chapter, string $slugChapter)
    {
        $prev = $this->getAdjacentChapter($slug, $slugChapter, 'prev');
        $next = $this->getAdjacentChapter($slug, $slugChapter, 'next');
        $images = API::call('image/' . $slugChapter);
        return view('manga.read', compact('images', 'prev', 'next', 'chapter', 'slug'));
    }

    public function search(Request $request)
    {
        $mangas = API::call('search?query=' . $request->query('query'));
        dd($mangas);
    }

    private function getAdjacentChapter(string $slug, string $slugChapter, string $direction)
    {
        $manga = API::call('manga/' . $slug);
        $chapters = $manga->chapter;

        foreach ($chapters as $index => $chapter) {
            if ($chapter->slug === $slugChapter) {
                $adjacentIndex = $direction === 'prev' ? $index + 1 : $index - 1;
                return $chapters[$adjacentIndex] ?? null;
            }
        }

        return null;
    }
}
