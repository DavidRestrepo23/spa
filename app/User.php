<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname' ,'email', 'password', 'biography' ,'avatar', 'gender', 'nickname', 'url_facebook', 'url_instagram', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function posts()
    {
        return $this->hasMany(Post::class);
    }


    public function getAvatarImageDefaultAttribute(){

        if($this->avatar == 'profile-default.png'){
            return '/img/profile/'. $this->avatar;
        }
        return $this->avatar;

    }

    public function getGenderBannerAttribute(){

        if($this->gender == 'male'){
            return '/img/bg5.jpg';
        }else{
            if($this->gender == 'female')
                return '/img/bg6.jpg';
        }

        return '/img/bg7.jpg';
        
    }

    public function getRoleChangeLanguageAttribute()
    {
        if($this->role == 'admin')
            return 'Administrador';
        return 'Autor';
    }

    public function getStatusChangeLanguageAttribute()
    {
        if($this->status == 'active')
            return 'Activo';
        return 'Inactivo';
    }

    public function getCleanRoleNameAttribute(){
        
        $role = $this->roles()->pluck('id');
        $role_replace = str_replace('"', '', $role);
        $role_replace_corchete_left = str_replace("[", "", $role_replace);
        $role_replace_corchete_right = str_replace("]", "", $role_replace_corchete_left);
        $role_clean = $role_replace_corchete_right;
        return $role_clean;

    }

    public function getRoleNamesAttribute(){

        if($this->getRoleNames() == '[]' ){
             return 'Sin rol asignado';
        }else{
           
            return $this->getRoleNames();
        }
        
    }


    public function getIfExistUrlFacebookAttribute(){
        
        if($this->url_facebook != '')
            return '<a href="'.$this->url_facebook.'" style="color:#23527C" target="_blank"><i style="font-size: 15pt;" class="fab fa-facebook"></i></a>';
        return null;
    }

    public function getIfExistUrlInstagramAttribute(){
        
        if($this->url_instagram != '')
            return '<a href="'.$this->url_instagram.'" target="_blank" style="color:#23527C"><i style="font-size: 15pt;" class="fab fa-instagram"></i></a>';
        return null;
    }


   
 

}
