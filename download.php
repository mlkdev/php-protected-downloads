<?php

	// Check if the file parameter was passed...
	if( !empty( $_GET[ 'file' ] ) ) {

		// Extract the filename from the string...
		$file = explode( '/', trim( urldecode( $_GET[ 'file' ] ), '/' ) );
		foreach( $file as &$file_name ) {
			if( $file_name == '.' || $file_name == '..' ) {
				$file_name = '';
			}
		}
		$file = array_filter( $file );
		$file_name = trim( end( $file ), '.' );

		// Check if file exists...
		$resource = dirname( __FILE__ ).'/no-access/'.$file_name;
		if( file_exists( $resource ) ) {

			// Retrieve the file's content type...
			$resource_mime = mime_content_type( $resource );
			header( 'Content-Type: '.$resource_mime );

			// Respond with a 200 to say the resource was found...
			http_response_code( 200 );

			// Read the file...
			readfile( $resource );

		} else {

			// Respond with a 404 to say the resource was not found...
			http_response_code( 404 );
			echo '404 not found';

		}

	}
