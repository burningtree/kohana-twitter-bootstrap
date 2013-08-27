<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Kohana Twitter Bootstrap module
 *
 * @package    Kohana-twitter-bootstrap
 * @category   Class
 * @author     Luiz Alberto <madeinnordeste@gmail.com>
 */
class Twitterbootstrap {

	public static function _process($files, $list, $folder){

		$list = (array)$list;

		if(sizeof($list)){
			$intersect = array_intersect($files, $list);
		}else{
			$intersect = $files;
		}

		$urls = array();

		foreach ($intersect as $f){
			$urls[] = URL::site('twitter-bootstrap/assets/'.$folder.'/'.$f, TRUE);
		}

		return $urls;
	}

	public static function css($list = array()){

		$files = array('bootstrap.min.css',
						'bootstrap-responsive.css',);

		return Twitterbootstrap::_process($files, $list, 'css');

	}

	public static function print_css($list = array()){
		foreach(Twitterbootstrap::css($list) as $css){
			echo HTML::style($css)."\n";
		}
	}

	public static function js($list = array()){

		$files = array(
		  'bootstrap.js',
    );

		return Twitterbootstrap::_process($files, $list, 'js');

	}

	public static function print_js($list = array()){
		foreach(Twitterbootstrap::js($list) as $script){
			echo HTML::script($script)."\n";
		}
	}

}
