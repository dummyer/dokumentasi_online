<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property int $sidebar_id
 * @property string $title
 * @property boolean $is_parent
 * @property int $parent_id
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 * @property Sidebar $sidebar
 */
class DaftarIsi extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'daftar_isi';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['sidebar_id', 'title', 'is_parent', 'parent_id', 'content', 'version_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sidebar()
    {
        return $this->belongsTo('App\Models\Sidebar');
    }
	
	public function daftarisi_version()
    {
        return $this->belongsTo(Version::class, 'version_id');
    }
}
