<?php 
namespace App\Models;

use PDO;


class All extends \Core\Model
{
	/**
     * Get Random Sliders Limit 3
     *
     * @return array
     */
    public static function getSilde()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM sliders order by rand() limit 3');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * /
     * @param  string $where ex: id = 1
     * @return array row Product
     */
    public static function getProduct($id = false, $sort = false)
    {
    	$db = static::getDB();
    	$sql = "select p.id,p.name,p.cate_id,p.slug,p.images,detail,oil_price,sell_price,p.short_desc,in_stock,star,views,c.name \"namcate\" from product p join categories c on p.cate_id = c.id";
    	if ($id) {
    		$sql .= " where p.id = '$id'";
    	}
        else if ($sort =='descmoney') {
            $sql .= " order by sell_price desc";
        }
        else if($sort == 'ascmoney'){
            $sql .= " order by sell_price asc";
        }
        else if($sort == 'asc'){
            $sql .= " order by p.id asc";
        }else{
            $sql .= " order by p.id desc";
        }
    	$stmt = $db->query($sql);
    	return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * 
     * @param int $id Id San Pham
     * @return Array Images San Pham
     */
    public static function Imgproduct($id)
    {
        if (!$id) {
            return false;
        }
        $db = static::getDB();
        $sql = "select url,alt from product_galleries where pro_id = $id";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>