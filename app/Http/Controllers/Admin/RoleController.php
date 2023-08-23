<?php

namespace App\Http\Controllers\Admin;
use App\Helpers\JsonResponse;
use App\Http\IRepositories\IRoleRepository;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;

class RoleController extends Controller
{

    protected $roleRepository;
    public function __construct(IRoleRepository  $roleRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->middleware('permission:list roles')->only(['index']);
        $this->middleware('permission:create role')->only(['create']);
        $this->middleware('permission:update role')->only(['edit']);
        $this->middleware('permission:show role')->only(['show']);
        $this->middleware('permission:delete role')->only(['destroy']);

    }

    public function index(Request $request)
    {
        return $this->roleRepository->getAllRoles($request);
    }

    public function create()
    {
        return $this->roleRepository->createRole();
    }

    public function store(RoleRequest $request)
    {
        return $this->roleRepository->storeRole($request);

    }

    public function show($id)
    {
        return $this->roleRepository->showRole($id);
    }

    public function edit($id)
    {
        return $this->roleRepository->editRole($id);
    }

    public function update(Request $request, $id)
    {

        return $this->roleRepository->updateRole($request,$id);

    }

//    public function destroy($id)
//    {
//        return $this->roleRepository->deleteRole($id);
//    }

    public function destroy($id)
    {
        //
        try {

            $this->roleRepository->delete($id);
            return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (\Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }
    }
}
