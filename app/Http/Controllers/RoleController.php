<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use Illuminate\Support\Facades\Redirect;

class RoleController extends Controller
{

    protected $roleRepository;
    protected $permRepository;

    public function __construct(RoleRepository $roleRepository,
                                PermissionRepository $permissionRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->permRepository = $permissionRepository;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $roles = $this->roleRepository->getData();
        return view('admin.securite.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    //old methode
//    public function create()
//    {
//        $permissions = $this->permRepository->getListe();
//        return view('admin.securite.roles.create', compact('permissions'));
//    }

    public function create()
    {
        $permissions = $this->permRepository->getListe();
        return view('admin.securite.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(RoleRequest $request)
    {
        $inputs = $request->all();
        $role = $this->roleRepository->store($inputs);
        return Redirect::route('roles.index')->withMessage("Le rôle " . $role->description . " a été créé.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $role = $this->roleRepository->getById($id);
        return view('admin.securite.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $role = $this->roleRepository->getById($id);
        $permissions = $this->permRepository->getListe();
        return view('admin.securite.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(RoleRequest $request, $id)
    {
        $this->roleRepository->update($id, $request->all());
        return Redirect::route('roles.index')->withMessage("Le rôle " . $request->input('description') . " a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        if ($this->roleRepository->destroy($id))
            return redirect()->back()->withMessage("La suppression est effective");
        else
            return redirect()->back()->withErrors("Ce rôle ne peut être supprimé...");
    }

}

?>
