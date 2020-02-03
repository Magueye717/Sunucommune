<?php

namespace App\Http\Controllers\Portail;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Http\Requests\RoleRequest;
use App\Repositories\Commune\PartenaireRepository;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\Commune\CommuneInfoRepository;
use App\Models\Commune\CommuneInfo;
class PortailController extends Controller
{
    protected $permRepository;

    protected $partenaireRepository;
    protected $communeInfoRepository;
    public function __construct(PartenaireRepository $partenaireRepository,CommuneInfoRepository $communeInfoRepository)
    {
        $this->partenaireRepository = $partenaireRepository;

        $this->communeInfoRepository = $communeInfoRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $partenaires = $this->partenaireRepository->getData();
        $communeInfo = $this->communeInfoRepository->getInfo();
        return view('portail.index', compact('communeInfo','partenaires'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $permission = $this->permRepository->getById($id);
        return view('admin.securite.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update(PermissionRequest $request, $id)
    {
        $this->permRepository->update($id, $request->all());
        return Redirect::route('permissions.index')->withMessage("La permission " . $request->input('description') . " a été modifiée.");
    }

}

?>
