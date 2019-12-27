<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\Utils\UploadUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    protected $userRepository;
    protected $uploadUtil;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $userRepository, UploadUtil $uploadUtil)
    {
        $this->userRepository = $userRepository;
        $this->uploadUtil = $uploadUtil;
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect()->route('gestion.dashboard');
    }

    public function showProfile()
    {
        $user = \Auth::user();
        return view('gestion.profil.mon_profil', compact('user'));
    }

    public function showFormProfile()
    {
        $user = \Auth::user();
        return view('gestion.profil.edit_profil', compact('user'));
    }

    public function editProfile(Request $request)
    {
        //Validation
        $this->validate($request, $this->profilRules());

        if (!$this->userRepository->updateProfile(\Auth::user(), $request->all()))
            return Redirect::route('edit.profile')->withErrors('Erreur lors de la modification des informations');
        return Redirect::route('mon.profil')->with('message', 'Les informations du profil ont été mise à jour.');
    }

    public function showFormPwd()
    {
        return view('gestion.profil.edit_pwd');
    }

    public function changePassword(Request $request)
    {
        //Validation
        $this->validate($request, $this->passwordRules());

        if (!$this->userRepository->changePwd(\Auth::user(), $request->all()))
            return Redirect::route('reset.password')->withErrors('Le mot de passe actuel est incorrect.');
        return Redirect::route('reset.password')->with('message', 'Mot de passe modifié avec succés.');
    }

    public function showFormAvatar()
    {
        $user = \Auth::user();
        return view('gestion.profil.edit_avatar', compact('user'));
    }

    public function changeAvatar(Request $request)
    {
        $this->validate($request, $this->avatarRules());
        $user = \Auth::user();
        $nomAvatar = $user->avatar;
        if ($request->hasFile('avatar')) {
            $nom = $this->uploadUtil->traiterFile($request->file('avatar'));
            $this->userRepository->updateAvatar($user, $nom);
            //Suppression ancien avatar
            if (!empty($nomAvatar))
                $this->uploadUtil->deleteFile($nomAvatar);
            return Redirect::route('mon.profil')->with('message', 'Votre avatar a été modifié avec succés.');
        }
        return Redirect::route('change.avatar')->withErrors('Impossible de changer l\'avatar.');
    }

    protected function passwordRules()
    {
        return [
            'actuel_password' => 'required|min:6',
            'nouveau_password' => 'required|confirmed|min:6|different:actuel_password',
        ];
    }

    protected function avatarRules()
    {
        return [
            'avatar' => 'mimes:jpeg,png|dimensions:min_width=80,min_height=80,max_width=600,max_height=600',
        ];
    }

    protected function profilRules()
    {
        return [
            'adresse' => 'nullable|max:225',
        ];
    }
}
