<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $siteName
 * @property string $siteUrl
 * @property string $siteLogo
 * @property string $stripePrivate
 * @property string $stripePublic
 * @property integer $versionSite
 * @property integer $versionSiteText
 * @property string $created_at
 * @property string $updated_at
 */
class Configuration extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['siteName', 'siteUrl', 'siteLogo', 'stripePrivate', 'stripePublic', 'versionSite', 'versionSiteText', 'created_at', 'updated_at'];
}
