<?php

namespace App\Modules\Backend\Showcase\Repositories;

use App\Modules\Backend\Showcase\Models\Showcase;
use App\Modules\Backend\Showcase\Repositories\ShowcaseRepositoryInterface;
use Webpatser\Uuid\Uuid;

class ShowcaseRepository implements ShowcaseRepositoryInterface
{
    public function get(array $fields)
    {
        return Showcase::query()->select($fields)->get();
    }

    public function findById($id)
    {

    }

    public function findBySlug($slug)
    {

    }

    public function create(array $request)
    {
        return Showcase::create($request);
    }

    public function update($id, array $request)
    {

    }

    public function destroy($slug)
    {

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
