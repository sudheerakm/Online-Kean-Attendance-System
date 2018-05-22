<?php


$data = array(
        array('apples', 'pears',  'oranges'),
        array('steve', 'bob')
    );

    $res_matrix = $this->array_cartesian_product( $data );

    foreach ( $res_matrix as $res_array )
    {
        foreach ( $res_array as $res )
        {
            echo $res . " - ";
        }
        echo "<br/>";
    }


function array_cartesian_product( $arrays )
{
    $result = array();
    $arrays = array_values( $arrays );

    $sizeIn = sizeof( $arrays );
    $size = $sizeIn > 0 ? 1 : 0;
    foreach ($arrays as $array)
        $size = $size * sizeof( $array );
    $res_index = 0;
    for ( $i = 0; $i < $size; $i++ )
    {
        $is_duplicate = false;
        $curr_values  = array();
        for ( $j = 0; $j < $sizeIn; $j++ )
        {
            $curr = current( $arrays[$j] );
            if ( !in_array( $curr, $curr_values ) )
            {
                array_push( $curr_values , $curr ); 
            }
            else
            {
                $is_duplicate = true;
                break;
            }
        }
        if ( !$is_duplicate )
        {
            $result[ $res_index ] = $curr_values;
            $res_index++;
        }
        for ( $j = ( $sizeIn -1 ); $j >= 0; $j-- )
        {
            $next = next( $arrays[ $j ] );
            if ( $next )
            {
                break;
            }
            elseif ( isset ( $arrays[ $j ] ) )
            {
                reset( $arrays[ $j ] );
            }
        }
    }
    return $result;
}
?>