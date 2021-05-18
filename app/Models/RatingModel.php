<?php namespace App\Models;
use CodeIgniter\Model;
class RatingModel extends Model
{
    protected $table = 'player'; //таблица, связанная с моделью
    //Перечень задействованных в модели полей таблицы
    protected $allowedFields = ['id_team', 'FIO', 'Amplua','picture_url'];
    public function getRating($id = null)
    {
        if (!isset($id)) {
            return $this->findAll();
        }
        $builder = $this->select('*')->join('team','player.id_team = team.id');
        return $builder->where(['player.id' => $id])->first();
    }
}
