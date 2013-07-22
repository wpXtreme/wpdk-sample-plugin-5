<?php
/**
* Insert here all properties/configuration for your plugin settings
*
* @class ControlsSettings5
*
*/
class ControlsSettings5 {

  /* Configuration properties: this is the model that the view controller of configuration will handle,
  in order to load and store properties. Any value is related to a WPDK graphic control shown through ControlsConfigurationView class  */
  public $value_text_box;
  public $value_check_box;
  public $value_combo_box;
  public $value_swipe;

  /**
  * Create an instance of ControlsSettings class.
  * The constructor set the default values
  *
  * @brief Construct
  *
  * @return ControlsSettings5
  */
  public function __construct() {
  $this->resetToDefault();
  }

  /**
  * Optional. You can implement this method to reset to default value
  *
  * @brief Reset to default values
  */
  public function resetToDefault() {
  $this->value_text_box   = '';
  $this->value_check_box  = '';
  $this->value_combo_box  = '';
  $this->value_swipe      = '';
  }
}
