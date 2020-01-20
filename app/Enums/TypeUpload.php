<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class TypeUpload extends Enum
{
    const PhotoMaire = 'photo_maire';
    const PhotoMembre = 'photo_membre';
    const LogoPartenaire = 'logo_partenaire';
    const PhotoPanel = 'photo_panel';
    const ArticlePhoto = 'article_photo';
    const ArticleFile = 'article_file';
    const PanelFile = 'panel_file';
    const MediaFile = 'media_file';
}
