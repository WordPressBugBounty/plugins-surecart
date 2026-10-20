<?php

namespace SureCart\Telemetry;

use SureCart\Database\Table;
use SureCart\Database\Tables\TelemetryEvents;
use SureCartCore\ServiceProviders\ServiceProviderInterface;

/**
 * Registers the telemetry outbox, recorder, sender and admin screens.
 */
class TelemetryServiceProvider implements ServiceProviderInterface {
	/**
	 * {@inheritDoc}
	 *
	 * @param \Pimple\Container $container Service Container.
	 */
	public function register( $container ) {
		$container['surecart.telemetry.queue'] = function () {
			return new TelemetryQueue( new TelemetryEvents( new Table() ) );
		};

		$container['surecart.telemetry'] = function () use ( $container ) {
			return new TelemetryService( $container['surecart.telemetry.queue'] );
		};

		$container['surecart.telemetry.site_details'] = function () use ( $container ) {
			return new SiteDetails( $container['surecart.telemetry'] );
		};

		$container['surecart.telemetry.sender'] = function () use ( $container ) {
			return new TelemetrySender( $container['surecart.telemetry.queue'], $container['surecart.telemetry'], $container['surecart.telemetry.site_details'] );
		};

		$container['surecart.telemetry.consent_notice'] = function () use ( $container ) {
			return new ConsentNotice( $container['surecart.telemetry'] );
		};

		$container['surecart.telemetry.site_health'] = function () use ( $container ) {
			return new SiteHealth( $container['surecart.telemetry'], $container['surecart.telemetry.queue'] );
		};

		$app = $container[ SURECART_APPLICATION_KEY ];
		$app->alias( 'telemetry', 'surecart.telemetry' );
		$app->alias( 'telemetrySender', 'surecart.telemetry.sender' );
		$app->alias( 'telemetrySiteDetails', 'surecart.telemetry.site_details' );
	}

	/**
	 * {@inheritDoc}
	 *
	 * @param \Pimple\Container $container Service Container.
	 */
	public function bootstrap( $container ) {
		add_action(
			TelemetrySender::HOOK,
			function () use ( $container ) {
				$container['surecart.telemetry.sender']->run();
			}
		);

		// Action Scheduler's API isn't usable before this fires.
		add_action(
			'action_scheduler_init',
			function () use ( $container ) {
				$container['surecart.telemetry.sender']->schedule();
			}
		);

		if ( is_admin() ) {
			$container['surecart.telemetry.consent_notice']->bootstrap();
			$container['surecart.telemetry.site_health']->bootstrap();
		}
	}
}
