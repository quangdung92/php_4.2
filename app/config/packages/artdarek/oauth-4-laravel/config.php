<?php 

return array( 
	
	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session', 

	/**
	 * Consumers
	 */
	'consumers' => array(

		/**
		 * Twitter
		 */
        'Twitter' => array(
		    'client_id'     => 'NKmGk8pke1S3cF5Ho8CZthxyK',
		    'client_secret' => 'D9Cada6NpWMONIkmpE1KDKnAZOQT2SDRXYHqu4rjK4gSqeh8vY',
		),	
		
		'Facebook' => array(
            'client_id'     => '1533721856892334',
            'client_secret' => 'd5c1a63a5b804841e87813a641416fdd',
            'scope'         => array("user_status","email","read_friendlists"),
        ),      
	)

);