<?php 
namespace App;
/**
 * Notification
 */
class Noti extends \Core\Controller
{
	
	const SUCCESS = 'success';

	const ERROR = 'error';

	public static function Message($msg, $type = 'success')
	{
		echo "<script>swal('Notification', '$msg', '$type')</script>";
	}
}
?>