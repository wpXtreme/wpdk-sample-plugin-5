<?php
/**
 * @class           About5ViewController
 * @author          wpXtreme team
 * @copyright       Copyright (C) 2013 wpXtreme Inc. All Rights Reserved.
 * @date            2013-07-11
 * @version         1.0.0
 *
 */
class About5ViewController extends WPDKViewController {

  /**
   * Create an instance of About5ViewController class
   *
   * @brief Construct
   *
   * @return About5ViewController
   */
  public function __construct() {
    // Build the container, with default header
    parent::__construct( 'my-view-controller-5', 'WPDK Sample Plugin #5 - Output of second view controller' );
  }

  public function display() {

    // call parent display to build default page structure
    parent::display();

    // show custom content
    ?>
    <h3>View Controller ID: <?php echo $this->id ?></h3>
    <div>This is a generic content of second view controller.</div>
  <?php
  }

}
