<?php
/*
 * djfarly\WpTheme
 * Theme Class
 * Used to register and enqueue scripts and styles.
 * Jan Willem Henckel <jan@mpfilm.de>
 */

namespace djfarly\WpTheme;

class Theme {
	private $styleFolder;
	private $scriptFolder;
	private $theme;

	public function __construct($args = []) {
		$args = wp_parse_args($args, [
			'styleFolder' => '/assets/css/',
			'scriptFolder' => '/assets/js/'
		]);

		$this->styleFolder =  $args['styleFolder'];
		$this->scriptFolder = $args['scriptFolder'];
		$this->theme = wp_get_theme();
	}

	public function enqueueStyle($args = []) {
		$args = wp_parse_args($args, [
			'named' => 'main',
			'fromFolder' => null,
			'fromExternalPath' => null,
			'forAdmin' => false
		]);

		if(is_admin() !== $args['forAdmin']) return;

		global $development;
		$min = ($development ? '' : '.min');

		if (!is_null($args['fromExternalPath']))
			$fileUrl = $args['fromExternalPath'];
		elseif (is_null($args['fromFolder']))
			$fileUrl = get_stylesheet_directory_uri() . $this->styleFolder . $args['named'] . $min . '.css';
		else
			$fileUrl = get_stylesheet_directory_uri() . $args['fromFolder']. $args['named'] . $min . '.css';


		wp_enqueue_style($args['named'], $fileUrl);
	}

	public function registerScript($args = []) {
		$args = wp_parse_args($args, [
			'named' => 'main',
			'fromFolder' => null,
			'withDependencies' => [],
			'fromExternalPath' => null
		]);

		global $development;
		$min = ($development ? '' : '.min');

		if (!is_null($args['fromExternalPath']))
			$fileUrl = $args['fromExternalPath'];
		elseif (is_null($args['fromFolder']))
			$fileUrl = get_stylesheet_directory_uri() . $this->scriptFolder . $args['named'] . $min . '.js';
		else
			$fileUrl = get_stylesheet_directory_uri() . $args['fromFolder']. $args['named'] . $min . '.js';

		wp_register_script($args['named'], $fileUrl, $args['withDependencies']);
	}

	public function enqueueScript($args = []) {
		$args = wp_parse_args($args, [
			'named' => 'main',
			'forAdmin' => false
		]);

		if(is_admin() !== $args['forAdmin']) return;

		wp_enqueue_script($args['named']);
	}

	public function inlineStyle($args = []) {
		$args = wp_parse_args($args, [
			'named' => 'critical',
			'fromFolder' => null,
			'forAdmin' => false
		]);

		if(is_admin() !== $args['forAdmin']) return;

		global $development;
		$min = ($development ? '' : '.min');

		if (is_null($args['fromFolder']))
			$filePath = realpath(get_stylesheet_directory() . $this->styleFolder . $args['named'] . $min . '.css');
		else
			$filePath = realpath(get_stylesheet_directory() . $args['fromFolder']. $args['named'] . $min . '.css');

		if(file_exists($filePath)) {
			add_action('wp_head', function () use ($filePath, $args) {
				echo '<style type="text/css" data-inlined data-inline-context="'.$this->theme->name.'\\'.$args['named'].'">';
				echo file_get_contents($filePath);
				echo '</style>';
			});
		}
	}

	public function inlineScript($args = []) {
		$args = wp_parse_args($args, [
			'named' => 'critical',
			'fromFolder' => null,
			'forAdmin' => false
		]);

		if(is_admin() !== $args['forAdmin']) return;

		global $development;
		$min = ($development ? '' : '.min');

		if (is_null($args['fromFolder']))
			$filePath = realpath(get_stylesheet_directory() . $this->scriptFolder . $args['named'] . $min . '.js');
		else
			$filePath = realpath(get_stylesheet_directory() . $args['fromFolder']. $args['named'] . $min . '.js');

		if(file_exists($filePath)) {
			add_action('wp_head', function () use ($filePath, $args) {
				echo '<script type="text/javascript" data-inlined data-inline-context="'.$this->theme->name.'\\'.$args['named'].'">';
				echo file_get_contents($filePath);
				echo '</script>';
			});
		}
	}
}