<?php
/**
 * Sample configuration class. In this class you define the model of your tree configuration.
 *
 * @class              ControlsConfiguration5
 * @author             wpXtreme team
 * @copyright          2013- wpXtreme
 * @date               20130722
 * @version            1.0.0
 */

class ControlsConfiguration5 extends WPDKConfiguration {

    /**
     * The configuration name used on database to store data
     *
     * @brief Configuration name
     *
     * @var string
     */
    const CONFIGURATION_NAME = 'wpdk-controls-configuration-5';

    /**
     * Your own configuration property
     *
     * @brief Configuration version
     *
     * @var string $version
     */
    public $version = '1.0.0';

    /**
     * This is the pointer to your own tree configuration
     *
     * @brief Settings
     *
     * @var ControlsSettings $settings
     */
    public $settings;

    /**
     * Return an instance of ControlsConfiguration class from the database or onfly.
     *
     * @brief Get the configuration
     *
     * @return ControlsConfiguration
     */
    public static function init() {

        $instance = parent::init( self::CONFIGURATION_NAME, __CLASS__ );

        /* Or if the onfly version is different from stored version. */
        if( version_compare( $instance->version, '1.0.0' ) < 0 ) {
            /* For i.e. you would like update the version property. */
            $instance->version = '1.0.0';
            $instance->update();
        }

        return $instance;
    }

    /**
     * Create an instance of ControlsConfiguration class
     *
     * @brief Construct
     *
     * @return ControlsConfiguration
     */
    public function __construct() {

        parent::__construct( self::CONFIGURATION_NAME );

        /* Init my tree settings. */
        $this->settings = new ControlsSettings5();

    }

}
