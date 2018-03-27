<?php
/**
 * Tests for callback() method for _Beans_Anonymous_Actions.
 *
 * @package Beans\Framework\Tests\Unit\API\Actions
 *
 * @since   1.5.0
 */

namespace Beans\Framework\Tests\Unit\API\Actions;

use _Beans_Anonymous_Actions;
use Beans\Framework\Tests\Unit\API\Actions\Includes\Actions_Test_Case;
use Brain\Monkey;

require_once dirname( __DIR__ ) . '/includes/class-actions-test-case.php';

/**
 * Class Tests_BeansAddAction
 *
 * @package Beans\Framework\Tests\Unit\API\Actions
 * @group   api
 * @group   api-actions
 */
class Tests_BeansAnonymousActions_Callback extends Actions_Test_Case {

	/**
	 * Prepares the test environment before each test.
	 */
	protected function setUp() {
		parent::setUp();

		require_once BEANS_API_PATH . 'actions/class-beans-anonymous-action.php';
	}

	/**
	 * Test callback() should invoke the given callback, passing the arguments to it.
	 */
	public function test_should_invoke_callback() {
		$anonymous_action = new _Beans_Anonymous_Actions( 'beans_test_do_foo', array(
			'foo_test_callback',
			array( 'foo', 'bar' ),
		), 20, 2 );

		// Check that the callback is invoked with each of its parameters.
		Monkey\Functions\expect( 'foo_test_callback' )
			->once()
			->with( 'foo', 'bar' )
			->andReturnFirstArg();

		ob_start();
		$anonymous_action->callback();
		ob_get_clean();

		// Placeholder for PHPUnit, as it requires an assertion.  The real test is the "expect" above.
		$this->assertTrue( true );
	}

	/**
	 * Test callback() should echo the returned content.
	 */
	public function test_should_echo_returned_content() {
		$anonymous_action = new _Beans_Anonymous_Actions( 'beans_test_do_foo', array(
			'foo_test_callback',
			array( 'Cool Beans!', 'It worked!' ),
		) );

		Monkey\Functions\when( 'foo_test_callback' )->alias( function( $arg1, $arg2 ) {
			return "{$arg1} {$arg2}";
		} );

		ob_start();
		$anonymous_action->callback();
		$this->assertEquals( 'Cool Beans! It worked!', ob_get_clean() );
	}
}
