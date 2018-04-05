<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Setting
 * @package App\Models
 * @version October 17, 2017, 2:48 pm CST
 *
 * @property string site_name
 * @property string key_words
 * @property string description
 * @property string contactor
 * @property string mobile
 * @property string tel
 * @property string tel_tousu
 * @property longtext intro
 * @property string address
 * @property string logo
 * @property sting weixin
 * @property string qq
 * @property integer post_page
 */
class Setting extends Model
{
    use SoftDeletes;

    public $table = 'settings';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'site_name',
        'key_words',
        'description',
        'contactor',
        'mobile',
        'tel',
        'tel_tousu',
        'email',
        'intro',
        'address',
        'logo',
        'weixin',
        'qq',
        'post_page',
        'js_tongji',
        'beian',
        'banquan',
        'share',
        'yunlai'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'site_name' => 'string',
        'key_words' => 'string',
        'description' => 'string',
        'contactor' => 'string',
        'mobile' => 'string',
        'tel' => 'string',
        'tel_tousu' => 'string',
        'address' => 'string',
        'logo' => 'string',
        'qq' => 'string',
        'post_page' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'site_name' => 'required',
        'key_words' => 'required'
    ];

    public function getDesAttribute(){
        global $Briefing_Length; 
        mb_regex_encoding("UTF-8");     
        $Foremost = mb_substr($this->intro, 0, 250); 
        $re = "<(\/?) 
    (P|DIV|H1|H2|H3|H4|H5|H6|ADDRESS|PRE|TABLE|TR|TD|TH|INPUT|SELECT|TEXTAREA|OBJECT|A|UL|OL|LI| 
    BASE|META|LINK|HR|BR|PARAM|IMG|AREA|INPUT|SPAN)[^>]*(>?)"; 
        $Single = "/BASE|META|LINK|HR|BR|PARAM|IMG|AREA|INPUT|BR/i";     

        $Stack = array(); $posStack = array(); 

        mb_ereg_search_init($Foremost, $re, 'i'); 

        while($pos = mb_ereg_search_pos()){ 
            $match = mb_ereg_search_getregs(); 

            if($match[1]==""){ 
                $Elem = $match[2]; 
                if(mb_eregi($Single, $Elem) && $match[3] !=""){ 
                    continue; 
                } 
                array_push($Stack, mb_strtoupper($Elem)); 
                array_push($posStack, $pos[0]);             
            }else{ 
                $StackTop = $Stack[count($Stack)-1]; 
                $End = mb_strtoupper($match[2]); 
                if(strcasecmp($StackTop,$End)==0){ 
                    array_pop($Stack); 
                    array_pop($posStack); 
                    if($match[3] ==""){ 
                        $Foremost = $Foremost.">"; 
                    } 
                } 
            } 
        } 

        $cutpos = array_shift($posStack) - 1;     
        $Foremost =  mb_substr($Foremost,0,$cutpos,"UTF-8"); 
        $Foremost .= '...';
        return strip_tags($Foremost); 

    }
}
