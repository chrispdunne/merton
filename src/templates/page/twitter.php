<?php

// @TODO env vars for these keys?
$bearer = TWITTER_BEARER;
$merton_id = '2408819120';

$url = "https://api.twitter.com/2/users/$merton_id/tweets?max_results=5&tweet.fields=created_at,id,entities";


if ( false === ( $tweet_object = get_transient( 'merton_tweets' ) ) ) {

    $options = array('http' => array(
        'method'  => 'GET',
        'header' => 'Authorization: Bearer ' . $bearer
    ));
    
    $context = stream_context_create( $options );
    $tweet_object =  file_get_contents( $url, false, $context );

    set_transient( 'merton_tweets', $tweet_object, 60 * MINUTE_IN_SECONDS );
}  
$tweets = json_decode( $tweet_object );

if ( $tweets->data ) {
    echo '<div>';
    echo '<h4 class="text-center font-bold my-6">';
    echo '<a href="https://twitter.com/mertonssp" target="_blank">' ;
    echo '<span class="w-">';
    icon('twitter');
    echo '</span>';
    echo '@MertonSSP</a>';
    echo '</h4>';
    echo '<div class="px-4 lg:px-0 tweets md:flex max-w-5xl mx-auto">';
    foreach ( $tweets->data as $key => $tweet ) {
        if ($key < 3) {
            $date = merton_date( $tweet->created_at );
            echo '<div class="tweet my-4 md:my-0">';
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
