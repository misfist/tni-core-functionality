<?php
/**
 * TNI Core Subscription Authorization
 *
 * @package    TNI_Core
 * @subpackage TNI_Core\Includes
 * @since      1.0.9
 * @license    GPL-2.0+
 */

class TNI_Core_Authorization {

  /**
   * The version number.
   * @var     string
   * @access  public
   * @since   1.0.9
   */
  public $_version;

  /**
	 * The main plugin file.
	 * @var     string
	 * @access  public
	 * @since   1.0.9
	 */
	public $file;

	/**
	 * The main plugin directory.
	 * @var     string
	 * @access  public
	 * @since   1.0.9
	 */
	public $dir;

	/**
	 * The plugin assets directory.
	 * @var     string
	 * @access  public
	 * @since   1.0.9
	 */
	public $assets_dir;

	/**
	 * The plugin assets URL.
	 * @var     string
	 * @access  public
	 * @since   1.0.9
	 */
	public $assets_url;

  /**
   * Base URL
   * Class constant TNI_Core_Authorization::BASEURL
   * @var     string
   * @access  public
   * @since   1.0.9
   */
  const BASEURL = 'https://members.thenewinquiry.com';

  /**
   * Initialize all the things
   *
   * @since 1.0.9
   *
   */
  function __construct( $file = '', $version ) {
    $this->_version = $version;

    // Load plugin environment variables
    $this->file = $file;
    $this->dir = dirname( $this->file );
    $this->assets_dir = trailingslashit( $this->dir ) . 'assets';
    $this->assets_url = esc_url( trailingslashit( plugins_url( '/assets/', $this->file ) ) );

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
  }

  /**
	 * Enqueue Scripts
	 *
	 * @since 1.0.9
	 *
	 * @return void
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( 'tni-core-authentication', $this->assets_url . 'js/auth.js', array( 'jquery' ), $this->_version, true );
	}

}