<?php

namespace App\Controllers;

use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\UserModel;
use Hermawan\DataTables\DataTable;

class AdminController extends BaseController
{
    protected $db, $users, $group;

    public function __construct()
    {
        $this->db       = \Config\Database::connect();
        $this->users    = new UserModel();
        $this->group    = new GroupModel();
    }

    public function index(): string
    {
        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $data_users = $this->users
                        ->select('users.id as userId, username, email, fullname, user_image, auth_groups.name as name_group, auth_groups.description as description')
                        ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
                        ->join('auth_groups', 'auth_groups_users.group_id = auth_groups.id')
                        ->groupStart()
                            ->like('username', $keyword)
                            ->orLike('email', $keyword)
                            ->orLike('fullname', $keyword)
                            ->orLike('auth_groups.name', $keyword)
                            ->orLike('auth_groups.description', $keyword)
                        ->groupEnd()
                        ->get()->getResult();
        }
        else{
            $data_users = $this->users
                        ->select('users.id as userId, username, email, fullname, user_image, auth_groups.name as name_group, auth_groups.description as description')
                        ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
                        ->join('auth_groups', 'auth_groups_users.group_id = auth_groups.id')
                        ->orderBy('userId', 'asc')
                        ->get()->getResult();
        }

        $data_group = $this->group->get()->getResult();

        $data = [
            'title'         => 'User List',
            'users'         => $data_users,
            'data_group'    => $data_group
        ];
        return view('admin/index', $data);
    }

    public function detail($id)
    {
        $user = $this->users
                     ->select('users.id as userId, username, email, fullname, user_image, auth_groups.name as name_group')
                     ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
                     ->join('auth_groups', 'auth_groups_users.group_id = auth_groups.id')
                     ->where('users.id',$id)->get()->getRow();

        if(empty($user)){
            return redirect()->to('/admin');
        }

        $data = [
            'title' => 'User Detail',
            'user' => $user
        ];
        return view('admin/userDetail', $data);
    }

    function userList(){
        $request = $this->request->getVar('cari');
        return DataTable::of(
            $this->users
            ->select('users.id as userId, fullname, username, email, auth_groups.name as name_group, description')
            ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
            ->join('auth_groups', 'auth_groups_users.group_id = auth_groups.id')
        )
        ->add(null, function($row){
            return '<a target="_blank" href="admin/'.$row->userId.'" class="btn btn-primary btn-sm" >Detail</a>';
        })
        ->hide('userId')
        ->toJson();
    }

}
