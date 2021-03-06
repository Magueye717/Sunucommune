<?php

namespace App\Utils;

use App\Enums\TypeUpload;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadUtil
{
    const AVATAR_USER_PATH = '/images/users/';
    const PHOTO_MAIRE_PATH = '/commune/photos/';
    const PHOTO_SONDAGE_PATH = '/participation/sondage/photos/';
    const PHOTO_MEMBRE_PATH = '/commune/membres/';
    const PHOTO_PANEL_PATH = '/participation/panels/';
    const PHOTO_COMITE_PATH = '/participation/comites/';
    const LOGO_PARTENAIRE_PATH = '/commune/partenaires/';
    const FICHIER_MEDIA_PATH = '/commune/mediatheques/';
    const ARTICLE_PHOTO_PATH = '/commune/articles/photos/';
    const ARTICLE_FILE_PATH = '/commune/articles/files/';
    const PANEL_FILE_PATH = '/participation/panels/files/';
    const AGENDA_FILE_PATH = '/commune/agenda/files/';
    const INFRASTRUCTURE_FILE_PATH = '/commune/infrastructures/files/';
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
            case TypeUpload::PhotoMaire :
                return $this->repertoire = self::PHOTO_MAIRE_PATH;
                break;
            case TypeUpload::LogoPartenaire :
                return $this->repertoire = self::LOGO_PARTENAIRE_PATH;
                break;
            case TypeUpload::PhotoMembre:
                return $this->repertoire = self::PHOTO_MEMBRE_PATH;
                break;
            case TypeUpload::ArticlePhoto:
                return $this->repertoire = self::ARTICLE_PHOTO_PATH;
                break;
            case TypeUpload::PhotoPanel :
                return $this->repertoire = self::PHOTO_PANEL_PATH;
                break;
            case TypeUpload::PhotoComite :
                return $this->repertoire = self::PHOTO_COMITE_PATH;
                break;
            case TypeUpload::ArticleFile:
                return $this->repertoire = self::ARTICLE_FILE_PATH;
                break;
            case TypeUpload::PanelFile:
                return $this->repertoire = self::PANEL_FILE_PATH;
                break;
            case TypeUpload::MediaFile:
                return $this->repertoire = self::FICHIER_MEDIA_PATH;
                break;
           case TypeUpload::PhotoSondage:
                return $this->repertoire = self::PHOTO_SONDAGE_PATH;
                break;
            case TypeUpload::PhotoAgenda:
                return $this->repertoire = self::AGENDA_FILE_PATH;
                break;
            case TypeUpload::PhotoRessource:
                return $this->repertoire = self::INFRASTRUCTURE_FILE_PATH;
                break;
            default:
                return self::DEFAULT_PATH;
        }
    }

}
