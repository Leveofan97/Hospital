<?php namespace App\Models;
use CodeIgniter\Model;
class RatingModel extends Model
{
    protected $table = 'player'; //таблица, связанная с моделью
    //Перечень задействованных в модели полей таблицы
    protected $allowedFields = ['id_team', 'FIO', 'Amplua'];
    public function getRating($id = null)
    {
        if (!isset($id)) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}