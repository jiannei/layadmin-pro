<?php

namespace App\Services;

use App\Contracts\MenuRepository;
use App\Validators\MenuValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuService extends Service
{
    public function __construct(private MenuRepository $repository,private MenuValidator $validator)
    {

    }

    public function search()
    {
        return $this->repository->searchTree();
    }

    public function searchPage()
    {
        return $this->repository->with('children')->paginate();
    }

    public function searchItem($id)
    {
        return $this->repository->find($id);
    }

    public function updateItem(Request $request, $id)
    {
        $menu = $this->repository->find($id);

        $attributes = $request->except('icon');
        if (!Str::startsWith($request['icon'], 'layui-icon ')) {
            $attributes['icon'] = Str::start($request['icon'], 'layui-icon ');
        } else {
            $attributes['icon'] = $request['icon'];
        }

        if ($request['type'] == 0) {
            $attributes['p_id'] = 0;
        }

        $this->repository->update($attributes, $menu['id']);

        return true;
    }

    public function updateOrder($id, $order)
    {
        $this->repository->update(['order' => $order], $id);

        return true;
    }

    public function addItem(Request $request)
    {
        $attributes = $request->except(['icon']);

        if ($request['type'] == 0) {
            $attributes['icon'] = "layui-icon " . $request['icon'];
            $attributes['p_id'] = 0;
        }

        $this->repository->create($attributes);

        return true;
    }

    public function removeItem($id)
    {
        return $this->repository->delete($id);
    }
}