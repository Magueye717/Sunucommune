<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Utils\UploadUtil;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    protected $userRepository;
    protected $roleRepository;
    protected $uploadUtil;

    public function __construct(UserRepository $userRepository,
                                RoleRepository $roleRepository,
                                UploadUtil $uploadUtil)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->uploadUtil = $uploadUtil;
        $this->middleware('auth');
        //$this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = $this->userRepository->getData();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $entites = array();
        $roles = $this->roleRepository->getListe();
        return view('admin.users.create', compact('entites', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(UserRequest $request)
    {
        $inputs = $request->all();
        //Avatar
        if ($request->hasFile('avatar')) {
            $inputs['avatar'] = $this->uploadUtil->traiterFile($request->file('avatar'));
        }
        $this->userRepository->store($inputs);
        return \redirect()->route('users.index')->withMessage("L'utilisateur a été créé.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->getById($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->getById($id);
        $roles = $this->roleRepository->getListe();
        $entites = array();
        return view('admin.users.edit', compact('user', 'roles', 'entites'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = $this->userRepository->getById($id);
        $inputs = $request->all();
        //Avatar
        if ($request->hasFile('avatar')) {
            $inputs['avatar'] = $this->uploadUtil->traiterFile($request->file('avatar'));
            $oldFilename = $user->avatar;
        }
        $this->userRepository->update($id, $inputs);
        //Suppression ancien avatar
        if (!empty($oldFilename))
            $this->uploadUtil->deleteFile($oldFilename);

        return \redirect()->route('users.index')->withMessage("L'utilisateur " . $request->input('prenom') . " " . $request->input('nom') . " a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        if ($this->userRepository->destroy($id))
            return redirect()->back()->withMessage("La suppression est effective");
        else
            return redirect()->back()->withErrors("Cet utilisateur ne peut être supprimé...");
    }

}

?>
