<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    public function __construct()
    {
         $this->setTable('menu');
    }

    public function updateOneByName($name, $data): int
    {
        $needData = $this->getMenuByName($name);
        return $this->where('id', $needData['id'])->update($data);
    }

    /**
     * 
     */
    public function getMenuByName(string $name): array
    {
        $data = $this->where('menu_name', $name)->get();
        $menu = [];

        if($data){
            foreach($data as $item){
                $menu['id'] = $item['id'];
                $menu['menu_name']  = $item['menu_name'];
                $menu['text'] = $item['text'];
                $menu['commands'] = $item['commands'];
     
                return $menu;
            }
        }

        $menu['text'] = 'Nothing found';
        return $menu;;
    }

    /**
     * 
     */
    public function getAllData(): object
    {
        return $this->all();
    }

    /** 
     * 
     */
    public function updateData(): bool
    {
        return true;
    }

}
