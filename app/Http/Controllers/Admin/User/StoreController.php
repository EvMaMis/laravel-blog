<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\Admin\User\StoreRequest;
use App\Jobs\StoreUserJob;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $storeUserJob = new StoreUserJob($data);
        $storeUserJob->handle();
        return redirect()->route('admin.users.index');
    }
}
