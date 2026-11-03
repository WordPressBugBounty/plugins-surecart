<?php

namespace SureCart\SavedItems;

use SureCartCore\ServiceProviders\ServiceProviderInterface;

/**
 * Provides the saved items on/off switch and the menu icon.
 */
class SavedItemsServiceProvider implements ServiceProviderInterface {
	/**
	 * Register all dependencies in the IoC container.
	 *
	 * @param \Pimple\Container $container Service container.
	 * @return void
	 */
	public function register( $container ) {
		$container['surecart.saved_items'] = function () {
			return new SavedItemsService();
		};
		$container['surecart.saved_items.menu'] = function () {
			return new SavedItemsMenuService();
		};

		$app = $container[ SURECART_APPLICATION_KEY ];
		$app->alias( 'saved_items', 'surecart.saved_items' );
	}

	/**
	 * Bootstrap any services if needed.
	 *
	 * @param \Pimple\Container $container Service container.
	 * @return void
	 */
	public function bootstrap( $container ) {
		$container['surecart.saved_items']->bootstrap();

		if ( $container['surecart.saved_items']->enabled() ) {
			$container['surecart.saved_items.menu']->bootstrap();
		}
	}
}
