<?php

namespace App\Utils;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadUtil
{
    const AVATAR_USER_PATH = '/images/users/';
    const FORMULATION_PATH = '/formulations';
    const DEFAULT_PATH = '/default';
    protected $repertoire;

    public function __construct()
    {
        $this->repertoire = self::AVATAR_USER_PATH;
    }

    public function traiterFile($fichier, $mode = 'avatar')
    {
        if ($mode != 'avatar')
            $this->repertoire = $this->selectPath($mode);

        //Création d'un nom
        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
        $name = $timestamp . '-' . Str::random(5) . '.' . $fichier->getClientOriginalExtension();
        //Enregistrement
        Storage::disk('public')->putFileAs($this->repertoire, $fichier, $name);

        return $name;
    }

    public function deleteFile($nom, $mode = 'avatar')
    {
        if ($mode != 'avatar')
            $this->repertoire = $this->selectPath($mode);

        //Suppression du fichier
        $file = $this->repertoire . $nom;

        if (Storage::disk('public')->exists($file)) {
            Storage::disk('public')->delete($file);
            return true;
        }
        return false;
    }

    private function selectPath($mode)
    {
        switch ($mode) {
            case 'formulation' :
                return $this->repertoire = self::FORMULATION_PATH;
                break;
            default:
                return self::DEFAULT_PATH;
        }
    }

}