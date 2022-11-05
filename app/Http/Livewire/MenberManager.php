<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class MenberManager extends Component
{
    public $members = array();
    public $visible = false; 

    public function showList(){
        $this->visible = !$this->visible; 
    }
    
    
    public function storeUserToSession($id)
    {
        $user = User::find($id);
        $projet_user_add = array("id" => $user->id, "pseudo" => $user->pseudo, "image_name" => $user->image_name);
        if (!session()->has('projet_users')) {
            session()->put("projet_users", array(["id" => $user->id, "pseudo" => $user->pseudo, "image_name" => $user->image_name]));
        } else {
            if (!in_array($projet_user_add, session()->get('projet_users'))) {
                session()->push('projet_users', $projet_user_add);
            }
        }
    }

    public function removeFromSession($id)
    {
        if (count(session()->get('projet_users')) == 1) {
            session()->forget('projet_users'); 
        } else {
            $my_session = session()->get('projet_users');
            unset($my_session[$id]);
            session()->put('projet_users', $my_session);
        }
    }

    public function render()
    {
        $users = User::all();
        $format_user = [];
        foreach ($users as $user) {
            array_push($format_user, ['id' => $user->id, 'pseudo' => $user->pseudo, 'image_name' => $user->image_name]);
        }
        return view('livewire.menber-manager', [
            'format_user' => $format_user
        ]);
    }
}
