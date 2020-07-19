<?php

namespace App\Modules\Backend\Showcase\Repositories;

use App\Modules\Backend\Showcase\Models\Showcase;
use App\Modules\Backend\Showcase\Repositories\ShowcaseRepositoryInterface;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;

class ShowcaseRepository implements ShowcaseRepositoryInterface
{
    public function getPersonalShowcase(array $fields)
    {
        return Showcase::query()
        ->where([
            ['author', '=', Auth::id()]
        ])
        ->select($fields)
        ->get();
    }

    public function findById($id)
    {

    }

    public function findBySlug($slug)
    {
        return Showcase::query()
        ->where([
            ['slug', '=', $slug]
        ])
        ->first();
    }

    public function create(array $request)
    {
        return Showcase::create($request);
    }

    public function update($slug, array $request)
    {
        $showcase = $this->findBySlug($slug);

        return $showcase->update($request);
    }

    public function destroy($slug)
    {
        $showcase = $this->findBySlug($slug);

        return $showcase->delete();
    }

    private function format(array $request)
    {
        $result = array();

        $result = [
            'title' => $request['title'],
            'group_name' => $request['group_name'],
            'content' => $request['content']
        ];

        return $result;

        return $result;
    }
}
