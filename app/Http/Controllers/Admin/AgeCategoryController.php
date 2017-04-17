<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AgeCategoryRepository;
use App\Http\Requests\AgeCategoryFormRequest;
use App\Models\AgeCategory;

/**
 *
 */
class AgeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $ageCategories = AgeCategory::All();
        return response()->json(['ageCategories' => $ageCategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\AgeCategoryFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgeCategoryFormRequest $request)
    {
      $repo = new AgeCategoryRepository;
      return response()->json($repo->save($request));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  AgeCategory $ageCategory
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(AgeCategory $ageCategory)
    {
        return response()->json(['ageCategory' => $ageCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\AgeCategoryFormRequest  $request
     * @param  AgeCategory $ageCategory
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(AgeCategoryFormRequest $request, AgeCategory $ageCategory)
    {
        $repo = new AgeCategoryRepository;
        return response()->json($repo->update($request, $ageCategory));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  AgeCategory $ageCategory
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(AgeCategory $ageCategory)
    {
      $repo = new AgeCategoryRepository;
      return response()->json($repo->delete($ageCategory));
    }
}
