<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property boolean $is_parent
 * @property string $link_code
 * @property int $parent_id
 * @property boolean $is_direct
 * @property boolean $is_scroll
 * @property boolean $is_show
 * @property string $created_at
 * @property string $updated_at
 */
class Sidebar extends Model
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
    protected $fillable = ['title', 'is_parent', 'link_code', 'parent_id', 'is_direct', 'is_scroll', 'is_show', 'version_id', 'created_at', 'updated_at'];
	
	public function sidebar_version()
    {
        return $this->belongsTo(Version::class, 'version_id');
    }
}
