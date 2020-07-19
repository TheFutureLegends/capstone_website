<?php

namespace App\Modules\Backend\Showcase\Repositories;

interface ShowcaseRepositoryInterface
{
    public function getPersonalShowcase(array $fields);

    public function findById($id);

    public function findBySlug($slug);

    public function create(array $request);

    public function update(string $slug, array $request);

    public function destroy($slug);
}
