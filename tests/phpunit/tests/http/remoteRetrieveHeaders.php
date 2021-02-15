<?php

/**
 * @group http
 * @covers ::wp_remote_retrieve_headers
 */
class Tests_HTTP_RemoteRetrieveHeaders extends WP_UnitTestCase {

	/**
	 * Valid response
	 */
	function test_remote_retrieve_headers_valid_response() {
		$headers  = 'headers_data';
		$response = array( 'headers' => $headers );

		$result = wp_remote_retrieve_headers( $response );
		$this->assertSame( $headers, $result );
	}

	/**
	 * Response is a WP_Error
	 */
	function test_remote_retrieve_headers_is_error() {
		$response = new WP_Error( 'Some error' );

		$result = wp_remote_retrieve_headers( $response );
		$this->assertSame( array(), $result );
	}

	/**
	 * Response does not contain 'headers'
	 */
	function test_remote_retrieve_headers_invalid_response() {
		$response = array( 'no_headers' => 'set' );

		$result = wp_remote_retrieve_headers( $response );
		$this->assertSame( array(), $result );
	}
}
