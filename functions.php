<?php
/** 
 * Array Delete function ONE using (unset) 
 *
 * @param   $value  Value to search the array for
 * @param   $array  The array to search 
 *
 * @return  $array  New array minus the deleted array item
 */
function array_delete_unset( $value, $array ) {
    
    $key = array_search( $value, $array );
    if( $key !== false ) {
        unset( $array[ $key ] );
    }
    
    // unset leaves the index in place - array_values is like "reindexing"
    return array_values( $array );
    
}

/**
 * Array Delete function TWO using (array_splice)
 *
 * @param   $value  Value to search the array for
 * @param   $array  The array to search 
 *
 * @return  $array  New array minus the deleted array item
 */
function array_delete_splice( $value, $array ) {
    
    $key = array_search( $value, $array );
    // returns the value that was removed (so don't return this)
    array_splice( $array, $key, 1 );  
    
    return $array;
    
}

/**
 * Array Delete function THREE using (array_diff)
 *
 * @param   $value  Value to search the array for
 * @param   $array  The array to search 
 *
 * @return  $array  New array minus the deleted array item
 */
function array_delete_diff( $value, $array ) {
    
    // make sure 2nd argument is an array
    return array_diff( $array, array( $value ) );
    
}

/*
 * Function to pick any random item from a given array
 *
 * @param   $array  The array to choose a random item from
 *
 * @return  $item   The randomly chosen item (based on array index) 
 */
function pick_random( $array ) {
    return $array[ array_rand( $array ) ];
}

/*
 * Function to pick any random item from a given array and remove it from the array
 *
 * @param   $array  The ACTUAL array (by reference) to choose a random item from
 *
 * @return  $item   The chosen value (and the array will be trimmed of it)
 */
function pick_random_and_remove( &$array ) {
    $key = pick_random( $array );
    $array = array_delete_unset( $key, $array );
    return $key;
}

/**
 * Set colors
 */
function get_colors( $array ) {
    // $color_array = array();
    
    $palette = pick_random( $array );
    $palette_name = $palette[0];
    $palette = array_delete_unset( $palette_name, $palette );
    
    $bg_color = pick_random_and_remove( $palette );
    $border_color = pick_random_and_remove( $palette );
    $bubble_color = pick_random_and_remove( $palette );
    $text_color = pick_random_and_remove( $palette );
    $emphasis_color = $palette[0];
    
    return array( $bg_color, $border_color, $bubble_color, $text_color, $emphasis_color );
}

/**
 * Create Background
 */
function create_bg( $array, $color ) {
    
    $num_objects = 50;
    $func = pick_random( $array );
    switch( $func ) {
        case 'circles':
            return create_circles( $num_objects, $color );
            break;
        case 'hstripes':
            return create_hstripes( $num_objects, $color );
            break;
        case 'vstripes':
            return create_vstripes( $num_objects, $color );
            break;
        case 'boxes':
            return create_boxes( $num_objects, $color );
            break;
        case 'triangles':
            return create_triangles( $num_objects, $color );
            break;
        default:
            return create_hstripes( $num_objects, $color );
    }

}

/**
 * Circles
 */
function create_circles( $num_objs, $color ) {
    
    $output = '';
    for( $i=0; $i<$num_objs; $i++ ) { 
        $size = rand( 20, 300 ); 
        $x_pos = rand( -5, 100 );
        $y_pos = rand( -5, 100 );
        $opacity = rand( 0, 5 ) / 10;
        
        $output .= "<div class='object' style='width: $size" . "px;
                                height: $size" . "px;
                                left: $x_pos%;
                                top: $y_pos%;
                                opacity: $opacity;
                                border-radius: 50%;'>";
        $output .= "</div>";
    }
    return $output;

}

/**
 * Boxes
 */
function create_boxes( $num_objs, $color ) {

    $output = '';
    for( $i=0; $i<$num_objs; $i++ ) {
        $size = rand( 20, 300 ); 
        $x_pos = rand( -5, 100 );
        $y_pos = rand( -5, 100 );
        $opacity = rand( 0, 5 ) / 10;
        
        $output .= "<div class='object' style='width: $size" . "px;
                                height: $size" . "px;
                                left: $x_pos%;
                                top: $y_pos%;
                                opacity: $opacity;'>";
        $output .= "</div>";
    }
    return $output;
    
}

/**
 * Triangles - not quite working yet
 */
function create_triangles( $num_objs, $color ) {
    
    $directions = array( 'top', 'right', 'bottom', 'left' );
    $dir1 = pick_random_and_remove( $directions );
    $dir2 = pick_random_and_remove( $directions );
    $dir3 = pick_random_and_remove( $directions );

    $output = '';
    for( $i=0; $i<$num_objs; $i++ ) {
        $size = rand( 20, 300 ); 
        $half = $size / 2;
        $x_pos = rand( -5, 100 );
        $y_pos = rand( -5, 100 );
        $opacity = rand( 0, 5 ) / 10;
        
        $output .= "<div class='object' style='width: 0;
                                height: 0;
                                left: $x_pos%;
                                top: $y_pos%;
                                border-$dir1: $half" . "px solid transparent;
                                border-$dir2: $half" . "px solid transparent;
                                border-$dir3: $size" . "px solid $color;
                                opacity: $opacity;'>";
        $output .= "</div>";
    }
    return $output;
    
}

/**
 * Vertical Stripes
 */
function create_vstripes( $num_objs, $color ) {

    $opacity = rand( 3, 5 ) / 10;
    $output = "<style>.object { opacity: $opacity; }</style>";
    $width = 100 / 13;
    $left = 0;
    
    // Actually, for this one, we don't care about the num of objects, just use 13 (original colonies)
    for( $i=0; $i<7; $i++ ) {
        $output .= "<div class='object stripe' style='width: $width%; 
                                height: 100%; 
                                left: $left%;'>";
        $output .= "</div>";
        $left += ( $width * 2 );
    }
    return $output;
    
}

/**
 * Horizontal Stripes
 */
function create_hstripes( $num_objs, $color ) {

    $opacity = rand( 3, 5 ) / 10;
    $output = "<style>.object { opacity: $opacity; }</style>";
    $height = 100 / 13;
    $top = 0;
    
    // Actually, for this one, we don't care about the num of objects, just use 13 (original colonies)
    for( $i=0; $i<7; $i++ ) {
        $output .= "<div class='object stripe' style='width: 100%; 
                                height: $height%; 
                                left: 0px;
                                top: $top%;'>";
        $output .= "</div>";
        $top += ( $height * 2 );
    }
    return $output;
    
}
