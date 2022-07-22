<?php

// @TODO env vars for these keys?
$api_key = 'py4BaJve0fcBXq6gAdduac8pM';
$api_secret = 'akRsET8YdKzloJ239IakC0Ya0pdIXFFsfwMV4veYlkK11L3gXH';
$bearer = 'AAAAAAAAAAAAAAAAAAAAACyqewEAAAAAr2Flwo4sx2m%2BlB52bWDzCw4Rus8%3DaOGSmKAO35B0hyCLeliKpRT9yGFpD8dBo7AitA0OWGpekTp0nr';
$merton_id = '2408819120';

$url = "https://api.twitter.com/2/users/$merton_id/tweets?max_results=5&tweet.fields=created_at,id,entities";


if ( false === ( $tweet_object = get_transient( 'merton_tweets' ) ) ) {

    $options = array('http' => array(
        'method'  => 'GET',
        'header' => 'Authorization: Bearer ' . $bearer
    ));
    
    $context = stream_context_create( $options );
    $tweet_object =  file_get_contents( $url, false, $context );

    set_transient( 'merton_tweets', $tweet_object, 30 * MINUTE_IN_SECONDS );
}  
$tweets = json_decode( $tweet_object );

if ( $tweets->data ) {
    echo '<div>';
    echo '<h2 class="text-center font-bold my-6">';
    echo '<a href="https://twitter.com/mertonssp" target="_blank">' ;
    echo '<span class="w-3">';
    require get_template_directory() . '/src/templates/icons/twitter.php';
    echo '</span>';
    echo '@MertonSSP</a>';
    echo '</h2>';
    echo '<div class="tweets flex max-w-5xl mx-auto">';
    foreach ( $tweets->data as $key => $tweet ) {
        if ($key < 3) {
            $time = strtotime($tweet->created_at);
            $date = date('F j, Y', $time);
            echo '<div class="tweet">';
            echo '<a href="https://twitter.com/twitter/statuses/' . $tweet->id . '">';

            echo '<div class="text-xs pb-4">' . $date . '</div>';
            echo '<p class="text-sm">' . $tweet->text . '</p>';

            echo '</a>';
            echo '</div>';
        }

    }
    echo '</div>';
    echo '</div>';
}
