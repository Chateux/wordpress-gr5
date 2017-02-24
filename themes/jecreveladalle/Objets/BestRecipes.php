<?php
//
//class BestRecipes_Widget extends WP_Widget {
//
//	public function BestRecipes() {
//		parent::__construct('BestRecipes', 'Meilleures Recettes', ['description' => 'Les meilleures recettes.']);
//	}
//
//	public function widget($args, $values) {
//		echo $args['before_widget'];
//		echo $args['before_title'];
//		echo apply_filters('widget_title', $values['title']);
//		echo $args['after_title'];
//		// @adrien - Ajout du template CSS ici
//		echo $args['after_widget'];
//	}
//
//	public function update($new, $old) {
//		// Save widget options
//	}
//
//	public function form($values) {
//    $title = isset($instance['title']) ? $instance['title'] : '';
//    echo "
//    <p>
//        <label for=".echo $this->get_field_name( 'title' );.">". _e( 'Title:' ); ."</label>
//        <input class='widefat' id='". echo $this->get_field_id( 'title' ); ."' name='". echo $this->get_field_name( 'title' ); ."' type='text' value='". echo  $title; ."' />
//    </p>";
//	}
//}