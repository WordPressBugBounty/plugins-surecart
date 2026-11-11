<?php

namespace SureCart\MCP;

use SureCartCore\ServiceProviders\ServiceProviderInterface;

/**
 * Service provider for MCP (Model Context Protocol) integration.
 *
 * Handles AJAX handlers for MCP adapter plugin install/activate.
 * The MCP adapter plugin's default server automatically exposes
 * all abilities registered via wp_register_ability().
 */
class McpServerServiceProvider implements ServiceProviderInterface {

	/**
	 * Register all dependencies in the IoC container.
	 *
	 * @param \Pimple\Container $container Service container.
	 * @return void
	 */
	public function register( $container ) {
		$container['surecart.ai_connections'] = function () {
			return new AIConnectionsService();
		};

		$app = $container[ SURECART_APPLICATION_KEY ];
		$app->alias( 'aiConnections', 'surecart.ai_connections' );
	}

	/**
	 * Bootstrap the service.
	 *
	 * @param \Pimple\Container $container Service container.
	 * @return void
	 */
	public function bootstrap( $container ) {
		// AI requests are REST requests, so this can't be admin-only.
		$container['surecart.ai_connections']->bootstrap();
	}
}
