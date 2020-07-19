<?php

namespace App\Modules\Backend\Showcase\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Schema;
use Cviebrock\EloquentSluggable\Sluggable;
use Webpatser\Uuid\Uuid;

class Showcase extends Model 
{
    use Sluggable;
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'showcases';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'author', 'content', 'categories', 'group_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            do {
                $model->id = (string) Uuid::generate(4);
            } while ($model->where($model->getKeyName(), $model->id)->first() != null);
        });
    }

    protected function getColumns()
    {
        return Schema::getColumnListing($this->table);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    public function getMetaAttribute($value)
    {
        return json_decode($value, true);
    }

    public function scopeExclude($query, $value = array())
    {
        return $query->select(array_diff($this->getColumns(), (array) $value));
    }

    /**
     * Get the user who is the advisor of club
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author');
    }
}