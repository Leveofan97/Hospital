<?php namespace App\Models;
use CodeIgniter\Model;
class RatingModel extends Model
{
    protected $table = 'player'; //таблица, связанная с моделью
    //Перечень задействованных в модели полей таблицы
    protected $allowedFields = ['id_team', 'FIO', 'Amplua','picture_url', 'userid', 'name'];
    public function getRating($id = null)
    {
        if (!isset($id)) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    //Добавить на гитхаб
    public function getRatingWithUser($id = null, $search = '')
    {
        if($search != null){
            $builder = $this->select('player.id, id_team, FIO, Amplua ,player.picture_url,email,name')
                ->join('users','player.userid = users.id')
                ->join('team','player.id_team = team.id')
                ->where('Amplua',$search)
                ->orWhere('id_team ', (int)$search)
                ->orWhere('email',$search,'both',null,true);
                var_dump($builder);
        }else{
            $builder = $this->select('player.id, id_team, FIO, Amplua ,player.picture_url,email')
                ->join('users','player.userid = users.id')
                ->join('team','player.id_team = team.id');
                var_dump($builder);
        }
        if (!is_null($id))
        {
            return $builder->where(['player.id' => $id])->first();
        }
        return $builder;
    }
}
