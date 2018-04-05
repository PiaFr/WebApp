<?php
/**
 * Created by Pia Freilinger.
 * Date: 05.04.2018
 */
namespace App;

class ToDoModel extends Model
{
    protected $table = 'todos';
    protected $connection = 'mysql';
    public $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'userId', 'title', 'description', 'location', 'priority', 'duration'
    ];
}
