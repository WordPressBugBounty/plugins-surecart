<?php

namespace SureCart\AgentCatalog;

use SureCartCore\ServiceProviders\ServiceProviderInterface;

/**
 * Provides the public product catalog for AI agents as `\SureCart::agentCatalog()`.
 */
class AgentCatalogServiceProvider implements ServiceProviderInterface {
	/**
	 * Register all dependencies in the IoC container.
	 *
	 * @param \Pimple\Container $container Service container.
	 * @return void
	 */
	public function register( $container ) {
		$container['surecart.agent_catalog'] = function () {
			return new AgentCatalogService();
		};

		$app = $container[ SURECART_APPLICATION_KEY ];
		$app->alias( 'agentCatalog', 'surecart.agent_catalog' );
	}

	/**
	 * Bootstrap any services if needed.
	 *
	 * @param \Pimple\Container $container Service container.
	 * @return void
	 */
	public function bootstrap( $container ) {
		$container['surecart.agent_catalog']->bootstrap();
	}
}
