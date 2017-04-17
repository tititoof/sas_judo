<?php

namespace App\Builders\Inscriptions;

use Illuminate\Http\Request;

/**
 * Builder Interface
 */
interface BuilderInterface
{
    /**
     * Build instance
     * @param Request $request
     */
    public function build(Request $request);

    /**
     * Create or update entity
     * @param Request $request
     */
    public function createOrUpdate(Request $request, $collection);

    /**
     * Validate data
     * @param Request $request
     */
    public function checkForm(Request $request);
}
