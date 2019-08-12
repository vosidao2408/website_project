<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\User;

class Article extends Model
{
    protected $fillable = [
        'title', 'slug', 'content', 'address', 'contact', 'status', 'image_path'
    ];
    public function district(){
        return $this->belongsTo('App\District');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }

    public static function slugConverter($string) 
    public static function slugConverter($string)
    {
        $string = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $string);
		$string = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $string);
		$string = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $string);
		$string = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $string);
		$string = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $string);
		$string = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $string);
		$string = preg_replace("/(đ)/", 'd', $string);
		$string = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $string);
		$string = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $string);
		$string = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $string);
		$string = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $string);
		$string = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $string);
		$string = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $string);
		$string = preg_replace("/(Đ)/", 'D', $string);
		$string = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $string);
        $string = preg_replace("/( )/", '-', $string);
        return $string;
    }

    public static function cutImg($rawContent)
    {
        $time = substr_count($rawContent, 'img');
        $content = $rawContent;
        for ($i=0; $i < $time; $i++) {
            $imgTabFirst = strstr($content, '<img');
            $imgTabLast = strstr($imgTabFirst,'>', true);
            $imgTab = $imgTabLast.'>';
            $content = str_replace($imgTab,'', $content);
        }
        return $content;
    }

    public static function getSrc($content)
    {
        $contentExplope = explode(' ', $content);
        $find = array();
        $j = 0;
        for ($i=0; $i < count($contentExplope); $i++) {
            $src = 'src';
            $check = strpos($contentExplope[$i], $src);
            if ($check !== false) {
            $find[$j] = $contentExplope[$i];
            $j = $j + 1;
            }
        }
        $srcImg = ['src="','"'];
        $blank = ['',''];
        $raw = str_replace($srcImg, $blank, $find);
        $image = implode(' ', $raw);
        return $image;
    }
}
