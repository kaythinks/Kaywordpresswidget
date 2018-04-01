<?php
/**
 * Plugin Name:   Kay Wordpress Widget Plugin
 * Plugin URI:    https://twitter.com/bigk009
 * Description:   Adds a widget that displays 2 images .
 * Version:       1.0
 * Author:        Kay Odole
 * Author URI:    https://twitter.com/bigk009
 */


class kay_widget extends WP_Widget
{
  // Set up the widget name and description.
  public function __construct() {
    $widget_options = array( 'classname' => 'kay_widget', 'description' => 'This widget displays two images in your sidebar' );
    parent::__construct( 'kay_widget', 'Kay Wordpress Widget Plugin', $widget_options );
  }

  // Create the widget output.
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance[ 'title' ] );
    $imgurl1 = $instance[ 'imgurl1' ];
    $imgurl2 = $instance[ 'imgurl2' ];
    echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title']; ?>
    <img src="<?php echo $imgurl1 ?>" width="100%"/>
    <img src="<?php echo $imgurl2 ?>" width="100%"/>
    <!-- <table style="width:100%">
    <tr>
    <th style="background:blue"><img src="<?php echo $imgurl1 ?>" width="100%"/></th>
    <td><img src="<?php echo $imgurl2 ?>" width="100%"/></td>
    </tr>
    </table> -->
    <br>
    <?php echo $args['after_widget'];
  }

  // Create the admin area widget settings form.
  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
      <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
    </p><?php
    $imgurl1 = ! empty( $instance['imgurl1'] ) ? $instance['imgurl1'] : ''; ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'imgurl1' ); ?>">First Image Url:</label>
      <input type="textarea" id="<?php echo $this->get_field_id( 'imgurl1' ); ?>" name="<?php echo $this->get_field_name( 'imgurl1' ); ?>" value="<?php echo esc_attr( $imgurl1 ); ?>" />
    </p><?php
    $imgurl2 = ! empty( $instance['imgurl2'] ) ? $instance['imgurl2'] : ''; ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'imgurl2' ); ?>">Second Image Url:</label>
      <input type="textarea" id="<?php echo $this->get_field_id( 'imgurl2' ); ?>" name="<?php echo $this->get_field_name( 'imgurl2' ); ?>" value="<?php echo esc_attr( $imgurl2 ); ?>" />
    </p><?php
  }

  // Apply settings to the widget instance.
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
    $instance[ 'imgurl1' ] = strip_tags( $new_instance[ 'imgurl1' ] );
    $instance[ 'imgurl2' ] = strip_tags( $new_instance[ 'imgurl2' ] );
    return $instance;
  }

}

 // Register and load the widget
function kay_load_widget() {
    register_widget( 'kay_widget' );
}
add_action( 'widgets_init', 'kay_load_widget' );

?>