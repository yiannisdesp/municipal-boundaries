<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/yiannisdesp
 * @since      1.0.0
 *
 * @package    Municipalities_Boundaries
 * @subpackage Municipalities_Boundaries/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Municipalities_Boundaries
 * @subpackage Municipalities_Boundaries/public
 * @author     Yiannis D <despotis@ucm.org.cy>
 */
class Municipalities_Boundaries_Public
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_shortcode('municipal-boundaries-map', [$this, 'register_municipalities_boundaries_map_shortcode']);
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Municipalities_Boundaries_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Municipalities_Boundaries_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Municipalities_Boundaries_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Municipalities_Boundaries_Loader will then create the relationships
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		
		
	}

	public function register_municipalities_boundaries_map_shortcode()
	{
		static $already_run = false;
		if ($already_run !== true) {
			wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/municipal-boundaries-public.css',[], $this->version, 'all');
			wp_enqueue_script($this->plugin_name . '-i18n', plugin_dir_url(__FILE__) . 'js/i18n.js', [], $this->version, false);
			wp_enqueue_script($this->plugin_name . '-map', plugin_dir_url(__FILE__) . 'js/municipal-boundaries-public.js', [$this->plugin_name . '-i18n'], $this->version, false);
			// get key:
			$options = get_option($this->plugin_name . '-settings');
			$key = array_key_exists('gmap_api_key', $options) ? $options['gmap_api_key'] : '';
			if ( strlen( $key ) > 0 ) {
				// enqueue only if submitted
				wp_enqueue_script('mbpg_map_js', 'https://maps.googleapis.com/maps/api/js?callback=initMunicipalBoundariesMap&key=' . $key, '', false);
			}
		}
		$already_run = true;
		ob_start(); // start html 
		?>
		<div class="mmap-wrap">
			<div id="legend" class="legend-container"></div>
			<div id="map" class="map-container" data-kmlbase="<?= plugin_dir_url(__FILE__); ?>kml/"></div>
		</div>
		<?php return ob_get_clean();
	}
}
