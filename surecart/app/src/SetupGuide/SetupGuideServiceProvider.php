<?php

namespace SureCart\SetupGuide;

use SureCartCore\ServiceProviders\ServiceProviderInterface;

/**
 * Provide the setup guide service.
 */
class SetupGuideServiceProvider implements ServiceProviderInterface {
	/**
	 * Register all dependencies in the IoC container.
	 *
	 * @param \Pimple\Container $container Service container.
	 * @return void
	 */
	public function register( $container ) {
		$container['surecart.setup_guide'] = fn() => new SetupGuideService();

		$app = $container[ SURECART_APPLICATION_KEY ];
		$app->alias( 'setupGuide', 'surecart.setup_guide' );
	}

	/**
	 * Bootstrap any services if needed.
	 *
	 * @param \Pimple\Container $container Service container.
	 * @return void
	 */
	public function bootstrap( $container ) {
		// nothing to bootstrap.
	}
}
