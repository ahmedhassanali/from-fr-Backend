<?php

namespace App\Http\Controllers;

use App\DataTables\storesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\storeStoreRequest;
use App\Http\Requests\StoreUpdateRequest;
use App\Services\storeService;

class StoreController extends Controller
{
    public function __construct(private StoreService $storeService)
    {
    }

    public function index(StoresDataTable $dataTable)
    {
        return $dataTable->render('dashboard.stores.index');
    }

    public function edit($id)
    {
        $store = $this->storeService->find($id);
        if (!$store) {
            $toast = ['type' => 'error', 'title' => trans('lang.error'), 'message' => trans('lang.store_not_found')];
            return back()->with('toast', $toast);
        }
        return view('dashboard.stores.edit', compact('store'));
    }

    public function create()
    {
        return view('dashboard.stores.create');
    }

    public function store(storeStoreRequest $request)
    {
        $data = $request->validated();
        try {
            $store = $this->storeService->store($data);
            $toast = ['type' => 'success', 'title' => trans('lang.success'), 'message' => trans('lang.success_operation')];
            return redirect()->route('stores.index')->with('toast', $toast);
        } catch (\Exception $ex) {
            $toast = ['type' => 'error', 'title' => 'error', 'message' => $ex->getMessage(),];
            return back()->with('toast', $toast);
        }
    }

    public function update(StoreUpdateRequest $request, $id)
    {
        try {
            $this->storeService->update(  $request->validated(),$id);
            $toast = ['title' => 'Success', 'message' => trans('lang.success_operation')];
            return redirect(route('stores.index'))->with('toast', $toast);
        } catch (\Exception $ex) {

            $toast = ['type' => 'error', 'title' => 'error', 'message' => $ex->getMessage(),];
            return back()->with('toast', $toast);
        }
    }

    public function destroy($id)
    {
        try {
            $this->storeService->delete($id);
            $toast = ['title' => 'Success', 'message' => trans('lang.success_operation')];
            return redirect(route('stores.index'))->with('toast', $toast);
        } catch (\Exception $ex) {

            $toast = ['type' => 'error', 'title' => 'error', 'message' => $ex->getMessage(),];
            return back()->with('toast', $toast);
        }
    }
}
