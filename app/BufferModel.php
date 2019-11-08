<?php

namespace Bulkly;

use Illuminate\Database\Eloquent\Model;

class BufferModel extends Model
{
    //
    protected $table='buffer_postings';
    protected $fillable=array(
         'id',
         'user_id',
         'group_id',
         'post_id',
         'account_id',
         'account_service',
         'buffer_post_id',
         'post_text',
         'sent_at',
         'created_at'
     );

}
