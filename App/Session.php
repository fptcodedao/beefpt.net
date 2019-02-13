<?php 
namespace App;

use App\Models\User;

/**
 * Session 
 */
class Session
{
	
	public static function login($user, $remember)
	{
		session_regenerate_id(true);
		$_SESSION['user_id'] = $user->id;
	}

	public static function GetUser()
	{
		if (isset($_SESSION['user_id'])) {
			return User::FindID($_SESSION['user_id']);
		}
	}
	public static function getRoleAd()
	{
		$user = static::GetUser();
		return $user->role;
	}
}

?>