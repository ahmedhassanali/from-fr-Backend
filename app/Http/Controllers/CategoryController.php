<?php

namespace App\Http\Controllers;

use App\DataTables\CategoriesDataTable;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(private CategoryService $categoryService)
    {
    }

    public function index(CategoriesDataTable $dataTable)
    {
        return $dataTable->render('dashboard.categories.index');
    }



    public function edit($id)
    {
        $category = $this->categoryService->find($id);
        if (!$category) {
            $toast = ['type' => 'error', 'title' => trans('lang.error'), 'message' => trans('lang.category_not_found')];
            return back()->with('toast', $toast);
        }
        return view('dashboard.categories.edit', compact('category'));
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        try {
            $this->categoryService->store($data);
            $toast = ['type' => 'success', 'title' => trans('lang.success'), 'message' => trans('lang.success_operation')];
            return redirect()->route('categories.index')->with('toast', $toast);
        } catch (\Exception $ex) {
            $toast = ['type' => 'error', 'title' => 'error', 'message' => $ex->getMessage(),];
            return back()->with('toast', $toast);
        }
    }

    public function update(CategoryRequest $request, $id)
    {
        try {
            $this->categoryService->update(  $request->validated(),$id);
            $toast = ['title' => 'Success', 'message' => trans('lang.success_operation')];
            return redirect(route('categories.index'))->with('toast', $toast);
        } catch (\Exception $ex) {

            $toast = ['type' => 'error', 'title' => 'error', 'message' => $ex->getMessage(),];
            return back()->with('toast', $toast);
        }
    }

    public function destroy($id)
    {
        try {
            $this->categoryService->delete($id);
            $toast = ['title' => 'Success', 'message' => trans('lang.success_operation')];
            return redirect(route('categories.index'))->with('toast', $toast);
        } catch (\Exception $ex) {

            $toast = ['type' => 'error', 'title' => 'error', 'message' => $ex->getMessage(),];
            return back()->with('toast', $toast);
        }
    }
}
